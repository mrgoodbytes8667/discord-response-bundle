<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\Message;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\Emoji;
use Bytes\DiscordResponseBundle\Objects\Message\SelectOption;
use Bytes\DiscordResponseBundle\Objects\PartialEmoji;
use Bytes\Tests\Common\DataProvider\BooleanProviderTrait;
use Bytes\Tests\Common\DataProvider\NullProviderTrait;
use Bytes\Tests\Common\TestValidatorTrait;
use Generator;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\Exception\ValidationFailedException;

/**
 *
 */
class SelectOptionTest extends TestCase
{
    use TestDiscordFakerTrait, TestValidatorTrait, BooleanProviderTrait, NullProviderTrait;

    const CHARACTERS_25 = 'abcdeabcdeabcdeabcdeabcde';
    const CHARACTERS_50 = 'abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde';
    const CHARACTERS_100 = 'abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde';

    /**
     * @dataProvider provideValue
     * @param mixed $value
     */
    public function testGetSetValue($value)
    {
        $selectOption = new SelectOption();
        $this->assertNull($selectOption->getValue());
        $this->assertInstanceOf(SelectOption::class, $selectOption->setValue(null));
        $this->assertNull($selectOption->getValue());
        $this->assertInstanceOf(SelectOption::class, $selectOption->setValue($value));
        $this->assertEquals($value, $selectOption->getValue());
    }

    /**
     * @return Generator
     */
    public function provideValue()
    {
        $this->setupFaker();
        foreach (range(6, 100) as $max) {
            yield [$this->faker->text(maxNbChars: $max)];
        }
    }

    /**
     * @dataProvider provideBooleans
     * @dataProvider provideNull
     * @param mixed $default
     */
    public function testGetSetDefault($default)
    {
        $selectOption = new SelectOption();
        $this->assertNull($selectOption->getDefault());
        $this->assertInstanceOf(SelectOption::class, $selectOption->setDefault(null));
        $this->assertNull($selectOption->getDefault());
        $this->assertInstanceOf(SelectOption::class, $selectOption->setDefault($default));
        $this->assertEquals($default, $selectOption->getDefault());
    }

    /**
     * @dataProvider provideLabel
     * @param mixed $label
     */
    public function testGetSetLabel($label)
    {
        $selectOption = new SelectOption();
        $this->assertNull($selectOption->getLabel());
        $this->assertInstanceOf(SelectOption::class, $selectOption->setLabel(null));
        $this->assertNull($selectOption->getLabel());
        $this->assertInstanceOf(SelectOption::class, $selectOption->setLabel($label));
        $this->assertEquals($label, $selectOption->getLabel());
    }

    /**
     * @return Generator
     */
    public function provideLabel()
    {
        $this->setupFaker();
        foreach (range(6, 25) as $max) {
            yield [$this->faker->text(maxNbChars: $max)];
        }
    }

    /**
     * @dataProvider provideDescription
     * @param mixed $description
     */
    public function testGetSetDescription($description)
    {
        $selectOption = new SelectOption();
        $this->assertNull($selectOption->getDescription());
        $this->assertInstanceOf(SelectOption::class, $selectOption->setDescription(null));
        $this->assertNull($selectOption->getDescription());
        $this->assertInstanceOf(SelectOption::class, $selectOption->setDescription($description));
        $this->assertEquals($description, $selectOption->getDescription());
    }

    /**
     * @return Generator
     */
    public function provideDescription()
    {
        $this->setupFaker();
        foreach (range(6, 50) as $max) {
            yield [$this->faker->text(maxNbChars: $max)];
        }
    }

    /**
     * @dataProvider provideEmoji
     * @param mixed $emoji
     */
    public function testGetSetEmoji($emoji)
    {
        $selectOption = new SelectOption();
        $this->assertNull($selectOption->getEmoji());
        $this->assertInstanceOf(SelectOption::class, $selectOption->setEmoji(null));
        $this->assertNull($selectOption->getEmoji());
        $this->assertInstanceOf(SelectOption::class, $selectOption->setEmoji($emoji));
        $this->assertEquals($emoji, $selectOption->getEmoji());
    }

    /**
     * @return Generator
     */
    public function provideEmoji()
    {
        yield [new Emoji()];
    }

    /**
     * @dataProvider provideValidCreateParams
     * @param $label
     * @param $value
     * @param $description
     * @param $emoji
     * @param $default
     */
    public function testValidationSuccess($label, $value, $description, $emoji, $default)
    {
        $emoji = new PartialEmoji();
        $option = SelectOption::create($label, $value, $description, $emoji, $default);
        $this->assertEquals(1, $this->validate($option));
    }

    /**
     * @dataProvider provideValidCreateParams
     * @param $label
     * @param $value
     * @param $description
     * @param $emoji
     * @param $default
     */
    public function testValidationFailure($label, $value, $description, $emoji, $default)
    {
        $option = SelectOption::create(self::CHARACTERS_25 . 'xyz', self::CHARACTERS_100 . 'xyz', self::CHARACTERS_50 . 'xyz', $emoji, $default);

        try {
            $this->validate($option);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(3, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('This value should satisfy at least one of the following constraints: [1] This value should be blank. [2] This value is too long. It should have 25 characters or less.', $violation->getMessage());
            $this->assertEquals('label', $violation->getPropertyPath());

            $violation = $exception->getViolations()[1];
            $this->assertEquals('This value should satisfy at least one of the following constraints: [1] This value should be blank. [2] This value is too long. It should have 100 characters or less.', $violation->getMessage());
            $this->assertEquals('value', $violation->getPropertyPath());

            $violation = $exception->getViolations()[2];
            $this->assertEquals('This value should satisfy at least one of the following constraints: [1] This value should be blank. [2] This value is too long. It should have 50 characters or less.', $violation->getMessage());
            $this->assertEquals('description', $violation->getPropertyPath());
        }
    }

    /**
     * @return Generator
     */
    public function provideValidCreateParams()
    {
        $this->setupFaker();
        $emoji = new PartialEmoji();
        yield ['label' => $this->faker->text(maxNbChars: 25), 'value' => $this->faker->text(maxNbChars: 100), 'description' => $this->faker->text(maxNbChars: 50), 'emoji' => $emoji, 'default' => $this->faker->boolean()];
        yield ['label' => self::CHARACTERS_25, 'value' => self::CHARACTERS_100, 'description' => self::CHARACTERS_50, 'emoji' => $emoji, 'default' => $this->faker->boolean()];
        yield ['label' => '', 'value' => '', 'description' => '', 'emoji' => $emoji, 'default' => $this->faker->boolean()];
        yield ['label' => '', 'value' => '', 'description' => null, 'emoji' => $emoji, 'default' => $this->faker->boolean()];
    }
}