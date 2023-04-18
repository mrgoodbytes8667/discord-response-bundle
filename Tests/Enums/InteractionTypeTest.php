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
    /**
     * @dataProvider provideEnums
     * @param string $value
     * @param InteractionType $enum
     */
    public function testEnums(string $value, InteractionType $enum)
    {
        $this->assertTrue(InteractionType::isValid($value));
        $type = InteractionType::from($value);
        EnumAssertions::assertSameEnum($enum, $type);
        EnumAssertions::assertSameEnumLabel($enum, $type->label);
        EnumAssertions::assertSameEnumValue($enum, $type->value);
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
        yield ['value' => 'ping', 'enum' => InteractionType::PING];
        yield ['value' => 'applicationCommand', 'enum' => InteractionType::APPLICATION_COMMAND];
        yield ['value' => 'messageComponent', 'enum' => InteractionType::MESSAGE_COMPONENT];
    }
}