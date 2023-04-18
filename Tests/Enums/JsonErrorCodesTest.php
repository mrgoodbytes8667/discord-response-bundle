<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use BackedEnum;
use Bytes\DiscordResponseBundle\Enums\ApplicationCommandOptionType;
use Bytes\DiscordResponseBundle\Enums\JsonErrorCodes;
use Bytes\DiscordResponseBundle\Tests\EnumTestCase;
use Bytes\Tests\Common\DataProvider\NullProviderTrait;
use Generator;

/**
 * Class JsonErrorCodesTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 *
 * @covers \Bytes\DiscordResponseBundle\Enums\JsonErrorCodes
 */
class JsonErrorCodesTest extends EnumTestCase
{
    use NullProviderTrait;

    /**
     * @return class-string<BackedEnum>
     */
    public static function getEnumClass(): string
    {
        return JsonErrorCodes::class;
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
