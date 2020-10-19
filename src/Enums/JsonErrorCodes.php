<?php


namespace Bytes\DiscordResponseBundle\Enums;


/**
 * Class JsonErrorCodes
 * JSON
 * Along with the HTTP error code, our API can also return more detailed error codes through a code key in the JSON error response. The response will also contain a message key containing a more friendly error string.
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @link https://discord.com/developers/docs/topics/opcodes-and-status-codes#json
 *
 * @todo Refactor to be spatie/enum
 */
class JsonErrorCodes
{

    /**
     * General error (such as a malformed request body, amongst other things)
     */
    const GENERAL_ERROR = 0;
    /**
     * Unknown account
     */
    const UNKNOWN_ACCOUNT = 10001;
    /**
     * Unknown application
     */
    const UNKNOWN_APPLICATION = 10002;
    /**
     * Unknown channel
     */
    const UNKNOWN_CHANNEL = 10003;
    /**
     * Unknown guild
     */
    const UNKNOWN_GUILD = 10004;
    /**
     * Unknown integration
     */
    const UNKNOWN_INTEGRATION = 10005;
    /**
     * Unknown invite
     */
    const UNKNOWN_INVITE = 10006;
    /**
     * Unknown member
     */
    const UNKNOWN_MEMBER = 10007;
    /**
     * Unknown message
     */
    const UNKNOWN_MESSAGE = 10008;
    /**
     * Unknown permission overwrite
     */
    const UNKNOWN_PERMISSION_OVERWRITE = 10009;
    /**
     * Unknown provider
     */
    const UNKNOWN_PROVIDER = 10010;
    /**
     * Unknown role
     */
    const UNKNOWN_ROLE = 10011;
    /**
     * Unknown token
     */
    const UNKNOWN_TOKEN = 10012;
    /**
     * Unknown user
     */
    const UNKNOWN_USER = 10013;
    /**
     * Unknown emoji
     */
    const UNKNOWN_EMOJI = 10014;
    /**
     * Unknown webhook
     */
    const UNKNOWN_WEBHOOK = 10015;
    /**
     * Unknown ban
     */
    const UNKNOWN_BAN = 10026;
    /**
     * Unknown SKU
     */
    const UNKNOWN_SKU = 10027;
    /**
     * Unknown Store Listing
     */
    const UNKNOWN_STORE_LISTING = 10028;
    /**
     * Unknown entitlement
     */
    const UNKNOWN_ENTITLEMENT = 10029;
    /**
     * Unknown build
     */
    const UNKNOWN_BUILD = 10030;
    /**
     * Unknown lobby
     */
    const UNKNOWN_LOBBY = 10031;
    /**
     * Unknown branch
     */
    const UNKNOWN_BRANCH = 10032;
    /**
     * Unknown redistributable
     */
    const UNKNOWN_REDISTRIBUTABLE = 10036;
    /**
     * Bots cannot use this endpoint
     */
    const BOTS_CANNOT_USE_THIS_ENDPOINT = 20001;
    /**
     * Only bots can use this endpoint
     */
    const ONLY_BOTS_CAN_USE_THIS_ENDPOINT = 20002;
    /**
     * Maximum number of guilds reached (100)
     */
    const MAXIMUM_NUMBER_OF_GUILDS_REACHED = 30001;
    /**
     * Maximum number of friends reached (1000)
     */
    const MAXIMUM_NUMBER_OF_FRIENDS_REACHED = 30002;
    /**
     * Maximum number of pins reached for the channel (50)
     */
    const MAXIMUM_NUMBER_OF_PINS_REACHED_FOR_THE_CHANNEL = 30003;
    /**
     * Maximum number of guild roles reached (250)
     */
    const MAXIMUM_NUMBER_OF_GUILD_ROLES_REACHED = 30005;
    /**
     * Maximum number of webhooks reached (10)
     */
    const MAXIMUM_NUMBER_OF_WEBHOOKS_REACHED = 30007;
    /**
     * Maximum number of reactions reached (20)
     */
    const MAXIMUM_NUMBER_OF_REACTIONS_REACHED = 30010;
    /**
     * Maximum number of guild channels reached (500)
     */
    const MAXIMUM_NUMBER_OF_GUILD_CHANNELS_REACHED = 30013;
    /**
     * Maximum number of attachments in a message reached (10)
     */
    const MAXIMUM_NUMBER_OF_ATTACHMENTS_IN_A_MESSAGE_REACHED = 30015;
    /**
     * Maximum number of invites reached (1000)
     */
    const MAXIMUM_NUMBER_OF_INVITES_REACHED = 30016;
    /**
     * Unauthorized. Provide a valid token and try again
     */
    const UNAUTHORIZED = 40001;
    /**
     * You need to verify your account in order to perform this action
     */
    const YOU_NEED_TO_VERIFY_YOUR_ACCOUNT_IN_ORDER_TO_PERFORM_THIS_ACTION = 40002;
    /**
     * Request entity too large. Try sending something smaller in size
     */
    const REQUEST_ENTITY_TOO_LARGE = 40005;
    /**
     * This feature has been temporarily disabled server-side
     */
    const THIS_FEATURE_HAS_BEEN_TEMPORARILY_DISABLED_SERVER_SIDE = 40006;
    /**
     * The user is banned from this guild
     */
    const THE_USER_IS_BANNED_FROM_THIS_GUILD = 40007;
    /**
     * Missing access
     */
    const MISSING_ACCESS = 50001;
    /**
     * Invalid account type
     */
    const INVALID_ACCOUNT_TYPE = 50002;
    /**
     * Cannot execute action on a DM channel
     */
    const CANNOT_EXECUTE_ACTION_ON_A_DM_CHANNEL = 50003;
    /**
     * Guild widget disabled
     */
    const GUILD_WIDGET_DISABLED = 50004;
    /**
     * Cannot edit a message authored by another user
     */
    const CANNOT_EDIT_A_MESSAGE_AUTHORED_BY_ANOTHER_USER = 50005;
    /**
     * Cannot send an empty message
     */
    const CANNOT_SEND_AN_EMPTY_MESSAGE = 50006;
    /**
     * Cannot send messages to this user
     */
    const CANNOT_SEND_MESSAGES_TO_THIS_USER = 50007;
    /**
     * Cannot send messages in a voice channel
     */
    const CANNOT_SEND_MESSAGES_IN_A_VOICE_CHANNEL = 50008;
    /**
     * Channel verification level is too high for you to gain access
     */
    const CHANNEL_VERIFICATION_LEVEL_IS_TOO_HIGH_FOR_YOU_TO_GAIN_ACCESS = 50009;
    /**
     * OAuth2 application does not have a bot
     */
    const OAUTH2_APPLICATION_DOES_NOT_HAVE_A_BOT = 50010;
    /**
     * OAuth2 application limit reached
     */
    const OAUTH2_APPLICATION_LIMIT_REACHED = 50011;
    /**
     * Invalid OAuth2 state
     */
    const INVALID_OAUTH2_STATE = 50012;
    /**
     * You lack permissions to perform that action
     */
    const YOU_LACK_PERMISSIONS_TO_PERFORM_THAT_ACTION = 50013;
    /**
     * Invalid authentication token provided
     */
    const INVALID_AUTHENTICATION_TOKEN_PROVIDED = 50014;
    /**
     * Note was too long
     */
    const NOTE_WAS_TOO_LONG = 50015;
    /**
     * Provided too few or too many messages to delete. Must provide at least 2 and fewer than 100 messages to delete
     */
    const PROVIDED_TOO_FEW_OR_TOO_MANY_MESSAGES_TO_DELETE = 50016;
    /**
     * A message can only be pinned to the channel it was sent in
     */
    const A_MESSAGE_CAN_ONLY_BE_PINNED_TO_THE_CHANNEL_IT_WAS_SENT_IN = 50019;
    /**
     * Invite code was either invalid or taken
     */
    const INVITE_CODE_WAS_EITHER_INVALID_OR_TAKEN = 50020;
    /**
     * Cannot execute action on a system message
     */
    const CANNOT_EXECUTE_ACTION_ON_A_SYSTEM_MESSAGE = 50021;
    /**
     * Invalid OAuth2 access token provided
     */
    const INVALID_OAUTH2_ACCESS_TOKEN_PROVIDED = 50025;
    /**
     * A message provided was too old to bulk delete
     */
    const A_MESSAGE_PROVIDED_WAS_TOO_OLD_TO_BULK_DELETE = 50034;
    /**
     * Invalid form body (returned for both application/json and multipart/form-data bodies), or invalid Content-Type provided
     */
    const INVALID_FORM_BODY = 50035;
    /**
     * An invite was accepted to a guild the application's bot is not in
     */
    const AN_INVITE_WAS_ACCEPTED_TO_A_GUILD_THE_APPLICATIONS_BOT_IS_NOT_IN = 50036;
    /**
     * Invalid API version provided
     */
    const INVALID_API_VERSION_PROVIDED = 50041;
    /**
     * Reaction was blocked
     */
    const REACTION_WAS_BLOCKED = 90001;
    /**
     * API resource is currently overloaded. Try again a little later
     */
    const API_RESOURCE_IS_CURRENTLY_OVERLOADED = 130000;

