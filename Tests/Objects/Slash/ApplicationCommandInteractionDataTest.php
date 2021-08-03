<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\Slash;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Enums\ComponentType;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandInteractionData;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandInteractionDataOption;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandInteractionDataResolved;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class ApplicationCommandInteractionDataTest extends TestCase
{
    use TestDiscordFakerTrait;

    /**
     * @dataProvider provideResolved
     * @param mixed $resolved
     */
    public function testGetSetResolved($resolved)
    {
        $applicationCommandInteractionData = new ApplicationCommandInteractionData();
        $this->assertNull($applicationCommandInteractionData->getResolved());
        $this->assertInstanceOf(ApplicationCommandInteractionData::class, $applicationCommandInteractionData->setResolved(null));
        $this->assertNull($applicationCommandInteractionData->getResolved());
        $this->assertInstanceOf(ApplicationCommandInteractionData::class, $applicationCommandInteractionData->setResolved($resolved));
        $this->assertEquals($resolved, $applicationCommandInteractionData->getResolved());
    }

    /**
     * @return Generator
     */
    public function provideResolved()
    {
        yield [new ApplicationCommandInteractionDataResolved()];
    }

    /**
     * @dataProvider provideOptions
     * @param mixed $options
     */
    public function testGetSetOptions($options)
    {
        $applicationCommandInteractionData = new ApplicationCommandInteractionData();
        $this->assertNull($applicationCommandInteractionData->getOptions());
        $this->assertInstanceOf(ApplicationCommandInteractionData::class, $applicationCommandInteractionData->setOptions(null));
        $this->assertNull($applicationCommandInteractionData->getOptions());
        $this->assertInstanceOf(ApplicationCommandInteractionData::class, $applicationCommandInteractionData->setOptions($options));
        $this->assertEquals($options, $applicationCommandInteractionData->getOptions());
    }

    /**
     * @return Generator
     */
    public function provideOptions()
    {
        yield [[new ApplicationCommandInteractionDataOption()]];
    }

    /**
     * @dataProvider provideCustomId
     * @param mixed $customId
     */
    public function testGetSetCustomId($customId)
    {
        $applicationCommandInteractionData = new ApplicationCommandInteractionData();
        $this->assertNull($applicationCommandInteractionData->getCustomId());
        $this->assertInstanceOf(ApplicationCommandInteractionData::class, $applicationCommandInteractionData->setCustomId(null));
        $this->assertNull($applicationCommandInteractionData->getCustomId());
        $this->assertInstanceOf(ApplicationCommandInteractionData::class, $applicationCommandInteractionData->setCustomId($customId));
        $this->assertEquals($customId, $applicationCommandInteractionData->getCustomId());
    }

    /**
     * @return Generator
     */
    public function provideCustomId()
    {
        $this->setupFaker();
        yield [$this->faker->text(25)];
    }

    /**
     * @dataProvider provideComponentType
     * @param mixed $componentType
     */
    public function testGetSetComponentType($componentType)
    {
        $applicationCommandInteractionData = new ApplicationCommandInteractionData();
        $this->assertNull($applicationCommandInteractionData->getComponentType());
        $this->assertInstanceOf(ApplicationCommandInteractionData::class, $applicationCommandInteractionData->setComponentType(null));
        $this->assertNull($applicationCommandInteractionData->getComponentType());
        $this->assertInstanceOf(ApplicationCommandInteractionData::class, $applicationCommandInteractionData->setComponentType($componentType));
        $this->assertEquals($componentType, $applicationCommandInteractionData->getComponentType());
        $this->assertInstanceOf(ApplicationCommandInteractionData::class, $applicationCommandInteractionData->setComponentType($componentType->value));
        $this->assertEquals($componentType, $applicationCommandInteractionData->getComponentType());
    }

    /**
     *
     */
    public function testSetComponentTypeInvalid()
    {
        $this->expectException(\UnexpectedValueException::class);
        $applicationCommandInteractionData = new ApplicationCommandInteractionData();
        $applicationCommandInteractionData->setComponentType(-5);
    }

    /**
     * @return Generator
     */
    public function provideComponentType()
    {
        yield [ComponentType::actionRow()];
        yield [ComponentType::button()];
        yield [ComponentType::selectMenu()];
    }

    /**
     * @dataProvider provideId
     * @param mixed $id
     */
    public function testGetSetId($id)
    {
        $applicationCommandInteractionData = new ApplicationCommandInteractionData();
        $this->assertNull($applicationCommandInteractionData->getId());
        $this->assertInstanceOf(ApplicationCommandInteractionData::class, $applicationCommandInteractionData->setId(null));
        $this->assertNull($applicationCommandInteractionData->getId());
        $this->assertInstanceOf(ApplicationCommandInteractionData::class, $applicationCommandInteractionData->setId($id));
        $this->assertEquals($id, $applicationCommandInteractionData->getId());
    }

    /**
     * @return Generator
     */
    public function provideId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }

    /**
     * @dataProvider provideName
     * @param mixed $name
     */
    public function testGetSetName($name)
    {
        $applicationCommandInteractionData = new ApplicationCommandInteractionData();
        $this->assertInstanceOf(ApplicationCommandInteractionData::class, $applicationCommandInteractionData->setName($name));
        $this->assertEquals($name, $applicationCommandInteractionData->getName());
    }

    /**
     * @return Generator
     */
    public function provideName()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }
}