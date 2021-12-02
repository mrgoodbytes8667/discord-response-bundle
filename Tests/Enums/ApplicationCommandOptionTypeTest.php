<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandOptionType;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Phpunit\EnumAssertions;

/**
 * Class ApplicationCommandOptionTypeTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 *
 * @covers \Bytes\DiscordResponseBundle\Enums\ApplicationCommandOptionType
 */
class ApplicationCommandOptionTypeTest extends TestCase
{
    /**
     * @dataProvider provideEnums
     * @param int $value
     * @param ApplicationCommandOptionType $enum
     */
    public function testJsonSerialize(int $value, ApplicationCommandOptionType $enum)
    {
        $output = json_encode($enum);
        $this->assertIsString($output);
        $this->assertEquals($enum->value, $output);
    }

    /**
     * @dataProvider provideEnums
     * @param int $value
     * @param ApplicationCommandOptionType $enum
     */
    public function testEnums(int $value, ApplicationCommandOptionType $enum)
    {
        $this->assertTrue(ApplicationCommandOptionType::isValid($value));
        $type = ApplicationCommandOptionType::from($value);
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
     * @return \Generator
     */
    public function provideEnums()
    {
        yield ['value' => 1, 'enum' => ApplicationCommandOptionType::subCommand()];
        yield ['value' => 2, 'enum' => ApplicationCommandOptionType::subCommandGroup()];
        yield ['value' => 3, 'enum' => ApplicationCommandOptionType::string()];
        yield ['value' => 4, 'enum' => ApplicationCommandOptionType::integer()];
        yield ['value' => 5, 'enum' => ApplicationCommandOptionType::boolean()];
        yield ['value' => 6, 'enum' => ApplicationCommandOptionType::user()];
        yield ['value' => 7, 'enum' => ApplicationCommandOptionType::channel()];
        yield ['value' => 8, 'enum' => ApplicationCommandOptionType::role()];
        yield ['value' => 9, 'enum' => ApplicationCommandOptionType::mentionable()];
        yield ['value' => 10, 'enum' => ApplicationCommandOptionType::number()];
    }
}
