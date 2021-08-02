<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class InteractionType
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @method static self ping()
 * @method static self applicationCommand()
 * @method static self messageComponent()
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#interaction-interactiontype
 *
 * @version v0.9.8 As of 2021-08-02 Discord Documentation
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
            "messageComponent" => 3,
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