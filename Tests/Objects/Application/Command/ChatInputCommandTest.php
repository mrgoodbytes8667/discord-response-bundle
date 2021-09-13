<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\Application\Command;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandOptionType as ACOT;
use Bytes\DiscordResponseBundle\Objects\Application\Command\ChatInputCommand;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandOption as Option;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandOptionChoice;
use Bytes\Tests\Common\TestEnumTrait;
use Bytes\Tests\Common\TestSerializerTrait;
use Bytes\Tests\Common\TestValidatorTrait;
use Generator;
use Illuminate\Support\Arr;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use Symfony\Component\String\ByteString;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\Exception\ValidationFailedException;

class ChatInputCommandTest extends TestCase
{
    use TestSerializerTrait, TestValidatorTrait, TestEnumTrait;

    /**
     * @var ACOT[]
     */
    private $commandOptionTypes = [];

    /**
     * @param $command
     * @dataProvider provideValidChatInputCommands
     */
    public function testCreate(ChatInputCommand $command)
    {
        $this->assertEquals(1, $this->validate($command));
    }

    /**
     * @return Generator
     * @throws ReflectionException
     */
    public function provideValidChatInputCommands()
    {
        yield ['command' => ChatInputCommand::createChatCommand('sample', ByteString::fromRandom(), [
            Option::create(ACOT::string(), 'Pick', 'Which is the word sample?', false, [
                ApplicationCommandOptionChoice::create('Foo'),
                ApplicationCommandOptionChoice::create('Bar'),
                ApplicationCommandOptionChoice::create('Sample')
            ])
        ])];

        /** @var ACOT[] $optionTypes */
        $optionTypes = self::extractAllFromEnum(ACOT::class);

        $subcommands = [];

        foreach ($optionTypes as $index => $optionType) {
            $subcommands[] = Option::createSubcommand(ByteString::fromRandom(), ByteString::fromRandom(), [
                Option::create($optionType, ByteString::fromRandom(), ByteString::fromRandom(), $index % 2 == 1 ? true : false)
            ]);
        }

        $subcommands[] = Option::createSubcommand(ByteString::fromRandom(), ByteString::fromRandom(), [
            Option::create(ACOT::string(), ByteString::fromRandom(), ByteString::fromRandom(), true, [
                ApplicationCommandOptionChoice::create(ByteString::fromRandom()),
                ApplicationCommandOptionChoice::create(ByteString::fromRandom()),
                ApplicationCommandOptionChoice::create(ByteString::fromRandom()),
                ApplicationCommandOptionChoice::create(ByteString::fromRandom()),
                ApplicationCommandOptionChoice::create(ByteString::fromRandom()),
                ApplicationCommandOptionChoice::create(ByteString::fromRandom()),
                ApplicationCommandOptionChoice::create(ByteString::fromRandom()),
                ApplicationCommandOptionChoice::create(ByteString::fromRandom()),
                ApplicationCommandOptionChoice::create(ByteString::fromRandom()),
                ApplicationCommandOptionChoice::create(ByteString::fromRandom()),
            ])
        ]);

        yield ['command' => ChatInputCommand::createChatCommand(ByteString::fromRandom(), ByteString::fromRandom(), $subcommands)];

        $groups = [];
        foreach (range(1, 3) as $index) {
            $groups[] = Option::createSubcommandGroup(ByteString::fromRandom(), ByteString::fromRandom(), $subcommands);
        }

        yield ['command' => ChatInputCommand::createChatCommand(ByteString::fromRandom(), ByteString::fromRandom(), $groups)];
    }

    /**
     * @param $command
     * @dataProvider provideValidChatInputCommands
     */
    public function testSerializerDoesNotReturnIgnoredAnnotation(ChatInputCommand $command)
    {
        $serializer = $this->createSerializer();
        $json = $serializer->serialize($command, 'json');
        $this->assertStringNotContainsString('nameDescriptionValueCharacterLength', $json);
    }

