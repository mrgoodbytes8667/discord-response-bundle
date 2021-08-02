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
    use EnumAssertions;

    /**
     * @dataProvider provideEnums
     * @param string $value
     * @param ComponentType $enum
     */
    public function testEnums(string $value, ComponentType $enum)
    {
        $this->assertTrue(ComponentType::isValid($value));
        $type = ComponentType::from($value);
        $this->assertSameEnum($enum, $type);
        $this->assertSameEnumLabel($enum, $type->label);
        $this->assertSameEnumValue($enum, $type->value);
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
        yield ['value' => 'actionRow', 'enum' => ComponentType::actionRow()];
        yield ['value' => 'button', 'enum' => ComponentType::button()];
        yield ['value' => 'selectMenu', 'enum' => ComponentType::selectMenu()];
    }
}