<?php


namespace Bytes\DiscordResponseBundle\Tests;

use Generator;
use PHPUnit\Framework\TestCase;

abstract class EnumTestCase extends TestCase
{
    /**
     * @return class-string<\BackedEnum>
     */
    abstract public static function getEnumClass(): string;

    /**
     * @dataProvider provideEnums
     * @param $value
     * @param \BackedEnum $enum
     */
    public function testEnums($value, \BackedEnum $enum)
    {
        $this->assertTrue((static::getEnumClass())::isValid($value));
        $type = (static::getEnumClass())::from($value);
        static::assertEquals($enum, $type);
        static::assertInstanceOf(static::getEnumClass(), $type);
    }

    /**
     *
     */
    public function testInvalidEnums()
    {
        $this->assertFalse((static::getEnumClass())::isValid('abc'));
        $this->assertFalse((static::getEnumClass())::isValid(-999));
    }

    /**
     * @return Generator
     */
    public static function provideEnums(): Generator
    {
        foreach ((static::getEnumClass())::cases() as $enum) {
            yield $enum->value => ['value' => $enum->value, 'enum' => $enum];
        }
    }
}
