<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class JsonErrorCodes
 * JSON
 * Along with the HTTP error code, our API can also return more detailed error codes through a code key in the JSON error response. The response will also contain a message key containing a more friendly error string.
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @link https://discord.com/developers/docs/topics/opcodes-and-status-codes#json
 * @link https://github.com/spatie/enum
 *
 * @method static self GENERAL_ERROR() General error (such as a malformed request body, amongst other things)
 * @method static self UNKNOWN_ACCOUNT() Unknown account
 * @method static self UNKNOWN_APPLICATION() Unknown application
 * @method static self UNKNOWN_CHANNEL() Unknown channel
 * @method static self UNKNOWN_GUILD() Unknown guild
 * @method static self UNKNOWN_INTEGRATION() Unknown integration
 * @method static self UNKNOWN_INVITE() Unknown invite
 * @method static self UNKNOWN_MEMBER() Unknown member
 * @method static self UNKNOWN_MESSAGE() Unknown message
 * @method static self UNKNOWN_PERMISSION_OVERWRITE() Unknown permission overwrite
 * @method static self UNKNOWN_PROVIDER() Unknown provider
 * @method static self UNKNOWN_ROLE() Unknown role
 * @method static self UNKNOWN_TOKEN() Unknown token
 * @method static self UNKNOWN_USER() Unknown user
 * @method static self UNKNOWN_EMOJI() Unknown emoji
 * @method static self UNKNOWN_WEBHOOK() Unknown webhook
 * @method static self UNKNOWN_BAN() Unknown ban
 * @method static self UNKNOWN_SKU() Unknown SKU
 * @method static self UNKNOWN_STORE_LISTING() Unknown Store Listing
 * @method static self UNKNOWN_ENTITLEMENT() Unknown entitlement
 * @method static self UNKNOWN_BUILD() Unknown build
 * @method static self UNKNOWN_LOBBY() Unknown lobby
 * @method static self UNKNOWN_BRANCH() Unknown branch
 * @method static self UNKNOWN_REDISTRIBUTABLE() Unknown redistributable
 * @method static self BOTS_CANNOT_USE_THIS_ENDPOINT() Bots cannot use this endpoint
 * @method static self ONLY_BOTS_CAN_USE_THIS_ENDPOINT() Only bots can use this endpoint
 * @method static self MAXIMUM_NUMBER_OF_GUILDS_REACHED() Maximum number of guilds reached (100)
 * @method static self MAXIMUM_NUMBER_OF_FRIENDS_REACHED() Maximum number of friends reached (1000)
 * @method static self MAXIMUM_NUMBER_OF_PINS_REACHED_FOR_THE_CHANNEL() Maximum number of pins reached for the channel (50)
 * @method static self MAXIMUM_NUMBER_OF_GUILD_ROLES_REACHED() Maximum number of guild roles reached (250)
 * @method static self MAXIMUM_NUMBER_OF_WEBHOOKS_REACHED() Maximum number of webhooks reached (10)
 * @method static self MAXIMUM_NUMBER_OF_REACTIONS_REACHED() Maximum number of reactions reached (20)
 * @method static self MAXIMUM_NUMBER_OF_GUILD_CHANNELS_REACHED() Maximum number of guild channels reached (500)
 * @method static self MAXIMUM_NUMBER_OF_ATTACHMENTS_IN_A_MESSAGE_REACHED() Maximum number of attachments in a message reached (10)
 * @method static self MAXIMUM_NUMBER_OF_INVITES_REACHED() Maximum number of invites reached (1000)
 * @method static self UNAUTHORIZED() Unauthorized. Provide a valid token and try again
 * @method static self YOU_NEED_TO_VERIFY_YOUR_ACCOUNT_IN_ORDER_TO_PERFORM_THIS_ACTION() You need to verify your account in order to perform this action
 * @method static self REQUEST_ENTITY_TOO_LARGE() Request entity too large. Try sending something smaller in size
 * @method static self THIS_FEATURE_HAS_BEEN_TEMPORARILY_DISABLED_SERVER_SIDE() This feature has been temporarily disabled server-side
 * @method static self THE_USER_IS_BANNED_FROM_THIS_GUILD() The user is banned from this guild
 * @method static self MISSING_ACCESS() Missing access
 * @method static self INVALID_ACCOUNT_TYPE() Invalid account type
 * @method static self CANNOT_EXECUTE_ACTION_ON_A_DM_CHANNEL() Cannot execute action on a DM channel
 * @method static self GUILD_WIDGET_DISABLED() Guild widget disabled
 * @method static self CANNOT_EDIT_A_MESSAGE_AUTHORED_BY_ANOTHER_USER() Cannot edit a message authored by another user
 * @method static self CANNOT_SEND_AN_EMPTY_MESSAGE() Cannot send an empty message
 * @method static self CANNOT_SEND_MESSAGES_TO_THIS_USER() Cannot send messages to this user
 * @method static self CANNOT_SEND_MESSAGES_IN_A_VOICE_CHANNEL() Cannot send messages in a voice channel
 * @method static self CHANNEL_VERIFICATION_LEVEL_IS_TOO_HIGH_FOR_YOU_TO_GAIN_ACCESS() Channel verification level is too high for you to gain access
 * @method static self OAUTH2_APPLICATION_DOES_NOT_HAVE_A_BOT() OAuth2 application does not have a bot
 * @method static self OAUTH2_APPLICATION_LIMIT_REACHED() OAuth2 application limit reached
 * @method static self INVALID_OAUTH2_STATE() Invalid OAuth2 state
 * @method static self YOU_LACK_PERMISSIONS_TO_PERFORM_THAT_ACTION() You lack permissions to perform that action
 * @method static self INVALID_AUTHENTICATION_TOKEN_PROVIDED() Invalid authentication token provided
 * @method static self NOTE_WAS_TOO_LONG() Note was too long
 * @method static self PROVIDED_TOO_FEW_OR_TOO_MANY_MESSAGES_TO_DELETE() Provided too few or too many messages to delete. Must provide at least 2 and fewer than 100 messages to delete
 * @method static self A_MESSAGE_CAN_ONLY_BE_PINNED_TO_THE_CHANNEL_IT_WAS_SENT_IN() A message can only be pinned to the channel it was sent in
 * @method static self INVITE_CODE_WAS_EITHER_INVALID_OR_TAKEN() Invite code was either invalid or taken
 * @method static self CANNOT_EXECUTE_ACTION_ON_A_SYSTEM_MESSAGE() Cannot execute action on a system message
 * @method static self INVALID_OAUTH2_ACCESS_TOKEN_PROVIDED() Invalid OAuth2 access token provided
 * @method static self A_MESSAGE_PROVIDED_WAS_TOO_OLD_TO_BULK_DELETE() A message provided was too old to bulk delete
 * @method static self INVALID_FORM_BODY() Invalid form body (returned for both application/json and multipart/form-data bodies), or invalid Content-Type provided
 * @method static self AN_INVITE_WAS_ACCEPTED_TO_A_GUILD_THE_APPLICATIONS_BOT_IS_NOT_IN() An invite was accepted to a guild the application's bot is not in
 * @method static self INVALID_API_VERSION_PROVIDED() Invalid API version provided
 * @method static self REACTION_WAS_BLOCKED() Reaction was blocked
 * @method static self API_RESOURCE_IS_CURRENTLY_OVERLOADED() API resource is currently overloaded. Try again a little later
 *
 * @todo Refactor these to proper camel case functions
 */
