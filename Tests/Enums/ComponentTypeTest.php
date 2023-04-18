<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\ComponentType;
use Generator;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Phpunit\EnumAssertions;

/**
 *
 */
class ComponentTypeTest extends TestCase
{
    /**
     * @dataProvider provideEnums
     * @param string $value
     * @param ComponentType $enum
     */
    public function testEnums(string $value, ComponentType $enum)
    {
        $this->assertTrue(ComponentType::isValid($value));
        $type = ComponentType::from($value);
        EnumAssertions::assertSameEnum($enum, $type);
        EnumAssertions::assertSameEnumLabel($enum, $type->label);
        EnumAssertions::assertSameEnumValue($enum, $type->value);
    }

    /**
     *
     */
    public function testInvalidEnums()
    {
        $this->assertFalse(ComponentType::isValid('abc'));
    }

    /**
     * @return Generator
     */
    public function provideEnums()
    {
        yield ['value' => 'actionRow', 'enum' => ComponentType::ACTION_ROW];
        yield ['value' => 'button', 'enum' => ComponentType::BUTTON];
        yield ['value' => 'selectMenu', 'enum' => ComponentType::SELECT_MENU];
    }
}