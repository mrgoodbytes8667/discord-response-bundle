<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class ApplicationCommandOptionType
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @method static self subCommand()
 * @method static self subCommandGroup()
 * @method static self string()
 * @method static self integer() Any integer between -2^53 and 2^53
 * @method static self boolean()
 * @method static self user()
 * @method static self channel()
 * @method static self role()
 * @method static self mentionable() Includes users and roles
 * @method static self number() Any double between -2^53 and 2^53
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#applicationcommandoptiontype
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
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
            "mentionable" => 9,
            'number' => 10,
        ];
    }

    /**
     * @return int
     */
    public function jsonSerialize()
    {
        return $this->value;
    }
}