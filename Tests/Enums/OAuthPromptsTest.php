<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandOptionType;
use Bytes\DiscordResponseBundle\Enums\OAuthPrompts;
use Generator;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Phpunit\EnumAssertions;

/**
 * Class OAuthPromptsTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 *
 * @covers \Bytes\DiscordResponseBundle\Enums\OAuthPrompts
 */
class OAuthPromptsTest extends TestCase
{
    /**
     * @dataProvider provideEnums
     * @param string $value
     * @param OAuthPrompts $enum
     */
    public function testEnums(string $value, OAuthPrompts $enum)
    {
        $this->assertTrue(OAuthPrompts::isValid($value));
        $type = OAuthPrompts::from($value);
        EnumAssertions::assertSameEnum($enum, $type);
        EnumAssertions::assertSameEnumLabel($enum, $type->label);
        EnumAssertions::assertSameEnumValue($enum, $type->value);
    }

    /**
     *
     */
    public function testInvalidEnums()
    {
        $this->assertFalse(ApplicationCommandOptionType::isValid('abc'));
    }

    /**
     * @return Generator
     */
    public function provideEnums()
    {
        yield ['value' => 'none', 'enum' => OAuthPrompts::NONE];
        yield ['value' => 'consent', 'enum' => OAuthPrompts::CONSENT];
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