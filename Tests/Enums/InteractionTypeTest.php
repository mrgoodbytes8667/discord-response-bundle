<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\InteractionType;
use Bytes\DiscordResponseBundle\Tests\EnumTestCase;

/**
 *
 */
class InteractionTypeTest extends EnumTestCase
{
    public static function getEnumClass(): string
    {
        return InteractionType::class;
    }
}
