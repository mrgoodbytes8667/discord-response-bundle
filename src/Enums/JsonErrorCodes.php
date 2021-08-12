<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;
use JetBrains\PhpStorm\Deprecated;

/**
 * Along with the HTTP error code, our API can also return more detailed error codes through a code key in the JSON
 * error response. The response will also contain a message key containing a more friendly error string.
 *
 * @version v0.10.4 As of 2021-08-11 Discord Documentation
 *
 * @link https://discord.com/developers/docs/topics/opcodes-and-status-codes#json
 * @link https://discord.com/developers/docs/topics/opcodes-and-status-codes#json-json-error-codes
 * @link https://github.com/spatie/enum
 *
 * @method static self generalError() [0] General error (such as a malformed request body, amongst other things)
 * @method static self unknownAccount() [10001] Unknown account
 * @method static self unknownApplication() [10002] Unknown application
 * @method static self unknownChannel() [10003] Unknown channel
 * @method static self unknownGuild() [10004] Unknown guild
 * @method static self unknownIntegration() [10005] Unknown integration
 * @method static self unknownInvite() [10006] Unknown invite
 * @method static self unknownMember() [10007] Unknown member
 * @method static self unknownMessage() [10008] Unknown message
 * @method static self unknownPermissionOverwrite() [10009] Unknown permission overwrite
 * @method static self unknownProvider() [10010] Unknown provider
 * @method static self unknownRole() [10011] Unknown role
 * @method static self unknownToken() [10012] Unknown token
 * @method static self unknownUser() [10013] Unknown user
 * @method static self unknownEmoji() [10014] Unknown emoji
 * @method static self unknownWebhook() [10015] Unknown webhook
 * @method static self unknownWebhookService() [10016] Unknown webhook service
 * @method static self unknownSession() [10020] Unknown session
 * @method static self unknownBan() [10026] Unknown ban
 * @method static self unknownSku() [10027] Unknown SKU
 * @method static self unknownStoreListing() [10028] Unknown Store Listing
 * @method static self unknownEntitlement() [10029] Unknown entitlement
 * @method static self unknownBuild() [10030] Unknown build
 * @method static self unknownLobby() [10031] Unknown lobby
 * @method static self unknownBranch() [10032] Unknown branch
 * @method static self unknownStoreDirectoryLayout() [10033] Unknown store directory layout
 * @method static self unknownRedistributable() [10036] Unknown redistributable
 * @method static self unknownGiftCode() [10038] Unknown gift code
 * @method static self unknownStream() [10049] Unknown stream
 * @method static self unknownPremiumServerSubscribeCooldown() [10050] Unknown premium server subscribe cooldown
 * @method static self unknownGuildTemplate() [10057] Unknown guild template
 * @method static self unknownDiscoverableServerCategory() [10059] Unknown discoverable server category
 * @method static self unknownSticker() [10060] Unknown sticker
 * @method static self unknownInteraction() [10062] Unknown interaction
 * @method static self unknownApplicationCommand() [10063] Unknown application command
 * @method static self unknownApplicationCommandPermissions() [10066] Unknown application command permissions
 * @method static self unknownStageInstance() [10067] Unknown Stage Instance
 * @method static self unknownGuildMemberVerificationForm() [10068] Unknown Guild Member Verification Form
 * @method static self unknownGuildWelcomeScreen() [10069] Unknown Guild Welcome Screen
 * @method static self unknownGuildScheduledEvent() [10070] Unknown Guild Scheduled Event
 * @method static self unknownGuildScheduledEventUser() [10071] Unknown Guild Scheduled Event User
 * @method static self botsCannotUseThisEndpoint() [20001] Bots cannot use this endpoint
 * @method static self onlyBotsCanUseThisEndpoint() [20002] Only bots can use this endpoint
 * @method static self explicitContentCannotBeSentToTheDesiredRecipients() [20009] Explicit content cannot be sent to the desired recipient(s)
 * @method static self youAreNotAuthorizedToPerformThisActionOnThisApplication() [20012] You are not authorized to perform this action on this application
 * @method static self thisActionCannotBePerformedDueToSlowmodeRateLimit() [20016] This action cannot be performed due to slowmode rate limit
 * @method static self onlyTheOwnerOfThisAccountCanPerformThisAction() [20018] Only the owner of this account can perform this action
 * @method static self thisMessageCannotBeEditedDueToAnnouncementRateLimits() [20022] This message cannot be edited due to announcement rate limits
 * @method static self theChannelYouAreWritingHasHitTheWriteRateLimit() [20028] The channel you are writing has hit the write rate limit
 * @method static self yourStageTopicServerNameServerDescriptionOrChannelNamesContainWordsThatAreNotAllowed() [20031] Your Stage topic, server name, server description, or channel names contain words that are not allowed
 * @method static self guildPremiumSubscriptionLevelTooLow() [20035] Guild premium subscription level too low
 * @method static self maximumNumberOfGuildsReached() [30001] Maximum number of guilds reached (100)
 * @method static self maximumNumberOfFriendsReached() [30002] Maximum number of friends reached (1000)
 * @method static self maximumNumberOfPinsReachedForTheChannel() [30003] Maximum number of pins reached for the channel (50)
 * @method static self maximumNumberOfRecipientsReached() [30004] Maximum number of recipients reached (10)
 * @method static self maximumNumberOfGuildRolesReached() [30005] Maximum number of guild roles reached (250)
 * @method static self maximumNumberOfWebhooksReached() [30007] Maximum number of webhooks reached (10)
 * @method static self maximumNumberOfEmojisReached() [30008] Maximum number of emojis reached
 * @method static self maximumNumberOfReactionsReached() [30010] Maximum number of reactions reached (20)
 * @method static self maximumNumberOfGuildChannelsReached() [30013] Maximum number of guild channels reached (500)
 * @method static self maximumNumberOfAttachmentsInAMessageReached() [30015] Maximum number of attachments in a message reached (10)
 * @method static self maximumNumberOfInvitesReached() [30016] Maximum number of invites reached (1000)
 * @method static self maximumNumberOfAnimatedEmojisReached() [30018] Maximum number of animated emojis reached
 * @method static self maximumNumberOfServerMembersReached() [30019] Maximum number of server members reached
 * @method static self maximumNumberOfServerCategoriesHasBeenReached() [30030] Maximum number of server categories has been reached (5)
 * @method static self guildAlreadyHasATemplate() [30031] Guild already has a template
 * @method static self maxNumberOfThreadParticipantsHasBeenReached() [30033] Max number of thread participants has been reached
 * @method static self maximumNumberOfBansForNonGuildMembersHaveBeenExceeded() [30035] Maximum number of bans for non-guild members have been exceeded
 * @method static self maximumNumberOfBansFetchesHasBeenReached() [30037] Maximum number of bans fetches has been reached
 * @method static self maximumNumberOfStickersReached() [30039] Maximum number of stickers reached
 * @method static self unauthorizedProvideAValidTokenAndTryAgain() [40001] Unauthorized. Provide a valid token and try again
 * @method static self youNeedToVerifyYourAccountInOrderToPerformThisAction() [40002] You need to verify your account in order to perform this action
 * @method static self youAreOpeningDirectMessagesTooFast() [40003] You are opening direct messages too fast
 * @method static self requestEntityTooLarge() [40005] Request entity too large. Try sending something smaller in size
 * @method static self thisFeatureHasBeenTemporarilyDisabledServerSide() [40006] This feature has been temporarily disabled server-side
 * @method static self theUserIsBannedFromThisGuild() [40007] The user is banned from this guild
 * @method static self targetUserIsNotConnectedToVoice() [40032] Target user is not connected to voice
 * @method static self thisMessageHasAlreadyBeenCrossposted() [40033] This message has already been crossposted
 * @method static self anApplicationCommandWithThatNameAlreadyExists() [40041] An application command with that name already exists
 * @method static self missingAccess() [50001] Missing access
 * @method static self invalidAccountType() [50002] Invalid account type
 * @method static self cannotExecuteActionOnAdmChannel() [50003] Cannot execute action on a DM channel
 * @method static self guildWidgetDisabled() [50004] Guild widget disabled
 * @method static self cannotEditAMessageAuthoredByAnotherUser() [50005] Cannot edit a message authored by another user
 * @method static self cannotSendAnEmptyMessage() [50006] Cannot send an empty message
 * @method static self cannotSendMessagesToThisUser() [50007] Cannot send messages to this user
 * @method static self cannotSendMessagesInAVoiceChannel() [50008] Cannot send messages in a voice channel
 * @method static self channelVerificationLevelIsTooHighForYouToGainAccess() [50009] Channel verification level is too high for you to gain access
 * @method static self oAuth2ApplicationDoesNotHaveABot() [50010] OAuth2 application does not have a bot
 * @method static self oAuth2ApplicationLimitReached() [50011] OAuth2 application limit reached
 * @method static self invalidOAuth2State() [50012] Invalid OAuth2 state
 * @method static self youLackPermissionsToPerformThatAction() [50013] You lack permissions to perform that action
 * @method static self invalidAuthenticationTokenProvided() [50014] Invalid authentication token provided
 * @method static self noteWasTooLong() [50015] Note was too long
 * @method static self providedTooFewOrTooManyMessagesToDelete() [50016] Provided too few or too many messages to delete. Must provide at least 2 and fewer than 100 messages to delete
 * @method static self aMessageCanOnlyBePinnedToTheChannelItWasSentIn() [50019] A message can only be pinned to the channel it was sent in
 * @method static self inviteCodeWasEitherInvalidOrTaken() [50020] Invite code was either invalid or taken
 * @method static self cannotExecuteActionOnASystemMessage() [50021] Cannot execute action on a system message
 * @method static self cannotExecuteActionOnThisChannelType() [50024] Cannot execute action on this channel type
 * @method static self invalidOAuth2AccessTokenProvided() [50025] Invalid OAuth2 access token provided
 * @method static self missingRequiredOAuth2Scope() [50026] Missing required OAuth2 scope
 * @method static self invalidWebhookTokenProvided() [50027] Invalid webhook token provided
 * @method static self invalidRole() [50028] Invalid role
 * @method static self invalidRecipientS() [50033] "Invalid Recipient(s)"
 * @method static self aMessageProvidedWasTooOldToBulkDelete() [50034] A message provided was too old to bulk delete
 * @method static self invalidFormBody() [50035] Invalid form body (returned for both application/json and multipart/form-data bodies), or invalid Content-Type provided
 * @method static self anInviteWasAcceptedToAGuildTheApplicationSBotIsNotIn() [50036] An invite was accepted to a guild the application's bot is not in
 * @method static self invalidApiVersionProvided() [50041] Invalid API version provided
 * @method static self fileUploadedExceedsTheMaximumSize() [50045] File uploaded exceeds the maximum size
 * @method static self invalidFileUploaded() [50046] Invalid file uploaded
 * @method static self cannotSelfRedeemThisGift() [50054] Cannot self-redeem this gift
 * @method static self paymentSourceRequiredToRedeemGift() [50070] Payment source required to redeem gift
 * @method static self cannotDeleteAChannelRequiredForCommunityGuilds() [50074] Cannot delete a channel required for Community guilds
 * @method static self invalidStickerSent() [50081] Invalid sticker sent
 * @method static self triedToPerformAnOperationOnAnArchivedThreadSuchAsEditingAMessageOrAddingAUserToTheThread() [50083] Tried to perform an operation on an archived thread, such as editing a message or adding a user to the thread
 * @method static self invalidThreadNotificationSettings() [50084] Invalid thread notification settings
 * @method static self beforeValueIsEarlierThanTheThreadCreationDate() [50085] before value is earlier than the thread creation date
 * @method static self thisServerIsNotAvailableInYourLocation() [50095] This server is not available in your location
 * @method static self thisServerNeedsMonetizationEnabledInOrderToPerformThisAction() [50097] This server needs monetization enabled in order to perform this action
 * @method static self twoFactorIsRequiredForThisOperation() [60003] Two factor is required for this operation
 * @method static self noUsersWithDiscordTagExist() [80004] No users with DiscordTag exist
 * @method static self reactionWasBlocked() [90001] Reaction was blocked
 * @method static self apiResourceIsCurrentlyOverloaded() [130000] API resource is currently overloaded. Try again a little later
 * @method static self theStageIsAlreadyOpen() [150006] The Stage is already open
 * @method static self aThreadHasAlreadyBeenCreatedForThisMessage() [160004] A thread has already been created for this message
 * @method static self threadIsLocked() [160005] Thread is locked
 * @method static self maximumNumberOfActiveThreadsReached() [160006] Maximum number of active threads reached
 * @method static self maximumNumberOfActiveAnnouncementThreadsReached() [160007] Maximum number of active announcement threads reached
 * @method static self invalidJsonForUploadedLottieFile() [170001] Invalid JSON for uploaded Lottie file
 * @method static self uploadedLottiesCannotContainRasterizedImagesSuchAsPngOrJpeg() [170002] Uploaded Lotties cannot contain rasterized images such as PNG or JPEG
 * @method static self stickerMaximumFramerateExceeded() [170003] Sticker maximum framerate exceeded
 * @method static self stickerFrameCountExceedsMaximumOf1000Frames() [170004] Sticker frame count exceeds maximum of 1000 frames
 * @method static self lottieAnimationMaximumDimensionsExceeded() [170005] Lottie animation maximum dimensions exceeded
 * @method static self stickerFrameRateIsEitherTooSmallOrTooLarge() [170006] Sticker frame rate is either too small or too large
 * @method static self stickerAnimationDurationExceedsMaximumOf5Seconds() [170007] Sticker animation duration exceeds maximum of 5 seconds
 *
 */
