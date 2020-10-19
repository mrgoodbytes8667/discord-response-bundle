<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Illuminate\Support\Arr;

/**
 * Class Permissions
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @link https://discord.com/developers/docs/topics/permissions
 *
 * @todo Refactor to be spatie/enum
 */
class Permissions
{
    /**
     * Allows creation of instant invites
     */
    const CREATE_INSTANT_INVITE = 0x00000001;
    /**
     * Allows kicking members
     */
    const KICK_MEMBERS = 0x00000002;
    /**
     * Allows banning members
     */
    const BAN_MEMBERS = 0x00000004;
    /**
     * Allows all permissions and bypasses channel permission overwrites
     */
    const ADMINISTRATOR = 0x00000008;
    /**
     * Allows management and editing of channels
     */
    const MANAGE_CHANNELS = 0x00000010;
    /**
     * Allows management and editing of the guild
     */
    const MANAGE_GUILD = 0x00000020;
    /**
     * Allows for the addition of reactions to messages
     */
    const ADD_REACTIONS = 0x00000040;
    /**
     * Allows for viewing of audit logs
     */
    const VIEW_AUDIT_LOG = 0x00000080;
    /**
     * Allows for using priority speaker in a voice channel
     */
    const PRIORITY_SPEAKER = 0x00000100;
    /**
     * Allows the user to go live
     */
    const STREAM = 0x00000200;
    /**
     * Allows guild members to view a channel, which includes reading messages in text channels
     */
    const VIEW_CHANNEL = 0x00000400;
    /**
     * Allows for sending messages in a channel
     */
    const SEND_MESSAGES = 0x00000800;
    /**
     * Allows for sending of /tts messages
     */
    const SEND_TTS_MESSAGES = 0x00001000;
    /**
     * Allows for deletion of other users messages
     */
    const MANAGE_MESSAGES = 0x00002000;
    /**
     * Links sent by users with this permission will be auto-embedded
     */
    const EMBED_LINKS = 0x00004000;
    /**
     * Allows for uploading images and files
     */
    const ATTACH_FILES = 0x00008000;
    /**
     * Allows for reading of message history
     */
    const READ_MESSAGE_HISTORY = 0x00010000;
    /**
     * Allows for using the @everyone tag to notify all users in a channel, and the @here tag to notify all online users in a channel
     */
    const MENTION_EVERYONE = 0x00020000;
    /**
     * Allows the usage of custom emojis from other servers
     */
    const USE_EXTERNAL_EMOJIS = 0x00040000;
    /**
     * Allows for viewing guild insights
     */
    const VIEW_GUILD_INSIGHTS = 0x00080000;
    /**
     * Allows for joining of a voice channel
     */
    const CONNECT = 0x00100000;
    /**
     * Allows for speaking in a voice channel
     */
    const SPEAK = 0x00200000;
    /**
     * Allows for muting members in a voice channel
     */
    const MUTE_MEMBERS = 0x00400000;
    /**
     * Allows for deafening of members in a voice channel
     */
    const DEAFEN_MEMBERS = 0x00800000;
    /**
     * Allows for moving of members between voice channels
     */
    const MOVE_MEMBERS = 0x01000000;
    /**
     * Allows for using voice-activity-detection in a voice channel
     */
    const USE_VAD = 0x02000000;
    /**
     * Allows for modification of own nickname
     */
    const CHANGE_NICKNAME = 0x04000000;
    /**
     * Allows for modification of other users nicknames
     */
    const MANAGE_NICKNAMES = 0x08000000;
    /**
     * Allows management and editing of roles
     */
    const MANAGE_ROLES = 0x10000000;
    /**
     * Allows management and editing of webhooks
     */
    const MANAGE_WEBHOOKS = 0x20000000;
    /**
     * Allows management and editing of emojis
     */
    const MANAGE_EMOJIS = 0x40000000;

