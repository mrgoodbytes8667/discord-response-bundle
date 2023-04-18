<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\IntBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\IntBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class InteractionResponseType
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#interaction-response-interactionresponsetype
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 */
enum InteractionResponseType: int implements IntBackedEnumInterface
{
    use IntBackedEnumTrait;

    /**
     * ACK a Ping
     */
    case PONG = 1;

    /**
     * respond with a message, showing the user's input
     */
    case CHANNEL_MESSAGE_WITH_SOURCE = 4;

    /**
     * ACK an interaction and edit to a response later, the user sees a loading state
     */
    case DEFERRED_CHANNEL_MESSAGE_WITH_SOURCE = 5;

    /**
     * for components, ACK an interaction and edit the original message later; the user does not see a loading state
     */
    case DEFERRED_UPDATE_MESSAGE = 6;

    /**
     * for components, edit the message the component was attached to
     */
    case UPDATE_MESSAGE = 7;

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::PONG')]
    public static function pong(): InteractionResponseType
    {
        return InteractionResponseType::PONG;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CHANNEL_MESSAGE_WITH_SOURCE')]
    public static function channelMessageWithSource(): InteractionResponseType
    {
        return InteractionResponseType::CHANNEL_MESSAGE_WITH_SOURCE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::DEFERRED_CHANNEL_MESSAGE_WITH_SOURCE')]
    public static function deferredChannelMessageWithSource(): InteractionResponseType
    {
        return InteractionResponseType::DEFERRED_CHANNEL_MESSAGE_WITH_SOURCE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::DEFERRED_UPDATE_MESSAGE')]
    public static function deferredUpdateMessage(): InteractionResponseType
    {
        return InteractionResponseType::DEFERRED_UPDATE_MESSAGE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UPDATE_MESSAGE')]
    public static function updateMessage(): InteractionResponseType
    {
        return InteractionResponseType::UPDATE_MESSAGE;
    }

    /**
     * @return int
     */
    public function jsonSerialize(): int
    {
        return $this->value;
    }
}
