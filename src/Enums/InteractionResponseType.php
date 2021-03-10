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
 * @method static self deferredChannelMessageWithSource() ACK an interaction and edit to a response later, the user sees a loading state
 * @method static self acknowledgeWithSource() ACK a command without sending a message, showing the user's input
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#interaction-response-interactionresponsetype
 *
 * @version v0.7.0 As of 2021-03-10 Discord Documentation
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
            "acknowledge" => 2, // Deprecated
            "channelMessage" => 3, // Deprecated
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

    /**
     * ACK a command without sending a message, eating the user's input
     * @return InteractionResponseType
     * @deprecated v0.7.0 Will no longer function after April 8, 2021
     * @link https://discord.com/developers/docs/change-log#march-5-2021
     */
    public static function acknowledge()
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.7.0', 'The "%s()" method has been deprecated by Discord and will stop functioning on April 9, 2021.', __METHOD__);
        return static::make(2);
    }

    /**
     * respond with a message, eating the user's input
     * @return InteractionResponseType
     * @deprecated v0.7.0 Will no longer function after April 8, 2021
     * @link https://discord.com/developers/docs/change-log#march-5-2021
     */
    public static function channelMessage()
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.7.0', 'The "%s()" method has been deprecated by Discord and will stop functioning on April 9, 2021.', __METHOD__);
        return static::make('channelMessage');
    }

    /**
     * ACK a command without sending a message, showing the user's input
     * @return InteractionResponseType
     * @deprecated v0.7.0 Will no longer function after April 8, 2021
     * @link https://discord.com/developers/docs/change-log#march-5-2021
     */
    public static function acknowledgeWithSource()
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.7.0', 'The "%s()" method has been deprecated by Discord and will stop functioning on April 9, 2021. Please use deferredChannelMessageWithSource() instead.', __METHOD__);
        return static::make('deferredChannelMessageWithSource');
    }
}