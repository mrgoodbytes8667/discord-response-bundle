<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * @method static self chatInput() Slash commands; a text-based command that shows up when a user types /
 * @method static self user() A UI-based command that shows up when you right click or tap on a user
 * @method static self message() A UI-based command that shows up when you right click or tap on a message
 *
 * @link https://discord.com/developers/docs/interactions/application-commands#application-command-object-application-command-types
 *
 * @version v0.10.8 As of 2021-09-13 Discord Documentation
 */
class ApplicationCommandType extends Enum
{

    /**
     * @return int[]
     */
    protected static function values(): array
    {
        return [
            "chatInput" => 1,
            "user" => 2,
            "message" => 3,
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