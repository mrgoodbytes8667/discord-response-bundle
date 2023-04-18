<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\IntBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\IntBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * Along with the HTTP error code, our API can also return more detailed error codes through a code key in the JSON
 * error response. The response will also contain a message key containing a more friendly error string.
 *
 * @version v0.10.4 As of 2021-08-11 Discord Documentation
 *
 * @link https://discord.com/developers/docs/topics/opcodes-and-status-codes#json
 * @link https://discord.com/developers/docs/topics/opcodes-and-status-codes#json-json-error-codes
 */
enum JsonErrorCodes: int implements IntBackedEnumInterface
{
    use IntBackedEnumTrait;

    /**
     * [0] General error (such as a malformed request body, amongst other things)
     */
    case GENERAL_ERROR = 0;

    /**
     * [10001] Unknown account
     */
    case UNKNOWN_ACCOUNT = 10001;

    /**
     * [10002] Unknown application
     */
    case UNKNOWN_APPLICATION = 10002;

    /**
     * [10003] Unknown channel
     */
    case UNKNOWN_CHANNEL = 10003;

    /**
     * [10004] Unknown guild
     */
    case UNKNOWN_GUILD = 10004;

    /**
     * [10005] Unknown integration
     */
    case UNKNOWN_INTEGRATION = 10005;

    /**
     * [10006] Unknown invite
     */
    case UNKNOWN_INVITE = 10006;

    /**
     * [10007] Unknown member
     */
    case UNKNOWN_MEMBER = 10007;

    /**
     * [10008] Unknown message
     */
    case UNKNOWN_MESSAGE = 10008;

    /**
     * [10009] Unknown permission overwrite
     */
    case UNKNOWN_PERMISSION_OVERWRITE = 10009;

    /**
     * [10010] Unknown provider
     */
    case UNKNOWN_PROVIDER = 10010;

    /**
     * [10011] Unknown role
     */
    case UNKNOWN_ROLE = 10011;

    /**
     * [10012] Unknown token
     */
    case UNKNOWN_TOKEN = 10012;

    /**
     * [10013] Unknown user
     */
    case UNKNOWN_USER = 10013;

    /**
     * [10014] Unknown emoji
     */
    case UNKNOWN_EMOJI = 10014;

    /**
     * [10015] Unknown webhook
     */
    case UNKNOWN_WEBHOOK = 10015;

    /**
     * [10016] Unknown webhook service
     */
    case UNKNOWN_WEBHOOK_SERVICE = 10016;

    /**
     * [10020] Unknown session
     */
    case UNKNOWN_SESSION = 10020;

    /**
     * [10026] Unknown ban
     */
    case UNKNOWN_BAN = 10026;

    /**
     * [10027] Unknown SKU
     */
    case UNKNOWN_SKU = 10027;

    /**
     * [10028] Unknown Store Listing
     */
    case UNKNOWN_STORE_LISTING = 10028;

    /**
     * [10029] Unknown entitlement
     */
    case UNKNOWN_ENTITLEMENT = 10029;

    /**
     * [10030] Unknown build
     */
    case UNKNOWN_BUILD = 10030;

    /**
     * [10031] Unknown lobby
     */
    case UNKNOWN_LOBBY = 10031;

    /**
     * [10032] Unknown branch
     */
    case UNKNOWN_BRANCH = 10032;

    /**
     * [10033] Unknown store directory layout
     */
    case UNKNOWN_STORE_DIRECTORY_LAYOUT = 10033;

    /**
     * [10036] Unknown redistributable
     */
    case UNKNOWN_REDISTRIBUTABLE = 10036;

    /**
     * [10038] Unknown gift code
     */
    case UNKNOWN_GIFT_CODE = 10038;

    /**
     * [10049] Unknown stream
     */
    case UNKNOWN_STREAM = 10049;

    /**
     * [10050] Unknown premium server subscribe cooldown
     */
    case UNKNOWN_PREMIUM_SERVER_SUBSCRIBE_COOLDOWN = 10050;

    /**
     * [10057] Unknown guild template
     */
    case UNKNOWN_GUILD_TEMPLATE = 10057;

    /**
     * [10059] Unknown discoverable server category
     */
    case UNKNOWN_DISCOVERABLE_SERVER_CATEGORY = 10059;

    /**
     * [10060] Unknown sticker
     */
    case UNKNOWN_STICKER = 10060;

    /**
     * [10062] Unknown interaction
     */
    case UNKNOWN_INTERACTION = 10062;

    /**
     * [10063] Unknown application command
     */
    case UNKNOWN_APPLICATION_COMMAND = 10063;

    /**
     * [10066] Unknown application command permissions
     */
    case UNKNOWN_APPLICATION_COMMAND_PERMISSIONS = 10066;

    /**
     * [10067] Unknown Stage Instance
     */
    case UNKNOWN_STAGE_INSTANCE = 10067;

    /**
     * [10068] Unknown Guild Member Verification Form
     */
    case UNKNOWN_GUILD_MEMBER_VERIFICATION_FORM = 10068;

    /**
     * [10069] Unknown Guild Welcome Screen
     */
    case UNKNOWN_GUILD_WELCOME_SCREEN = 10069;

    /**
     * [10070] Unknown Guild Scheduled Event
     */
    case UNKNOWN_GUILD_SCHEDULED_EVENT = 10070;

    /**
     * [10071] Unknown Guild Scheduled Event User
     */
    case UNKNOWN_GUILD_SCHEDULED_EVENT_USER = 10071;

    /**
     * [20001] Bots cannot use this endpoint
     */
    case BOTS_CANNOT_USE_THIS_ENDPOINT = 20001;

    /**
     * [20002] Only bots can use this endpoint
     */
    case ONLY_BOTS_CAN_USE_THIS_ENDPOINT = 20002;

    /**
     * [20009] Explicit content cannot be sent to the desired recipient(s)
     */
    case EXPLICIT_CONTENT_CANNOT_BE_SENT_TO_THE_DESIRED_RECIPIENTS = 20009;

    /**
     * [20012] You are not authorized to perform this action on this application
     */
    case YOU_ARE_NOT_AUTHORIZED_TO_PERFORM_THIS_ACTION_ON_THIS_APPLICATION = 20012;

    /**
     * [20016] This action cannot be performed due to slowmode rate limit
     */
    case THIS_ACTION_CANNOT_BE_PERFORMED_DUE_TO_SLOWMODE_RATE_LIMIT = 20016;

    /**
     * [20018] Only the owner of this account can perform this action
     */
    case ONLY_THE_OWNER_OF_THIS_ACCOUNT_CAN_PERFORM_THIS_ACTION = 20018;

    /**
     * [20022] This message cannot be edited due to announcement rate limits
     */
    case THIS_MESSAGE_CANNOT_BE_EDITED_DUE_TO_ANNOUNCEMENT_RATE_LIMITS = 20022;

