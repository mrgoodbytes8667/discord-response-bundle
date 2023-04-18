<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\Application\Command;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\Common\Faker\Providers\Discord;
use Bytes\Common\Faker\Providers\MiscProvider;
use Bytes\DiscordResponseBundle\Enums\ApplicationCommandOptionType as ACOT;
use Bytes\DiscordResponseBundle\Enums\ApplicationCommandType;
use Bytes\DiscordResponseBundle\Objects\Application\Command\ChatInputCommand;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandOption as Option;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandOptionChoice;
use Bytes\Tests\Common\TestEnumTrait;
use Bytes\Tests\Common\TestSerializerTrait;
use Bytes\Tests\Common\TestValidatorTrait;
use Faker\Factory;
use Generator;
use Illuminate\Support\Arr;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use Symfony\Component\String\ByteString;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\Exception\ValidationFailedException;
use UnexpectedValueException;

/**
 *
 */
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
        yield ['command' => ChatInputCommand::createChatCommand('sample', self::randomString(), [
            Option::create(ACOT::STRING, 'pick', 'Which is the word sample?', false, [
                ApplicationCommandOptionChoice::create('Foo'),
                ApplicationCommandOptionChoice::create('Bar'),
                ApplicationCommandOptionChoice::create('Sample')
            ])
        ])];

        /** @var ACOT[] $optionTypes */
        $optionTypes = ACOT::cases();

        $subcommands = [];

        foreach ($optionTypes as $index => $optionType) {
            $subcommands[] = Option::createSubcommand(self::randomValidName(), self::randomString(), [
                Option::create($optionType, self::randomValidName(), self::randomString(), $index % 2 == 1 ? true : false)
            ]);
        }

        $subcommands[] = Option::createSubcommand(self::randomValidName(), self::randomString(), [
            Option::create(ACOT::STRING, self::randomValidName(), self::randomString(), true, [
                ApplicationCommandOptionChoice::create(self::randomString()),
                ApplicationCommandOptionChoice::create(self::randomString()),
                ApplicationCommandOptionChoice::create(self::randomString()),
                ApplicationCommandOptionChoice::create(self::randomString()),
                ApplicationCommandOptionChoice::create(self::randomString()),
                ApplicationCommandOptionChoice::create(self::randomString()),
                ApplicationCommandOptionChoice::create(self::randomString()),
                ApplicationCommandOptionChoice::create(self::randomString()),
                ApplicationCommandOptionChoice::create(self::randomString()),
                ApplicationCommandOptionChoice::create(self::randomString()),
            ])
        ]);

        yield ['command' => ChatInputCommand::createChatCommand(self::randomValidName(), self::randomString(), $subcommands)];

        $groups = [];
        foreach (range(1, 3) as $index) {
            $groups[] = Option::createSubcommandGroup(self::randomValidName(), self::randomString(), $subcommands);
        }

        yield ['command' => ChatInputCommand::createChatCommand(self::randomValidName(), self::randomString(), $groups)];
    }

    /**
     * Returns a valid random Discord string
     * @param int $length
     * @return string
     */
    private static function randomString(int $length = 16): string
    {
        return ByteString::fromRandom(length: $length)->toString();
    }

    /**
     * Returns a valid random Discord name (lowercase letters and numbers)
     * @param int $length
     * @return string
     */
    private static function randomValidName(int $length = 16): string
    {
        return ByteString::fromRandom(length: $length, alphabet: '123456789abcdefghijkmnopqrstuvwxyz')->toString();
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

    /**
     *
     */
    public function testCreateNameTooLong()
    {
        // Name is too long
        $command = ChatInputCommand::createChatCommand(self::randomValidName(33), self::randomString());

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

    /**
     *
     */
    public function testCreateNameInvalidCharacter()
    {

        // Name is right length but has an invalid character
        $command = ChatInputCommand::createChatCommand(self::randomValidName(10) . ' a', self::randomString());

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

    /**
     *
     */
    public function testCreateNameHasUppercase()
    {
        $command = ChatInputCommand::createChatCommand('Sample', self::randomString());

        try {
            $this->validate($command);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('Your name may not contain uppercase characters.', $violation->getMessage());
            $this->assertEquals('name', $violation->getPropertyPath());
        }
    }

    /**
     *
     */
    public function testCreateOptionNameHasUppercase()
    {
        $command = ChatInputCommand::createChatCommand('sample', self::randomString(), [
            Option::create(ACOT::STRING, 'Pick', 'Which is the word sample?', false, [
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
            $this->assertEquals('Your option name may not contain uppercase characters.', $violation->getMessage());
            $this->assertEquals('options[0].name', $violation->getPropertyPath());
        }
    }

    /**
     *
     */
    public function testCreateNameAndOptionNameHasUppercase()
    {
        $command = ChatInputCommand::createChatCommand('Sample', self::randomString(), [
            Option::create(ACOT::STRING, 'Pick', 'Which is the word sample?', false, [
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
            $this->assertEquals('Your name may not contain uppercase characters.', $violation->getMessage());
            $this->assertEquals('name', $violation->getPropertyPath());

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[1];
            $this->assertEquals('Your option name may not contain uppercase characters.', $violation->getMessage());
            $this->assertEquals('options[0].name', $violation->getPropertyPath());
        }
    }

    /**
     *
     */
    public function testCreateDescriptionTooLong()
    {

        // Description is too long
        $command = ChatInputCommand::createChatCommand(self::randomValidName(), self::randomString(101));

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

    /**
     *
     */
    public function testCreateOptionNameTooLong()
    {

        // Subcommand isn't valid - name too long
        $command = ChatInputCommand::createChatCommand('sample', self::randomString(), [
            Option::create(ACOT::STRING, self::randomValidName(33), 'Which is the word sample?', false, [
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

    /**
     *
     */
    public function testCreateOptionNameInvalidCharacter()
    {

        // Subcommand isn't valid - name is right length but has an invalid character
        $command = ChatInputCommand::createChatCommand('sample', self::randomString(), [
            Option::create(ACOT::STRING, self::randomValidName(10) . ' a', self::randomString(), false, [
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

    /**
     *
     */
    public function testCreateOptionDescriptionTooLong()
    {

        // Subcommand isn't valid - description is too long
        $command = ChatInputCommand::createChatCommand(self::randomValidName(), self::randomString(), [
            Option::create(ACOT::STRING, self::randomValidName(), self::randomString(101), false, [
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

    /**
     * @throws ReflectionException
     */
    public function testForTooManySubcommands()
    {
        $optionTypes = $this->getCommandOptionTypes();
        $subcommands = [];
        foreach (range(1, 26) as $index => $optionType) {
            $subcommands[] = Option::createSubcommand(self::randomValidName(5), self::randomString(5), [
                Option::create(Arr::random($optionTypes), self::randomValidName(5), self::randomString(5), $index % 2 == 1 ? true : false)
            ]);
        }

        try {
            $this->validate(ChatInputCommand::createChatCommand(self::randomValidName(), self::randomString(), $subcommands));
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
            $this->commandOptionTypes = ACOT::cases();
        }
        return $this->commandOptionTypes;
    }

    /**
     * @throws ReflectionException
     */
    public function testForTooManySubcommandGroups()
    {
        $optionTypes = $this->getCommandOptionTypes();
        $subcommands = [];
        foreach (range(1, 2) as $index => $optionType) {
            $subcommands[] = Option::createSubcommand(self::randomValidName(5), self::randomString(5), [
                Option::create(Arr::random($optionTypes), self::randomValidName(5), self::randomString(5), $index % 2 == 1 ? true : false)
            ]);
        }

        $groups = [];
        foreach (range(1, 26) as $index) {
            $groups[] = Option::createSubcommandGroup(self::randomValidName(5), self::randomString(5), $subcommands);
        }

        try {
            $this->validate(ChatInputCommand::createChatCommand(self::randomValidName(), self::randomString(), $groups));
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('You cannot specify more than 25 options per command', $violation->getMessage());
            $this->assertEquals('options', $violation->getPropertyPath());
        }
    }

    /**
     * @throws ReflectionException
     */
    public function testForTooManyChoices()
    {
        $optionTypes = $this->getCommandOptionTypes();
        $groups = [];
        foreach (range(1, 26) as $index) {
            $groups[] = ApplicationCommandOptionChoice::create(self::randomValidName(5));
        }

        try {
            $this->validate(ChatInputCommand::createChatCommand(self::randomValidName(5), self::randomString(5), [
                Option::create(Arr::random($optionTypes), self::randomValidName(5), self::randomString(5), false, $groups)
            ]));
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('You cannot specify more than 25 choices per command/option', $violation->getMessage());
            $this->assertEquals('options[0].choices', $violation->getPropertyPath());
        }
    }

    /**
     * @throws ReflectionException
     */
    public function testForNameDescriptionValuesTooLong()
    {
        $optionTypes = $this->getCommandOptionTypes();
        $groups = [];
        foreach (range(1, 25) as $index) {
            $groups[] = ApplicationCommandOptionChoice::create(self::randomString(30));
        }

        try {
            $this->validate(ChatInputCommand::createChatCommand(self::randomValidName(), self::randomString(), [
                Option::create(Arr::random($optionTypes), self::randomValidName(), self::randomString(), false, $groups),
                Option::create(Arr::random($optionTypes), self::randomValidName(), self::randomString(), false, $groups),
                Option::create(Arr::random($optionTypes), self::randomValidName(), self::randomString(), false, $groups),
                Option::create(Arr::random($optionTypes), self::randomValidName(), self::randomString(), false, $groups),
                Option::create(Arr::random($optionTypes), self::randomValidName(), self::randomString(), false, $groups),
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
     * @dataProvider provideTypes
     * @param ApplicationCommandType|int|null $type
     */
    public function testGetSetType($type)
    {
        $cmd = new ChatInputCommand();
        $this->assertNull($cmd->getType());
        $this->assertInstanceOf(ChatInputCommand::class, $cmd->setType(null));
        $this->assertNull($cmd->getType());
        $this->assertInstanceOf(ChatInputCommand::class, $cmd->setType($type));
        $this->assertEquals($type instanceof ApplicationCommandType ? $type : ApplicationCommandType::from($type), $cmd->getType());
    }

    /**
     * @return Generator
     */
    public function provideTypes()
    {
        yield [ApplicationCommandType::CHAT_INPUT];
        yield [ApplicationCommandType::MESSAGE];
        yield [ApplicationCommandType::USER];
        yield [ApplicationCommandType::CHAT_INPUT->value];
        yield [ApplicationCommandType::MESSAGE->value];
        yield [ApplicationCommandType::USER->value];
    }

    /**
     * @dataProvider provideTypes
     * @param ApplicationCommandType|int|null $type
     */
    public function testSetTypeInvalid()
    {
        $this->expectException(UnexpectedValueException::class);
        $cmd = new ChatInputCommand();
        $cmd->setType(-5);
    }

    /**
     * @dataProvider provideVersions
     * @param string|null $version
     */
    public function testGetSetVersion($version)
    {
        $cmd = new ChatInputCommand();
        $this->assertNull($cmd->getVersion());
        $this->assertInstanceOf(ChatInputCommand::class, $cmd->setVersion(null));
        $this->assertNull($cmd->getVersion());
        $this->assertInstanceOf(ChatInputCommand::class, $cmd->setVersion($version));
        $this->assertEquals($version, $cmd->getVersion());
    }

    /**
     * @return Generator
     */
    public function provideVersions()
    {
        $faker = Factory::create();
        $faker->addProvider(new MiscProvider($faker));
        $faker->addProvider(new Discord($faker));

        yield ['45984847365'];
        yield [$faker->snowflake()];
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