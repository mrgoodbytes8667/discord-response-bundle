<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\Slash;

use Bytes\Common\Faker\TestFakerTrait;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandInteractionDataOption;
use Bytes\Tests\Common\DataProvider\BooleanProviderTrait;
use Bytes\Tests\Common\DataProvider\NullProviderTrait;
use Exception;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class ApplicationCommandInteractionDataOptionTest extends TestCase
{
    use TestFakerTrait, BooleanProviderTrait, NullProviderTrait;

    /**
     * @dataProvider provideOptions
     * @param mixed $options
     */
    public function testGetSetOptions($options)
    {
        $applicationCommandInteractionDataOption = new ApplicationCommandInteractionDataOption();
        $this->assertNull($applicationCommandInteractionDataOption->getOptions());
        $this->assertInstanceOf(ApplicationCommandInteractionDataOption::class, $applicationCommandInteractionDataOption->setOptions(null));
        $this->assertNull($applicationCommandInteractionDataOption->getOptions());
        $this->assertInstanceOf(ApplicationCommandInteractionDataOption::class, $applicationCommandInteractionDataOption->setOptions($options));
        $this->assertEquals($options, $applicationCommandInteractionDataOption->getOptions());
    }

    /**
     * @return Generator
     */
    public function provideOptions()
    {
        $this->setupFaker();
        yield [$this->faker->words()];
    }

    /**
     * @dataProvider provideValue
     * @dataProvider provideBooleans
     * @dataProvider provideNull
     * @param mixed $value
     */
    public function testGetSetValue($value)
    {
        $applicationCommandInteractionDataOption = new ApplicationCommandInteractionDataOption();
        $this->assertNull($applicationCommandInteractionDataOption->getValue());
        $this->assertInstanceOf(ApplicationCommandInteractionDataOption::class, $applicationCommandInteractionDataOption->setValue(null));
        $this->assertNull($applicationCommandInteractionDataOption->getValue());
        $this->assertInstanceOf(ApplicationCommandInteractionDataOption::class, $applicationCommandInteractionDataOption->setValue($value));
        $this->assertEquals($value, $applicationCommandInteractionDataOption->getValue());
    }

    /**
     * @return Generator
     * @throws Exception
     */
    public function provideValue()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
        yield [$this->faker->userName()];
        yield [$this->faker->numberBetween()];
    }

    /**
     * @dataProvider provideName
     * @param mixed $name
     */
    public function testGetSetName($name)
    {
        $applicationCommandInteractionDataOption = new ApplicationCommandInteractionDataOption();
        $this->assertInstanceOf(ApplicationCommandInteractionDataOption::class, $applicationCommandInteractionDataOption->setName($name));
        $this->assertEquals($name, $applicationCommandInteractionDataOption->getName());
    }

    /**
     * @return Generator
     */
    public function provideName()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider provideCreate
     * @param $name
     * @param $value
     * @param $options
     */
    public function testCreate($name, $value, $options)
    {
        $option = ApplicationCommandInteractionDataOption::create($name, $value, $options);
        $this->assertEquals($name, $option->getName());
        $this->assertEquals($value, $option->getValue());
        $this->assertEquals($options, $option->getOptions());
    }

    /**
     * @return Generator
     * @throws Exception
     */
    public function provideCreate()
    {
        $this->setupFaker();
        foreach ([$this->faker->word(), $this->faker->userName(), $this->faker->numberBetween(), $this->faker->boolean(), null] as $value) {
            yield ['name' => $this->faker->word(), 'value' => $value, 'options' => null];
            yield ['name' => $this->faker->word(), 'value' => $value, 'options' => []];
            foreach (range(1, 5) as $optionsRange) {
                $options[] = new ApplicationCommandInteractionDataOption();
                yield ['name' => $this->faker->word(), 'value' => $value, 'options' => $options];
            }
        }
    }
}