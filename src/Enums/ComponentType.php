<?php

namespace Bytes\DiscordResponseBundle\Enums;

use Bytes\EnumSerializerBundle\Enums\Enum;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Component Types
 * @link https://discord.com/developers/docs/interactions/message-components#component-object-component-types
 *
 * @method static self actionRow() A container for other components
 * @method static self button() A button object
 * @method static self selectMenu() A select menu for picking from choices
 *
 * @version v0.9.8 As of 2021-08-02 Discord Documentation
 */
class ComponentType extends Enum
{
    /**
     * @return array{actionRow: int, button: int, selectMenu: int}
     */
    #[ArrayShape(['actionRow' => "int", 'button' => "int", 'selectMenu' => "int"])]
    protected static function values(): array
    {
        return [
            'actionRow' => 1,
            'button' => 2,
            'selectMenu' => 3,
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