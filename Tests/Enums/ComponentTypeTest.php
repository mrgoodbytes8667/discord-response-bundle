<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\ComponentType;
use Bytes\DiscordResponseBundle\Tests\EnumTestCase;

/**
 *
 */
class ComponentTypeTest extends EnumTestCase
{
    public static function getEnumClass(): string
    {
        return ComponentType::class;
    }
}
