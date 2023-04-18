<?php

namespace Bytes\DiscordResponseBundle\Enums;

use Bytes\EnumSerializerBundle\Enums\IntBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\IntBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * Button Style
 * @link https://discord.com/developers/docs/interactions/message-components#button-object-button-styles
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 */
enum ButtonStyle: int implements IntBackedEnumInterface
{
    use IntBackedEnumTrait;

    /**
     * blurple [requires custom_id]
     */
    case PRIMARY = 1;

    /**
     * grey [requires custom_id]
     */
    case SECONDARY = 2;

    /**
     * green [requires custom_id]
     */
    case SUCCESS = 3;

    /**
     * red [requires custom_id]
     */
    case DANGER = 4;

    /**
     * grey, navigates to a URL [requires url]
     */
    case LINK = 5;

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::PRIMARY')]
    public static function primary(): ButtonStyle
    {
        return ButtonStyle::PRIMARY;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::SECONDARY')]
    public static function secondary(): ButtonStyle
    {
        return ButtonStyle::SECONDARY;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::SUCCESS')]
    public static function success(): ButtonStyle
    {
        return ButtonStyle::SUCCESS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::DANGER')]
    public static function danger(): ButtonStyle
    {
        return ButtonStyle::DANGER;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::LINK')]
    public static function link(): ButtonStyle
    {
        return ButtonStyle::LINK;
    }

    /**
     * @return int
     */
    public function jsonSerialize(): int
    {
        return $this->value;
    }
}
