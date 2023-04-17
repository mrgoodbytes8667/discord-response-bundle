<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\IntBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\IntBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class ApplicationCommandOptionType
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#applicationcommandoptiontype
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 */
enum ApplicationCommandOptionType: int implements IntBackedEnumInterface
{
    use IntBackedEnumTrait;

    case SUBCOMMAND = 1;
    case SUB_COMMAND_GROUP = 2;
    case STRING = 3;
    /**
     * Any integer between -2^53 and 2^53
     */
    case INTEGER = 4;
    case BOOLEAN = 5;
    case USER = 6;
    case CHANNEL = 7;
    case ROLE = 8;
    /**
     * Includes users and roles
     */
    case MENTIONABLE = 9;
    /**
     * Any double between -2^53 and 2^53
     */
    case NUMBER = 10;

    #[Deprecated('Since 0.15.0, use the enum variant', '%class%::SUBCOMMAND')]
    public static function subCommand(): ApplicationCommandOptionType
    {
        return ApplicationCommandOptionType::SUBCOMMAND;
    }

    #[Deprecated('Since 0.15.0, use the enum variant', '%class%::SUB_COMMAND_GROUP')]
    public static function subCommandGroup(): ApplicationCommandOptionType
    {
        return ApplicationCommandOptionType::SUB_COMMAND_GROUP;
    }

    #[Deprecated('Since 0.15.0, use the enum variant', '%class%::STRING')]
    public static function string(): ApplicationCommandOptionType
    {
        return ApplicationCommandOptionType::STRING;
    }

    #[Deprecated('Since 0.15.0, use the enum variant', '%class%::INTEGER')]
    public static function integer(): ApplicationCommandOptionType
    {
        return ApplicationCommandOptionType::INTEGER;
    }

    #[Deprecated('Since 0.15.0, use the enum variant', '%class%::BOOLEAN')]
    public static function boolean(): ApplicationCommandOptionType
    {
        return ApplicationCommandOptionType::BOOLEAN;
    }

    #[Deprecated('Since 0.15.0, use the enum variant', '%class%::USER')]
    public static function user(): ApplicationCommandOptionType
    {
        return ApplicationCommandOptionType::USER;
    }

    #[Deprecated('Since 0.15.0, use the enum variant', '%class%::CHANNEL')]
    public static function channel(): ApplicationCommandOptionType
    {
        return ApplicationCommandOptionType::CHANNEL;
    }

    #[Deprecated('Since 0.15.0, use the enum variant', '%class%::ROLE')]
    public static function role(): ApplicationCommandOptionType
    {
        return ApplicationCommandOptionType::ROLE;
    }

    #[Deprecated('Since 0.15.0, use the enum variant', '%class%::MENTIONABLE')]
    public static function mentionable(): ApplicationCommandOptionType
    {
        return ApplicationCommandOptionType::MENTIONABLE;
    }

    #[Deprecated('Since 0.15.0, use the enum variant', '%class%::NUMBER')]
    public static function number(): ApplicationCommandOptionType
    {
        return ApplicationCommandOptionType::NUMBER;
    }

    /**
     * @return int
     */
    public function jsonSerialize(): int
    {
        return $this->value;
    }
}
