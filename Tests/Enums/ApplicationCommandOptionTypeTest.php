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
        yield ['value' => 1, 'enum' => ApplicationCommandOptionType::SUBCOMMAND];
        yield ['value' => 2, 'enum' => ApplicationCommandOptionType::SUB_COMMAND_GROUP];
        yield ['value' => 3, 'enum' => ApplicationCommandOptionType::STRING];
        yield ['value' => 4, 'enum' => ApplicationCommandOptionType::INTEGER];
        yield ['value' => 5, 'enum' => ApplicationCommandOptionType::BOOLEAN];
        yield ['value' => 6, 'enum' => ApplicationCommandOptionType::USER];
        yield ['value' => 7, 'enum' => ApplicationCommandOptionType::CHANNEL];
        yield ['value' => 8, 'enum' => ApplicationCommandOptionType::ROLE];
        yield ['value' => 9, 'enum' => ApplicationCommandOptionType::MENTIONABLE];
        yield ['value' => 10, 'enum' => ApplicationCommandOptionType::NUMBER];
    }
}
