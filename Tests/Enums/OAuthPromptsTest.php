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
    use EnumAssertions;

    /**
     * @dataProvider provideEnums
     * @param string $value
     * @param OAuthPrompts $enum
     */
    public function testEnums(string $value, OAuthPrompts $enum)
    {
        $this->assertTrue(OAuthPrompts::isValid($value));
        $type = OAuthPrompts::from($value);
        $this->assertSameEnum($enum, $type);
        $this->assertSameEnumLabel($enum, $type->label);
        $this->assertSameEnumValue($enum, $type->value);
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
        yield ['value' => 'none', 'enum' => OAuthPrompts::none()];
        yield ['value' => 'consent', 'enum' => OAuthPrompts::consent()];
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