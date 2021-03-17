<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class InteractionType
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @method static self ping()
 * @method static self applicationCommand()
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#interaction-interactiontype
 *
 * @version v0.7.0 As of 2021-03-17 Discord Documentation
 */
class InteractionType extends Enum
{

    /**
     * @return int[]
     */
    protected static function values(): array
    {
        return [
            "ping" => 1,
            "applicationCommand" => 2,
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