<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\ButtonStyle;
use Generator;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Phpunit\EnumAssertions;

/**
 *
 */
class ButtonStyleTest extends TestCase
{
    use EnumAssertions;

    /**
     * @dataProvider provideEnums
     * @param string $value
     * @param ButtonStyle $enum
     */
    public function testEnums(string $value, ButtonStyle $enum)
    {
        $this->assertTrue(ButtonStyle::isValid($value));
        $type = ButtonStyle::from($value);
        $this->assertSameEnum($enum, $type);
        $this->assertSameEnumLabel($enum, $type->label);
        $this->assertSameEnumValue($enum, $type->value);
    }

    /**
     *
     */
    public function testInvalidEnums()
    {
        $this->assertFalse(ButtonStyle::isValid('abc'));
    }

    /**
     * @return Generator
     */
    public function provideEnums()
    {
        yield ['value' => 'primary', 'enum' => ButtonStyle::primary()];
        yield ['value' => 'secondary', 'enum' => ButtonStyle::secondary()];
        yield ['value' => 'success', 'enum' => ButtonStyle::success()];
        yield ['value' => 'danger', 'enum' => ButtonStyle::danger()];
        yield ['value' => 'link', 'enum' => ButtonStyle::link()];
    }
}