<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandOptionType;
use Bytes\DiscordResponseBundle\Enums\JsonErrorCodes;
use Bytes\Tests\Common\DataProvider\NullProviderTrait;
use Generator;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Phpunit\EnumAssertions;

/**
 * Class JsonErrorCodesTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 *
 * @covers \Bytes\DiscordResponseBundle\Enums\JsonErrorCodes
 */
class JsonErrorCodesTest extends TestCase
{
    use EnumAssertions, NullProviderTrait;

    /**
     * @dataProvider provideEnums
     * @param string $value
     * @param JsonErrorCodes $enum
     */
    public function testEnums(string $value, JsonErrorCodes $enum)
    {
        $this->assertTrue(JsonErrorCodes::isValid($value));
        $type = JsonErrorCodes::from($value);
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
     * @return Generator
     */
    public function provideUnknownEnums()
    {
        yield [JsonErrorCodes::unknownEmoji()];
        yield [JsonErrorCodes::unknownBan()];
    }

    /**
     * @return Generator
     */
    public function provideEnums()
    {
        yield [JsonErrorCodes::generalError()];
        yield [JsonErrorCodes::invalidOAuth2AccessTokenProvided()];
    }

    /**
     * @dataProvider provideUnknownEnums
     * @param JsonErrorCodes $enum
     */
    public function testIsUnknownTrue(JsonErrorCodes $enum)
    {
        $this->assertTrue(JsonErrorCodes::isUnknownCodeType($enum));
    }

    /**
     * @dataProvider provideEnums
     * @dataProvider provideNull
     * @param JsonErrorCodes|null $enum
     */
    public function testIsUnknownFalse(?JsonErrorCodes $enum)
    {
        $this->assertFalse(JsonErrorCodes::isUnknownCodeType($enum));
    }
}