<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\MessageType;
use Faker\Factory;
use Generator;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Phpunit\EnumAssertions;

/**
 * Class MessageTypeTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 */
class MessageTypeTest extends TestCase
{
    /**
     * @dataProvider provideEnums
     * @param string $value
     * @param $label
     * @param MessageType $enum
     */
    public function testEnums($value, $label, MessageType $enum)
    {
        $this->assertTrue(MessageType::isValid($value));
        $type = MessageType::from($value);
        EnumAssertions::assertSameEnum($enum, $type);
        EnumAssertions::assertSameEnumLabel($enum, $label);
        EnumAssertions::assertSameEnumValue($enum, $value);

        $this->assertEquals($label, $enum->label);
        $this->assertEquals($value, $enum->value);
    }

    /**
     * @requires PHP >= 8.0
     */
    public function testInvalidEnums()
    {
        $faker = Factory::create();

        $this->assertFalse(MessageType::isValid($faker->valid(function ($value) {
            return !(in_array($value, MessageType::cases()) || in_array($value, MessageType::cases(), true));
        })->word()));
    }

    /**
     *
     */
    public function testInvalidEnumsStaticString()
    {
        $this->assertFalse(MessageType::isValid('abc'));
    }

    /**
     * @return Generator
     */
    public function provideEnums()
    {
        yield ['value' => 0, 'label' => 'DEFAULT', 'enum' => MessageType::DEFAULT];
        yield ['value' => 1, 'label' => 'RECIPIENT_ADD', 'enum' => MessageType::RECIPIENT_ADD];
        yield ['value' => 2, 'label' => 'RECIPIENT_REMOVE', 'enum' => MessageType::RECIPIENT_REMOVE];
        yield ['value' => 3, 'label' => 'CALL', 'enum' => MessageType::CALL];
        yield ['value' => 4, 'label' => 'CHANNEL_NAME_CHANGE', 'enum' => MessageType::CHANNEL_NAME_CHANGE];
        yield ['value' => 5, 'label' => 'CHANNEL_ICON_CHANGE', 'enum' => MessageType::CHANNEL_ICON_CHANGE];
        yield ['value' => 6, 'label' => 'CHANNEL_PINNED_MESSAGE', 'enum' => MessageType::CHANNEL_PINNED_MESSAGE];
        yield ['value' => 7, 'label' => 'GUILD_MEMBER_JOIN', 'enum' => MessageType::GUILD_MEMBER_JOIN];
        yield ['value' => 8, 'label' => 'USER_PREMIUM_GUILD_SUBSCRIPTION', 'enum' => MessageType::USER_PREMIUM_GUILD_SUBSCRIPTION];
        yield ['value' => 9, 'label' => 'USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_1', 'enum' => MessageType::USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_1];
        yield ['value' => 10, 'label' => 'USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_2', 'enum' => MessageType::USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_2];
        yield ['value' => 11, 'label' => 'USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_3', 'enum' => MessageType::USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_3];
        yield ['value' => 12, 'label' => 'CHANNEL_FOLLOW_ADD', 'enum' => MessageType::CHANNEL_FOLLOW_ADD];
        yield ['value' => 14, 'label' => 'GUILD_DISCOVERY_DISQUALIFIED', 'enum' => MessageType::GUILD_DISCOVERY_DISQUALIFIED];
        yield ['value' => 15, 'label' => 'GUILD_DISCOVERY_REQUALIFIED', 'enum' => MessageType::GUILD_DISCOVERY_REQUALIFIED];
        yield ['value' => 19, 'label' => 'REPLY', 'enum' => MessageType::REPLY];
        yield ['value' => 20, 'label' => 'APPLICATION_COMMAND', 'enum' => MessageType::APPLICATION_COMMAND];
        yield ['value' => 21, 'label' => 'THREAD_STARTER_MESSAGE', 'enum' => MessageType::THREAD_STARTER_MESSAGE];
        yield ['value' => 22, 'label' => 'GUILD_INVITE_REMINDER', 'enum' => MessageType::GUILD_INVITE_REMINDER];
    }
}