class JsonErrorCodes extends Enum
{
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
            static::unknownAccount(), static::unknownApplication(), static::unknownChannel(), static::unknownGuild(),
            static::unknownIntegration(), static::unknownInvite(), static::unknownMember(), static::unknownMessage(),
            static::unknownPermissionOverwrite(), static::unknownProvider(), static::unknownRole(), static::unknownToken(),
            static::unknownUser(), static::unknownEmoji(), static::unknownWebhook(), static::unknownWebhookService(),
            static::unknownSession(), static::unknownBan(), static::unknownSku(), static::unknownStoreListing(),
            static::unknownEntitlement(), static::unknownBuild(), static::unknownLobby(), static::unknownBranch(),
            static::unknownStoreDirectoryLayout(), static::unknownRedistributable(), static::unknownGiftCode(),
            static::unknownStream(), static::unknownPremiumServerSubscribeCooldown(), static::unknownGuildTemplate(),
            static::unknownDiscoverableServerCategory(), static::unknownSticker(), static::unknownInteraction(),
            static::unknownApplicationCommand(), static::unknownApplicationCommandPermissions(),
            static::unknownStageInstance(), static::unknownGuildMemberVerificationForm(), static::unknownGuildWelcomeScreen(),
            static::unknownGuildScheduledEvent(), static::unknownGuildScheduledEventUser()
        );
    }

    /**
     * General error (such as a malformed request body, amongst other things)
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use generalError() instead',
        replacement: '%class%::generalError()'
    )]
    public static function GENERAL_ERROR(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'generalError()');
        return static::generalError();
    }

    /**
     * Unknown account
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownAccount() instead',
        replacement: '%class%::unknownAccount()'
    )]
    public static function UNKNOWN_ACCOUNT(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownAccount()');
        return static::unknownAccount();
    }

    /**
     * Unknown application
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownApplication() instead',
        replacement: '%class%::unknownApplication()'
    )]
    public static function UNKNOWN_APPLICATION(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownApplication()');
        return static::unknownApplication();
    }

    /**
     * Unknown channel
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownChannel() instead',
        replacement: '%class%::unknownChannel()'
    )]
    public static function UNKNOWN_CHANNEL(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownChannel()');
        return static::unknownChannel();
    }

    /**
     * Unknown guild
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownGuild() instead',
        replacement: '%class%::unknownGuild()'
    )]
    public static function UNKNOWN_GUILD(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownGuild()');
        return static::unknownGuild();
    }

    /**
     * Unknown integration
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownIntegration() instead',
        replacement: '%class%::unknownIntegration()'
    )]
    public static function UNKNOWN_INTEGRATION(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownIntegration()');
        return static::unknownIntegration();
    }

    /**
     * Unknown invite
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownInvite() instead',
        replacement: '%class%::unknownInvite()'
    )]
    public static function UNKNOWN_INVITE(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownInvite()');
        return static::unknownInvite();
    }

    /**
     * Unknown member
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownMember() instead',
        replacement: '%class%::unknownMember()'
    )]
    public static function UNKNOWN_MEMBER(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownMember()');
        return static::unknownMember();
    }

    /**
     * Unknown message
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownMessage() instead',
        replacement: '%class%::unknownMessage()'
    )]
    public static function UNKNOWN_MESSAGE(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownMessage()');
        return static::unknownMessage();
    }

    /**
     * Unknown permission overwrite
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownPermissionOverwrite() instead',
        replacement: '%class%::unknownPermissionOverwrite()'
    )]
    public static function UNKNOWN_PERMISSION_OVERWRITE(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownPermissionOverwrite()');
        return static::unknownPermissionOverwrite();
    }

    /**
     * Unknown provider
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownProvider() instead',
        replacement: '%class%::unknownProvider()'
    )]
    public static function UNKNOWN_PROVIDER(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownProvider()');
        return static::unknownProvider();
    }

    /**
     * Unknown role
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownRole() instead',
        replacement: '%class%::unknownRole()'
    )]
    public static function UNKNOWN_ROLE(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownRole()');
        return static::unknownRole();
    }

    /**
     * Unknown token
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownToken() instead',
        replacement: '%class%::unknownToken()'
    )]
    public static function UNKNOWN_TOKEN(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownToken()');
        return static::unknownToken();
    }

    /**
     * Unknown user
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownUser() instead',
        replacement: '%class%::unknownUser()'
    )]
    public static function UNKNOWN_USER(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownUser()');
        return static::unknownUser();
    }

    /**
     * Unknown emoji
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownEmoji() instead',
        replacement: '%class%::unknownEmoji()'
    )]
    public static function UNKNOWN_EMOJI(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownEmoji()');
        return static::unknownEmoji();
    }

    /**
     * Unknown webhook
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownWebhook() instead',
        replacement: '%class%::unknownWebhook()'
    )]
    public static function UNKNOWN_WEBHOOK(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownWebhook()');
        return static::unknownWebhook();
    }

    /**
     * Unknown ban
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownBan() instead',
        replacement: '%class%::unknownBan()'
    )]
    public static function UNKNOWN_BAN(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownBan()');
        return static::unknownBan();
    }

    /**
     * Unknown SKU
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownSku() instead',
        replacement: '%class%::unknownSku()'
    )]
    public static function UNKNOWN_SKU(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownSku()');
        return static::unknownSku();
    }

    /**
     * Unknown Store Listing
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownStoreListing() instead',
        replacement: '%class%::unknownStoreListing()'
    )]
    public static function UNKNOWN_STORE_LISTING(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownStoreListing()');
        return static::unknownStoreListing();
    }

    /**
     * Unknown entitlement
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownEntitlement() instead',
        replacement: '%class%::unknownEntitlement()'
    )]
    public static function UNKNOWN_ENTITLEMENT(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownEntitlement()');
        return static::unknownEntitlement();
    }

    /**
     * Unknown build
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownBuild() instead',
        replacement: '%class%::unknownBuild()'
    )]
    public static function UNKNOWN_BUILD(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownBuild()');
        return static::unknownBuild();
    }

    /**
     * Unknown lobby
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownLobby() instead',
        replacement: '%class%::unknownLobby()'
    )]
    public static function UNKNOWN_LOBBY(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownLobby()');
        return static::unknownLobby();
    }

    /**
     * Unknown branch
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownBranch() instead',
        replacement: '%class%::unknownBranch()'
    )]
    public static function UNKNOWN_BRANCH(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownBranch()');
        return static::unknownBranch();
    }

    /**
     * Unknown redistributable
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use unknownRedistributable() instead',
        replacement: '%class%::unknownRedistributable()'
    )]
    public static function UNKNOWN_REDISTRIBUTABLE(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'unknownRedistributable()');
        return static::unknownRedistributable();
    }

    /**
     * Bots cannot use this endpoint
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use botsCannotUseThisEndpoint() instead',
        replacement: '%class%::botsCannotUseThisEndpoint()'
    )]
    public static function BOTS_CANNOT_USE_THIS_ENDPOINT(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'botsCannotUseThisEndpoint()');
        return static::botsCannotUseThisEndpoint();
    }

    /**
     * Only bots can use this endpoint
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use onlyBotsCanUseThisEndpoint() instead',
        replacement: '%class%::onlyBotsCanUseThisEndpoint()'
    )]
    public static function ONLY_BOTS_CAN_USE_THIS_ENDPOINT(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'onlyBotsCanUseThisEndpoint()');
        return static::onlyBotsCanUseThisEndpoint();
    }

    /**
     * Maximum number of guilds reached (100)
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use maximumNumberOfGuildsReached() instead',
        replacement: '%class%::maximumNumberOfGuildsReached()'
    )]
    public static function MAXIMUM_NUMBER_OF_GUILDS_REACHED(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'maximumNumberOfGuildsReached()');
        return static::maximumNumberOfGuildsReached();
    }

    /**
     * Maximum number of friends reached (1000)
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use maximumNumberOfFriendsReached() instead',
        replacement: '%class%::maximumNumberOfFriendsReached()'
    )]
    public static function MAXIMUM_NUMBER_OF_FRIENDS_REACHED(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'maximumNumberOfFriendsReached()');
        return static::maximumNumberOfFriendsReached();
    }

    /**
     * Maximum number of pins reached for the channel (50)
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use maximumNumberOfPinsReachedForTheChannel() instead',
        replacement: '%class%::maximumNumberOfPinsReachedForTheChannel()'
    )]
    public static function MAXIMUM_NUMBER_OF_PINS_REACHED_FOR_THE_CHANNEL(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'maximumNumberOfPinsReachedForTheChannel()');
        return static::maximumNumberOfPinsReachedForTheChannel();
    }

    /**
     * Maximum number of guild roles reached (250)
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use maximumNumberOfGuildRolesReached() instead',
        replacement: '%class%::maximumNumberOfGuildRolesReached()'
    )]
    public static function MAXIMUM_NUMBER_OF_GUILD_ROLES_REACHED(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'maximumNumberOfGuildRolesReached()');
        return static::maximumNumberOfGuildRolesReached();
    }

    /**
     * Maximum number of webhooks reached (10)
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use maximumNumberOfWebhooksReached() instead',
        replacement: '%class%::maximumNumberOfWebhooksReached()'
    )]
    public static function MAXIMUM_NUMBER_OF_WEBHOOKS_REACHED(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'maximumNumberOfWebhooksReached()');
        return static::maximumNumberOfWebhooksReached();
    }

    /**
     * Maximum number of reactions reached (20)
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use maximumNumberOfReactionsReached() instead',
        replacement: '%class%::maximumNumberOfReactionsReached()'
    )]
    public static function MAXIMUM_NUMBER_OF_REACTIONS_REACHED(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'maximumNumberOfReactionsReached()');
        return static::maximumNumberOfReactionsReached();
    }

    /**
     * Maximum number of guild channels reached (500)
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use maximumNumberOfGuildChannelsReached() instead',
        replacement: '%class%::maximumNumberOfGuildChannelsReached()'
    )]
    public static function MAXIMUM_NUMBER_OF_GUILD_CHANNELS_REACHED(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'maximumNumberOfGuildChannelsReached()');
        return static::maximumNumberOfGuildChannelsReached();
    }

    /**
     * Maximum number of attachments in a message reached (10)
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use maximumNumberOfAttachmentsInAMessageReached() instead',
        replacement: '%class%::maximumNumberOfAttachmentsInAMessageReached()'
    )]
    public static function MAXIMUM_NUMBER_OF_ATTACHMENTS_IN_A_MESSAGE_REACHED(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'maximumNumberOfAttachmentsInAMessageReached()');
        return static::maximumNumberOfAttachmentsInAMessageReached();
    }

    /**
     * Maximum number of invites reached (1000)
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use maximumNumberOfInvitesReached() instead',
        replacement: '%class%::maximumNumberOfInvitesReached()'
    )]
    public static function MAXIMUM_NUMBER_OF_INVITES_REACHED(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'maximumNumberOfInvitesReached()');
        return static::maximumNumberOfInvitesReached();
    }

    /**
     * You need to verify your account in order to perform this action
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use youNeedToVerifyYourAccountInOrderToPerformThisAction() instead',
        replacement: '%class%::youNeedToVerifyYourAccountInOrderToPerformThisAction()'
    )]
    public static function YOU_NEED_TO_VERIFY_YOUR_ACCOUNT_IN_ORDER_TO_PERFORM_THIS_ACTION(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'youNeedToVerifyYourAccountInOrderToPerformThisAction()');
        return static::youNeedToVerifyYourAccountInOrderToPerformThisAction();
    }

    /**
     * Request entity too large. Try sending something smaller in size
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use requestEntityTooLarge() instead',
        replacement: '%class%::requestEntityTooLarge()'
    )]
    public static function REQUEST_ENTITY_TOO_LARGE(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'requestEntityTooLarge()');
        return static::requestEntityTooLarge();
    }

    /**
     * This feature has been temporarily disabled server-side
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use thisFeatureHasBeenTemporarilyDisabledServerSide() instead',
        replacement: '%class%::thisFeatureHasBeenTemporarilyDisabledServerSide()'
    )]
    public static function THIS_FEATURE_HAS_BEEN_TEMPORARILY_DISABLED_SERVER_SIDE(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'thisFeatureHasBeenTemporarilyDisabledServerSide()');
        return static::thisFeatureHasBeenTemporarilyDisabledServerSide();
    }

    /**
     * The user is banned from this guild
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use theUserIsBannedFromThisGuild() instead',
        replacement: '%class%::theUserIsBannedFromThisGuild()'
    )]
    public static function THE_USER_IS_BANNED_FROM_THIS_GUILD(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'theUserIsBannedFromThisGuild()');
        return static::theUserIsBannedFromThisGuild();
    }

    /**
     * Missing access
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use missingAccess() instead',
        replacement: '%class%::missingAccess()'
    )]
    public static function MISSING_ACCESS(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'missingAccess()');
        return static::missingAccess();
    }

    /**
     * Invalid account type
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use invalidAccountType() instead',
        replacement: '%class%::invalidAccountType()'
    )]
    public static function INVALID_ACCOUNT_TYPE(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'invalidAccountType()');
        return static::invalidAccountType();
    }

    /**
     * Cannot execute action on a DM channel
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use cannotExecuteActionOnADmChannel() instead',
        replacement: '%class%::cannotExecuteActionOnADmChannel()'
    )]
    public static function CANNOT_EXECUTE_ACTION_ON_A_DM_CHANNEL(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'cannotExecuteActionOnADmChannel()');
        return static::cannotExecuteActionOnADmChannel();
    }

    /**
     * Guild widget disabled
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use guildWidgetDisabled() instead',
        replacement: '%class%::guildWidgetDisabled()'
    )]
    public static function GUILD_WIDGET_DISABLED(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'guildWidgetDisabled()');
        return static::guildWidgetDisabled();
    }

    /**
     * Cannot edit a message authored by another user
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use cannotEditAMessageAuthoredByAnotherUser() instead',
        replacement: '%class%::cannotEditAMessageAuthoredByAnotherUser()'
    )]
    public static function CANNOT_EDIT_A_MESSAGE_AUTHORED_BY_ANOTHER_USER(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'cannotEditAMessageAuthoredByAnotherUser()');
        return static::cannotEditAMessageAuthoredByAnotherUser();
    }

    /**
     * Cannot send an empty message
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use cannotSendAnEmptyMessage() instead',
        replacement: '%class%::cannotSendAnEmptyMessage()'
    )]
    public static function CANNOT_SEND_AN_EMPTY_MESSAGE(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'cannotSendAnEmptyMessage()');
        return static::cannotSendAnEmptyMessage();
    }

    /**
     * Cannot send messages to this user
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use cannotSendMessagesToThisUser() instead',
        replacement: '%class%::cannotSendMessagesToThisUser()'
    )]
    public static function CANNOT_SEND_MESSAGES_TO_THIS_USER(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'cannotSendMessagesToThisUser()');
        return static::cannotSendMessagesToThisUser();
    }

    /**
     * Cannot send messages in a voice channel
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use cannotSendMessagesInAVoiceChannel() instead',
        replacement: '%class%::cannotSendMessagesInAVoiceChannel()'
    )]
    public static function CANNOT_SEND_MESSAGES_IN_A_VOICE_CHANNEL(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'cannotSendMessagesInAVoiceChannel()');
        return static::cannotSendMessagesInAVoiceChannel();
    }

    /**
     * Channel verification level is too high for you to gain access
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use channelVerificationLevelIsTooHighForYouToGainAccess() instead',
        replacement: '%class%::channelVerificationLevelIsTooHighForYouToGainAccess()'
    )]
    public static function CHANNEL_VERIFICATION_LEVEL_IS_TOO_HIGH_FOR_YOU_TO_GAIN_ACCESS(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'channelVerificationLevelIsTooHighForYouToGainAccess()');
        return static::channelVerificationLevelIsTooHighForYouToGainAccess();
    }

    /**
     * OAuth2 application does not have a bot
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use oauth2ApplicationDoesNotHaveABot() instead',
        replacement: '%class%::oauth2ApplicationDoesNotHaveABot()'
    )]
    public static function OAUTH2_APPLICATION_DOES_NOT_HAVE_A_BOT(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'oauth2ApplicationDoesNotHaveABot()');
        return static::oauth2ApplicationDoesNotHaveABot();
    }

    /**
     * OAuth2 application limit reached
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use oauth2ApplicationLimitReached() instead',
        replacement: '%class%::oauth2ApplicationLimitReached()'
    )]
    public static function OAUTH2_APPLICATION_LIMIT_REACHED(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'oauth2ApplicationLimitReached()');
        return static::oauth2ApplicationLimitReached();
    }

    /**
     * Invalid OAuth2 state
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use invalidOauth2State() instead',
        replacement: '%class%::invalidOauth2State()'
    )]
    public static function INVALID_OAUTH2_STATE(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'invalidOauth2State()');
        return static::invalidOauth2State();
    }

    /**
     * You lack permissions to perform that action
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use youLackPermissionsToPerformThatAction() instead',
        replacement: '%class%::youLackPermissionsToPerformThatAction()'
    )]
    public static function YOU_LACK_PERMISSIONS_TO_PERFORM_THAT_ACTION(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'youLackPermissionsToPerformThatAction()');
        return static::youLackPermissionsToPerformThatAction();
    }

    /**
     * Invalid authentication token provided
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use invalidAuthenticationTokenProvided() instead',
        replacement: '%class%::invalidAuthenticationTokenProvided()'
    )]
    public static function INVALID_AUTHENTICATION_TOKEN_PROVIDED(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'invalidAuthenticationTokenProvided()');
        return static::invalidAuthenticationTokenProvided();
    }

    /**
     * Note was too long
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use noteWasTooLong() instead',
        replacement: '%class%::noteWasTooLong()'
    )]
    public static function NOTE_WAS_TOO_LONG(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'noteWasTooLong()');
        return static::noteWasTooLong();
    }

    /**
     * Provided too few or too many messages to delete. Must provide at least 2 and fewer than 100 messages to delete
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use providedTooFewOrTooManyMessagesToDelete() instead',
        replacement: '%class%::providedTooFewOrTooManyMessagesToDelete()'
    )]
    public static function PROVIDED_TOO_FEW_OR_TOO_MANY_MESSAGES_TO_DELETE(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'providedTooFewOrTooManyMessagesToDelete()');
        return static::providedTooFewOrTooManyMessagesToDelete();
    }

    /**
     * A message can only be pinned to the channel it was sent in
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use aMessageCanOnlyBePinnedToTheChannelItWasSentIn() instead',
        replacement: '%class%::aMessageCanOnlyBePinnedToTheChannelItWasSentIn()'
    )]
    public static function A_MESSAGE_CAN_ONLY_BE_PINNED_TO_THE_CHANNEL_IT_WAS_SENT_IN(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'aMessageCanOnlyBePinnedToTheChannelItWasSentIn()');
        return static::aMessageCanOnlyBePinnedToTheChannelItWasSentIn();
    }

    /**
     * Invite code was either invalid or taken
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use inviteCodeWasEitherInvalidOrTaken() instead',
        replacement: '%class%::inviteCodeWasEitherInvalidOrTaken()'
    )]
    public static function INVITE_CODE_WAS_EITHER_INVALID_OR_TAKEN(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'inviteCodeWasEitherInvalidOrTaken()');
        return static::inviteCodeWasEitherInvalidOrTaken();
    }

    /**
     * Cannot execute action on a system message
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use cannotExecuteActionOnASystemMessage() instead',
        replacement: '%class%::cannotExecuteActionOnASystemMessage()'
    )]
    public static function CANNOT_EXECUTE_ACTION_ON_A_SYSTEM_MESSAGE(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'cannotExecuteActionOnASystemMessage()');
        return static::cannotExecuteActionOnASystemMessage();
    }

    /**
     * Invalid OAuth2 access token provided
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use invalidOauth2AccessTokenProvided() instead',
        replacement: '%class%::invalidOauth2AccessTokenProvided()'
    )]
    public static function INVALID_OAUTH2_ACCESS_TOKEN_PROVIDED(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'invalidOauth2AccessTokenProvided()');
        return static::invalidOauth2AccessTokenProvided();
    }

    /**
     * A message provided was too old to bulk delete
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use aMessageProvidedWasTooOldToBulkDelete() instead',
        replacement: '%class%::aMessageProvidedWasTooOldToBulkDelete()'
    )]
    public static function A_MESSAGE_PROVIDED_WAS_TOO_OLD_TO_BULK_DELETE(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'aMessageProvidedWasTooOldToBulkDelete()');
        return static::aMessageProvidedWasTooOldToBulkDelete();
    }

    /**
     * Invalid form body (returned for both application/json and multipart/form-data bodies), or invalid Content-Type provided
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use invalidFormBody() instead',
        replacement: '%class%::invalidFormBody()'
    )]
    public static function INVALID_FORM_BODY(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'invalidFormBody()');
        return static::invalidFormBody();
    }

    /**
     * An invite was accepted to a guild the application's bot is not in
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use anInviteWasAcceptedToAGuildTheApplicationsBotIsNotIn() instead',
        replacement: '%class%::anInviteWasAcceptedToAGuildTheApplicationsBotIsNotIn()'
    )]
    public static function AN_INVITE_WAS_ACCEPTED_TO_A_GUILD_THE_APPLICATIONS_BOT_IS_NOT_IN(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'anInviteWasAcceptedToAGuildTheApplicationsBotIsNotIn()');
        return static::anInviteWasAcceptedToAGuildTheApplicationsBotIsNotIn();
    }

    /**
     * Invalid API version provided
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use invalidApiVersionProvided() instead',
        replacement: '%class%::invalidApiVersionProvided()'
    )]
    public static function INVALID_API_VERSION_PROVIDED(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'invalidApiVersionProvided()');
        return static::invalidApiVersionProvided();
    }

    /**
     * Reaction was blocked
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use reactionWasBlocked() instead',
        replacement: '%class%::reactionWasBlocked()'
    )]
    public static function REACTION_WAS_BLOCKED(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'reactionWasBlocked()');
        return static::reactionWasBlocked();
    }

    /**
     * API resource is currently overloaded. Try again a little later
     * @return JsonErrorCodes
     */
    #[Deprecated(
        reason: 'since 0.10.4, use apiResourceIsCurrentlyOverloaded() instead',
        replacement: '%class%::apiResourceIsCurrentlyOverloaded()'
    )]
    public static function API_RESOURCE_IS_CURRENTLY_OVERLOADED(): JsonErrorCodes
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.4', 'Using "%s" is deprecated, use "%s" instead.', __METHOD__, 'apiResourceIsCurrentlyOverloaded()');
        return static::apiResourceIsCurrentlyOverloaded();
    }

    /**
     * @return int[]
     */
    protected static function values(): array
    {
        return ['generalError' => 0,
            'unknownAccount' => 10001,
            'unknownApplication' => 10002,
            'unknownChannel' => 10003,
            'unknownGuild' => 10004,
            'unknownIntegration' => 10005,
            'unknownInvite' => 10006,
            'unknownMember' => 10007,
            'unknownMessage' => 10008,
            'unknownPermissionOverwrite' => 10009,
            'unknownProvider' => 10010,
            'unknownRole' => 10011,
            'unknownToken' => 10012,
            'unknownUser' => 10013,
            'unknownEmoji' => 10014,
            'unknownWebhook' => 10015,
            'unknownWebhookService' => 10016,
            'unknownSession' => 10020,
            'unknownBan' => 10026,
            'unknownSku' => 10027,
            'unknownStoreListing' => 10028,
            'unknownEntitlement' => 10029,
            'unknownBuild' => 10030,
            'unknownLobby' => 10031,
            'unknownBranch' => 10032,
            'unknownStoreDirectoryLayout' => 10033,
            'unknownRedistributable' => 10036,
            'unknownGiftCode' => 10038,
            'unknownStream' => 10049,
            'unknownPremiumServerSubscribeCooldown' => 10050,
            'unknownGuildTemplate' => 10057,
            'unknownDiscoverableServerCategory' => 10059,
            'unknownSticker' => 10060,
            'unknownInteraction' => 10062,
            'unknownApplicationCommand' => 10063,
            'unknownApplicationCommandPermissions' => 10066,
            'unknownStageInstance' => 10067,
            'unknownGuildMemberVerificationForm' => 10068,
            'unknownGuildWelcomeScreen' => 10069,
            'unknownGuildScheduledEvent' => 10070,
            'unknownGuildScheduledEventUser' => 10071,
            'botsCannotUseThisEndpoint' => 20001,
            'onlyBotsCanUseThisEndpoint' => 20002,
            'explicitContentCannotBeSentToTheDesiredRecipients' => 20009,
            'youAreNotAuthorizedToPerformThisActionOnThisApplication' => 20012,
            'thisActionCannotBePerformedDueToSlowmodeRateLimit' => 20016,
            'onlyTheOwnerOfThisAccountCanPerformThisAction' => 20018,
            'thisMessageCannotBeEditedDueToAnnouncementRateLimits' => 20022,
            'theChannelYouAreWritingHasHitTheWriteRateLimit' => 20028,
            'yourStageTopicServerNameServerDescriptionOrChannelNamesContainWordsThatAreNotAllowed' => 20031,
            'guildPremiumSubscriptionLevelTooLow' => 20035,
            'maximumNumberOfGuildsReached' => 30001,
            'maximumNumberOfFriendsReached' => 30002,
            'maximumNumberOfPinsReachedForTheChannel' => 30003,
            'maximumNumberOfRecipientsReached' => 30004,
            'maximumNumberOfGuildRolesReached' => 30005,
            'maximumNumberOfWebhooksReached' => 30007,
            'maximumNumberOfEmojisReached' => 30008,
            'maximumNumberOfReactionsReached' => 30010,
            'maximumNumberOfGuildChannelsReached' => 30013,
            'maximumNumberOfAttachmentsInAMessageReached' => 30015,
            'maximumNumberOfInvitesReached' => 30016,
            'maximumNumberOfAnimatedEmojisReached' => 30018,
            'maximumNumberOfServerMembersReached' => 30019,
            'maximumNumberOfServerCategoriesHasBeenReached' => 30030,
            'guildAlreadyHasATemplate' => 30031,
            'maxNumberOfThreadParticipantsHasBeenReached' => 30033,
            'maximumNumberOfBansForNonGuildMembersHaveBeenExceeded' => 30035,
            'maximumNumberOfBansFetchesHasBeenReached' => 30037,
            'maximumNumberOfStickersReached' => 30039,
            'unauthorizedProvideAValidTokenAndTryAgain' => 40001,
            'youNeedToVerifyYourAccountInOrderToPerformThisAction' => 40002,
            'youAreOpeningDirectMessagesTooFast' => 40003,
            'requestEntityTooLarge' => 40005,
            'thisFeatureHasBeenTemporarilyDisabledServerSide' => 40006,
            'theUserIsBannedFromThisGuild' => 40007,
            'targetUserIsNotConnectedToVoice' => 40032,
            'thisMessageHasAlreadyBeenCrossposted' => 40033,
            'anApplicationCommandWithThatNameAlreadyExists' => 40041,
            'missingAccess' => 50001,
            'invalidAccountType' => 50002,
            'cannotExecuteActionOnAdmChannel' => 50003,
            'guildWidgetDisabled' => 50004,
            'cannotEditAMessageAuthoredByAnotherUser' => 50005,
            'cannotSendAnEmptyMessage' => 50006,
            'cannotSendMessagesToThisUser' => 50007,
            'cannotSendMessagesInAVoiceChannel' => 50008,
            'channelVerificationLevelIsTooHighForYouToGainAccess' => 50009,
            'oAuth2ApplicationDoesNotHaveABot' => 50010,
            'oAuth2ApplicationLimitReached' => 50011,
            'invalidOAuth2State' => 50012,
            'youLackPermissionsToPerformThatAction' => 50013,
            'invalidAuthenticationTokenProvided' => 50014,
            'noteWasTooLong' => 50015,
            'providedTooFewOrTooManyMessagesToDelete' => 50016,
            'aMessageCanOnlyBePinnedToTheChannelItWasSentIn' => 50019,
            'inviteCodeWasEitherInvalidOrTaken' => 50020,
            'cannotExecuteActionOnASystemMessage' => 50021,
            'cannotExecuteActionOnThisChannelType' => 50024,
            'invalidOAuth2AccessTokenProvided' => 50025,
            'missingRequiredOAuth2Scope' => 50026,
            'invalidWebhookTokenProvided' => 50027,
            'invalidRole' => 50028,
            'invalidRecipientS' => 50033,
            'aMessageProvidedWasTooOldToBulkDelete' => 50034,
            'invalidFormBody' => 50035,
            'anInviteWasAcceptedToAGuildTheApplicationSBotIsNotIn' => 50036,
            'invalidApiVersionProvided' => 50041,
            'fileUploadedExceedsTheMaximumSize' => 50045,
            'invalidFileUploaded' => 50046,
            'cannotSelfRedeemThisGift' => 50054,
            'paymentSourceRequiredToRedeemGift' => 50070,
            'cannotDeleteAChannelRequiredForCommunityGuilds' => 50074,
            'invalidStickerSent' => 50081,
            'triedToPerformAnOperationOnAnArchivedThreadSuchAsEditingAMessageOrAddingAUserToTheThread' => 50083,
            'invalidThreadNotificationSettings' => 50084,
            'beforeValueIsEarlierThanTheThreadCreationDate' => 50085,
            'thisServerIsNotAvailableInYourLocation' => 50095,
            'thisServerNeedsMonetizationEnabledInOrderToPerformThisAction' => 50097,
            'twoFactorIsRequiredForThisOperation' => 60003,
            'noUsersWithDiscordTagExist' => 80004,
            'reactionWasBlocked' => 90001,
            'apiResourceIsCurrentlyOverloaded' => 130000,
            'theStageIsAlreadyOpen' => 150006,
            'aThreadHasAlreadyBeenCreatedForThisMessage' => 160004,
            'threadIsLocked' => 160005,
            'maximumNumberOfActiveThreadsReached' => 160006,
            'maximumNumberOfActiveAnnouncementThreadsReached' => 160007,
            'invalidJsonForUploadedLottieFile' => 170001,
            'uploadedLottiesCannotContainRasterizedImagesSuchAsPngOrJpeg' => 170002,
            'stickerMaximumFramerateExceeded' => 170003,
            'stickerFrameCountExceedsMaximumOf1000Frames' => 170004,
            'lottieAnimationMaximumDimensionsExceeded' => 170005,
            'stickerFrameRateIsEitherTooSmallOrTooLarge' => 170006,
            'stickerAnimationDurationExceedsMaximumOf5Seconds' => 170007,
        ];
    }
}