<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\ButtonStyle;
use Bytes\DiscordResponseBundle\Tests\EnumTestCase;

/**
 *
 */
class ButtonStyleTest extends EnumTestCase
{
    public static function getEnumClass(): string
    {
        return ButtonStyle::class;
    }
}
