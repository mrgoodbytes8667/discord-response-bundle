<?php


namespace Bytes\DiscordResponseBundle\Enums;


use BadMethodCallException;
use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class ChannelTypes
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @method static self guildText() a text channel within a server
 * @method static self dm() a direct message between users
 * @method static self guildVoice() a voice channel within a server
 * @method static self groupDm() a direct message between multiple users
 * @method static self guildCategory() an organizational category that contains up to 50 channels
 * @method static self guildNews() a channel that users can follow and crosspost into their own server
 * @method static self guildStore() a channel in which game developers can sell their game on Discord
 *
 * @link https://github.com/spatie/enum
 */
class ChannelTypes extends Enum
{
    /**
     * a text channel within a server
     */
    const GUILD_TEXT = 0;

    /**
     * a direct message between users
     */
    const DM = 1;

    /**
     * a voice channel within a server
     */
    const GUILD_VOICE = 2;

    /**
     * a direct message between multiple users
     */
    const GROUP_DM = 3;

    /**
     * an organizational category that contains up to 50 channels
     */
    const GUILD_CATEGORY = 4;

    /**
     * a channel that users can follow and crosspost into their own server
     */
    const GUILD_NEWS = 5;

    /**
     * a channel in which game developers can sell their game on Discord
     */
    const GUILD_STORE = 6;

    /**
     * @param string $value
     * @return ChannelTypes|null
     * @throws BadMethodCallException
     */
    public static function getFromDiscordJS(string $value): ?static
    {
        return match (strtolower($value)) {
            'dm' => static::from(static::DM),
            'guild_text', 'text' => static::from(static::GUILD_TEXT),
            'guild_voice', 'voice' => static::from(static::GUILD_VOICE),
            'guild_category', 'category' => static::from(static::GUILD_CATEGORY),
            'guild_news', 'news' => static::from(static::GUILD_NEWS),
            'guild_store', 'store' => static::from(static::GUILD_STORE),
            'unknown' => static::from(-1),
            'group_dm' => static::from(static::GROUP_DM),
            default => null,
        };
    }

    /**
     * @return int[]
     */
    protected static function values(): array
    {
        return [
            'guildText' => 0,
            'dm' => 1,
            'guildVoice' => 2,
            'groupDm' => 3,
            'guildCategory' => 4,
            'guildNews' => 5,
            'guildStore' => 6,
        ];
    }
}