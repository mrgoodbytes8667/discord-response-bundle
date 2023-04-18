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
    /**
     * @dataProvider provideEnums
     * @param string $value
     * @param ButtonStyle $enum
     */
    public function testEnums(string $value, ButtonStyle $enum)
    {
        $this->assertTrue(ButtonStyle::isValid($value));
        $type = ButtonStyle::from($value);
        EnumAssertions::assertSameEnum($enum, $type);
        EnumAssertions::assertSameEnumLabel($enum, $type->label);
        EnumAssertions::assertSameEnumValue($enum, $type->value);
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
        yield ['value' => 'primary', 'enum' => ButtonStyle::PRIMARY];
        yield ['value' => 'secondary', 'enum' => ButtonStyle::SECONDARY];
        yield ['value' => 'success', 'enum' => ButtonStyle::SUCCESS];
        yield ['value' => 'danger', 'enum' => ButtonStyle::DANGER];
        yield ['value' => 'link', 'enum' => ButtonStyle::LINK];
    }
}