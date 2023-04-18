<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\MessageType;
use Bytes\DiscordResponseBundle\Tests\EnumTestCase;

/**
 * Class MessageTypeTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 */
class MessageTypeTest extends EnumTestCase
{
    public static function getEnumClass(): string
    {
        return MessageType::class;
    }
}
