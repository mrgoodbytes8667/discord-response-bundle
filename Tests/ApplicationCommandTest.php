<?php

namespace Bytes\DiscordResponseBundle\Tests;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandOptionType as ACOT;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommand;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandOption as Option;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandOptionChoice;
use Bytes\EnumSerializerBundle\Enums\Enum;
use Generator;
use Illuminate\Support\Arr;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;
use Symfony\Component\String\ByteString;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\Exception\ValidationFailedException;

class ApplicationCommandTest extends TestCase
{
    use TestValidatorTrait;

    /**
     * @var ACOT[]
     */
    private $commandOptionTypes = [];

    /**
     * @param $command
     * @dataProvider provideValidApplicationCommands
     */
    public function testCreate(ApplicationCommand $command)
    {
        $this->assertEquals(1, $this->validate($command));
    }

    /**
     * @return Generator
     * @throws ReflectionException
     */
    public function provideValidApplicationCommands()
    {
        yield ['command' => ApplicationCommand::create('sample', ByteString::fromRandom(), [
            Option::create(ACOT::string(), 'Pick', 'Which is the word sample?', false, [
                ApplicationCommandOptionChoice::create('Foo'),
                ApplicationCommandOptionChoice::create('Bar'),
                ApplicationCommandOptionChoice::create('Sample')
            ])
        ])];

        /** @var ACOT[] $optionTypes */
        $optionTypes = $this->extractAllFromEnum(ACOT::class);

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

        yield ['command' => ApplicationCommand::create(ByteString::fromRandom(), ByteString::fromRandom(), $subcommands)];

        $groups = [];
        foreach (range(1, 3) as $index) {
            $groups[] = Option::createSubcommandGroup(ByteString::fromRandom(), ByteString::fromRandom(), $subcommands);
        }

        yield ['command' => ApplicationCommand::create(ByteString::fromRandom(), ByteString::fromRandom(), $groups)];
    }

    /**
     * @param object|string $enum
     * @return Enum[]
     * @throws ReflectionException
     */
    protected function extractAllFromEnum($enum)
    {
        $reflectionClass = new ReflectionClass($enum);

        $docComment = $reflectionClass->getDocComment();

        preg_match_all('/@method\s+static\s+self\s+([\w_]+)\(\)/', $docComment, $matches);

        $definition = [];

        foreach ($matches[1] as $methodName) {
            $definition[] = $enum::make($methodName);
        }

        return $definition;
    }

    public function testCreateNameTooLong()
    {
        // Name is too long
        $command = ApplicationCommand::create(ByteString::fromRandom(33), ByteString::fromRandom());

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
        $command = ApplicationCommand::create(ByteString::fromRandom(10) . ' a', ByteString::fromRandom());

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
        $command = ApplicationCommand::create(ByteString::fromRandom(), ByteString::fromRandom(101));

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
        $command = ApplicationCommand::create('sample', ByteString::fromRandom(), [
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
        $command = ApplicationCommand::create('sample', ByteString::fromRandom(), [
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
        $command = ApplicationCommand::create(ByteString::fromRandom(), ByteString::fromRandom(), [
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
            $this->validate(ApplicationCommand::create(ByteString::fromRandom(), ByteString::fromRandom(), $subcommands));
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('You cannot specify more than 10 options per command', $violation->getMessage());
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
        foreach (range(1, 10) as $index => $optionType) {
            $subcommands[] = Option::createSubcommand(ByteString::fromRandom(5), ByteString::fromRandom(5), [
                Option::create(Arr::random($optionTypes), ByteString::fromRandom(5), ByteString::fromRandom(5), $index % 2 == 1 ? true : false)
            ]);
        }

        $groups = [];
        foreach (range(1, 11) as $index) {
            $groups[] = Option::createSubcommandGroup(ByteString::fromRandom(5), ByteString::fromRandom(5), $subcommands);
        }

        try {
            $this->validate(ApplicationCommand::create(ByteString::fromRandom(), ByteString::fromRandom(), $groups));
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('You cannot specify more than 10 options per command', $violation->getMessage());
            $this->assertEquals('options', $violation->getPropertyPath());
        }
    }

    public function testForTooManyChoices()
    {
        $optionTypes = $this->getCommandOptionTypes();
        $groups = [];
        foreach (range(1, 11) as $index) {
            $groups[] = ApplicationCommandOptionChoice::create(ByteString::fromRandom(5));
        }

        try {
            $this->validate(ApplicationCommand::create(ByteString::fromRandom(5), ByteString::fromRandom(5), [
                Option::create(Arr::random($optionTypes), ByteString::fromRandom(5), ByteString::fromRandom(5), false, $groups)
            ]));
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('You cannot specify more than 10 choices per command/option', $violation->getMessage());
            $this->assertEquals('options[0].choices', $violation->getPropertyPath());
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
