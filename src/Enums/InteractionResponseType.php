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
 * @method static self deferredUpdateMessage() for components, ACK an interaction and edit the original message later; the user does not see a loading state
 * @method static self updateMessage() for components, edit the message the component was attached to
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#interaction-response-interactionresponsetype
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
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
            "deferredUpdateMessage" => 6,
            "updateMessage" => 7,
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