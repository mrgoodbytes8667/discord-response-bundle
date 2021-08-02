<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\InteractionType;
use Generator;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Phpunit\EnumAssertions;

/**
 *
 */
class InteractionTypeTest extends TestCase
{
    use EnumAssertions;

    /**
     * @dataProvider provideEnums
     * @param string $value
     * @param InteractionType $enum
     */
    public function testEnums(string $value, InteractionType $enum)
    {
        $this->assertTrue(InteractionType::isValid($value));
        $type = InteractionType::from($value);
        $this->assertSameEnum($enum, $type);
        $this->assertSameEnumLabel($enum, $type->label);
        $this->assertSameEnumValue($enum, $type->value);
        $this->assertNotEmpty(json_encode($type));
    }

    /**
     *
     */
    public function testInvalidEnums()
    {
        $this->assertFalse(InteractionType::isValid('abc'));
    }

    /**
     * @return Generator
     */
    public function provideEnums()
    {
        yield ['value' => 'ping', 'enum' => InteractionType::ping()];
        yield ['value' => 'applicationCommand', 'enum' => InteractionType::applicationCommand()];
        yield ['value' => 'messageComponent', 'enum' => InteractionType::messageComponent()];
    }
}