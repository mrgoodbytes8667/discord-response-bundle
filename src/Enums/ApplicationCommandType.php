<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\IntBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\IntBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * @link https://discord.com/developers/docs/interactions/application-commands#application-command-object-application-command-types
 *
 * @version v0.11.0 As of 2021-09-13 Discord Documentation
 */
enum ApplicationCommandType: int implements IntBackedEnumInterface
{
    use IntBackedEnumTrait;

    /**
     * Slash commands; a text-based command that shows up when a user types /
     */
    case CHAT_INPUT = 1;

    /**
     * A UI-based command that shows up when you right click or tap on a user
     */
    case USER = 2;

    /**
     * A UI-based command that shows up when you right click or tap on a message
     */
    case MESSAGE = 3;

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CHAT_INPUT')]
    public static function chatInput(): ApplicationCommandType
    {
        return ApplicationCommandType::CHAT_INPUT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::USER')]
    public static function user(): ApplicationCommandType
    {
        return ApplicationCommandType::USER;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MESSAGE')]
    public static function message(): ApplicationCommandType
    {
        return ApplicationCommandType::MESSAGE;
    }

    /**
     * @return int
     */
    public function jsonSerialize(): int
    {
        return $this->value;
    }
}
