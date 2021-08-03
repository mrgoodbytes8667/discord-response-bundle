<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\Message;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Enums\ButtonStyle;
use Bytes\DiscordResponseBundle\Enums\ComponentType;
use Bytes\DiscordResponseBundle\Objects\Emoji;
use Bytes\DiscordResponseBundle\Objects\Message\Component;
use Bytes\DiscordResponseBundle\Objects\Message\SelectOption;
use Bytes\DiscordResponseBundle\Objects\PartialEmoji;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandInteractionData;
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
class ComponentTest extends TestCase
{
    use TestDiscordFakerTrait, TestValidatorTrait, BooleanProviderTrait, NullProviderTrait;

    /**
     *
     */
    const CHARACTERS_80 = 'abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde';
    /**
     *
     */
    const CHARACTERS_100 = 'abcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcdeabcde';

    /**
     * @dataProvider provideType
     * @param mixed $type
     */
    public function testGetSetType($type)
    {
        $component = new Component();
        $this->assertNull($component->getType());
        $this->assertInstanceOf(Component::class, $component->setType(null));
        $this->assertNull($component->getType());
        $this->assertInstanceOf(Component::class, $component->setType($type));
        $this->assertEquals($type, $component->getType());
        $this->assertInstanceOf(Component::class, $component->setType($type->value));
        $this->assertEquals($type, $component->getType());
    }

    /**
     * @return Generator
     */
    public function provideType()
    {
        yield [ComponentType::actionRow()];
        yield [ComponentType::button()];
        yield [ComponentType::selectMenu()];
    }

    /**
     *
     */
    public function testSetTypeInvalid()
    {
        $this->expectException(\UnexpectedValueException::class);
        $applicationCommandInteractionData = new Component();
        $applicationCommandInteractionData->setType(-5);
    }

    /**
     * @dataProvider provideCustomId
     * @param mixed $customId
     */
    public function testGetSetCustomId($customId)
    {
        $component = new Component();
        $this->assertNull($component->getCustomId());
        $this->assertInstanceOf(Component::class, $component->setCustomId(null));
        $this->assertNull($component->getCustomId());
        $this->assertInstanceOf(Component::class, $component->setCustomId($customId));
        $this->assertEquals($customId, $component->getCustomId());
    }

    /**
     * @return Generator
     */
    public function provideCustomId()
    {
        $this->setupFaker();
        foreach (range(6, 100) as $max) {
            yield [$this->faker->text(maxNbChars: $max)];
        }
    }

    /**
     * @dataProvider provideBooleans
     * @dataProvider provideNull
     * @param mixed $disabled
     */
    public function testGetSetDisabled($disabled)
    {
        $component = new Component();
        $this->assertNull($component->getDisabled());
        $this->assertInstanceOf(Component::class, $component->setDisabled(null));
        $this->assertNull($component->getDisabled());
        $this->assertInstanceOf(Component::class, $component->setDisabled($disabled));
        $this->assertEquals($disabled, $component->getDisabled());
    }

    /**
     * @dataProvider provideStyle
     * @param mixed $style
     */
    public function testGetSetStyle($style)
    {
        $component = new Component();
        $this->assertNull($component->getStyle());
        $this->assertInstanceOf(Component::class, $component->setStyle(null));
        $this->assertNull($component->getStyle());
        $this->assertInstanceOf(Component::class, $component->setStyle($style));
        $this->assertEquals($style, $component->getStyle());
        $this->assertInstanceOf(Component::class, $component->setStyle($style->value));
        $this->assertEquals($style, $component->getStyle());
    }

    /**
     * @return Generator
     */
    public function provideStyle()
    {
        yield [ButtonStyle::primary()];
        yield [ButtonStyle::secondary()];
        yield [ButtonStyle::success()];
        yield [ButtonStyle::danger()];
        yield [ButtonStyle::link()];
    }

    /**
     *
     */
    public function testSetStyleInvalid()
    {
        $this->expectException(\UnexpectedValueException::class);
        $applicationCommandInteractionData = new Component();
        $applicationCommandInteractionData->setStyle(-5);
    }

