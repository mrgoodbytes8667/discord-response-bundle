<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\IntBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\IntBackedEnumTrait;
use Illuminate\Support\Arr;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class Permissions
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @link https://discord.com/developers/docs/topics/permissions
 *
 * @version v0.9.1 As of 2021-07-12 Discord Documentation
 */
enum Permissions: int implements IntBackedEnumInterface
{
    use IntBackedEnumTrait;

    /**
     * Allows creation of instant invites
     */
    case CREATE_INSTANT_INVITE = 0x00000001;

    /**
     * Allows kicking members
     */
    case KICK_MEMBERS = 0x00000002;

    /**
     * Allows banning members
     */
    case BAN_MEMBERS = 0x00000004;

    /**
     * Allows all permissions and bypasses channel permission overwrites
     */
    case ADMINISTRATOR = 0x00000008;

    /**
     * Allows management and editing of channels
     */
    case MANAGE_CHANNELS = 0x00000010;

    /**
     * Allows management and editing of the guild
     */
    case MANAGE_GUILD = 0x00000020;

    /**
     * Allows for the addition of reactions to messages
     */
    case ADD_REACTIONS = 0x00000040;

    /**
     * Allows for viewing of audit logs
     */
    case VIEW_AUDIT_LOG = 0x00000080;

    /**
     * Allows for using priority speaker in a voice channel
     */
    case PRIORITY_SPEAKER = 0x00000100;

    /**
     * Allows the user to go live
     */
    case STREAM = 0x00000200;

    /**
     * Allows guild members to view a channel, which includes reading messages in text channels
     */
    case VIEW_CHANNEL = 0x00000400;

    /**
     * Allows for sending messages in a channel
     */
    case SEND_MESSAGES = 0x00000800;

    /**
     * Allows for sending of /tts messages
     */
    case SEND_TTS_MESSAGES = 0x00001000;

    /**
     * Allows for deletion of other users messages
     */
    case MANAGE_MESSAGES = 0x00002000;

    /**
     * Links sent by users with this permission will be auto-embedded
     */
    case EMBED_LINKS = 0x00004000;

    /**
     * Allows for uploading images and files
     */
    case ATTACH_FILES = 0x00008000;

    /**
     * Allows for reading of message history
     */
    case READ_MESSAGE_HISTORY = 0x00010000;

    /**
     * Allows for using the @everyone tag to notify all users in a channel, and the @here tag to notify all online users in a channel
     */
    case MENTION_EVERYONE = 0x00020000;

    /**
     * Allows the usage of custom emojis from other servers
     */
    case USE_EXTERNAL_EMOJIS = 0x00040000;

    /**
     * Allows for viewing guild insights
     */
    case VIEW_GUILD_INSIGHTS = 0x00080000;

    /**
     * Allows for joining of a voice channel
     */
    case CONNECT = 0x00100000;

    /**
     * Allows for speaking in a voice channel
     */
    case SPEAK = 0x00200000;

    /**
     * Allows for muting members in a voice channel
     */
    case MUTE_MEMBERS = 0x00400000;

    /**
     * Allows for deafening of members in a voice channel
     */
    case DEAFEN_MEMBERS = 0x00800000;

    /**
     * Allows for moving of members between voice channels
     */
    case MOVE_MEMBERS = 0x01000000;

    /**
     * Allows for using voice-activity-detection in a voice channel
     */
    case USE_VAD = 0x02000000;

    /**
     * Allows for modification of own nickname
     */
    case CHANGE_NICKNAME = 0x04000000;

    /**
     * Allows for modification of other users nicknames
     */
    case MANAGE_NICKNAMES = 0x08000000;

    /**
     * Allows management and editing of roles
     */
    case MANAGE_ROLES = 0x10000000;

    /**
     * Allows management and editing of webhooks
     */
    case MANAGE_WEBHOOKS = 0x20000000;

