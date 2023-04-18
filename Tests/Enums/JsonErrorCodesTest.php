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
        yield ['value' => 'generalError', 'enum' => JsonErrorCodes::GENERAL_ERROR];
        yield ['value' => 'invalidOAuth2AccessTokenProvided', 'enum' => JsonErrorCodes::INVALID_OAUTH_2_ACCESS_TOKEN_PROVIDED];
        yield ['value' => 0, 'enum' => JsonErrorCodes::GENERAL_ERROR];
        yield ['value' => 50025, 'enum' => JsonErrorCodes::INVALID_OAUTH_2_ACCESS_TOKEN_PROVIDED];
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
        yield [JsonErrorCodes::UNKNOWN_EMOJI];
        yield [JsonErrorCodes::UNKNOWN_BAN];
    }

    /**
     * @return Generator
     */
    public function provideValidEnums()
    {
        yield [JsonErrorCodes::GENERAL_ERROR];
        yield [JsonErrorCodes::INVALID_OAUTH_2_ACCESS_TOKEN_PROVIDED];
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