<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\PartialEmoji;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class PartialEmojiTest extends TestCase
{
    use TestDiscordFakerTrait;

    /**
     * @dataProvider provideName
     * @param mixed $name
     */
    public function testGetSetName($name)
    {
        $partialEmoji = new PartialEmoji();
        $this->assertNull($partialEmoji->getName());
        $this->assertInstanceOf(PartialEmoji::class, $partialEmoji->setName(null));
        $this->assertNull($partialEmoji->getName());
        $this->assertInstanceOf(PartialEmoji::class, $partialEmoji->setName($name));
        $this->assertEquals($name, $partialEmoji->getName());
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
     * @dataProvider provideAnimated
     * @param mixed $animated
     */
    public function testGetSetAnimated($animated)
    {
        $partialEmoji = new PartialEmoji();
        $this->assertNull($partialEmoji->getAnimated());
        $this->assertInstanceOf(PartialEmoji::class, $partialEmoji->setAnimated(null));
        $this->assertNull($partialEmoji->getAnimated());
        $this->assertInstanceOf(PartialEmoji::class, $partialEmoji->setAnimated($animated));
        $this->assertEquals($animated, $partialEmoji->getAnimated());
    }

    /**
     * @return Generator
     */
    public function provideAnimated()
    {
        yield [true];
        yield [false];
        yield [null];
    }

    /**
     * @dataProvider provideId
     * @param mixed $id
     */
    public function testGetSetId($id)
    {
        $partialEmoji = new PartialEmoji();
        $this->assertNull($partialEmoji->getId());
        $this->assertInstanceOf(PartialEmoji::class, $partialEmoji->setId(null));
        $this->assertNull($partialEmoji->getId());
        $this->assertInstanceOf(PartialEmoji::class, $partialEmoji->setId($id));
        $this->assertEquals($id, $partialEmoji->getId());
    }

    /**
     * @return Generator
     */
    public function provideId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }
}