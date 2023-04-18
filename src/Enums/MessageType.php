<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\IntBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\IntBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class MessageType
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @link https://discord.com/developers/docs/resources/channel#message-object-message-types
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 */
enum MessageType: int implements IntBackedEnumInterface
{
    use IntBackedEnumTrait;

    case DEFAULT = 0;

    case RECIPIENT_ADD = 1;

    case RECIPIENT_REMOVE = 2;

    case CALL = 3;

    case CHANNEL_NAME_CHANGE = 4;

    case CHANNEL_ICON_CHANGE = 5;

    case CHANNEL_PINNED_MESSAGE = 6;

    case GUILD_MEMBER_JOIN = 7;

    case USER_PREMIUM_GUILD_SUBSCRIPTION = 8;

    case USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_1 = 9;

    case USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_2 = 10;

    case USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_3 = 11;

    case CHANNEL_FOLLOW_ADD = 12;

    case GUILD_DISCOVERY_DISQUALIFIED = 14;

    case GUILD_DISCOVERY_REQUALIFIED = 15;

    case REPLY = 19;

    case APPLICATION_COMMAND = 20;

    case THREAD_STARTER_MESSAGE = 21;

    case GUILD_INVITE_REMINDER = 22;

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::DEFAULT')]
    public static function default(): MessageType
    {
        return MessageType::DEFAULT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::RECIPIENT_ADD')]
    public static function recipientAdd(): MessageType
    {
        return MessageType::RECIPIENT_ADD;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::RECIPIENT_REMOVE')]
    public static function recipientRemove(): MessageType
    {
        return MessageType::RECIPIENT_REMOVE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CALL')]
    public static function call(): MessageType
    {
        return MessageType::CALL;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CHANNEL_NAME_CHANGE')]
    public static function channelNameChange(): MessageType
    {
        return MessageType::CHANNEL_NAME_CHANGE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CHANNEL_ICON_CHANGE')]
    public static function channelIconChange(): MessageType
    {
        return MessageType::CHANNEL_ICON_CHANGE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CHANNEL_PINNED_MESSAGE')]
    public static function channelPinnedMessage(): MessageType
    {
        return MessageType::CHANNEL_PINNED_MESSAGE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::GUILD_MEMBER_JOIN')]
    public static function guildMemberJoin(): MessageType
    {
        return MessageType::GUILD_MEMBER_JOIN;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::USER_PREMIUM_GUILD_SUBSCRIPTION')]
    public static function userPremiumGuildSubscription(): MessageType
    {
        return MessageType::USER_PREMIUM_GUILD_SUBSCRIPTION;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_1')]
    public static function userPremiumGuildSubscriptionTier1(): MessageType
    {
        return MessageType::USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_1;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_2')]
    public static function userPremiumGuildSubscriptionTier2(): MessageType
    {
        return MessageType::USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_2;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_3')]
    public static function userPremiumGuildSubscriptionTier3(): MessageType
    {
        return MessageType::USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_3;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CHANNEL_FOLLOW_ADD')]
    public static function channelFollowAdd(): MessageType
    {
        return MessageType::CHANNEL_FOLLOW_ADD;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::GUILD_DISCOVERY_DISQUALIFIED')]
    public static function guildDiscoveryDisqualified(): MessageType
    {
        return MessageType::GUILD_DISCOVERY_DISQUALIFIED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::GUILD_DISCOVERY_REQUALIFIED')]
    public static function guildDiscoveryRequalified(): MessageType
    {
        return MessageType::GUILD_DISCOVERY_REQUALIFIED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::REPLY')]
    public static function reply(): MessageType
    {
        return MessageType::REPLY;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::APPLICATION_COMMAND')]
    public static function applicationCommand(): MessageType
    {
        return MessageType::APPLICATION_COMMAND;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::THREAD_STARTER_MESSAGE')]
    public static function threadStarterMessage(): MessageType
    {
        return MessageType::THREAD_STARTER_MESSAGE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::GUILD_INVITE_REMINDER')]
    public static function guildInviteReminder(): MessageType
    {
        return MessageType::GUILD_INVITE_REMINDER;
    }

    /**
     * @return int
     */
    public function jsonSerialize(): int
    {
        return $this->value;
    }
}
