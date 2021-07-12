<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;
use Illuminate\Support\Arr;

/**
 * Class Permissions
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @link https://discord.com/developers/docs/topics/permissions
 *
 * @version v0.9.1 As of 2021-07-12 Discord Documentation
 *
 * @method static self CREATE_INSTANT_INVITE() Allows creation of instant invites
 * @method static self KICK_MEMBERS() Allows kicking members
 * @method static self BAN_MEMBERS() Allows banning members
 * @method static self ADMINISTRATOR() Allows all permissions and bypasses channel permission overwrites
 * @method static self MANAGE_CHANNELS() Allows management and editing of channels
 * @method static self MANAGE_GUILD() Allows management and editing of the guild
 * @method static self ADD_REACTIONS() Allows for the addition of reactions to messages
 * @method static self VIEW_AUDIT_LOG() Allows for viewing of audit logs
 * @method static self PRIORITY_SPEAKER() Allows for using priority speaker in a voice channel
 * @method static self STREAM() Allows the user to go live
 * @method static self VIEW_CHANNEL() Allows guild members to view a channel, which includes reading messages in text channels
 * @method static self SEND_MESSAGES() Allows for sending messages in a channel
 * @method static self SEND_TTS_MESSAGES() Allows for sending of /tts messages
 * @method static self MANAGE_MESSAGES() Allows for deletion of other users messages
 * @method static self EMBED_LINKS() Links sent by users with this permission will be auto-embedded
 * @method static self ATTACH_FILES() Allows for uploading images and files
 * @method static self READ_MESSAGE_HISTORY() Allows for reading of message history
 * @method static self MENTION_EVERYONE() Allows for using the @everyone tag to notify all users in a channel, and the @here tag to notify all online users in a channel
 * @method static self USE_EXTERNAL_EMOJIS() Allows the usage of custom emojis from other servers
 * @method static self VIEW_GUILD_INSIGHTS() Allows for viewing guild insights
 * @method static self CONNECT() Allows for joining of a voice channel
 * @method static self SPEAK() Allows for speaking in a voice channel
 * @method static self MUTE_MEMBERS() Allows for muting members in a voice channel
 * @method static self DEAFEN_MEMBERS() Allows for deafening of members in a voice channel
 * @method static self MOVE_MEMBERS() Allows for moving of members between voice channels
 * @method static self USE_VAD() Allows for using voice-activity-detection in a voice channel
 * @method static self CHANGE_NICKNAME() Allows for modification of own nickname
 * @method static self MANAGE_NICKNAMES() Allows for modification of other users nicknames
 * @method static self MANAGE_ROLES() Allows management and editing of roles
 * @method static self MANAGE_WEBHOOKS() Allows management and editing of webhooks
 * @method static self MANAGE_EMOJIS() Allows management and editing of emojis
 * @method static self USE_SLASH_COMMANDS() Allows members to use slash commands in text channels
 * @method static self REQUEST_TO_SPEAK() Allows for requesting to speak in stage channels. (This permission is under active development and may be changed or removed.)
 * @method static self MANAGE_THREADS() Allows for deleting and archiving threads, and viewing all private threads
 * @method static self USE_PUBLIC_THREADS() Allows for creating and participating in threads
 * @method static self USE_PRIVATE_THREADS() Allows for creating and participating in private threads
 *
 * @todo Refactor these to proper camel case functions
 *
 * @link https://github.com/spatie/enum
 */
class Permissions extends Enum
{

    /**
     * @return string[]
     * @deprecated Only included for backwards compatibility
     */
    public static function allNames()
    {
        return static::labels();
    }

    protected static function labels(): array
    {
        $return = static::values();
        array_walk($return, array('self', 'setValueToKey'));
        return $return;
    }

    /**
     * @return int[]
     */
    protected static function values(): array
    {
        return [
            'CREATE_INSTANT_INVITE' => 0x00000001,
            'KICK_MEMBERS' => 0x00000002,
            'BAN_MEMBERS' => 0x00000004,
            'ADMINISTRATOR' => 0x00000008,
            'MANAGE_CHANNELS' => 0x00000010,
            'MANAGE_GUILD' => 0x00000020,
            'ADD_REACTIONS' => 0x00000040,
            'VIEW_AUDIT_LOG' => 0x00000080,
            'PRIORITY_SPEAKER' => 0x00000100,
            'STREAM' => 0x00000200,
            'VIEW_CHANNEL' => 0x00000400,
            'SEND_MESSAGES' => 0x00000800,
            'SEND_TTS_MESSAGES' => 0x00001000,
            'MANAGE_MESSAGES' => 0x00002000,
            'EMBED_LINKS' => 0x00004000,
            'ATTACH_FILES' => 0x00008000,
            'READ_MESSAGE_HISTORY' => 0x00010000,
            'MENTION_EVERYONE' => 0x00020000,
            'USE_EXTERNAL_EMOJIS' => 0x00040000,
            'VIEW_GUILD_INSIGHTS' => 0x00080000,
            'CONNECT' => 0x00100000,
            'SPEAK' => 0x00200000,
            'MUTE_MEMBERS' => 0x00400000,
            'DEAFEN_MEMBERS' => 0x00800000,
            'MOVE_MEMBERS' => 0x01000000,
            'USE_VAD' => 0x02000000,
            'CHANGE_NICKNAME' => 0x04000000,
            'MANAGE_NICKNAMES' => 0x08000000,
            'MANAGE_ROLES' => 0x10000000,
            'MANAGE_WEBHOOKS' => 0x20000000,
            'MANAGE_EMOJIS' => 0x40000000,
            'USE_SLASH_COMMANDS' => 0x0080000000,
            'REQUEST_TO_SPEAK' => 0x0100000000,
            'MANAGE_THREADS' => 0x0400000000,
            'USE_PUBLIC_THREADS' => 0x0800000000,
            'USE_PRIVATE_THREADS' => 0x1000000000,
        ];
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
     * @param static|int $item
     * @param $key
     */
    public static function convertStaticToValue(&$item, $key)
    {
        if ($item instanceof static) {
            $item = $item->value;
        }
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
     * @return string[]
     */
    public static function getPermissions(int $flags)
    {
        $return = [];
        foreach (static::labels() as $index => $value) {
            if (static::hasFlag($flags, $index)) {
                $return[] = $value;
            }
        }

        return $return;
    }

    /**
     * Determines if the $permission is present in the $permissions int.
     * @param int $flags The integer representation of permissions
     * @param static|int $permission The permission to look for.
     *
     * @return bool
     */
    public static function hasFlag(int $flags, $permission)
    {
        if ($permission instanceof static) {
            $permission = $permission->value;
        }
        return (($flags & $permission) == $permission);
    }

}