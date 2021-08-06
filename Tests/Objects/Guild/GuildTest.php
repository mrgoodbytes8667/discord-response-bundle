<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\Guild;

use Bytes\DiscordResponseBundle\Objects\Guild;
use Bytes\DiscordResponseBundle\Objects\Interfaces\GuildInterface;
use Generator;

/**
 * Class GuildTest
 * @package Bytes\DiscordResponseBundle\Tests\Objects\Guild
 */
class GuildTest extends TestGuildCase
{
    /**
     *
     */
    public function testGetSetOwnerId()
    {
        $ownerId = $this->faker->userId();

        $guild = new Guild();
        $this->assertNull($guild->getOwnerId());
        $this->assertInstanceOf(Guild::class, $guild->setOwnerId($ownerId));
        $this->assertEquals($ownerId, $guild->getOwnerId());
    }

    /**
     *
     */
    public function testGetSetPreferredLocale()
    {
        $preferredLocale = $this->faker->locale();

        $guild = new Guild();
        $this->assertNull($guild->getPreferredLocale());
        $this->assertInstanceOf(Guild::class, $guild->setPreferredLocale($preferredLocale));
        $this->assertEquals($preferredLocale, $guild->getPreferredLocale());
    }

    /**
     * @return Generator
     */
    public function provideNullableSnowflakes()
    {
        $this->setupFaker();
        yield ['snowflake' => $this->faker->snowflake()];
        yield ['snowflake' => null];
    }

    /**
     * @dataProvider provideNullableSnowflakes
     * @param string|null $snowflake
     */
    public function testGetSetSystemChannelId(?string $snowflake)
    {
        $guild = new Guild();
        $this->assertNull($guild->getSystemChannelId());
        $this->assertInstanceOf(Guild::class, $guild->setSystemChannelId($snowflake));
        $this->assertEquals($snowflake, $guild->getSystemChannelId());
    }

    /**
     * @dataProvider provideNullableSnowflakes
     * @param string|null $snowflake
     */
    public function testGetSetAfkChannelId(?string $snowflake)
    {
        $guild = new Guild();
        $this->assertNull($guild->getAfkChannelId());
        $this->assertInstanceOf(Guild::class, $guild->setAfkChannelId($snowflake));
        $this->assertEquals($snowflake, $guild->getAfkChannelId());
    }

    /**
     * @dataProvider provideNullableSnowflakes
     * @param string|null $snowflake
     */
    public function testGetSetPublicUpdatesChannelId(?string $snowflake)
    {
        $guild = new Guild();
        $this->assertNull($guild->getPublicUpdatesChannelId());
        $this->assertInstanceOf(Guild::class, $guild->setPublicUpdatesChannelId($snowflake));
        $this->assertEquals($snowflake, $guild->getPublicUpdatesChannelId());
    }

    /**
     * @dataProvider provideNullableSnowflakes
     * @param string|null $snowflake
     */
    public function testGetSetEmbedChannelId(?string $snowflake)
    {
        $guild = new Guild();
        $this->assertNull($guild->getEmbedChannelId());
        $this->assertInstanceOf(Guild::class, $guild->setEmbedChannelId($snowflake));
        $this->assertEquals($snowflake, $guild->getEmbedChannelId());
    }

    /**
     * @dataProvider provideNullableSnowflakes
     * @param string|null $snowflake
     */
    public function testGetSetApplicationId(?string $snowflake)
    {
        $guild = new Guild();
        $this->assertNull($guild->getApplicationId());
        $this->assertInstanceOf(Guild::class, $guild->setApplicationId($snowflake));
        $this->assertEquals($snowflake, $guild->getApplicationId());
    }

    /**
     * @dataProvider provideNullableSnowflakes
     * @param string|null $snowflake
     */
    public function testGetSetWidgetChannelId(?string $snowflake)
    {
        $guild = new Guild();
        $this->assertNull($guild->getWidgetChannelId());
        $this->assertInstanceOf(Guild::class, $guild->setWidgetChannelId($snowflake));
        $this->assertEquals($snowflake, $guild->getWidgetChannelId());
    }

    /**
     * @dataProvider provideNullableSnowflakes
     * @param string|null $snowflake
     */
    public function testGetSetRulesChannelId(?string $snowflake)
    {
        $guild = new Guild();
        $this->assertNull($guild->getRulesChannelId());
        $this->assertInstanceOf(Guild::class, $guild->setRulesChannelId($snowflake));
        $this->assertEquals($snowflake, $guild->getRulesChannelId());
    }

    /**
     * @return Generator
     */
    public function provideBooleansAndNull()
    {
        yield ['bool' => true];
        yield ['bool' => false];
        yield ['bool' => null];
    }

    /**
     * @dataProvider provideBooleansAndNull
     * @param bool|null $bool
     */
    public function testGetSetWidgetEnabled(?bool $bool)
    {
        $guild = new Guild();
        $this->assertNull($guild->getWidgetEnabled());
        $this->assertInstanceOf(Guild::class, $guild->setWidgetEnabled($bool));
        $this->assertEquals($bool, $guild->getWidgetEnabled());
    }

    /**
     * @return GuildInterface
     */
    protected function createGuildClass(): GuildInterface
    {
        return new Guild();
    }
}