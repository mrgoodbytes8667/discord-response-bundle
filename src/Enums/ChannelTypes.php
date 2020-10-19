<?php


namespace Bytes\DiscordResponseBundle\Enums;


/**
 * Class ChannelTypes
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @todo Refactor to be spatie/enum
 */
class ChannelTypes
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
     * @return int[]
     */
    public static function all()
    {
        return [
            static::GUILD_TEXT,
            static::DM,
            static::GUILD_VOICE,
            static::GROUP_DM,
            static::GUILD_CATEGORY,
            static::GUILD_NEWS,
            static::GUILD_STORE,
        ];
    }

    /**
     * @param int $value
     * @return string|null
     */
    public static function getName($value)
    {
        return static::allNames()[$value];
    }

    /**
     * @return string[]
     */
    public static function allNames()
    {
        $return[0] = 'GUILD_TEXT';
        $return[1] = 'DM';
        $return[2] = 'GUILD_VOICE';
        $return[3] = 'GROUP_DM';
        $return[4] = 'GUILD_CATEGORY';
        $return[5] = 'GUILD_NEWS';
        $return[6] = 'GUILD_STORE';
        return $return;
    }

    /**
     * @param string $value
     * @return int|null
     */
    public static function getFromDiscordJS(string $value)
    {
        switch ($value)
        {
            case 'dm':
                return static::DM;
                break;
            case 'text':
                return static::GUILD_TEXT;
                break;
            case 'voice':
                return static::GUILD_VOICE;
                break;
            case 'category':
                return static::GUILD_CATEGORY;
                break;
            case 'news':
                return static::GUILD_NEWS;
                break;
            case 'store':
                return static::GUILD_STORE;
                break;
            case 'unknown':
                return -1;
                break;
            default:
                return null;
                break;
        }
    }
}