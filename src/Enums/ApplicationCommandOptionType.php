<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\IntBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\IntBackedEnumTrait;

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
enum ApplicationCommandOptionType: int implements IntBackedEnumInterface
{
    use IntBackedEnumTrait;

    case subCommand = 1;
    case subCommandGroup = 2;
    case string = 3;
    /**
     * Any integer between -2^53 and 2^53
     */
    case integer = 4;
    case boolean = 5;
    case user = 6;
    case channel = 7;
    case role = 8;
    /**
     * Includes users and roles
     */
    case mentionable = 9;
    /**
     * Any double between -2^53 and 2^53
     */
    case number = 10;

    /**
     * @return int
     */
    public function jsonSerialize(): int
    {
        return $this->value;
    }
}