    /**
     * @return int[]
     */
    public static function all()
    {
        return [
            static::GENERAL_ERROR,
            static::UNKNOWN_ACCOUNT,
            static::UNKNOWN_APPLICATION,
            static::UNKNOWN_CHANNEL,
            static::UNKNOWN_GUILD,
            static::UNKNOWN_INTEGRATION,
            static::UNKNOWN_INVITE,
            static::UNKNOWN_MEMBER,
            static::UNKNOWN_MESSAGE,
            static::UNKNOWN_PERMISSION_OVERWRITE,
            static::UNKNOWN_PROVIDER,
            static::UNKNOWN_ROLE,
            static::UNKNOWN_TOKEN,
            static::UNKNOWN_USER,
            static::UNKNOWN_EMOJI,
            static::UNKNOWN_WEBHOOK,
            static::UNKNOWN_BAN,
            static::UNKNOWN_SKU,
            static::UNKNOWN_STORE_LISTING,
            static::UNKNOWN_ENTITLEMENT,
            static::UNKNOWN_BUILD,
            static::UNKNOWN_LOBBY,
            static::UNKNOWN_BRANCH,
            static::UNKNOWN_REDISTRIBUTABLE,
            static::BOTS_CANNOT_USE_THIS_ENDPOINT,
            static::ONLY_BOTS_CAN_USE_THIS_ENDPOINT,
            static::MAXIMUM_NUMBER_OF_GUILDS_REACHED,
            static::MAXIMUM_NUMBER_OF_FRIENDS_REACHED,
            static::MAXIMUM_NUMBER_OF_PINS_REACHED_FOR_THE_CHANNEL,
            static::MAXIMUM_NUMBER_OF_GUILD_ROLES_REACHED,
            static::MAXIMUM_NUMBER_OF_WEBHOOKS_REACHED,
            static::MAXIMUM_NUMBER_OF_REACTIONS_REACHED,
            static::MAXIMUM_NUMBER_OF_GUILD_CHANNELS_REACHED,
            static::MAXIMUM_NUMBER_OF_ATTACHMENTS_IN_A_MESSAGE_REACHED,
            static::MAXIMUM_NUMBER_OF_INVITES_REACHED,
            static::UNAUTHORIZED,
            static::YOU_NEED_TO_VERIFY_YOUR_ACCOUNT_IN_ORDER_TO_PERFORM_THIS_ACTION,
            static::REQUEST_ENTITY_TOO_LARGE,
            static::THIS_FEATURE_HAS_BEEN_TEMPORARILY_DISABLED_SERVER_SIDE,
            static::THE_USER_IS_BANNED_FROM_THIS_GUILD,
            static::MISSING_ACCESS,
            static::INVALID_ACCOUNT_TYPE,
            static::CANNOT_EXECUTE_ACTION_ON_A_DM_CHANNEL,
            static::GUILD_WIDGET_DISABLED,
            static::CANNOT_EDIT_A_MESSAGE_AUTHORED_BY_ANOTHER_USER,
            static::CANNOT_SEND_AN_EMPTY_MESSAGE,
            static::CANNOT_SEND_MESSAGES_TO_THIS_USER,
            static::CANNOT_SEND_MESSAGES_IN_A_VOICE_CHANNEL,
            static::CHANNEL_VERIFICATION_LEVEL_IS_TOO_HIGH_FOR_YOU_TO_GAIN_ACCESS,
            static::OAUTH2_APPLICATION_DOES_NOT_HAVE_A_BOT,
            static::OAUTH2_APPLICATION_LIMIT_REACHED,
            static::INVALID_OAUTH2_STATE,
            static::YOU_LACK_PERMISSIONS_TO_PERFORM_THAT_ACTION,
            static::INVALID_AUTHENTICATION_TOKEN_PROVIDED,
            static::NOTE_WAS_TOO_LONG,
            static::PROVIDED_TOO_FEW_OR_TOO_MANY_MESSAGES_TO_DELETE,
            static::A_MESSAGE_CAN_ONLY_BE_PINNED_TO_THE_CHANNEL_IT_WAS_SENT_IN,
            static::INVITE_CODE_WAS_EITHER_INVALID_OR_TAKEN,
            static::CANNOT_EXECUTE_ACTION_ON_A_SYSTEM_MESSAGE,
            static::INVALID_OAUTH2_ACCESS_TOKEN_PROVIDED,
            static::A_MESSAGE_PROVIDED_WAS_TOO_OLD_TO_BULK_DELETE,
            static::INVALID_FORM_BODY,
            static::AN_INVITE_WAS_ACCEPTED_TO_A_GUILD_THE_APPLICATIONS_BOT_IS_NOT_IN,
            static::INVALID_API_VERSION_PROVIDED,
            static::REACTION_WAS_BLOCKED,
            static::API_RESOURCE_IS_CURRENTLY_OVERLOADED,
        ];
    }