class JsonErrorCodes extends Enum
{
    /**
     * @return int[]
     */
    protected static function values(): array
    {
        return [
            'GENERAL_ERROR' => 0,
            'UNKNOWN_ACCOUNT' => 10001,
            'UNKNOWN_APPLICATION' => 10002,
            'UNKNOWN_CHANNEL' => 10003,
            'UNKNOWN_GUILD' => 10004,
            'UNKNOWN_INTEGRATION' => 10005,
            'UNKNOWN_INVITE' => 10006,
            'UNKNOWN_MEMBER' => 10007,
            'UNKNOWN_MESSAGE' => 10008,
            'UNKNOWN_PERMISSION_OVERWRITE' => 10009,
            'UNKNOWN_PROVIDER' => 10010,
            'UNKNOWN_ROLE' => 10011,
            'UNKNOWN_TOKEN' => 10012,
            'UNKNOWN_USER' => 10013,
            'UNKNOWN_EMOJI' => 10014,
            'UNKNOWN_WEBHOOK' => 10015,
            'UNKNOWN_BAN' => 10026,
            'UNKNOWN_SKU' => 10027,
            'UNKNOWN_STORE_LISTING' => 10028,
            'UNKNOWN_ENTITLEMENT' => 10029,
            'UNKNOWN_BUILD' => 10030,
            'UNKNOWN_LOBBY' => 10031,
            'UNKNOWN_BRANCH' => 10032,
            'UNKNOWN_REDISTRIBUTABLE' => 10036,
            'BOTS_CANNOT_USE_THIS_ENDPOINT' => 20001,
            'ONLY_BOTS_CAN_USE_THIS_ENDPOINT' => 20002,
            'MAXIMUM_NUMBER_OF_GUILDS_REACHED' => 30001,
            'MAXIMUM_NUMBER_OF_FRIENDS_REACHED' => 30002,
            'MAXIMUM_NUMBER_OF_PINS_REACHED_FOR_THE_CHANNEL' => 30003,
            'MAXIMUM_NUMBER_OF_GUILD_ROLES_REACHED' => 30005,
            'MAXIMUM_NUMBER_OF_WEBHOOKS_REACHED' => 30007,
            'MAXIMUM_NUMBER_OF_REACTIONS_REACHED' => 30010,
            'MAXIMUM_NUMBER_OF_GUILD_CHANNELS_REACHED' => 30013,
            'MAXIMUM_NUMBER_OF_ATTACHMENTS_IN_A_MESSAGE_REACHED' => 30015,
            'MAXIMUM_NUMBER_OF_INVITES_REACHED' => 30016,
            'UNAUTHORIZED' => 40001,
            'YOU_NEED_TO_VERIFY_YOUR_ACCOUNT_IN_ORDER_TO_PERFORM_THIS_ACTION' => 40002,
            'REQUEST_ENTITY_TOO_LARGE' => 40005,
            'THIS_FEATURE_HAS_BEEN_TEMPORARILY_DISABLED_SERVER_SIDE' => 40006,
            'THE_USER_IS_BANNED_FROM_THIS_GUILD' => 40007,
            'MISSING_ACCESS' => 50001,
            'INVALID_ACCOUNT_TYPE' => 50002,
            'CANNOT_EXECUTE_ACTION_ON_A_DM_CHANNEL' => 50003,
            'GUILD_WIDGET_DISABLED' => 50004,
            'CANNOT_EDIT_A_MESSAGE_AUTHORED_BY_ANOTHER_USER' => 50005,
            'CANNOT_SEND_AN_EMPTY_MESSAGE' => 50006,
            'CANNOT_SEND_MESSAGES_TO_THIS_USER' => 50007,
            'CANNOT_SEND_MESSAGES_IN_A_VOICE_CHANNEL' => 50008,
            'CHANNEL_VERIFICATION_LEVEL_IS_TOO_HIGH_FOR_YOU_TO_GAIN_ACCESS' => 50009,
            'OAUTH2_APPLICATION_DOES_NOT_HAVE_A_BOT' => 50010,
            'OAUTH2_APPLICATION_LIMIT_REACHED' => 50011,
            'INVALID_OAUTH2_STATE' => 50012,
            'YOU_LACK_PERMISSIONS_TO_PERFORM_THAT_ACTION' => 50013,
            'INVALID_AUTHENTICATION_TOKEN_PROVIDED' => 50014,
            'NOTE_WAS_TOO_LONG' => 50015,
            'PROVIDED_TOO_FEW_OR_TOO_MANY_MESSAGES_TO_DELETE' => 50016,
            'A_MESSAGE_CAN_ONLY_BE_PINNED_TO_THE_CHANNEL_IT_WAS_SENT_IN' => 50019,
            'INVITE_CODE_WAS_EITHER_INVALID_OR_TAKEN' => 50020,
            'CANNOT_EXECUTE_ACTION_ON_A_SYSTEM_MESSAGE' => 50021,
            'INVALID_OAUTH2_ACCESS_TOKEN_PROVIDED' => 50025,
            'A_MESSAGE_PROVIDED_WAS_TOO_OLD_TO_BULK_DELETE' => 50034,
            'INVALID_FORM_BODY' => 50035,
            'AN_INVITE_WAS_ACCEPTED_TO_A_GUILD_THE_APPLICATIONS_BOT_IS_NOT_IN' => 50036,
            'INVALID_API_VERSION_PROVIDED' => 50041,
            'REACTION_WAS_BLOCKED' => 90001,
            'API_RESOURCE_IS_CURRENTLY_OVERLOADED' => 130000,
        ];
    }