    /**
     * @dataProvider provideLabel
     * @param mixed $label
     */
    public function testGetSetLabel($label)
    {
        $component = new Component();
        $this->assertNull($component->getLabel());
        $this->assertInstanceOf(Component::class, $component->setLabel(null));
        $this->assertNull($component->getLabel());
        $this->assertInstanceOf(Component::class, $component->setLabel($label));
        $this->assertEquals($label, $component->getLabel());
    }

    /**
     * @return Generator
     */
    public function provideLabel()
    {
        $this->setupFaker();
        foreach (range(6, 80) as $max) {
            yield [$this->faker->text(maxNbChars: $max)];
        }
    }

    /**
     * @dataProvider provideEmoji
     * @param mixed $emoji
     */
    public function testGetSetEmoji($emoji)
    {
        $component = new Component();
        $this->assertNull($component->getEmoji());
        $this->assertInstanceOf(Component::class, $component->setEmoji(null));
        $this->assertNull($component->getEmoji());
        $this->assertInstanceOf(Component::class, $component->setEmoji($emoji));
        $this->assertEquals($emoji, $component->getEmoji());
        $this->assertInstanceOf(Emoji::class, $component->getEmoji());
    }

    /**
     * @return Generator
     */
    public function provideEmoji()
    {
        $emoji = new Emoji();
        yield [$emoji];
    }

    /**
     * @dataProvider provideUrl
     * @param mixed $url
     */
    public function testGetSetUrl($url)
    {
        $component = new Component();
        $this->assertNull($component->getUrl());
        $this->assertInstanceOf(Component::class, $component->setUrl(null));
        $this->assertNull($component->getUrl());
        $this->assertInstanceOf(Component::class, $component->setUrl($url));
        $this->assertEquals($url, $component->getUrl());
    }

    /**
     * @return Generator
     */
    public function provideUrl()
    {
        $this->setupFaker();
        yield [$this->faker->url()];
        yield [''];
        yield [null];
    }

    /**
     * @dataProvider provideOptions
     * @param mixed $options
     */
    public function testGetSetOptions($options)
    {
        $component = new Component();
        $this->assertNull($component->getOptions());
        $this->assertInstanceOf(Component::class, $component->setOptions(null));
        $this->assertNull($component->getOptions());
        $this->assertInstanceOf(Component::class, $component->setOptions($options));
        $this->assertEquals($options, $component->getOptions());
        $this->assertCount(3, $component->getOptions());
    }

    /**
     * @return Generator
     */
    public function provideOptions()
    {
        foreach (range(1, 3) as $index) {
            $option[] = new SelectOption();
        }
        yield [$option];
    }

    /**
     * @dataProvider providePlaceholder
     * @param mixed $placeholder
     */
    public function testGetSetPlaceholder($placeholder)
    {
        $component = new Component();
        $this->assertNull($component->getPlaceholder());
        $this->assertInstanceOf(Component::class, $component->setPlaceholder(null));
        $this->assertNull($component->getPlaceholder());
        $this->assertInstanceOf(Component::class, $component->setPlaceholder($placeholder));
        $this->assertEquals($placeholder, $component->getPlaceholder());
    }

    /**
     * @return Generator
     */
    public function providePlaceholder()
    {
        $this->setupFaker();
        foreach (range(6, 100) as $max) {
            yield [$this->faker->text(maxNbChars: $max)];
        }
    }

    /**
     * @dataProvider provideMinValues
     * @param mixed $minValues
     */
    public function testGetSetMinValues($minValues)
    {
        $component = new Component();
        $this->assertNull($component->getMinValues());
        $this->assertInstanceOf(Component::class, $component->setMinValues(null));
        $this->assertNull($component->getMinValues());
        $this->assertInstanceOf(Component::class, $component->setMinValues($minValues));
        $this->assertEquals($minValues, $component->getMinValues());
    }

    /**
     * @return Generator
     */
    public function provideMinValues()
    {
        foreach (range(0, 25) as $value) {
            yield [$value];
        }
    }