    /**
     * @return string[]
     */
    public static function allNames()
    {
        $return[0] = 'GENERAL_ERROR';
        $return[10001] = 'UNKNOWN_ACCOUNT';
        $return[10002] = 'UNKNOWN_APPLICATION';
        $return[10003] = 'UNKNOWN_CHANNEL';
        $return[10004] = 'UNKNOWN_GUILD';
        $return[10005] = 'UNKNOWN_INTEGRATION';
        $return[10006] = 'UNKNOWN_INVITE';
        $return[10007] = 'UNKNOWN_MEMBER';
        $return[10008] = 'UNKNOWN_MESSAGE';
        $return[10009] = 'UNKNOWN_PERMISSION_OVERWRITE';
        $return[10010] = 'UNKNOWN_PROVIDER';
        $return[10011] = 'UNKNOWN_ROLE';
        $return[10012] = 'UNKNOWN_TOKEN';
        $return[10013] = 'UNKNOWN_USER';
        $return[10014] = 'UNKNOWN_EMOJI';
        $return[10015] = 'UNKNOWN_WEBHOOK';
        $return[10026] = 'UNKNOWN_BAN';
        $return[10027] = 'UNKNOWN_SKU';
        $return[10028] = 'UNKNOWN_STORE_LISTING';
        $return[10029] = 'UNKNOWN_ENTITLEMENT';
        $return[10030] = 'UNKNOWN_BUILD';
        $return[10031] = 'UNKNOWN_LOBBY';
        $return[10032] = 'UNKNOWN_BRANCH';
        $return[10036] = 'UNKNOWN_REDISTRIBUTABLE';
        $return[20001] = 'BOTS_CANNOT_USE_THIS_ENDPOINT';
        $return[20002] = 'ONLY_BOTS_CAN_USE_THIS_ENDPOINT';
        $return[30001] = 'MAXIMUM_NUMBER_OF_GUILDS_REACHED';
        $return[30002] = 'MAXIMUM_NUMBER_OF_FRIENDS_REACHED';
        $return[30003] = 'MAXIMUM_NUMBER_OF_PINS_REACHED_FOR_THE_CHANNEL';
        $return[30005] = 'MAXIMUM_NUMBER_OF_GUILD_ROLES_REACHED';
        $return[30007] = 'MAXIMUM_NUMBER_OF_WEBHOOKS_REACHED';
        $return[30010] = 'MAXIMUM_NUMBER_OF_REACTIONS_REACHED';
        $return[30013] = 'MAXIMUM_NUMBER_OF_GUILD_CHANNELS_REACHED';
        $return[30015] = 'MAXIMUM_NUMBER_OF_ATTACHMENTS_IN_A_MESSAGE_REACHED';
        $return[30016] = 'MAXIMUM_NUMBER_OF_INVITES_REACHED';
        $return[40001] = 'UNAUTHORIZED';
        $return[40002] = 'YOU_NEED_TO_VERIFY_YOUR_ACCOUNT_IN_ORDER_TO_PERFORM_THIS_ACTION';
        $return[40005] = 'REQUEST_ENTITY_TOO_LARGE';
        $return[40006] = 'THIS_FEATURE_HAS_BEEN_TEMPORARILY_DISABLED_SERVER_SIDE';
        $return[40007] = 'THE_USER_IS_BANNED_FROM_THIS_GUILD';
        $return[50001] = 'MISSING_ACCESS';
        $return[50002] = 'INVALID_ACCOUNT_TYPE';
        $return[50003] = 'CANNOT_EXECUTE_ACTION_ON_A_DM_CHANNEL';
        $return[50004] = 'GUILD_WIDGET_DISABLED';
        $return[50005] = 'CANNOT_EDIT_A_MESSAGE_AUTHORED_BY_ANOTHER_USER';
        $return[50006] = 'CANNOT_SEND_AN_EMPTY_MESSAGE';
        $return[50007] = 'CANNOT_SEND_MESSAGES_TO_THIS_USER';
        $return[50008] = 'CANNOT_SEND_MESSAGES_IN_A_VOICE_CHANNEL';
        $return[50009] = 'CHANNEL_VERIFICATION_LEVEL_IS_TOO_HIGH_FOR_YOU_TO_GAIN_ACCESS';
        $return[50010] = 'OAUTH2_APPLICATION_DOES_NOT_HAVE_A_BOT';
        $return[50011] = 'OAUTH2_APPLICATION_LIMIT_REACHED';
        $return[50012] = 'INVALID_OAUTH2_STATE';
        $return[50013] = 'YOU_LACK_PERMISSIONS_TO_PERFORM_THAT_ACTION';
        $return[50014] = 'INVALID_AUTHENTICATION_TOKEN_PROVIDED';
        $return[50015] = 'NOTE_WAS_TOO_LONG';
        $return[50016] = 'PROVIDED_TOO_FEW_OR_TOO_MANY_MESSAGES_TO_DELETE';
        $return[50019] = 'A_MESSAGE_CAN_ONLY_BE_PINNED_TO_THE_CHANNEL_IT_WAS_SENT_IN';
        $return[50020] = 'INVITE_CODE_WAS_EITHER_INVALID_OR_TAKEN';
        $return[50021] = 'CANNOT_EXECUTE_ACTION_ON_A_SYSTEM_MESSAGE';
        $return[50025] = 'INVALID_OAUTH2_ACCESS_TOKEN_PROVIDED';
        $return[50034] = 'A_MESSAGE_PROVIDED_WAS_TOO_OLD_TO_BULK_DELETE';
        $return[50035] = 'INVALID_FORM_BODY';
        $return[50036] = 'AN_INVITE_WAS_ACCEPTED_TO_A_GUILD_THE_APPLICATIONS_BOT_IS_NOT_IN';
        $return[50041] = 'INVALID_API_VERSION_PROVIDED';
        $return[90001] = 'REACTION_WAS_BLOCKED';
        $return[130000] = 'API_RESOURCE_IS_CURRENTLY_OVERLOADED';

        return $return;
    }

    /**
     * @param int $value
     * @return string
     */
    public static function getName($value)
    {
        return static::allNames()[$value];
    }
}