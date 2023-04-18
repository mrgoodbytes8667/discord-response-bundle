<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\InteractionResponseType;
use Bytes\DiscordResponseBundle\Tests\EnumTestCase;

/**
 * Class InteractionResponseTypeTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 *
 * @covers \Bytes\DiscordResponseBundle\Enums\InteractionResponseType
 */
class InteractionResponseTypeTest extends EnumTestCase
{
    public static function getEnumClass(): string
    {
        return InteractionResponseType::class;
    }
}
