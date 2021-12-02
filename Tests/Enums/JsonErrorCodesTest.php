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
    use NullProviderTrait;

    /**
     * @dataProvider provideEnums
     * @param string $value
     * @param JsonErrorCodes $enum
     */
    public function testEnums($value, JsonErrorCodes $enum)
    {
        $this->assertTrue(JsonErrorCodes::isValid($value));
        $type = JsonErrorCodes::from($value);
        EnumAssertions::assertSameEnum($enum, $type);
        EnumAssertions::assertSameEnumLabel($enum, $type->label);
        EnumAssertions::assertSameEnumValue($enum, $type->value);
    }

    /**
     * @return Generator
     */
    public function provideEnums()
    {
        yield ['value' => 'generalError', 'enum' => JsonErrorCodes::generalError()];
        yield ['value' => 'invalidOAuth2AccessTokenProvided', 'enum' => JsonErrorCodes::invalidOAuth2AccessTokenProvided()];
        yield ['value' => 0, 'enum' => JsonErrorCodes::generalError()];
        yield ['value' => 50025, 'enum' => JsonErrorCodes::invalidOAuth2AccessTokenProvided()];
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
    public function provideValidEnums()
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
     * @dataProvider provideValidEnums
     * @dataProvider provideNull
     * @param JsonErrorCodes|null $enum
     */
    public function testIsUnknownFalse(?JsonErrorCodes $enum)
    {
        $this->assertFalse(JsonErrorCodes::isUnknownCodeType($enum));
    }
}