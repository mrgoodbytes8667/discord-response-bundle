<?php

namespace Bytes\DiscordResponseBundle\Enums;

use Bytes\EnumSerializerBundle\Enums\IntBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\IntBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * Component Types
 * @link https://discord.com/developers/docs/interactions/message-components#component-object-component-types
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 */
enum ComponentType: int implements IntBackedEnumInterface
{
    use IntBackedEnumTrait;

    /**
     * A container for other components
     */
    case ACTION_ROW = 1;

    /**
     * A button object
     */
    case BUTTON = 2;

    /**
     * A select menu for picking from choices
     */
    case SELECT_MENU = 3;

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::ACTION_ROW')]
    public static function actionRow(): ComponentType
    {
        return ComponentType::ACTION_ROW;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::BUTTON')]
    public static function button(): ComponentType
    {
        return ComponentType::BUTTON;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::SELECT_MENU')]
    public static function selectMenu(): ComponentType
    {
        return ComponentType::SELECT_MENU;
    }

    /**
     * @return int
     */
    public function jsonSerialize(): int
    {
        return $this->value;
    }
}