    /**
     * @dataProvider provideMaxValues
     * @param mixed $maxValues
     */
    public function testGetSetMaxValues($maxValues)
    {
        $component = new Component();
        $this->assertNull($component->getMaxValues());
        $this->assertInstanceOf(Component::class, $component->setMaxValues(null));
        $this->assertNull($component->getMaxValues());
        $this->assertInstanceOf(Component::class, $component->setMaxValues($maxValues));
        $this->assertEquals($maxValues, $component->getMaxValues());
    }

    /**
     * @return Generator
     */
    public function provideMaxValues()
    {
        foreach (range(1, 25) as $value) {
            yield [$value];
        }
    }

    /**
     * @dataProvider provideComponents
     * @param mixed $components
     */
    public function testGetSetComponents($components)
    {
        $component = new Component();
        $this->assertNull($component->getComponents());
        $this->assertInstanceOf(Component::class, $component->setComponents(null));
        $this->assertNull($component->getComponents());
        $this->assertInstanceOf(Component::class, $component->setComponents($components));
        $this->assertEquals($components, $component->getComponents());
        $this->assertCount(3, $component->getComponents());
    }

    /**
     * @return Generator
     */
    public function provideComponents()
    {
        foreach (range(1, 3) as $index) {
            $components[] = new Component();
        }
        yield [$components];
    }

    /**
     * @dataProvider provideValidCreateParams
     * @param $customId
     * @param $disabled
     * @param $style
     * @param $label
     * @param $emoji
     * @param $url
     * @param $options
     * @param $placeholder
     * @param $minValues
     * @param $maxValues
     * @param $components
     */
    public function testValidationSuccess($customId, $disabled, $style, $label, $emoji, $url, $options, $placeholder, $minValues, $maxValues, $components)
    {
        $component = Component::createActionRow([new Component()]);
        $this->assertEquals(1, $this->validate($component));

        $component = Component::createActionRow($components);
        $this->assertEquals(1, $this->validate($component));

        $component = Component::createButton(style: $style, customId: $customId, url: $url, label: $label, emoji: $emoji, disabled: $disabled);
        $this->assertEquals(1, $this->validate($component));

        $component = Component::createLinkButton(url: $url, label: $label, emoji: $emoji, disabled: $disabled);
        $this->assertEquals(1, $this->validate($component));

        $component = Component::createInteractiveButton(style: $style, customId: $customId, label: $label, emoji: $emoji, disabled: $disabled);
        $this->assertEquals(1, $this->validate($component));

        $component = Component::createSelectMenu(customId: $customId, disabled: $disabled, options: $options, placeholder: $placeholder, minValues: $minValues, maxValues: $maxValues);
        $this->assertEquals(1, $this->validate($component));
    }

