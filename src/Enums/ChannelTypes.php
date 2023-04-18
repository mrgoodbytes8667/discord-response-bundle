<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\IntBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\IntBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;
use ValueError;

/**
 * Class ChannelTypes
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @link https://discord.com/developers/docs/resources/channel#channel-object-channel-types
 *
 * @version v0.15.0 As of 2023-04-17 Discord Documentation
 */
enum ChannelTypes: int implements IntBackedEnumInterface
{
    use IntBackedEnumTrait;

    /**
     * a text channel within a server
     */
    case GUILD_TEXT = 0;

    /**
     * a direct message between users
     */
    case DM = 1;

    /**
     * a voice channel within a server
     */
    case GUILD_VOICE = 2;

    /**
     * a direct message between multiple users
     */
    case GROUP_DM = 3;

    /**
     * an organizational category that contains up to 50 channels
     */
    case GUILD_CATEGORY = 4;

    /**
     * a channel that users can follow and crosspost into their own server
     */
    case GUILD_NEWS = 5;

    /**
     * a temporary sub-channel within a GUILD_ANNOUNCEMENT channel
     */
    case ANNOUNCEMENT_THREAD = 10;

    /**
     * a temporary sub-channel within a GUILD_TEXT or GUILD_FORUM channel
     */
    case PUBLIC_THREAD = 11;

    /**
     * a temporary sub-channel within a GUILD_TEXT channel that is only viewable by those invited and those with the MANAGE_THREADS permission
     */
    case PRIVATE_THREAD = 12;

    /**
     * a voice channel for hosting events with an audience
     */
    case GUILD_STAGE_VOICE = 13;

    /**
     * the channel in a hub containing the listed servers
     */
    case GUILD_DIRECTORY = 14;

    /**
     * Channel that can only contain threads
     */
    case GUILD_FORUM = 15;

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::GUILD_TEXT')]
    public static function guildText(): ChannelTypes
    {
        return ChannelTypes::GUILD_TEXT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::DM')]
    public static function dm(): ChannelTypes
    {
        return ChannelTypes::DM;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::GUILD_VOICE')]
    public static function guildVoice(): ChannelTypes
    {
        return ChannelTypes::GUILD_VOICE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::GROUP_DM')]
    public static function groupDm(): ChannelTypes
    {
        return ChannelTypes::GROUP_DM;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::GUILD_CATEGORY')]
    public static function guildCategory(): ChannelTypes
    {
        return ChannelTypes::GUILD_CATEGORY;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::GUILD_NEWS')]
    public static function guildNews(): ChannelTypes
    {
        return ChannelTypes::GUILD_NEWS;
    }

    /**
     * @param string $value
     * @return ChannelTypes|null
     * @throws ValueError
     */
    public static function getFromDiscordJS(string $value): ?ChannelTypes
    {
        return match (strtolower($value)) {
            'dm' => ChannelTypes::DM,
            'guild_text', 'text' => ChannelTypes::GUILD_TEXT,
            'guild_voice', 'voice' => ChannelTypes::GUILD_VOICE,
            'guild_category', 'category' => ChannelTypes::GUILD_CATEGORY,
            'guild_news', 'news' => ChannelTypes::GUILD_NEWS,
            'unknown' => throw new ValueError(),
            'group_dm' => ChannelTypes::GROUP_DM,
            default => null,
        };
    }

    #[Deprecated('Since 0.15.0, there is no longer a guildStore type')]
    public static function guildStore()
    {
        return;
    }
}