    public function testCreateNameTooLong()
    {
        // Name is too long
        $command = ChatInputCommand::createChatCommand(ByteString::fromRandom(33), ByteString::fromRandom());

        try {
            $this->validate($command);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(2, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('Your name cannot be longer than 32 characters', $violation->getMessage());
            $this->assertEquals('name', $violation->getPropertyPath());

            $violation = $exception->getViolations()[1];
            $this->assertEquals('This value is not valid.', $violation->getMessage());
            $this->assertEquals('name', $violation->getPropertyPath());
        }
    }

    public function testCreateNameInvalidCharacter()
    {

        // Name is right length but has an invalid character
        $command = ChatInputCommand::createChatCommand(ByteString::fromRandom(10) . ' a', ByteString::fromRandom());

        try {
            $this->validate($command);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('This value is not valid.', $violation->getMessage());
            $this->assertEquals('name', $violation->getPropertyPath());
        }
    }

    public function testCreateDescriptionTooLong()
    {

        // Description is too long
        $command = ChatInputCommand::createChatCommand(ByteString::fromRandom(), ByteString::fromRandom(101));

        try {
            $this->validate($command);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('Your description cannot be longer than 100 characters', $violation->getMessage());
            $this->assertEquals('description', $violation->getPropertyPath());
        }
    }

    public function testCreateOptionNameTooLong()
    {

        // Subcommand isn't valid - name too long
        $command = ChatInputCommand::createChatCommand('sample', ByteString::fromRandom(), [
            Option::create(ACOT::string(), ByteString::fromRandom(33), 'Which is the word sample?', false, [
                ApplicationCommandOptionChoice::create('Foo'),
                ApplicationCommandOptionChoice::create('Bar'),
                ApplicationCommandOptionChoice::create('Sample')
            ])
        ]);

        try {
            $this->validate($command);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(2, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('Your name cannot be longer than 32 characters', $violation->getMessage());
            $this->assertEquals('options[0].name', $violation->getPropertyPath());

            $violation = $exception->getViolations()[1];
            $this->assertEquals('This value is not valid.', $violation->getMessage());
            $this->assertEquals('options[0].name', $violation->getPropertyPath());
        }
    }

    public function testCreateOptionNameInvalidCharacter()
    {

        // Subcommand isn't valid - name is right length but has an invalid character
        $command = ChatInputCommand::createChatCommand('sample', ByteString::fromRandom(), [
            Option::create(ACOT::string(), ByteString::fromRandom(10) . ' a', ByteString::fromRandom(), false, [
                ApplicationCommandOptionChoice::create('Foo'),
                ApplicationCommandOptionChoice::create('Bar'),
                ApplicationCommandOptionChoice::create('Sample')
            ])
        ]);

        try {
            $this->validate($command);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('This value is not valid.', $violation->getMessage());
            $this->assertEquals('options[0].name', $violation->getPropertyPath());
        }
    }

    public function testCreateOptionDescriptionTooLong()
    {

        // Subcommand isn't valid - description is too long
        $command = ChatInputCommand::createChatCommand(ByteString::fromRandom(), ByteString::fromRandom(), [
            Option::create(ACOT::string(), ByteString::fromRandom(), ByteString::fromRandom(101), false, [
                ApplicationCommandOptionChoice::create('Foo'),
                ApplicationCommandOptionChoice::create('Bar'),
                ApplicationCommandOptionChoice::create('Sample')
            ])
        ]);

        try {
            $this->validate($command);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('Your description cannot be longer than 100 characters', $violation->getMessage());
            $this->assertEquals('options[0].description', $violation->getPropertyPath());
        }
    }

    public function testForTooManySubcommands()
    {
        $optionTypes = $this->getCommandOptionTypes();
        $subcommands = [];
        foreach (range(1, 26) as $index => $optionType) {
            $subcommands[] = Option::createSubcommand(ByteString::fromRandom(5), ByteString::fromRandom(5), [
                Option::create(Arr::random($optionTypes), ByteString::fromRandom(5), ByteString::fromRandom(5), $index % 2 == 1 ? true : false)
            ]);
        }

        try {
            $this->validate(ChatInputCommand::createChatCommand(ByteString::fromRandom(), ByteString::fromRandom(), $subcommands));
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('You cannot specify more than 25 options per command', $violation->getMessage());
            $this->assertEquals('options', $violation->getPropertyPath());
        }
    }

    /**
     * @return ACOT[]
     * @throws ReflectionException
     */
    public function getCommandOptionTypes(): array
    {
        if (empty($this->commandOptionTypes)) {
            $this->commandOptionTypes = $this->extractAllFromEnum(ACOT::class);
        }
        return $this->commandOptionTypes;
    }

    public function testForTooManySubcommandGroups()
    {
        $optionTypes = $this->getCommandOptionTypes();
        $subcommands = [];
        foreach (range(1, 2) as $index => $optionType) {
            $subcommands[] = Option::createSubcommand(ByteString::fromRandom(5), ByteString::fromRandom(5), [
                Option::create(Arr::random($optionTypes), ByteString::fromRandom(5), ByteString::fromRandom(5), $index % 2 == 1 ? true : false)
            ]);
        }

        $groups = [];
        foreach (range(1, 26) as $index) {
            $groups[] = Option::createSubcommandGroup(ByteString::fromRandom(5), ByteString::fromRandom(5), $subcommands);
        }

        try {
            $this->validate(ChatInputCommand::createChatCommand(ByteString::fromRandom(), ByteString::fromRandom(), $groups));
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('You cannot specify more than 25 options per command', $violation->getMessage());
            $this->assertEquals('options', $violation->getPropertyPath());
        }
    }

    public function testForTooManyChoices()
    {
        $optionTypes = $this->getCommandOptionTypes();
        $groups = [];
        foreach (range(1, 26) as $index) {
            $groups[] = ApplicationCommandOptionChoice::create(ByteString::fromRandom(5));
        }

        try {
            $this->validate(ChatInputCommand::createChatCommand(ByteString::fromRandom(5), ByteString::fromRandom(5), [
                Option::create(Arr::random($optionTypes), ByteString::fromRandom(5), ByteString::fromRandom(5), false, $groups)
            ]));
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('You cannot specify more than 25 choices per command/option', $violation->getMessage());
            $this->assertEquals('options[0].choices', $violation->getPropertyPath());
        }
    }

    public function testForNameDescriptionValuesTooLong()
    {
        $optionTypes = $this->getCommandOptionTypes();
        $groups = [];
        foreach (range(1, 25) as $index) {
            $groups[] = ApplicationCommandOptionChoice::create(ByteString::fromRandom(30));
        }

        try {
            $this->validate(ChatInputCommand::createChatCommand(ByteString::fromRandom(), ByteString::fromRandom(), [
                Option::create(Arr::random($optionTypes), ByteString::fromRandom(), ByteString::fromRandom(), false, $groups),
                Option::create(Arr::random($optionTypes), ByteString::fromRandom(), ByteString::fromRandom(), false, $groups),
                Option::create(Arr::random($optionTypes), ByteString::fromRandom(), ByteString::fromRandom(), false, $groups),
                Option::create(Arr::random($optionTypes), ByteString::fromRandom(), ByteString::fromRandom(), false, $groups),
                Option::create(Arr::random($optionTypes), ByteString::fromRandom(), ByteString::fromRandom(), false, $groups),
            ]));
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertStringMatchesFormat('Your combined name, description, and value properties for each command and its subcommands and groups (%d) cannot be longer than 4000 characters', $violation->getMessage());
            $this->assertEquals('nameDescriptionValueCharacterLengthRecursively', $violation->getPropertyPath());
        }
    }

    /**
     * This method is called after each test.
     */
    protected function tearDown(): void
    {
        parent::tearDown();
        $this->commandOptionTypes = null;
    }

}
