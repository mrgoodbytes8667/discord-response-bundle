<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\IntBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\IntBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class InteractionType
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#interaction-interactiontype
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 */
enum InteractionType: int implements IntBackedEnumInterface
{
    use IntBackedEnumTrait;

    case PING = 1;
    case APPLICATION_COMMAND = 2;
    case MESSAGE_COMPONENT = 3;

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::PING')]
    public static function ping(): InteractionType
    {
        return InteractionType::PING;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::APPLICATION_COMMAND')]
    public static function applicationCommand(): InteractionType
    {
        return InteractionType::APPLICATION_COMMAND;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MESSAGE_COMPONENT')]
    public static function messageComponent(): InteractionType
    {
        return InteractionType::MESSAGE_COMPONENT;
    }

    /**
     * @return int
     */
    public function jsonSerialize(): int
    {
        return $this->value;
    }
}
