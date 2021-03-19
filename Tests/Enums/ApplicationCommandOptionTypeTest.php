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
    use EnumAssertions;

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
        $type = ApplicationCommandOptionType::make($value);
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
    }
}
