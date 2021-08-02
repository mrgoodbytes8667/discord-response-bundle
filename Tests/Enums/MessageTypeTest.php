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
    use EnumAssertions;

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
        $this->assertSameEnum($enum, $type);
        $this->assertSameEnumLabel($enum, $label);
        $this->assertSameEnumValue($enum, $value);

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
            return !(in_array($value, MessageType::toValues()) || in_array($value, MessageType::toLabels(), true));
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
        yield ['value' => 0, 'label' => 'DEFAULT', 'enum' => MessageType::default()];
        yield ['value' => 1, 'label' => 'RECIPIENT_ADD', 'enum' => MessageType::recipientAdd()];
        yield ['value' => 2, 'label' => 'RECIPIENT_REMOVE', 'enum' => MessageType::recipientRemove()];
        yield ['value' => 3, 'label' => 'CALL', 'enum' => MessageType::call()];
        yield ['value' => 4, 'label' => 'CHANNEL_NAME_CHANGE', 'enum' => MessageType::channelNameChange()];
        yield ['value' => 5, 'label' => 'CHANNEL_ICON_CHANGE', 'enum' => MessageType::channelIconChange()];
        yield ['value' => 6, 'label' => 'CHANNEL_PINNED_MESSAGE', 'enum' => MessageType::channelPinnedMessage()];
        yield ['value' => 7, 'label' => 'GUILD_MEMBER_JOIN', 'enum' => MessageType::guildMemberJoin()];
        yield ['value' => 8, 'label' => 'USER_PREMIUM_GUILD_SUBSCRIPTION', 'enum' => MessageType::userPremiumGuildSubscription()];
        yield ['value' => 9, 'label' => 'USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_1', 'enum' => MessageType::userPremiumGuildSubscriptionTier1()];
        yield ['value' => 10, 'label' => 'USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_2', 'enum' => MessageType::userPremiumGuildSubscriptionTier2()];
        yield ['value' => 11, 'label' => 'USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_3', 'enum' => MessageType::userPremiumGuildSubscriptionTier3()];
        yield ['value' => 12, 'label' => 'CHANNEL_FOLLOW_ADD', 'enum' => MessageType::channelFollowAdd()];
        yield ['value' => 14, 'label' => 'GUILD_DISCOVERY_DISQUALIFIED', 'enum' => MessageType::guildDiscoveryDisqualified()];
        yield ['value' => 15, 'label' => 'GUILD_DISCOVERY_REQUALIFIED', 'enum' => MessageType::guildDiscoveryRequalified()];
        yield ['value' => 19, 'label' => 'REPLY', 'enum' => MessageType::reply()];
        yield ['value' => 20, 'label' => 'APPLICATION_COMMAND', 'enum' => MessageType::applicationCommand()];
        yield ['value' => 21, 'label' => 'THREAD_STARTER_MESSAGE', 'enum' => MessageType::threadStarterMessage()];
        yield ['value' => 22, 'label' => 'GUILD_INVITE_REMINDER', 'enum' => MessageType::guildInviteReminder()];
    }
}
