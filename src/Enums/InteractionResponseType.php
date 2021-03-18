<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class InteractionResponseType
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @method static self pong() ACK a Ping
 * @method static self channelMessageWithSource() respond with a message, showing the user's input
 * @method static self deferredChannelMessageWithSource() ACK an interaction and edit to a response later, the user sees a loading state
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#interaction-response-interactionresponsetype
 *
 * @version v0.7.0 As of 2021-03-17 Discord Documentation
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
            "channelMessageWithSource" => 4,
            "deferredChannelMessageWithSource" => 5,
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