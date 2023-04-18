<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\Common\Faker\Providers\MiscProvider;
use Bytes\DiscordResponseBundle\Enums\Emojis;
use Bytes\DiscordResponseBundle\Objects\PartialEmoji;
use Faker\Factory;
use Faker\Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class EmojisTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 */
class EmojisTest extends TestCase
{
    /**
     *
     */
    public function testRandom()
    {
        $random = Emojis::random();
        $this->assertInstanceOf(Emojis::class, $random);
    }

    /**
     * @dataProvider provideRandomEmojiStrings
     * @dataProvider provideEmojiString
     * @param $name
     * @param $id
     */
    public function testCustomEmoji($name, $id)
    {
        $emoji = Emojis::customEmoji($name, $id);

        $this->assertStringMatchesFormat(':%s:%s', $emoji);
        $this->assertStringContainsString($name, $emoji);
        $this->assertStringEndsWith($id, $emoji);
    }

    /**
     * @dataProvider provideEmojiString
     * @param $name
     * @param $id
     */
    public function testCustomEmojiExact($name, $id)
    {
        $emoji = Emojis::customEmoji($name, $id);

        $this->assertEquals(':loremipsum:999999999999999999', $emoji);
    }

    public function testToPartialEmoji()
    {
        $e = Emojis::WEATHER_TIME_GLOBE_WITH_MERIDIANS->toPartialEmoji();
        $this->assertInstanceOf(PartialEmoji::class, $e);
        $this->assertEquals('🌐', $e->getName());
    }

    /**
     * @return \Generator
     */
    public function provideRandomEmojiStrings()
    {
        /** @var Generator|MiscProvider $faker */
        $faker = Factory::create();
        $faker->addProvider(new MiscProvider($faker));

        foreach(range(1, 10) as $i) {
            yield ['name' => $faker->word(), 'id' => (string) $faker->numberBetween(900000000, 999999999)];
        }
    }

    /**
     * @return \Generator
     */
    public function provideEmojiString()
    {
        yield ['name' => 'loremipsum', 'id' => '999999999999999999'];
    }
}