    /**
     * @return int[]
     */
    public static function all()
    {
        return [
            static::CREATE_INSTANT_INVITE,
            static::KICK_MEMBERS,
            static::BAN_MEMBERS,
            static::ADMINISTRATOR,
            static::MANAGE_CHANNELS,
            static::MANAGE_GUILD,
            static::ADD_REACTIONS,
            static::VIEW_AUDIT_LOG,
            static::PRIORITY_SPEAKER,
            static::STREAM,
            static::VIEW_CHANNEL,
            static::SEND_MESSAGES,
            static::SEND_TTS_MESSAGES,
            static::MANAGE_MESSAGES,
            static::EMBED_LINKS,
            static::ATTACH_FILES,
            static::READ_MESSAGE_HISTORY,
            static::MENTION_EVERYONE,
            static::USE_EXTERNAL_EMOJIS,
            static::VIEW_GUILD_INSIGHTS,
            static::CONNECT,
            static::SPEAK,
            static::MUTE_MEMBERS,
            static::DEAFEN_MEMBERS,
            static::MOVE_MEMBERS,
            static::USE_VAD,
            static::CHANGE_NICKNAME,
            static::MANAGE_NICKNAMES,
            static::MANAGE_ROLES,
            static::MANAGE_WEBHOOKS,
            static::MANAGE_EMOJIS,

        ];
    }

    /**
     * @return string[]
     */
    public static function allNames()
    {
        $return[0x1] = 'CREATE_INSTANT_INVITE';
        $return[0x2] = 'KICK_MEMBERS';
        $return[0x4] = 'BAN_MEMBERS';
        $return[0x8] = 'ADMINISTRATOR';
        $return[0x10] = 'MANAGE_CHANNELS';
        $return[0x20] = 'MANAGE_GUILD';
        $return[0x40] = 'ADD_REACTIONS';
        $return[0x80] = 'VIEW_AUDIT_LOG';
        $return[0x100] = 'PRIORITY_SPEAKER';
        $return[0x200] = 'STREAM';
        $return[0x400] = 'VIEW_CHANNEL';
        $return[0x800] = 'SEND_MESSAGES';
        $return[0x1000] = 'SEND_TTS_MESSAGES';
        $return[0x2000] = 'MANAGE_MESSAGES';
        $return[0x4000] = 'EMBED_LINKS';
        $return[0x8000] = 'ATTACH_FILES';
        $return[0x10000] = 'READ_MESSAGE_HISTORY';
        $return[0x20000] = 'MENTION_EVERYONE';
        $return[0x40000] = 'USE_EXTERNAL_EMOJIS';
        $return[0x80000] = 'VIEW_GUILD_INSIGHTS';
        $return[0x100000] = 'CONNECT';
        $return[0x200000] = 'SPEAK';
        $return[0x400000] = 'MUTE_MEMBERS';
        $return[0x800000] = 'DEAFEN_MEMBERS';
        $return[0x1000000] = 'MOVE_MEMBERS';
        $return[0x2000000] = 'USE_VAD';
        $return[0x4000000] = 'CHANGE_NICKNAME';
        $return[0x8000000] = 'MANAGE_NICKNAMES';
        $return[0x10000000] = 'MANAGE_ROLES';
        $return[0x20000000] = 'MANAGE_WEBHOOKS';
        $return[0x40000000] = 'MANAGE_EMOJIS';

        return $return;
    }

    /**
     * @param int $flag
     * @return mixed
     */
    public static function getName($flag)
    {
        return static::allNames()[$flag];
    }

    /**
     * Determines if the $permission is present in the $permissions int.
     * @param int $flags The integer representation of permissions
     * @param int $permission The permission to look for.
     *
     * @return bool
     */
    public static function hasFlag(int $flags, int $permission)
    {
        return (($flags & $permission) == $permission);
    }

    /**
     * Creates an integer representation of permissions using bitwise math.
     * @param int ...$value
     *
     * @return int
     */
    public static function getFlags(...$value)
    {
        $return = 0;
        $value = Arr::flatten($value);
        foreach ($value as $i) {
            $return |= $i;
        }
        return $return;
    }

    /**
     * @param int $flags
     * @return string[]
     */
    public static function getPermissions(int $flags)
    {
        $return = [];
        foreach (static::allNames() as $index => $value) {
            if(static::hasFlag($flags, $index))
            {
                $return[] = $value;
            }
        }

        return $return;
    }

}