    /**
     * @return string[]
     * @deprecated Only included for backwards compatibility
     */
    protected static function labels(): array
    {
        return [
            'GENERAL_ERROR' => 'GENERAL_ERROR',
            'UNKNOWN_ACCOUNT' => 'UNKNOWN_ACCOUNT',
            'UNKNOWN_APPLICATION' => 'UNKNOWN_APPLICATION',
            'UNKNOWN_CHANNEL' => 'UNKNOWN_CHANNEL',
            'UNKNOWN_GUILD' => 'UNKNOWN_GUILD',
            'UNKNOWN_INTEGRATION' => 'UNKNOWN_INTEGRATION',
            'UNKNOWN_INVITE' => 'UNKNOWN_INVITE',
            'UNKNOWN_MEMBER' => 'UNKNOWN_MEMBER',
            'UNKNOWN_MESSAGE' => 'UNKNOWN_MESSAGE',
            'UNKNOWN_PERMISSION_OVERWRITE' => 'UNKNOWN_PERMISSION_OVERWRITE',
            'UNKNOWN_PROVIDER' => 'UNKNOWN_PROVIDER',
            'UNKNOWN_ROLE' => 'UNKNOWN_ROLE',
            'UNKNOWN_TOKEN' => 'UNKNOWN_TOKEN',
            'UNKNOWN_USER' => 'UNKNOWN_USER',
            'UNKNOWN_EMOJI' => 'UNKNOWN_EMOJI',
            'UNKNOWN_WEBHOOK' => 'UNKNOWN_WEBHOOK',
            'UNKNOWN_BAN' => 'UNKNOWN_BAN',
            'UNKNOWN_SKU' => 'UNKNOWN_SKU',
            'UNKNOWN_STORE_LISTING' => 'UNKNOWN_STORE_LISTING',
            'UNKNOWN_ENTITLEMENT' => 'UNKNOWN_ENTITLEMENT',
            'UNKNOWN_BUILD' => 'UNKNOWN_BUILD',
            'UNKNOWN_LOBBY' => 'UNKNOWN_LOBBY',
            'UNKNOWN_BRANCH' => 'UNKNOWN_BRANCH',
            'UNKNOWN_REDISTRIBUTABLE' => 'UNKNOWN_REDISTRIBUTABLE',
            'BOTS_CANNOT_USE_THIS_ENDPOINT' => 'BOTS_CANNOT_USE_THIS_ENDPOINT',
            'ONLY_BOTS_CAN_USE_THIS_ENDPOINT' => 'ONLY_BOTS_CAN_USE_THIS_ENDPOINT',
            'MAXIMUM_NUMBER_OF_GUILDS_REACHED' => 'MAXIMUM_NUMBER_OF_GUILDS_REACHED',
            'MAXIMUM_NUMBER_OF_FRIENDS_REACHED' => 'MAXIMUM_NUMBER_OF_FRIENDS_REACHED',
            'MAXIMUM_NUMBER_OF_PINS_REACHED_FOR_THE_CHANNEL' => 'MAXIMUM_NUMBER_OF_PINS_REACHED_FOR_THE_CHANNEL',
            'MAXIMUM_NUMBER_OF_GUILD_ROLES_REACHED' => 'MAXIMUM_NUMBER_OF_GUILD_ROLES_REACHED',
            'MAXIMUM_NUMBER_OF_WEBHOOKS_REACHED' => 'MAXIMUM_NUMBER_OF_WEBHOOKS_REACHED',
            'MAXIMUM_NUMBER_OF_REACTIONS_REACHED' => 'MAXIMUM_NUMBER_OF_REACTIONS_REACHED',
            'MAXIMUM_NUMBER_OF_GUILD_CHANNELS_REACHED' => 'MAXIMUM_NUMBER_OF_GUILD_CHANNELS_REACHED',
            'MAXIMUM_NUMBER_OF_ATTACHMENTS_IN_A_MESSAGE_REACHED' => 'MAXIMUM_NUMBER_OF_ATTACHMENTS_IN_A_MESSAGE_REACHED',
            'MAXIMUM_NUMBER_OF_INVITES_REACHED' => 'MAXIMUM_NUMBER_OF_INVITES_REACHED',
            'UNAUTHORIZED' => 'UNAUTHORIZED',
            'YOU_NEED_TO_VERIFY_YOUR_ACCOUNT_IN_ORDER_TO_PERFORM_THIS_ACTION' => 'YOU_NEED_TO_VERIFY_YOUR_ACCOUNT_IN_ORDER_TO_PERFORM_THIS_ACTION',
            'REQUEST_ENTITY_TOO_LARGE' => 'REQUEST_ENTITY_TOO_LARGE',
            'THIS_FEATURE_HAS_BEEN_TEMPORARILY_DISABLED_SERVER_SIDE' => 'THIS_FEATURE_HAS_BEEN_TEMPORARILY_DISABLED_SERVER_SIDE',
            'THE_USER_IS_BANNED_FROM_THIS_GUILD' => 'THE_USER_IS_BANNED_FROM_THIS_GUILD',
            'MISSING_ACCESS' => 'MISSING_ACCESS',
            'INVALID_ACCOUNT_TYPE' => 'INVALID_ACCOUNT_TYPE',
            'CANNOT_EXECUTE_ACTION_ON_A_DM_CHANNEL' => 'CANNOT_EXECUTE_ACTION_ON_A_DM_CHANNEL',
            'GUILD_WIDGET_DISABLED' => 'GUILD_WIDGET_DISABLED',
            'CANNOT_EDIT_A_MESSAGE_AUTHORED_BY_ANOTHER_USER' => 'CANNOT_EDIT_A_MESSAGE_AUTHORED_BY_ANOTHER_USER',
            'CANNOT_SEND_AN_EMPTY_MESSAGE' => 'CANNOT_SEND_AN_EMPTY_MESSAGE',
            'CANNOT_SEND_MESSAGES_TO_THIS_USER' => 'CANNOT_SEND_MESSAGES_TO_THIS_USER',
            'CANNOT_SEND_MESSAGES_IN_A_VOICE_CHANNEL' => 'CANNOT_SEND_MESSAGES_IN_A_VOICE_CHANNEL',
            'CHANNEL_VERIFICATION_LEVEL_IS_TOO_HIGH_FOR_YOU_TO_GAIN_ACCESS' => 'CHANNEL_VERIFICATION_LEVEL_IS_TOO_HIGH_FOR_YOU_TO_GAIN_ACCESS',
            'OAUTH2_APPLICATION_DOES_NOT_HAVE_A_BOT' => 'OAUTH2_APPLICATION_DOES_NOT_HAVE_A_BOT',
            'OAUTH2_APPLICATION_LIMIT_REACHED' => 'OAUTH2_APPLICATION_LIMIT_REACHED',
            'INVALID_OAUTH2_STATE' => 'INVALID_OAUTH2_STATE',
            'YOU_LACK_PERMISSIONS_TO_PERFORM_THAT_ACTION' => 'YOU_LACK_PERMISSIONS_TO_PERFORM_THAT_ACTION',
            'INVALID_AUTHENTICATION_TOKEN_PROVIDED' => 'INVALID_AUTHENTICATION_TOKEN_PROVIDED',
            'NOTE_WAS_TOO_LONG' => 'NOTE_WAS_TOO_LONG',
            'PROVIDED_TOO_FEW_OR_TOO_MANY_MESSAGES_TO_DELETE' => 'PROVIDED_TOO_FEW_OR_TOO_MANY_MESSAGES_TO_DELETE',
            'A_MESSAGE_CAN_ONLY_BE_PINNED_TO_THE_CHANNEL_IT_WAS_SENT_IN' => 'A_MESSAGE_CAN_ONLY_BE_PINNED_TO_THE_CHANNEL_IT_WAS_SENT_IN',
            'INVITE_CODE_WAS_EITHER_INVALID_OR_TAKEN' => 'INVITE_CODE_WAS_EITHER_INVALID_OR_TAKEN',
            'CANNOT_EXECUTE_ACTION_ON_A_SYSTEM_MESSAGE' => 'CANNOT_EXECUTE_ACTION_ON_A_SYSTEM_MESSAGE',
            'INVALID_OAUTH2_ACCESS_TOKEN_PROVIDED' => 'INVALID_OAUTH2_ACCESS_TOKEN_PROVIDED',
            'A_MESSAGE_PROVIDED_WAS_TOO_OLD_TO_BULK_DELETE' => 'A_MESSAGE_PROVIDED_WAS_TOO_OLD_TO_BULK_DELETE',
            'INVALID_FORM_BODY' => 'INVALID_FORM_BODY',
            'AN_INVITE_WAS_ACCEPTED_TO_A_GUILD_THE_APPLICATIONS_BOT_IS_NOT_IN' => 'AN_INVITE_WAS_ACCEPTED_TO_A_GUILD_THE_APPLICATIONS_BOT_IS_NOT_IN',
            'INVALID_API_VERSION_PROVIDED' => 'INVALID_API_VERSION_PROVIDED',
            'REACTION_WAS_BLOCKED' => 'REACTION_WAS_BLOCKED',
            'API_RESOURCE_IS_CURRENTLY_OVERLOADED' => 'API_RESOURCE_IS_CURRENTLY_OVERLOADED',
        ];
    }

    /**
     * @return string[]
     * @deprecated Only included for backwards compatibility
     */
    public static function allNames() {
        return static::labels();
    }
}