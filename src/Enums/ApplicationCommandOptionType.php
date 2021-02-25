<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class ChannelTypes
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @method static self subCommand()
 * @method static self subCommandGroup()
 * @method static self string()
 * @method static self integer()
 * @method static self boolean()
 * @method static self user()
 * @method static self channel()
 * @method static self role()
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#applicationcommandoptiontype
 *
 * @version v0.5.8 As of 2021-02-25 Discord Documentation
 */
class ApplicationCommandOptionType extends Enum
{

    /**
     * @return int[]
     */
    protected static function values(): array
    {
        return [
            "subCommand" => 1,
            "subCommandGroup" => 2,
            "string" => 3,
            "integer" => 4,
            "boolean" => 5,
            "user" => 6,
            "channel" => 7,
            "role" => 8,
        ];
    }
}