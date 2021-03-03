<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class InteractionResponseType
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @method static self pong() ACK a Ping
 * @method static self acknowledge() ACK a command without sending a message, eating the user's input
 * @method static self channelMessage() respond with a message, eating the user's input
 * @method static self channelMessageWithSource() respond with a message, showing the user's input
 * @method static self acknowledgeWithSource() ACK a command without sending a message, showing the user's input
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#interaction-response-interactionresponsetype
 *
 * @version v0.6.0 As of 2021-02-25 Discord Documentation
 */
class InteractionResponseType extends Enum
{
    /**
     * @return int[]
     */
    protected static function values(): array
    {
        return [
            "pong" => 1,
            "acknowledge" => 2,
            "channelMessage" => 3,
            "channelMessageWithSource" => 4,
            "acknowledgeWithSource" => 5,
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