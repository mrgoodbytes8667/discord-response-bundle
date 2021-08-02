<?php

namespace Bytes\DiscordResponseBundle\Enums;

use Bytes\EnumSerializerBundle\Enums\Enum;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Button Style
 * @link https://discord.com/developers/docs/interactions/message-components#button-object-button-styles
 *
 * @method static self primary() blurple [requires custom_id]
 * @method static self secondary() grey [requires custom_id]
 * @method static self success() green [requires custom_id]
 * @method static self danger() red [requires custom_id]
 * @method static self link() grey, navigates to a URL [requires url]
 *
 * @version v0.9.8 As of 2021-08-02 Discord Documentation
 */
class ButtonStyle extends Enum
{
    /**
     * @return int[]
     */
    #[ArrayShape(['primary' => "int", 'secondary' => "int", 'success' => "int", 'danger' => "int", 'link' => "int"])]
    protected static function values(): array
    {
        return [
            'primary' => 1,
            'secondary' => 2,
            'success' => 3,
            'danger' => 4,
            'link' => 5,
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