<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use BackedEnum;
use Bytes\DiscordResponseBundle\Enums\OAuthPrompts;
use Bytes\DiscordResponseBundle\Tests\EnumTestCase;

/**
 * Class OAuthPromptsTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 *
 * @covers \Bytes\DiscordResponseBundle\Enums\OAuthPrompts
 */
class OAuthPromptsTest extends EnumTestCase
{
    /**
     * @return class-string<BackedEnum>
     */
    public static function getEnumClass(): string
    {
        return OAuthPrompts::class;
    }

    /**
     * @dataProvider provideEnums
     * @param string $value
     * @param OAuthPrompts $enum
     */
    public function testPrompt(string $value, OAuthPrompts $enum)
    {
        $this->assertEquals($value, $enum->prompt());
    }
}
