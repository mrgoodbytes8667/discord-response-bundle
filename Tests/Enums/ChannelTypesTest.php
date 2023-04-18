<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\ChannelTypes;
use Bytes\Tests\Common\TestEnumTrait;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Phpunit\EnumAssertions;

/**
 * Class ChannelTypesTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 */
class ChannelTypesTest extends TestCase
{
    use TestEnumTrait;

    /**
     * @dataProvider provideDiscordJsValues
     * @param string $discordjs
     * @param ChannelTypes $enum
     */
    public function testGetFromDiscordJS(string $discordjs, ChannelTypes $enum)
    {
        $type = ChannelTypes::getFromDiscordJS($discordjs);
        EnumAssertions::assertIsEnum($type);
        EnumAssertions::assertSameEnum($enum, $type);
    }

    /**
     *
     */
    public function testGetFromDiscordJSUnknown()
    {
        $this->expectException(\BadMethodCallException::class);
        ChannelTypes::getFromDiscordJS('unknown');
    }

    /**
     *
     */
    public function testGetFromDiscordJSRandom()
    {
        $this->assertNull(ChannelTypes::getFromDiscordJS('abc'));
    }

    /**
     * @return \Generator
     */
    public function provideDiscordJsValues()
    {
        yield ['discordjs' => 'dm', 'enum' => ChannelTypes::DM];
        yield ['discordjs' => 'text', 'enum' => ChannelTypes::GUILD_TEXT];
        yield ['discordjs' => 'guild_text', 'enum' => ChannelTypes::GUILD_TEXT];
        yield ['discordjs' => 'voice', 'enum' => ChannelTypes::GUILD_VOICE];
        yield ['discordjs' => 'category', 'enum' => ChannelTypes::GUILD_CATEGORY];
        yield ['discordjs' => 'news', 'enum' => ChannelTypes::GUILD_NEWS];
    }
}