    /**
     * [20028] The channel you are writing has hit the write rate limit
     */
    case THE_CHANNEL_YOU_ARE_WRITING_HAS_HIT_THE_WRITE_RATE_LIMIT = 20028;

    /**
     * [20031] Your Stage topic, server name, server description, or channel names contain words that are not allowed
     */
    case YOUR_STAGE_TOPIC_SERVER_NAME_SERVER_DESCRIPTION_OR_CHANNEL_NAMES_CONTAIN_WORDS_THAT_ARE_NOT_ALLOWED = 20031;

    /**
     * [20035] Guild premium subscription level too low
     */
    case GUILD_PREMIUM_SUBSCRIPTION_LEVEL_TOO_LOW = 20035;

    /**
     * [30001] Maximum number of guilds reached (100)
     */
    case MAXIMUM_NUMBER_OF_GUILDS_REACHED = 30001;

    /**
     * [30002] Maximum number of friends reached (1000)
     */
    case MAXIMUM_NUMBER_OF_FRIENDS_REACHED = 30002;

    /**
     * [30003] Maximum number of pins reached for the channel (50)
     */
    case MAXIMUM_NUMBER_OF_PINS_REACHED_FOR_THE_CHANNEL = 30003;

    /**
     * [30004] Maximum number of recipients reached (10)
     */
    case MAXIMUM_NUMBER_OF_RECIPIENTS_REACHED = 30004;

    /**
     * [30005] Maximum number of guild roles reached (250)
     */
    case MAXIMUM_NUMBER_OF_GUILD_ROLES_REACHED = 30005;

    /**
     * [30007] Maximum number of webhooks reached (10)
     */
    case MAXIMUM_NUMBER_OF_WEBHOOKS_REACHED = 30007;

    /**
     * [30008] Maximum number of emojis reached
     */
    case MAXIMUM_NUMBER_OF_EMOJIS_REACHED = 30008;

    /**
     * [30010] Maximum number of reactions reached (20)
     */
    case MAXIMUM_NUMBER_OF_REACTIONS_REACHED = 30010;

    /**
     * [30013] Maximum number of guild channels reached (500)
     */
    case MAXIMUM_NUMBER_OF_GUILD_CHANNELS_REACHED = 30013;

    /**
     * [30015] Maximum number of attachments in a message reached (10)
     */
    case MAXIMUM_NUMBER_OF_ATTACHMENTS_IN_AMESSAGE_REACHED = 30015;

    /**
     * [30016] Maximum number of invites reached (1000)
     */
    case MAXIMUM_NUMBER_OF_INVITES_REACHED = 30016;

    /**
     * [30018] Maximum number of animated emojis reached
     */
    case MAXIMUM_NUMBER_OF_ANIMATED_EMOJIS_REACHED = 30018;

    /**
     * [30019] Maximum number of server members reached
     */
    case MAXIMUM_NUMBER_OF_SERVER_MEMBERS_REACHED = 30019;

    /**
     * [30030] Maximum number of server categories has been reached (5)
     */
    case MAXIMUM_NUMBER_OF_SERVER_CATEGORIES_HAS_BEEN_REACHED = 30030;

    /**
     * [30031] Guild already has a template
     */
    case GUILD_ALREADY_HAS_ATEMPLATE = 30031;

    /**
     * [30033] Max number of thread participants has been reached
     */
    case MAX_NUMBER_OF_THREAD_PARTICIPANTS_HAS_BEEN_REACHED = 30033;

    /**
     * [30035] Maximum number of bans for non-guild members have been exceeded
     */
    case MAXIMUM_NUMBER_OF_BANS_FOR_NON_GUILD_MEMBERS_HAVE_BEEN_EXCEEDED = 30035;

    /**
     * [30037] Maximum number of bans fetches has been reached
     */
    case MAXIMUM_NUMBER_OF_BANS_FETCHES_HAS_BEEN_REACHED = 30037;

    /**
     * [30039] Maximum number of stickers reached
     */
    case MAXIMUM_NUMBER_OF_STICKERS_REACHED = 30039;

    /**
     * [40001] Unauthorized. Provide a valid token and try again
     */
    case UNAUTHORIZED_PROVIDE_AVALID_TOKEN_AND_TRY_AGAIN = 40001;

    /**
     * [40002] You need to verify your account in order to perform this action
     */
    case YOU_NEED_TO_VERIFY_YOUR_ACCOUNT_IN_ORDER_TO_PERFORM_THIS_ACTION = 40002;

    /**
     * [40003] You are opening direct messages too fast
     */
    case YOU_ARE_OPENING_DIRECT_MESSAGES_TOO_FAST = 40003;

    /**
     * [40005] Request entity too large. Try sending something smaller in size
     */
    case REQUEST_ENTITY_TOO_LARGE = 40005;

    /**
     * [40006] This feature has been temporarily disabled server-side
     */
    case THIS_FEATURE_HAS_BEEN_TEMPORARILY_DISABLED_SERVER_SIDE = 40006;

    /**
     * [40007] The user is banned from this guild
     */
    case THE_USER_IS_BANNED_FROM_THIS_GUILD = 40007;

    /**
     * [40032] Target user is not connected to voice
     */
    case TARGET_USER_IS_NOT_CONNECTED_TO_VOICE = 40032;

    /**
     * [40033] This message has already been crossposted
     */
    case THIS_MESSAGE_HAS_ALREADY_BEEN_CROSSPOSTED = 40033;

    /**
     * [40041] An application command with that name already exists
     */
    case AN_APPLICATION_COMMAND_WITH_THAT_NAME_ALREADY_EXISTS = 40041;

    /**
     * [50001] Missing access
     */
    case MISSING_ACCESS = 50001;

    /**
     * [50002] Invalid account type
     */
    case INVALID_ACCOUNT_TYPE = 50002;

    /**
     * [50003] Cannot execute action on a DM channel
     */
    case CANNOT_EXECUTE_ACTION_ON_ADM_CHANNEL = 50003;

    /**
     * [50004] Guild widget disabled
     */
    case GUILD_WIDGET_DISABLED = 50004;

    /**
     * [50005] Cannot edit a message authored by another user
     */
    case CANNOT_EDIT_AMESSAGE_AUTHORED_BY_ANOTHER_USER = 50005;

    /**
     * [50006] Cannot send an empty message
     */
    case CANNOT_SEND_AN_EMPTY_MESSAGE = 50006;

    /**
     * [50007] Cannot send messages to this user
     */
    case CANNOT_SEND_MESSAGES_TO_THIS_USER = 50007;

    /**
     * [50008] Cannot send messages in a voice channel
     */
    case CANNOT_SEND_MESSAGES_IN_AVOICE_CHANNEL = 50008;

