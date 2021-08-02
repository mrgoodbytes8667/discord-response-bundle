<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\PartialEmoji;
use Bytes\Tests\Common\DataProvider\BooleanProviderTrait;
use Bytes\Tests\Common\DataProvider\NullProviderTrait;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class PartialEmojiTest extends TestCase
{
    use TestDiscordFakerTrait, BooleanProviderTrait, NullProviderTrait;

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
     * @dataProvider provideBooleans
     * @dataProvider provideNull
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
     * @dataProvider provideCreateParams
     * @param $id
     * @param $name
     * @param $animated
     */
    public function testCreate($id, $name, $animated)
    {
        $emoji = PartialEmoji::create($id, $name, $animated);
        $this->assertEquals($id, $emoji->getId());
        $this->assertEquals($name, $emoji->getName());
        $this->assertEquals($animated, $emoji->getAnimated());
    }

    /**
     * @return Generator
     */
    public function provideCreateParams()
    {
        foreach ($this->provideId() as $id) {
            foreach ($this->provideName() as $name) {
                foreach ($this->provideBooleans() as $animated) {
                    yield ['id' => $id[0], 'name' => $name[0], 'animated' => $animated[0]];
                }
            }
        }
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
     * @return Generator
     */
    public function provideName()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }
}