    /**
     * @dataProvider provideValidCreateParams
     * @param $customId
     * @param $disabled
     * @param $style
     * @param $label
     * @param $emoji
     * @param $url
     * @param $options
     * @param $placeholder
     * @param $minValues
     * @param $maxValues
     * @param $components
     */
    public function testButtonValidationFailure($customId, $disabled, $style, $label, $emoji, $url, $options, $placeholder, $minValues, $maxValues, $components)
    {
        try {
            $component = Component::createButton(style: $style, customId: self::CHARACTERS_100 . 'xyz', url: $this->faker->url(), label: self::CHARACTERS_80 . 'xyz', emoji: $emoji, disabled: $disabled);
            $this->validate($component);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(2, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('This value is too long. It should have 100 characters or less.', $violation->getMessage());
            $this->assertEquals('customId', $violation->getPropertyPath());

            $violation = $exception->getViolations()[1];
            $this->assertEquals('This value is too long. It should have 80 characters or less.', $violation->getMessage());
            $this->assertEquals('label', $violation->getPropertyPath());
        }

        try {
            $component = Component::createButton(style: ButtonStyle::link(), customId: self::CHARACTERS_100 . 'xyz', url: $this->faker->word(), label: self::CHARACTERS_80 . 'xyz', emoji: $emoji, disabled: $disabled);
            $this->validate($component);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(2, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('This value is too long. It should have 80 characters or less.', $violation->getMessage());
            $this->assertEquals('label', $violation->getPropertyPath());

            $violation = $exception->getViolations()[1];
            $this->assertEquals('This value is not a valid URL.', $violation->getMessage());
            $this->assertEquals('url', $violation->getPropertyPath());
        }

        try {
            $component = Component::create(type: ComponentType::button(), customId: $customId, style: ButtonStyle::link(), url: $url);
            $this->validate($component);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('The field "customId" cannot be populated for link buttons.', $violation->getMessage());
            $this->assertEquals('customId', $violation->getPropertyPath());
        }

        try {
            $component = Component::create(type: ComponentType::button(), customId: $customId, style: ButtonStyle::primary(), url: $url);
            $this->validate($component);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('The field "url" can only be populated for link buttons.', $violation->getMessage());
            $this->assertEquals('url', $violation->getPropertyPath());
        }

        try {
            $component = Component::create(type: ComponentType::button(), style: ButtonStyle::link());
            $this->validate($component);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('The field "url" is required for link buttons.', $violation->getMessage());
            $this->assertEquals('url', $violation->getPropertyPath());
        }

        try {
            $component = Component::create(type: ComponentType::button(), style: ButtonStyle::primary());
            $this->validate($component);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('The field "customId" is required for non-link buttons.', $violation->getMessage());
            $this->assertEquals('customId', $violation->getPropertyPath());
        }
    }

    /**
     *
     */
    public function testCreateInteractiveButtonUsingLinkFailure()
    {
        $this->expectException(\UnexpectedValueException::class);
        Component::createInteractiveButton(ButtonStyle::link(), $this->faker->text(25));
    }

    /**
     * @dataProvider provideValidCreateParams
     * @param $customId
     * @param $disabled
     * @param $style
     * @param $label
     * @param $emoji
     * @param $url
     * @param $options
     * @param $placeholder
     * @param $minValues
     * @param $maxValues
     * @param $components
     */
    public function testSelectMenuValidationFailure($customId, $disabled, $style, $label, $emoji, $url, $options, $placeholder, $minValues, $maxValues, $components)
    {
        $component = Component::createSelectMenu(self::CHARACTERS_100 . 'xyz', $disabled, $options, $placeholder, -1, 26);

        try {
            $this->validate($component);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(3, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('This value is too long. It should have 100 characters or less.', $violation->getMessage());
            $this->assertEquals('customId', $violation->getPropertyPath());

            $violation = $exception->getViolations()[1];
            $this->assertEquals('This value should be greater than or equal to 0.', $violation->getMessage());
            $this->assertEquals('minValues', $violation->getPropertyPath());

            $violation = $exception->getViolations()[2];
            $this->assertEquals('This value should be less than or equal to 25.', $violation->getMessage());
            $this->assertEquals('maxValues', $violation->getPropertyPath());
        }

        $component = Component::createSelectMenu($customId, $disabled, $options, $placeholder, 26, 0);

        try {
            $this->validate($component);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(2, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('This value should be less than or equal to 25.', $violation->getMessage());
            $this->assertEquals('minValues', $violation->getPropertyPath());

            $violation = $exception->getViolations()[1];
            $this->assertEquals('This value should be greater than or equal to 1.', $violation->getMessage());
            $this->assertEquals('maxValues', $violation->getPropertyPath());
        }

        $tooManyOptions = [];
        foreach (range(1, 26) as $index)
        {
            $tooManyOptions[] = new SelectOption();
        }
        $component = Component::createSelectMenu($customId, $disabled, $tooManyOptions, $placeholder, $minValues, $maxValues);

        try {
            $this->validate($component);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('This component should contain 25 options or less.', $violation->getMessage());
            $this->assertEquals('options', $violation->getPropertyPath());
        }
    }

    /**
     * @return Generator
     */
    public function provideValidCreateParams()
    {
        $this->setupFaker();
        yield ['customId' => $this->faker->text(100), 'disabled' => $this->faker->boolean(), 'style' => $this->faker->randomElement([
            ButtonStyle::primary(),
            ButtonStyle::secondary(),
            ButtonStyle::success(),
            ButtonStyle::danger()
        ]), 'label' => $this->faker->text(80), 'emoji' => new PartialEmoji(), 'url' => $this->faker->url(), 'options' => [], 'placeholder' => null, 'minValues' => 1, 'maxValues' => 1, 'components' => []];
    }
}