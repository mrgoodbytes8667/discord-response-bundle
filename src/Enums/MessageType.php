<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class MessageType
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @method static self default()
 * @method static self recipientAdd()
 * @method static self recipientRemove()
 * @method static self call()
 * @method static self channelNameChange()
 * @method static self channelIconChange()
 * @method static self channelPinnedMessage()
 * @method static self guildMemberJoin()
 * @method static self userPremiumGuildSubscription()
 * @method static self userPremiumGuildSubscriptionTier1()
 * @method static self userPremiumGuildSubscriptionTier2()
 * @method static self userPremiumGuildSubscriptionTier3()
 * @method static self channelFollowAdd()
 * @method static self guildDiscoveryDisqualified()
 * @method static self guildDiscoveryRequalified()
 * @method static self reply()
 * @method static self applicationCommand()
 * @method static self threadStarterMessage()
 * @method static self guildInviteReminder()
 *
 * @link https://discord.com/developers/docs/resources/channel#message-object-message-types
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 */
class MessageType extends Enum
{
    /**
     * @return int[]
     */
    protected static function values(): array
    {
        return [
            'default' => 0,
            'recipientAdd' => 1,
            'recipientRemove' => 2,
            'call' => 3,
            'channelNameChange' => 4,
            'channelIconChange' => 5,
            'channelPinnedMessage' => 6,
            'guildMemberJoin' => 7,
            'userPremiumGuildSubscription' => 8,
            'userPremiumGuildSubscriptionTier1' => 9,
            'userPremiumGuildSubscriptionTier2' => 10,
            'userPremiumGuildSubscriptionTier3' => 11,
            'channelFollowAdd' => 12,
            'guildDiscoveryDisqualified' => 14,
            'guildDiscoveryRequalified' => 15,
            'reply' => 19,
            'applicationCommand' => 20,
            'threadStarterMessage' => 21,
            'guildInviteReminder' => 22,
        ];
    }

    /**
     * @return string[]
     */
    protected static function labels()
    {
        return [
            'default' => 'DEFAULT',
            'recipientAdd' => 'RECIPIENT_ADD',
            'recipientRemove' => 'RECIPIENT_REMOVE',
            'call' => 'CALL',
            'channelNameChange' => 'CHANNEL_NAME_CHANGE',
            'channelIconChange' => 'CHANNEL_ICON_CHANGE',
            'channelPinnedMessage' => 'CHANNEL_PINNED_MESSAGE',
            'guildMemberJoin' => 'GUILD_MEMBER_JOIN',
            'userPremiumGuildSubscription' => 'USER_PREMIUM_GUILD_SUBSCRIPTION',
            'userPremiumGuildSubscriptionTier1' => 'USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_1',
            'userPremiumGuildSubscriptionTier2' => 'USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_2',
            'userPremiumGuildSubscriptionTier3' => 'USER_PREMIUM_GUILD_SUBSCRIPTION_TIER_3',
            'channelFollowAdd' => 'CHANNEL_FOLLOW_ADD',
            'guildDiscoveryDisqualified' => 'GUILD_DISCOVERY_DISQUALIFIED',
            'guildDiscoveryRequalified' => 'GUILD_DISCOVERY_REQUALIFIED',
            'reply' => 'REPLY',
            'applicationCommand' => 'APPLICATION_COMMAND',
            'threadStarterMessage' => 'THREAD_STARTER_MESSAGE',
            'guildInviteReminder' => 'GUILD_INVITE_REMINDER',
        ];
    }


    /**
     * @return int
     */
    public function jsonSerialize()
    {
        return $this->value;
    }
}