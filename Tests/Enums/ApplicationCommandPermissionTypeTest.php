<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandPermissionType;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Phpunit\EnumAssertions;

/**
 * Class ApplicationCommandPermissionTypeTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 *
 * @covers \Bytes\DiscordResponseBundle\Enums\ApplicationCommandPermissionType
 */
class ApplicationCommandPermissionTypeTest extends TestCase
{
    /**
     * @dataProvider provideEnums
     * @param int $value
     * @param ApplicationCommandPermissionType $enum
     */
    public function testJsonSerialize(int $value, ApplicationCommandPermissionType $enum)
    {
        $output = json_encode($enum);
        $this->assertIsString($output);
        $this->assertEquals($enum->value, $output);
    }

    /**
     * @dataProvider provideEnums
     * @param int $value
     * @param ApplicationCommandPermissionType $enum
     */
    public function testEnums(int $value, ApplicationCommandPermissionType $enum)
    {
        $this->assertTrue(ApplicationCommandPermissionType::isValid($value));
        $type = ApplicationCommandPermissionType::from($value);
        static::assertEquals($enum, $type);
    }

    /**
     *
     */
    public function testInvalidEnums()
    {
        $this->assertFalse(ApplicationCommandPermissionType::isValid('abc'));
    }

    /**
     * @return \Generator
     */
    public function provideEnums()
    {
        yield ['value' => 1, 'enum' => ApplicationCommandPermissionType::ROLE];
        yield ['value' => 2, 'enum' => ApplicationCommandPermissionType::USER];
    }
}