    /**
     * Allows management and editing of emojis
     */
    case MANAGE_EMOJIS = 0x40000000;

    /**
     * Allows members to use slash commands in text channels
     */
    case USE_SLASH_COMMANDS = 0x0080000000;

    /**
     * Allows for requesting to speak in stage channels. (This permission is under active development and may be changed or removed.)
     */
    case REQUEST_TO_SPEAK = 0x0100000000;

    /**
     * Allows for deleting and archiving threads, and viewing all private threads
     */
    case MANAGE_THREADS = 0x0400000000;

    /**
     * Allows for creating and participating in threads
     */
    case USE_PUBLIC_THREADS = 0x0800000000;

    /**
     * Allows for creating and participating in private thread
     */
    case USE_PRIVATE_THREADS = 0x1000000000;

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CREATE_INSTANT_INVITE')]
    public static function CREATE_INSTANT_INVITE(): Permissions
    {
        return Permissions::CREATE_INSTANT_INVITE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::KICK_MEMBERS')]
    public static function KICK_MEMBERS(): Permissions
    {
        return Permissions::KICK_MEMBERS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::BAN_MEMBERS')]
    public static function BAN_MEMBERS(): Permissions
    {
        return Permissions::BAN_MEMBERS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::ADMINISTRATOR')]
    public static function ADMINISTRATOR(): Permissions
    {
        return Permissions::ADMINISTRATOR;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MANAGE_CHANNELS')]
    public static function MANAGE_CHANNELS(): Permissions
    {
        return Permissions::MANAGE_CHANNELS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MANAGE_GUILD')]
    public static function MANAGE_GUILD(): Permissions
    {
        return Permissions::MANAGE_GUILD;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::ADD_REACTIONS')]
    public static function ADD_REACTIONS(): Permissions
    {
        return Permissions::ADD_REACTIONS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::VIEW_AUDIT_LOG')]
    public static function VIEW_AUDIT_LOG(): Permissions
    {
        return Permissions::VIEW_AUDIT_LOG;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::PRIORITY_SPEAKER')]
    public static function PRIORITY_SPEAKER(): Permissions
    {
        return Permissions::PRIORITY_SPEAKER;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::STREAM')]
    public static function STREAM(): Permissions
    {
        return Permissions::STREAM;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::VIEW_CHANNEL')]
    public static function VIEW_CHANNEL(): Permissions
    {
        return Permissions::VIEW_CHANNEL;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::SEND_MESSAGES')]
    public static function SEND_MESSAGES(): Permissions
    {
        return Permissions::SEND_MESSAGES;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::SEND_TTS_MESSAGES')]
    public static function SEND_TTS_MESSAGES(): Permissions
    {
        return Permissions::SEND_TTS_MESSAGES;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MANAGE_MESSAGES')]
    public static function MANAGE_MESSAGES(): Permissions
    {
        return Permissions::MANAGE_MESSAGES;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::EMBED_LINKS')]
    public static function EMBED_LINKS(): Permissions
    {
        return Permissions::EMBED_LINKS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::ATTACH_FILES')]
    public static function ATTACH_FILES(): Permissions
    {
        return Permissions::ATTACH_FILES;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::READ_MESSAGE_HISTORY')]
    public static function READ_MESSAGE_HISTORY(): Permissions
    {
        return Permissions::READ_MESSAGE_HISTORY;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MENTION_EVERYONE')]
    public static function MENTION_EVERYONE(): Permissions
    {
        return Permissions::MENTION_EVERYONE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::USE_EXTERNAL_EMOJIS')]
    public static function USE_EXTERNAL_EMOJIS(): Permissions
    {
        return Permissions::USE_EXTERNAL_EMOJIS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::VIEW_GUILD_INSIGHTS')]
    public static function VIEW_GUILD_INSIGHTS(): Permissions
    {
        return Permissions::VIEW_GUILD_INSIGHTS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CONNECT')]
    public static function CONNECT(): Permissions
    {
        return Permissions::CONNECT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::SPEAK')]
    public static function SPEAK(): Permissions
    {
        return Permissions::SPEAK;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MUTE_MEMBERS')]
    public static function MUTE_MEMBERS(): Permissions
    {
        return Permissions::MUTE_MEMBERS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::DEAFEN_MEMBERS')]
    public static function DEAFEN_MEMBERS(): Permissions
    {
        return Permissions::DEAFEN_MEMBERS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MOVE_MEMBERS')]
    public static function MOVE_MEMBERS(): Permissions
    {
        return Permissions::MOVE_MEMBERS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::USE_VAD')]
    public static function USE_VAD(): Permissions
    {
        return Permissions::USE_VAD;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CHANGE_NICKNAME')]
    public static function CHANGE_NICKNAME(): Permissions
    {
        return Permissions::CHANGE_NICKNAME;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MANAGE_NICKNAMES')]
    public static function MANAGE_NICKNAMES(): Permissions
    {
        return Permissions::MANAGE_NICKNAMES;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MANAGE_ROLES')]
    public static function MANAGE_ROLES(): Permissions
    {
        return Permissions::MANAGE_ROLES;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MANAGE_WEBHOOKS')]
    public static function MANAGE_WEBHOOKS(): Permissions
    {
        return Permissions::MANAGE_WEBHOOKS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MANAGE_EMOJIS')]
    public static function MANAGE_EMOJIS(): Permissions
    {
        return Permissions::MANAGE_EMOJIS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::USE_SLASH_COMMANDS')]
    public static function USE_SLASH_COMMANDS(): Permissions
    {
        return Permissions::USE_SLASH_COMMANDS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::REQUEST_TO_SPEAK')]
    public static function REQUEST_TO_SPEAK(): Permissions
    {
        return Permissions::REQUEST_TO_SPEAK;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MANAGE_THREADS')]
    public static function MANAGE_THREADS(): Permissions
    {
        return Permissions::MANAGE_THREADS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::USE_PUBLIC_THREADS')]
    public static function USE_PUBLIC_THREADS(): Permissions
    {
        return Permissions::USE_PUBLIC_THREADS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::USE_PRIVATE_THREADS')]
    public static function USE_PRIVATE_THREADS(): Permissions
    {
        return Permissions::USE_PRIVATE_THREADS;
    }

    /**
     * @param $item
     * @param $key
     */
    public static function setValueToKey(&$item, $key)
    {
        $item = $key;
    }

    /**
     * Creates an integer representation of permissions using bitwise math.
     * @param static|int ...$value
     *
     * @return int
     */
    public static function getFlags(...$value)
    {
        $return = 0;
        $value = Arr::flatten($value);
        foreach ($value as $i) {
            $v = $i;
            if ($v instanceof static) {
                $v = $v->value;
            }

            $return |= $v;
        }

        return $return;
    }

    /**
     * @param int $flags
     * @param bool $asArrayOfEnums
     * @return static[]|string[]
     */
    public static function getPermissions(int $flags, bool $asArrayOfEnums = false): ?array
    {
        $return = [];
        foreach (static::values() as $index => $value) {
            if (static::hasFlag($flags, $value)) {
                if ($asArrayOfEnums) {
                    $return[] = static::from($index);
                } else {
                    $return[] = $index;
                }
            }
        }

        return $return;
    }

    /**
     * Determines if the $permission is present in the $permissions int.
     * @param int $flags The integer representation of permissions
     * @param Permissions|string|int $permission The permission to look for.
     *
     * @return bool
     */
    public static function hasFlag(int $flags, Permissions|string|int $permission)
    {
        if ($permission instanceof static) {
            $permission = $permission->value;
        }

        return (($flags & $permission) == $permission);
    }

    /**
     * @return int[]
     */
    protected static function labels(): array
    {
        $return = static::values();
        array_walk($return, array('self', 'setValueToKey'));
        return $return;
    }

}