    /**
     * [50009] Channel verification level is too high for you to gain access
     */
    case CHANNEL_VERIFICATION_LEVEL_IS_TOO_HIGH_FOR_YOU_TO_GAIN_ACCESS = 50009;

    /**
     * [50010] OAuth2 application does not have a bot
     */
    case O_AUTH_2_APPLICATION_DOES_NOT_HAVE_ABOT = 50010;

    /**
     * [50011] OAuth2 application limit reached
     */
    case O_AUTH_2_APPLICATION_LIMIT_REACHED = 50011;

    /**
     * [50012] Invalid OAuth2 state
     */
    case INVALID_OAUTH_2_STATE = 50012;

    /**
     * [50013] You lack permissions to perform that action
     */
    case YOU_LACK_PERMISSIONS_TO_PERFORM_THAT_ACTION = 50013;

    /**
     * [50014] Invalid authentication token provided
     */
    case INVALID_AUTHENTICATION_TOKEN_PROVIDED = 50014;

    /**
     * [50015] Note was too long
     */
    case NOTE_WAS_TOO_LONG = 50015;

    /**
     * [50016] Provided too few or too many messages to delete. Must provide at least 2 and fewer than 100 messages to delete
     */
    case PROVIDED_TOO_FEW_OR_TOO_MANY_MESSAGES_TO_DELETE = 50016;

    /**
     * [50019] A message can only be pinned to the channel it was sent in
     */
    case A_MESSAGE_CAN_ONLY_BE_PINNED_TO_THE_CHANNEL_IT_WAS_SENT_IN = 50019;

    /**
     * [50020] Invite code was either invalid or taken
     */
    case INVITE_CODE_WAS_EITHER_INVALID_OR_TAKEN = 50020;

    /**
     * [50021] Cannot execute action on a system message
     */
    case CANNOT_EXECUTE_ACTION_ON_ASYSTEM_MESSAGE = 50021;

    /**
     * [50024] Cannot execute action on this channel type
     */
    case CANNOT_EXECUTE_ACTION_ON_THIS_CHANNEL_TYPE = 50024;

    /**
     * [50025] Invalid OAuth2 access token provided
     */
    case INVALID_OAUTH_2_ACCESS_TOKEN_PROVIDED = 50025;

    /**
     * [50026] Missing required OAuth2 scope
     */
    case MISSING_REQUIRED_OAUTH_2_SCOPE = 50026;

    /**
     * [50027] Invalid webhook token provided
     */
    case INVALID_WEBHOOK_TOKEN_PROVIDED = 50027;

    /**
     * [50028] Invalid role
     */
    case INVALID_ROLE = 50028;

    /**
     * [50033] Invalid Recipient(s)
     */
    case INVALID_RECIPIENT_S = 50033;

    /**
     * [50034] A message provided was too old to bulk delete
     */
    case A_MESSAGE_PROVIDED_WAS_TOO_OLD_TO_BULK_DELETE = 50034;

    /**
     * [50035] Invalid form body (returned for both application/json and multipart/form-data bodies), or invalid Content-Type provided
     */
    case INVALID_FORM_BODY = 50035;

    /**
     * [50036] An invite was accepted to a guild the application's bot is not in
     */
    case AN_INVITE_WAS_ACCEPTED_TO_AGUILD_THE_APPLICATION_SBOT_IS_NOT_IN = 50036;

    /**
     * [50041] Invalid API version provided
     */
    case INVALID_API_VERSION_PROVIDED = 50041;

    /**
     * [50045] File uploaded exceeds the maximum size
     */
    case FILE_UPLOADED_EXCEEDS_THE_MAXIMUM_SIZE = 50045;

    /**
     * [50046] Invalid file uploaded
     */
    case INVALID_FILE_UPLOADED = 50046;

    /**
     * [50054] Cannot self-redeem this gift
     */
    case CANNOT_SELF_REDEEM_THIS_GIFT = 50054;

    /**
     * [50070] Payment source required to redeem gift
     */
    case PAYMENT_SOURCE_REQUIRED_TO_REDEEM_GIFT = 50070;

    /**
     * [50074] Cannot delete a channel required for Community guilds
     */
    case CANNOT_DELETE_A_CHANNEL_REQUIRED_FOR_COMMUNITY_GUILDS = 50074;

    /**
     * [50081] Invalid sticker sent
     */
    case INVALID_STICKER_SENT = 50081;

    /**
     * [50083] Tried to perform an operation on an archived thread, such as editing a message or adding a user to the thread
     */
    case TRIED_TO_PERFORM_AN_OPERATION_ON_AN_ARCHIVED_THREAD_SUCH_AS_EDITING_A_MESSAGE_OR_ADDING_A_USER_TO_THE_THREAD = 50083;

    /**
     * [50084] Invalid thread notification settings
     */
    case INVALID_THREAD_NOTIFICATION_SETTINGS = 50084;

    /**
     * [50085] before value is earlier than the thread creation date
     */
    case BEFORE_VALUE_IS_EARLIER_THAN_THE_THREAD_CREATION_DATE = 50085;

    /**
     * [50095] This server is not available in your location
     */
    case THIS_SERVER_IS_NOT_AVAILABLE_IN_YOUR_LOCATION = 50095;

    /**
     * [50097] This server needs monetization enabled in order to perform this action
     */
    case THIS_SERVER_NEEDS_MONETIZATION_ENABLED_IN_ORDER_TO_PERFORM_THIS_ACTION = 50097;

    /**
     * [60003] Two factor is required for this operation
     */
    case TWO_FACTOR_IS_REQUIRED_FOR_THIS_OPERATION = 60003;

    /**
     * [80004] No users with DiscordTag exist
     */
    case NO_USERS_WITH_DISCORD_TAG_EXIST = 80004;

    /**
     * [90001] Reaction was blocked
     */
    case REACTION_WAS_BLOCKED = 90001;

    /**
     * [130000] API resource is currently overloaded. Try again a little later
     */
    case API_RESOURCE_IS_CURRENTLY_OVERLOADED = 130000;

    /**
     * [150006] The Stage is already open
     */
    case THE_STAGE_IS_ALREADY_OPEN = 150006;

    /**
     * [160004] A thread has already been created for this message
     */
    case A_THREAD_HAS_ALREADY_BEEN_CREATED_FOR_THIS_MESSAGE = 160004;

    /**
     * [160005] Thread is locked
     */
    case THREAD_IS_LOCKED = 160005;

    /**
     * [160006] Maximum number of active threads reached
     */
    case MAXIMUM_NUMBER_OF_ACTIVE_THREADS_REACHED = 160006;

    /**
     * [160007] Maximum number of active announcement threads reached
     */
    case MAXIMUM_NUMBER_OF_ACTIVE_ANNOUNCEMENT_THREADS_REACHED = 160007;

