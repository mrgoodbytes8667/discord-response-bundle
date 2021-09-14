<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;
use function Symfony\Component\String\u;

/**
 * @method static self chatInput() Slash commands; a text-based command that shows up when a user types /
 * @method static self user() A UI-based command that shows up when you right click or tap on a user
 * @method static self message() A UI-based command that shows up when you right click or tap on a message
 *
 * @link https://discord.com/developers/docs/interactions/application-commands#application-command-object-application-command-types
 *
 * @version v0.11.0 As of 2021-09-13 Discord Documentation
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
     * @return array
     */
    public static function formChoices(): array
    {
        $return = [];
        foreach (static::values() as $r)
        {
            $choice = static::from($r);
            $return[u($choice->label)->snake()->replace('_', ' ')->title(true)->toString()] = $choice->value;
        }

        return $return;
    }

    /**
     * @return int
     */
    public function jsonSerialize()
    {
        return $this->value;
    }
}