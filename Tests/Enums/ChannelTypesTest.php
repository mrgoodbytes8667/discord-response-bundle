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
    use TestEnumTrait, EnumAssertions;

    /**
     * @dataProvider provideDiscordJsValues
     * @param string $discordjs
     * @param ChannelTypes $enum
     */
    public function testGetFromDiscordJS(string $discordjs, ChannelTypes $enum)
    {
        $type = ChannelTypes::getFromDiscordJS($discordjs);
        $this->assertIsEnum($type);
        $this->assertSameEnum($enum, $type);
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
        yield ['discordjs' => 'dm', 'enum' => ChannelTypes::dm()];
        yield ['discordjs' => 'text', 'enum' => ChannelTypes::guildText()];
        yield ['discordjs' => 'guild_text', 'enum' => ChannelTypes::guildText()];
        yield ['discordjs' => 'voice', 'enum' => ChannelTypes::guildVoice()];
        yield ['discordjs' => 'category', 'enum' => ChannelTypes::guildCategory()];
        yield ['discordjs' => 'news', 'enum' => ChannelTypes::guildNews()];
        yield ['discordjs' => 'store', 'enum' => ChannelTypes::guildStore()];
    }
}