    /**
     * [170001] Invalid JSON for uploaded Lottie file
     */
    case INVALID_JSON_FOR_UPLOADED_LOTTIE_FILE = 170001;

    /**
     * [170002] Uploaded Lotties cannot contain rasterized images such as PNG or JPEG
     */
    case UPLOADED_LOTTIES_CANNOT_CONTAIN_RASTERIZED_IMAGES_SUCH_AS_PNG_OR_JPEG = 170002;

    /**
     * [170003] Sticker maximum framerate exceeded
     */
    case STICKER_MAXIMUM_FRAMERATE_EXCEEDED = 170003;

    /**
     * [170004] Sticker frame count exceeds maximum of 1000 frames
     */
    case STICKER_FRAME_COUNT_EXCEEDS_MAXIMUM_OF_1000_FRAMES = 170004;

    /**
     * [170005] Lottie animation maximum dimensions exceeded
     */
    case LOTTIE_ANIMATION_MAXIMUM_DIMENSIONS_EXCEEDED = 170005;

    /**
     * [170006] Sticker frame rate is either too small or too large
     */
    case STICKER_FRAME_RATE_IS_EITHER_TOO_SMALL_OR_TOO_LARGE = 170006;

    /**
     * [170007] Sticker animation duration exceeds maximum of 5 second
     */
    case STICKER_ANIMATION_DURATION_EXCEEDS_MAXIMUM_OF_5_SECONDS = 170007;

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::GENERAL_ERROR')]
    public static function generalError(): JsonErrorCodes
    {
        return JsonErrorCodes::GENERAL_ERROR;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::BOTS_CANNOT_USE_THIS_ENDPOINT')]
    public static function botsCannotUseThisEndpoint(): JsonErrorCodes
    {
        return JsonErrorCodes::BOTS_CANNOT_USE_THIS_ENDPOINT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::ONLY_BOTS_CAN_USE_THIS_ENDPOINT')]
    public static function onlyBotsCanUseThisEndpoint(): JsonErrorCodes
    {
        return JsonErrorCodes::ONLY_BOTS_CAN_USE_THIS_ENDPOINT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::EXPLICIT_CONTENT_CANNOT_BE_SENT_TO_THE_DESIRED_RECIPIENTS')]
    public static function explicitContentCannotBeSentToTheDesiredRecipients(): JsonErrorCodes
    {
        return JsonErrorCodes::EXPLICIT_CONTENT_CANNOT_BE_SENT_TO_THE_DESIRED_RECIPIENTS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::YOU_ARE_NOT_AUTHORIZED_TO_PERFORM_THIS_ACTION_ON_THIS_APPLICATION')]
    public static function youAreNotAuthorizedToPerformThisActionOnThisApplication(): JsonErrorCodes
    {
        return JsonErrorCodes::YOU_ARE_NOT_AUTHORIZED_TO_PERFORM_THIS_ACTION_ON_THIS_APPLICATION;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::THIS_ACTION_CANNOT_BE_PERFORMED_DUE_TO_SLOWMODE_RATE_LIMIT')]
    public static function thisActionCannotBePerformedDueToSlowmodeRateLimit(): JsonErrorCodes
    {
        return JsonErrorCodes::THIS_ACTION_CANNOT_BE_PERFORMED_DUE_TO_SLOWMODE_RATE_LIMIT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::ONLY_THE_OWNER_OF_THIS_ACCOUNT_CAN_PERFORM_THIS_ACTION')]
    public static function onlyTheOwnerOfThisAccountCanPerformThisAction(): JsonErrorCodes
    {
        return JsonErrorCodes::ONLY_THE_OWNER_OF_THIS_ACCOUNT_CAN_PERFORM_THIS_ACTION;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::THIS_MESSAGE_CANNOT_BE_EDITED_DUE_TO_ANNOUNCEMENT_RATE_LIMITS')]
    public static function thisMessageCannotBeEditedDueToAnnouncementRateLimits(): JsonErrorCodes
    {
        return JsonErrorCodes::THIS_MESSAGE_CANNOT_BE_EDITED_DUE_TO_ANNOUNCEMENT_RATE_LIMITS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::THE_CHANNEL_YOU_ARE_WRITING_HAS_HIT_THE_WRITE_RATE_LIMIT')]
    public static function theChannelYouAreWritingHasHitTheWriteRateLimit(): JsonErrorCodes
    {
        return JsonErrorCodes::THE_CHANNEL_YOU_ARE_WRITING_HAS_HIT_THE_WRITE_RATE_LIMIT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::YOUR_STAGE_TOPIC_SERVER_NAME_SERVER_DESCRIPTION_OR_CHANNEL_NAMES_CONTAIN_WORDS_THAT_ARE_NOT_ALLOWED')]
    public static function yourStageTopicServerNameServerDescriptionOrChannelNamesContainWordsThatAreNotAllowed(): JsonErrorCodes
    {
        return JsonErrorCodes::YOUR_STAGE_TOPIC_SERVER_NAME_SERVER_DESCRIPTION_OR_CHANNEL_NAMES_CONTAIN_WORDS_THAT_ARE_NOT_ALLOWED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::GUILD_PREMIUM_SUBSCRIPTION_LEVEL_TOO_LOW')]
    public static function guildPremiumSubscriptionLevelTooLow(): JsonErrorCodes
    {
        return JsonErrorCodes::GUILD_PREMIUM_SUBSCRIPTION_LEVEL_TOO_LOW;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_GUILDS_REACHED')]
    public static function maximumNumberOfGuildsReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_GUILDS_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_FRIENDS_REACHED')]
    public static function maximumNumberOfFriendsReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_FRIENDS_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_PINS_REACHED_FOR_THE_CHANNEL')]
    public static function maximumNumberOfPinsReachedForTheChannel(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_PINS_REACHED_FOR_THE_CHANNEL;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_RECIPIENTS_REACHED')]
    public static function maximumNumberOfRecipientsReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_RECIPIENTS_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_GUILD_ROLES_REACHED')]
    public static function maximumNumberOfGuildRolesReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_GUILD_ROLES_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_WEBHOOKS_REACHED')]
    public static function maximumNumberOfWebhooksReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_WEBHOOKS_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_EMOJIS_REACHED')]
    public static function maximumNumberOfEmojisReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_EMOJIS_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_REACTIONS_REACHED')]
    public static function maximumNumberOfReactionsReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_REACTIONS_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_GUILD_CHANNELS_REACHED')]
    public static function maximumNumberOfGuildChannelsReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_GUILD_CHANNELS_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_ATTACHMENTS_IN_AMESSAGE_REACHED')]
    public static function maximumNumberOfAttachmentsInAMessageReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_ATTACHMENTS_IN_AMESSAGE_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_INVITES_REACHED')]
    public static function maximumNumberOfInvitesReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_INVITES_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_ANIMATED_EMOJIS_REACHED')]
    public static function maximumNumberOfAnimatedEmojisReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_ANIMATED_EMOJIS_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_SERVER_MEMBERS_REACHED')]
    public static function maximumNumberOfServerMembersReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_SERVER_MEMBERS_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_SERVER_CATEGORIES_HAS_BEEN_REACHED')]
    public static function maximumNumberOfServerCategoriesHasBeenReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_SERVER_CATEGORIES_HAS_BEEN_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::GUILD_ALREADY_HAS_ATEMPLATE')]
    public static function guildAlreadyHasATemplate(): JsonErrorCodes
    {
        return JsonErrorCodes::GUILD_ALREADY_HAS_ATEMPLATE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAX_NUMBER_OF_THREAD_PARTICIPANTS_HAS_BEEN_REACHED')]
    public static function maxNumberOfThreadParticipantsHasBeenReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAX_NUMBER_OF_THREAD_PARTICIPANTS_HAS_BEEN_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_BANS_FOR_NON_GUILD_MEMBERS_HAVE_BEEN_EXCEEDED')]
    public static function maximumNumberOfBansForNonGuildMembersHaveBeenExceeded(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_BANS_FOR_NON_GUILD_MEMBERS_HAVE_BEEN_EXCEEDED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_BANS_FETCHES_HAS_BEEN_REACHED')]
    public static function maximumNumberOfBansFetchesHasBeenReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_BANS_FETCHES_HAS_BEEN_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_STICKERS_REACHED')]
    public static function maximumNumberOfStickersReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_STICKERS_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNAUTHORIZED_PROVIDE_AVALID_TOKEN_AND_TRY_AGAIN')]
    public static function unauthorizedProvideAValidTokenAndTryAgain(): JsonErrorCodes
    {
        return JsonErrorCodes::UNAUTHORIZED_PROVIDE_AVALID_TOKEN_AND_TRY_AGAIN;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::YOU_NEED_TO_VERIFY_YOUR_ACCOUNT_IN_ORDER_TO_PERFORM_THIS_ACTION')]
    public static function youNeedToVerifyYourAccountInOrderToPerformThisAction(): JsonErrorCodes
    {
        return JsonErrorCodes::YOU_NEED_TO_VERIFY_YOUR_ACCOUNT_IN_ORDER_TO_PERFORM_THIS_ACTION;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::YOU_ARE_OPENING_DIRECT_MESSAGES_TOO_FAST')]
    public static function youAreOpeningDirectMessagesTooFast(): JsonErrorCodes
    {
        return JsonErrorCodes::YOU_ARE_OPENING_DIRECT_MESSAGES_TOO_FAST;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::REQUEST_ENTITY_TOO_LARGE')]
    public static function requestEntityTooLarge(): JsonErrorCodes
    {
        return JsonErrorCodes::REQUEST_ENTITY_TOO_LARGE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::THIS_FEATURE_HAS_BEEN_TEMPORARILY_DISABLED_SERVER_SIDE')]
    public static function thisFeatureHasBeenTemporarilyDisabledServerSide(): JsonErrorCodes
    {
        return JsonErrorCodes::THIS_FEATURE_HAS_BEEN_TEMPORARILY_DISABLED_SERVER_SIDE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::THE_USER_IS_BANNED_FROM_THIS_GUILD')]
    public static function theUserIsBannedFromThisGuild(): JsonErrorCodes
    {
        return JsonErrorCodes::THE_USER_IS_BANNED_FROM_THIS_GUILD;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::TARGET_USER_IS_NOT_CONNECTED_TO_VOICE')]
    public static function targetUserIsNotConnectedToVoice(): JsonErrorCodes
    {
        return JsonErrorCodes::TARGET_USER_IS_NOT_CONNECTED_TO_VOICE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::THIS_MESSAGE_HAS_ALREADY_BEEN_CROSSPOSTED')]
    public static function thisMessageHasAlreadyBeenCrossposted(): JsonErrorCodes
    {
        return JsonErrorCodes::THIS_MESSAGE_HAS_ALREADY_BEEN_CROSSPOSTED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::AN_APPLICATION_COMMAND_WITH_THAT_NAME_ALREADY_EXISTS')]
    public static function anApplicationCommandWithThatNameAlreadyExists(): JsonErrorCodes
    {
        return JsonErrorCodes::AN_APPLICATION_COMMAND_WITH_THAT_NAME_ALREADY_EXISTS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MISSING_ACCESS')]
    public static function missingAccess(): JsonErrorCodes
    {
        return JsonErrorCodes::MISSING_ACCESS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::INVALID_ACCOUNT_TYPE')]
    public static function invalidAccountType(): JsonErrorCodes
    {
        return JsonErrorCodes::INVALID_ACCOUNT_TYPE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CANNOT_EXECUTE_ACTION_ON_ADM_CHANNEL')]
    public static function cannotExecuteActionOnAdmChannel(): JsonErrorCodes
    {
        return JsonErrorCodes::CANNOT_EXECUTE_ACTION_ON_ADM_CHANNEL;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::GUILD_WIDGET_DISABLED')]
    public static function guildWidgetDisabled(): JsonErrorCodes
    {
        return JsonErrorCodes::GUILD_WIDGET_DISABLED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CANNOT_EDIT_AMESSAGE_AUTHORED_BY_ANOTHER_USER')]
    public static function cannotEditAMessageAuthoredByAnotherUser(): JsonErrorCodes
    {
        return JsonErrorCodes::CANNOT_EDIT_AMESSAGE_AUTHORED_BY_ANOTHER_USER;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CANNOT_SEND_AN_EMPTY_MESSAGE')]
    public static function cannotSendAnEmptyMessage(): JsonErrorCodes
    {
        return JsonErrorCodes::CANNOT_SEND_AN_EMPTY_MESSAGE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CANNOT_SEND_MESSAGES_TO_THIS_USER')]
    public static function cannotSendMessagesToThisUser(): JsonErrorCodes
    {
        return JsonErrorCodes::CANNOT_SEND_MESSAGES_TO_THIS_USER;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CANNOT_SEND_MESSAGES_IN_AVOICE_CHANNEL')]
    public static function cannotSendMessagesInAVoiceChannel(): JsonErrorCodes
    {
        return JsonErrorCodes::CANNOT_SEND_MESSAGES_IN_AVOICE_CHANNEL;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CHANNEL_VERIFICATION_LEVEL_IS_TOO_HIGH_FOR_YOU_TO_GAIN_ACCESS')]
    public static function channelVerificationLevelIsTooHighForYouToGainAccess(): JsonErrorCodes
    {
        return JsonErrorCodes::CHANNEL_VERIFICATION_LEVEL_IS_TOO_HIGH_FOR_YOU_TO_GAIN_ACCESS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::O_AUTH_2_APPLICATION_DOES_NOT_HAVE_ABOT')]
    public static function oAuth2ApplicationDoesNotHaveABot(): JsonErrorCodes
    {
        return JsonErrorCodes::O_AUTH_2_APPLICATION_DOES_NOT_HAVE_ABOT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::O_AUTH_2_APPLICATION_LIMIT_REACHED')]
    public static function oAuth2ApplicationLimitReached(): JsonErrorCodes
    {
        return JsonErrorCodes::O_AUTH_2_APPLICATION_LIMIT_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::INVALID_OAUTH_2_STATE')]
    public static function invalidOAuth2State(): JsonErrorCodes
    {
        return JsonErrorCodes::INVALID_OAUTH_2_STATE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::YOU_LACK_PERMISSIONS_TO_PERFORM_THAT_ACTION')]
    public static function youLackPermissionsToPerformThatAction(): JsonErrorCodes
    {
        return JsonErrorCodes::YOU_LACK_PERMISSIONS_TO_PERFORM_THAT_ACTION;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::INVALID_AUTHENTICATION_TOKEN_PROVIDED')]
    public static function invalidAuthenticationTokenProvided(): JsonErrorCodes
    {
        return JsonErrorCodes::INVALID_AUTHENTICATION_TOKEN_PROVIDED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::NOTE_WAS_TOO_LONG')]
    public static function noteWasTooLong(): JsonErrorCodes
    {
        return JsonErrorCodes::NOTE_WAS_TOO_LONG;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::PROVIDED_TOO_FEW_OR_TOO_MANY_MESSAGES_TO_DELETE')]
    public static function providedTooFewOrTooManyMessagesToDelete(): JsonErrorCodes
    {
        return JsonErrorCodes::PROVIDED_TOO_FEW_OR_TOO_MANY_MESSAGES_TO_DELETE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::A_MESSAGE_CAN_ONLY_BE_PINNED_TO_THE_CHANNEL_IT_WAS_SENT_IN')]
    public static function aMessageCanOnlyBePinnedToTheChannelItWasSentIn(): JsonErrorCodes
    {
        return JsonErrorCodes::A_MESSAGE_CAN_ONLY_BE_PINNED_TO_THE_CHANNEL_IT_WAS_SENT_IN;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::INVITE_CODE_WAS_EITHER_INVALID_OR_TAKEN')]
    public static function inviteCodeWasEitherInvalidOrTaken(): JsonErrorCodes
    {
        return JsonErrorCodes::INVITE_CODE_WAS_EITHER_INVALID_OR_TAKEN;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CANNOT_EXECUTE_ACTION_ON_ASYSTEM_MESSAGE')]
    public static function cannotExecuteActionOnASystemMessage(): JsonErrorCodes
    {
        return JsonErrorCodes::CANNOT_EXECUTE_ACTION_ON_ASYSTEM_MESSAGE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CANNOT_EXECUTE_ACTION_ON_THIS_CHANNEL_TYPE')]
    public static function cannotExecuteActionOnThisChannelType(): JsonErrorCodes
    {
        return JsonErrorCodes::CANNOT_EXECUTE_ACTION_ON_THIS_CHANNEL_TYPE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::INVALID_OAUTH_2_ACCESS_TOKEN_PROVIDED')]
    public static function invalidOAuth2AccessTokenProvided(): JsonErrorCodes
    {
        return JsonErrorCodes::INVALID_OAUTH_2_ACCESS_TOKEN_PROVIDED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MISSING_REQUIRED_OAUTH_2_SCOPE')]
    public static function missingRequiredOAuth2Scope(): JsonErrorCodes
    {
        return JsonErrorCodes::MISSING_REQUIRED_OAUTH_2_SCOPE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::INVALID_WEBHOOK_TOKEN_PROVIDED')]
    public static function invalidWebhookTokenProvided(): JsonErrorCodes
    {
        return JsonErrorCodes::INVALID_WEBHOOK_TOKEN_PROVIDED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::INVALID_ROLE')]
    public static function invalidRole(): JsonErrorCodes
    {
        return JsonErrorCodes::INVALID_ROLE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::INVALID_RECIPIENT_S')]
    public static function invalidRecipientS(): JsonErrorCodes
    {
        return JsonErrorCodes::INVALID_RECIPIENT_S;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::A_MESSAGE_PROVIDED_WAS_TOO_OLD_TO_BULK_DELETE')]
    public static function aMessageProvidedWasTooOldToBulkDelete(): JsonErrorCodes
    {
        return JsonErrorCodes::A_MESSAGE_PROVIDED_WAS_TOO_OLD_TO_BULK_DELETE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::INVALID_FORM_BODY')]
    public static function invalidFormBody(): JsonErrorCodes
    {
        return JsonErrorCodes::INVALID_FORM_BODY;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::AN_INVITE_WAS_ACCEPTED_TO_AGUILD_THE_APPLICATION_SBOT_IS_NOT_IN')]
    public static function anInviteWasAcceptedToAGuildTheApplicationSBotIsNotIn(): JsonErrorCodes
    {
        return JsonErrorCodes::AN_INVITE_WAS_ACCEPTED_TO_AGUILD_THE_APPLICATION_SBOT_IS_NOT_IN;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::INVALID_API_VERSION_PROVIDED')]
    public static function invalidApiVersionProvided(): JsonErrorCodes
    {
        return JsonErrorCodes::INVALID_API_VERSION_PROVIDED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::FILE_UPLOADED_EXCEEDS_THE_MAXIMUM_SIZE')]
    public static function fileUploadedExceedsTheMaximumSize(): JsonErrorCodes
    {
        return JsonErrorCodes::FILE_UPLOADED_EXCEEDS_THE_MAXIMUM_SIZE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::INVALID_FILE_UPLOADED')]
    public static function invalidFileUploaded(): JsonErrorCodes
    {
        return JsonErrorCodes::INVALID_FILE_UPLOADED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CANNOT_SELF_REDEEM_THIS_GIFT')]
    public static function cannotSelfRedeemThisGift(): JsonErrorCodes
    {
        return JsonErrorCodes::CANNOT_SELF_REDEEM_THIS_GIFT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::PAYMENT_SOURCE_REQUIRED_TO_REDEEM_GIFT')]
    public static function paymentSourceRequiredToRedeemGift(): JsonErrorCodes
    {
        return JsonErrorCodes::PAYMENT_SOURCE_REQUIRED_TO_REDEEM_GIFT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CANNOT_DELETE_ACHANNEL_REQUIRED_FOR_COMMUNITY_GUILDS')]
    public static function cannotDeleteAChannelRequiredForCommunityGuilds(): JsonErrorCodes
    {
        return JsonErrorCodes::CANNOT_DELETE_A_CHANNEL_REQUIRED_FOR_COMMUNITY_GUILDS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::INVALID_STICKER_SENT')]
    public static function invalidStickerSent(): JsonErrorCodes
    {
        return JsonErrorCodes::INVALID_STICKER_SENT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::TRIED_TO_PERFORM_AN_OPERATION_ON_AN_ARCHIVED_THREAD_SUCH_AS_EDITING_AMESSAGE_OR_ADDING_AUSER_TO_THE_THREAD')]
    public static function triedToPerformAnOperationOnAnArchivedThreadSuchAsEditingAMessageOrAddingAUserToTheThread(): JsonErrorCodes
    {
        return JsonErrorCodes::TRIED_TO_PERFORM_AN_OPERATION_ON_AN_ARCHIVED_THREAD_SUCH_AS_EDITING_A_MESSAGE_OR_ADDING_A_USER_TO_THE_THREAD;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::INVALID_THREAD_NOTIFICATION_SETTINGS')]
    public static function invalidThreadNotificationSettings(): JsonErrorCodes
    {
        return JsonErrorCodes::INVALID_THREAD_NOTIFICATION_SETTINGS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::BEFORE_VALUE_IS_EARLIER_THAN_THE_THREAD_CREATION_DATE')]
    public static function beforeValueIsEarlierThanTheThreadCreationDate(): JsonErrorCodes
    {
        return JsonErrorCodes::BEFORE_VALUE_IS_EARLIER_THAN_THE_THREAD_CREATION_DATE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::THIS_SERVER_IS_NOT_AVAILABLE_IN_YOUR_LOCATION')]
    public static function thisServerIsNotAvailableInYourLocation(): JsonErrorCodes
    {
        return JsonErrorCodes::THIS_SERVER_IS_NOT_AVAILABLE_IN_YOUR_LOCATION;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::THIS_SERVER_NEEDS_MONETIZATION_ENABLED_IN_ORDER_TO_PERFORM_THIS_ACTION')]
    public static function thisServerNeedsMonetizationEnabledInOrderToPerformThisAction(): JsonErrorCodes
    {
        return JsonErrorCodes::THIS_SERVER_NEEDS_MONETIZATION_ENABLED_IN_ORDER_TO_PERFORM_THIS_ACTION;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::TWO_FACTOR_IS_REQUIRED_FOR_THIS_OPERATION')]
    public static function twoFactorIsRequiredForThisOperation(): JsonErrorCodes
    {
        return JsonErrorCodes::TWO_FACTOR_IS_REQUIRED_FOR_THIS_OPERATION;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::NO_USERS_WITH_DISCORD_TAG_EXIST')]
    public static function noUsersWithDiscordTagExist(): JsonErrorCodes
    {
        return JsonErrorCodes::NO_USERS_WITH_DISCORD_TAG_EXIST;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::REACTION_WAS_BLOCKED')]
    public static function reactionWasBlocked(): JsonErrorCodes
    {
        return JsonErrorCodes::REACTION_WAS_BLOCKED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::API_RESOURCE_IS_CURRENTLY_OVERLOADED')]
    public static function apiResourceIsCurrentlyOverloaded(): JsonErrorCodes
    {
        return JsonErrorCodes::API_RESOURCE_IS_CURRENTLY_OVERLOADED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::THE_STAGE_IS_ALREADY_OPEN')]
    public static function theStageIsAlreadyOpen(): JsonErrorCodes
    {
        return JsonErrorCodes::THE_STAGE_IS_ALREADY_OPEN;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::A_THREAD_HAS_ALREADY_BEEN_CREATED_FOR_THIS_MESSAGE')]
    public static function aThreadHasAlreadyBeenCreatedForThisMessage(): JsonErrorCodes
    {
        return JsonErrorCodes::A_THREAD_HAS_ALREADY_BEEN_CREATED_FOR_THIS_MESSAGE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::THREAD_IS_LOCKED')]
    public static function threadIsLocked(): JsonErrorCodes
    {
        return JsonErrorCodes::THREAD_IS_LOCKED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_ACTIVE_THREADS_REACHED')]
    public static function maximumNumberOfActiveThreadsReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_ACTIVE_THREADS_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MAXIMUM_NUMBER_OF_ACTIVE_ANNOUNCEMENT_THREADS_REACHED')]
    public static function maximumNumberOfActiveAnnouncementThreadsReached(): JsonErrorCodes
    {
        return JsonErrorCodes::MAXIMUM_NUMBER_OF_ACTIVE_ANNOUNCEMENT_THREADS_REACHED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::INVALID_JSON_FOR_UPLOADED_LOTTIE_FILE')]
    public static function invalidJsonForUploadedLottieFile(): JsonErrorCodes
    {
        return JsonErrorCodes::INVALID_JSON_FOR_UPLOADED_LOTTIE_FILE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UPLOADED_LOTTIES_CANNOT_CONTAIN_RASTERIZED_IMAGES_SUCH_AS_PNG_OR_JPEG')]
    public static function uploadedLottiesCannotContainRasterizedImagesSuchAsPngOrJpeg(): JsonErrorCodes
    {
        return JsonErrorCodes::UPLOADED_LOTTIES_CANNOT_CONTAIN_RASTERIZED_IMAGES_SUCH_AS_PNG_OR_JPEG;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::STICKER_MAXIMUM_FRAMERATE_EXCEEDED')]
    public static function stickerMaximumFramerateExceeded(): JsonErrorCodes
    {
        return JsonErrorCodes::STICKER_MAXIMUM_FRAMERATE_EXCEEDED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::STICKER_FRAME_COUNT_EXCEEDS_MAXIMUM_OF_1000_FRAMES')]
    public static function stickerFrameCountExceedsMaximumOf1000Frames(): JsonErrorCodes
    {
        return JsonErrorCodes::STICKER_FRAME_COUNT_EXCEEDS_MAXIMUM_OF_1000_FRAMES;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::LOTTIE_ANIMATION_MAXIMUM_DIMENSIONS_EXCEEDED')]
    public static function lottieAnimationMaximumDimensionsExceeded(): JsonErrorCodes
    {
        return JsonErrorCodes::LOTTIE_ANIMATION_MAXIMUM_DIMENSIONS_EXCEEDED;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::STICKER_FRAME_RATE_IS_EITHER_TOO_SMALL_OR_TOO_LARGE')]
    public static function stickerFrameRateIsEitherTooSmallOrTooLarge(): JsonErrorCodes
    {
        return JsonErrorCodes::STICKER_FRAME_RATE_IS_EITHER_TOO_SMALL_OR_TOO_LARGE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::STICKER_ANIMATION_DURATION_EXCEEDS_MAXIMUM_OF_5_SECONDS')]
    public static function stickerAnimationDurationExceedsMaximumOf5Seconds(): JsonErrorCodes
    {
        return JsonErrorCodes::STICKER_ANIMATION_DURATION_EXCEEDS_MAXIMUM_OF_5_SECONDS;
    }

    /**
     * @param JsonErrorCodes|null $code
     * @return bool
     */
    public static function isUnknownCodeType(?JsonErrorCodes $code): bool
    {
        if (is_null($code)) {
            return false;
        }

        return $code->equals(
            static::UNKNOWN_ACCOUNT, static::UNKNOWN_APPLICATION, static::UNKNOWN_CHANNEL, static::UNKNOWN_GUILD,
            static::UNKNOWN_INTEGRATION, static::UNKNOWN_INVITE, static::UNKNOWN_MEMBER, static::UNKNOWN_MESSAGE,
            static::UNKNOWN_PERMISSION_OVERWRITE, static::UNKNOWN_PROVIDER, static::UNKNOWN_ROLE, static::UNKNOWN_TOKEN,
            static::UNKNOWN_USER, static::UNKNOWN_EMOJI, static::UNKNOWN_WEBHOOK, static::UNKNOWN_WEBHOOK_SERVICE,
            static::UNKNOWN_SESSION, static::UNKNOWN_BAN, static::UNKNOWN_SKU, static::UNKNOWN_STORE_LISTING,
            static::UNKNOWN_ENTITLEMENT, static::UNKNOWN_BUILD, static::UNKNOWN_LOBBY, static::UNKNOWN_BRANCH,
            static::UNKNOWN_STORE_DIRECTORY_LAYOUT, static::UNKNOWN_REDISTRIBUTABLE, static::UNKNOWN_GIFT_CODE,
            static::UNKNOWN_STREAM, static::UNKNOWN_PREMIUM_SERVER_SUBSCRIBE_COOLDOWN, static::UNKNOWN_GUILD_TEMPLATE,
            static::UNKNOWN_DISCOVERABLE_SERVER_CATEGORY, static::UNKNOWN_STICKER, static::UNKNOWN_INTERACTION,
            static::UNKNOWN_APPLICATION_COMMAND, static::UNKNOWN_APPLICATION_COMMAND_PERMISSIONS,
            static::UNKNOWN_STAGE_INSTANCE, static::UNKNOWN_GUILD_MEMBER_VERIFICATION_FORM, static::UNKNOWN_GUILD_WELCOME_SCREEN,
            static::UNKNOWN_GUILD_SCHEDULED_EVENT, static::UNKNOWN_GUILD_SCHEDULED_EVENT_USER
        );
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_ACCOUNT')]
    public static function unknownAccount(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_ACCOUNT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_APPLICATION')]
    public static function unknownApplication(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_APPLICATION;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_CHANNEL')]
    public static function unknownChannel(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_CHANNEL;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_GUILD')]
    public static function unknownGuild(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_GUILD;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_INTEGRATION')]
    public static function unknownIntegration(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_INTEGRATION;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_INVITE')]
    public static function unknownInvite(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_INVITE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_MEMBER')]
    public static function unknownMember(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_MEMBER;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_MESSAGE')]
    public static function unknownMessage(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_MESSAGE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_PERMISSION_OVERWRITE')]
    public static function unknownPermissionOverwrite(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_PERMISSION_OVERWRITE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_PROVIDER')]
    public static function unknownProvider(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_PROVIDER;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_ROLE')]
    public static function unknownRole(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_ROLE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_TOKEN')]
    public static function unknownToken(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_TOKEN;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_USER')]
    public static function unknownUser(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_USER;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_EMOJI')]
    public static function unknownEmoji(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_EMOJI;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_WEBHOOK')]
    public static function unknownWebhook(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_WEBHOOK;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_WEBHOOK_SERVICE')]
    public static function unknownWebhookService(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_WEBHOOK_SERVICE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_SESSION')]
    public static function unknownSession(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_SESSION;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_BAN')]
    public static function unknownBan(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_BAN;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_SKU')]
    public static function unknownSku(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_SKU;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_STORE_LISTING')]
    public static function unknownStoreListing(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_STORE_LISTING;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_ENTITLEMENT')]
    public static function unknownEntitlement(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_ENTITLEMENT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_BUILD')]
    public static function unknownBuild(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_BUILD;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_LOBBY')]
    public static function unknownLobby(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_LOBBY;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_BRANCH')]
    public static function unknownBranch(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_BRANCH;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_STORE_DIRECTORY_LAYOUT')]
    public static function unknownStoreDirectoryLayout(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_STORE_DIRECTORY_LAYOUT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_REDISTRIBUTABLE')]
    public static function unknownRedistributable(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_REDISTRIBUTABLE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_GIFT_CODE')]
    public static function unknownGiftCode(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_GIFT_CODE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_STREAM')]
    public static function unknownStream(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_STREAM;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_PREMIUM_SERVER_SUBSCRIBE_COOLDOWN')]
    public static function unknownPremiumServerSubscribeCooldown(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_PREMIUM_SERVER_SUBSCRIBE_COOLDOWN;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_GUILD_TEMPLATE')]
    public static function unknownGuildTemplate(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_GUILD_TEMPLATE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_DISCOVERABLE_SERVER_CATEGORY')]
    public static function unknownDiscoverableServerCategory(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_DISCOVERABLE_SERVER_CATEGORY;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_STICKER')]
    public static function unknownSticker(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_STICKER;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_INTERACTION')]
    public static function unknownInteraction(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_INTERACTION;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_APPLICATION_COMMAND')]
    public static function unknownApplicationCommand(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_APPLICATION_COMMAND;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_APPLICATION_COMMAND_PERMISSIONS')]
    public static function unknownApplicationCommandPermissions(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_APPLICATION_COMMAND_PERMISSIONS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_STAGE_INSTANCE')]
    public static function unknownStageInstance(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_STAGE_INSTANCE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_GUILD_MEMBER_VERIFICATION_FORM')]
    public static function unknownGuildMemberVerificationForm(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_GUILD_MEMBER_VERIFICATION_FORM;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_GUILD_WELCOME_SCREEN')]
    public static function unknownGuildWelcomeScreen(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_GUILD_WELCOME_SCREEN;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_GUILD_SCHEDULED_EVENT')]
    public static function unknownGuildScheduledEvent(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_GUILD_SCHEDULED_EVENT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::UNKNOWN_GUILD_SCHEDULED_EVENT_USER')]
    public static function unknownGuildScheduledEventUser(): JsonErrorCodes
    {
        return JsonErrorCodes::UNKNOWN_GUILD_SCHEDULED_EVENT_USER;
    }
}
