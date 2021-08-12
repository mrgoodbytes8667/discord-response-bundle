<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandOptionType;
use Bytes\DiscordResponseBundle\Enums\JsonErrorCodes;
use Bytes\Tests\Common\DataProvider\NullProviderTrait;
use Generator;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Phpunit\EnumAssertions;

/**
 * Class JsonErrorCodesTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 *
 * @covers \Bytes\DiscordResponseBundle\Enums\JsonErrorCodes
 */
class JsonErrorCodesTest extends TestCase
{
    use EnumAssertions, NullProviderTrait;

    /**
     * @dataProvider provideEnums
     * @param string $value
     * @param JsonErrorCodes $enum
     */
    public function testEnums($value, JsonErrorCodes $enum)
    {
        $this->assertTrue(JsonErrorCodes::isValid($value));
        $type = JsonErrorCodes::from($value);
        $this->assertSameEnum($enum, $type);
        $this->assertSameEnumLabel($enum, $type->label);
        $this->assertSameEnumValue($enum, $type->value);
    }

    /**
     * @return Generator
     */
    public function provideEnums()
    {
        yield ['value' => 'generalError', 'enum' => JsonErrorCodes::generalError()];
        yield ['value' => 'invalidOAuth2AccessTokenProvided', 'enum' => JsonErrorCodes::invalidOAuth2AccessTokenProvided()];
        yield ['value' => 0, 'enum' => JsonErrorCodes::generalError()];
        yield ['value' => 50025, 'enum' => JsonErrorCodes::invalidOAuth2AccessTokenProvided()];
    }

    /**
     *
     */
    public function testInvalidEnums()
    {
        $this->assertFalse(ApplicationCommandOptionType::isValid('abc'));
    }

    /**
     * @return Generator
     */
    public function provideUnknownEnums()
    {
        yield [JsonErrorCodes::unknownEmoji()];
        yield [JsonErrorCodes::unknownBan()];
    }

    /**
     * @return Generator
     */
    public function provideValidEnums()
    {
        yield [JsonErrorCodes::generalError()];
        yield [JsonErrorCodes::invalidOAuth2AccessTokenProvided()];
    }

    /**
     * @dataProvider provideUnknownEnums
     * @param JsonErrorCodes $enum
     */
    public function testIsUnknownTrue(JsonErrorCodes $enum)
    {
        $this->assertTrue(JsonErrorCodes::isUnknownCodeType($enum));
    }

    /**
     * @dataProvider provideValidEnums
     * @dataProvider provideNull
     * @param JsonErrorCodes|null $enum
     */
    public function testIsUnknownFalse(?JsonErrorCodes $enum)
    {
        $this->assertFalse(JsonErrorCodes::isUnknownCodeType($enum));
    }

    /**
     * @group legacy
     */
    public function testDeprecatedMethods()
    {
        $this->assertSameEnumValue(JsonErrorCodes::GENERAL_ERROR(), JsonErrorCodes::generalError()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_ACCOUNT(), JsonErrorCodes::unknownAccount()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_APPLICATION(), JsonErrorCodes::unknownApplication()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_CHANNEL(), JsonErrorCodes::unknownChannel()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_GUILD(), JsonErrorCodes::unknownGuild()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_INTEGRATION(), JsonErrorCodes::unknownIntegration()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_INVITE(), JsonErrorCodes::unknownInvite()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_MEMBER(), JsonErrorCodes::unknownMember()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_MESSAGE(), JsonErrorCodes::unknownMessage()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_PERMISSION_OVERWRITE(), JsonErrorCodes::unknownPermissionOverwrite()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_PROVIDER(), JsonErrorCodes::unknownProvider()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_ROLE(), JsonErrorCodes::unknownRole()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_TOKEN(), JsonErrorCodes::unknownToken()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_USER(), JsonErrorCodes::unknownUser()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_EMOJI(), JsonErrorCodes::unknownEmoji()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_WEBHOOK(), JsonErrorCodes::unknownWebhook()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_BAN(), JsonErrorCodes::unknownBan()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_SKU(), JsonErrorCodes::unknownSku()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_STORE_LISTING(), JsonErrorCodes::unknownStoreListing()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_ENTITLEMENT(), JsonErrorCodes::unknownEntitlement()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_BUILD(), JsonErrorCodes::unknownBuild()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_LOBBY(), JsonErrorCodes::unknownLobby()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_BRANCH(), JsonErrorCodes::unknownBranch()->value);
        $this->assertSameEnumValue(JsonErrorCodes::UNKNOWN_REDISTRIBUTABLE(), JsonErrorCodes::unknownRedistributable()->value);
        $this->assertSameEnumValue(JsonErrorCodes::BOTS_CANNOT_USE_THIS_ENDPOINT(), JsonErrorCodes::botsCannotUseThisEndpoint()->value);
        $this->assertSameEnumValue(JsonErrorCodes::ONLY_BOTS_CAN_USE_THIS_ENDPOINT(), JsonErrorCodes::onlyBotsCanUseThisEndpoint()->value);
        $this->assertSameEnumValue(JsonErrorCodes::MAXIMUM_NUMBER_OF_GUILDS_REACHED(), JsonErrorCodes::maximumNumberOfGuildsReached()->value);
        $this->assertSameEnumValue(JsonErrorCodes::MAXIMUM_NUMBER_OF_FRIENDS_REACHED(), JsonErrorCodes::maximumNumberOfFriendsReached()->value);
        $this->assertSameEnumValue(JsonErrorCodes::MAXIMUM_NUMBER_OF_PINS_REACHED_FOR_THE_CHANNEL(), JsonErrorCodes::maximumNumberOfPinsReachedForTheChannel()->value);
        $this->assertSameEnumValue(JsonErrorCodes::MAXIMUM_NUMBER_OF_GUILD_ROLES_REACHED(), JsonErrorCodes::maximumNumberOfGuildRolesReached()->value);
        $this->assertSameEnumValue(JsonErrorCodes::MAXIMUM_NUMBER_OF_WEBHOOKS_REACHED(), JsonErrorCodes::maximumNumberOfWebhooksReached()->value);
        $this->assertSameEnumValue(JsonErrorCodes::MAXIMUM_NUMBER_OF_REACTIONS_REACHED(), JsonErrorCodes::maximumNumberOfReactionsReached()->value);
        $this->assertSameEnumValue(JsonErrorCodes::MAXIMUM_NUMBER_OF_GUILD_CHANNELS_REACHED(), JsonErrorCodes::maximumNumberOfGuildChannelsReached()->value);
        $this->assertSameEnumValue(JsonErrorCodes::MAXIMUM_NUMBER_OF_ATTACHMENTS_IN_A_MESSAGE_REACHED(), JsonErrorCodes::maximumNumberOfAttachmentsInAMessageReached()->value);
        $this->assertSameEnumValue(JsonErrorCodes::MAXIMUM_NUMBER_OF_INVITES_REACHED(), JsonErrorCodes::maximumNumberOfInvitesReached()->value);
        $this->assertSameEnumValue(JsonErrorCodes::YOU_NEED_TO_VERIFY_YOUR_ACCOUNT_IN_ORDER_TO_PERFORM_THIS_ACTION(), JsonErrorCodes::youNeedToVerifyYourAccountInOrderToPerformThisAction()->value);
        $this->assertSameEnumValue(JsonErrorCodes::REQUEST_ENTITY_TOO_LARGE(), JsonErrorCodes::requestEntityTooLarge()->value);
        $this->assertSameEnumValue(JsonErrorCodes::THIS_FEATURE_HAS_BEEN_TEMPORARILY_DISABLED_SERVER_SIDE(), JsonErrorCodes::thisFeatureHasBeenTemporarilyDisabledServerSide()->value);
        $this->assertSameEnumValue(JsonErrorCodes::THE_USER_IS_BANNED_FROM_THIS_GUILD(), JsonErrorCodes::theUserIsBannedFromThisGuild()->value);
        $this->assertSameEnumValue(JsonErrorCodes::MISSING_ACCESS(), JsonErrorCodes::missingAccess()->value);
        $this->assertSameEnumValue(JsonErrorCodes::INVALID_ACCOUNT_TYPE(), JsonErrorCodes::invalidAccountType()->value);
        $this->assertSameEnumValue(JsonErrorCodes::CANNOT_EXECUTE_ACTION_ON_A_DM_CHANNEL(), JsonErrorCodes::cannotExecuteActionOnADmChannel()->value);
        $this->assertSameEnumValue(JsonErrorCodes::GUILD_WIDGET_DISABLED(), JsonErrorCodes::guildWidgetDisabled()->value);
        $this->assertSameEnumValue(JsonErrorCodes::CANNOT_EDIT_A_MESSAGE_AUTHORED_BY_ANOTHER_USER(), JsonErrorCodes::cannotEditAMessageAuthoredByAnotherUser()->value);
        $this->assertSameEnumValue(JsonErrorCodes::CANNOT_SEND_AN_EMPTY_MESSAGE(), JsonErrorCodes::cannotSendAnEmptyMessage()->value);
        $this->assertSameEnumValue(JsonErrorCodes::CANNOT_SEND_MESSAGES_TO_THIS_USER(), JsonErrorCodes::cannotSendMessagesToThisUser()->value);
        $this->assertSameEnumValue(JsonErrorCodes::CANNOT_SEND_MESSAGES_IN_A_VOICE_CHANNEL(), JsonErrorCodes::cannotSendMessagesInAVoiceChannel()->value);
        $this->assertSameEnumValue(JsonErrorCodes::CHANNEL_VERIFICATION_LEVEL_IS_TOO_HIGH_FOR_YOU_TO_GAIN_ACCESS(), JsonErrorCodes::channelVerificationLevelIsTooHighForYouToGainAccess()->value);
        $this->assertSameEnumValue(JsonErrorCodes::OAUTH2_APPLICATION_DOES_NOT_HAVE_A_BOT(), JsonErrorCodes::oauth2ApplicationDoesNotHaveABot()->value);
        $this->assertSameEnumValue(JsonErrorCodes::OAUTH2_APPLICATION_LIMIT_REACHED(), JsonErrorCodes::oauth2ApplicationLimitReached()->value);
        $this->assertSameEnumValue(JsonErrorCodes::INVALID_OAUTH2_STATE(), JsonErrorCodes::invalidOauth2State()->value);
        $this->assertSameEnumValue(JsonErrorCodes::YOU_LACK_PERMISSIONS_TO_PERFORM_THAT_ACTION(), JsonErrorCodes::youLackPermissionsToPerformThatAction()->value);
        $this->assertSameEnumValue(JsonErrorCodes::INVALID_AUTHENTICATION_TOKEN_PROVIDED(), JsonErrorCodes::invalidAuthenticationTokenProvided()->value);
        $this->assertSameEnumValue(JsonErrorCodes::NOTE_WAS_TOO_LONG(), JsonErrorCodes::noteWasTooLong()->value);
        $this->assertSameEnumValue(JsonErrorCodes::PROVIDED_TOO_FEW_OR_TOO_MANY_MESSAGES_TO_DELETE(), JsonErrorCodes::providedTooFewOrTooManyMessagesToDelete()->value);
        $this->assertSameEnumValue(JsonErrorCodes::A_MESSAGE_CAN_ONLY_BE_PINNED_TO_THE_CHANNEL_IT_WAS_SENT_IN(), JsonErrorCodes::aMessageCanOnlyBePinnedToTheChannelItWasSentIn()->value);
        $this->assertSameEnumValue(JsonErrorCodes::INVITE_CODE_WAS_EITHER_INVALID_OR_TAKEN(), JsonErrorCodes::inviteCodeWasEitherInvalidOrTaken()->value);
        $this->assertSameEnumValue(JsonErrorCodes::CANNOT_EXECUTE_ACTION_ON_A_SYSTEM_MESSAGE(), JsonErrorCodes::cannotExecuteActionOnASystemMessage()->value);
        $this->assertSameEnumValue(JsonErrorCodes::INVALID_OAUTH2_ACCESS_TOKEN_PROVIDED(), JsonErrorCodes::invalidOauth2AccessTokenProvided()->value);
        $this->assertSameEnumValue(JsonErrorCodes::A_MESSAGE_PROVIDED_WAS_TOO_OLD_TO_BULK_DELETE(), JsonErrorCodes::aMessageProvidedWasTooOldToBulkDelete()->value);
        $this->assertSameEnumValue(JsonErrorCodes::INVALID_FORM_BODY(), JsonErrorCodes::invalidFormBody()->value);
        $this->assertSameEnumValue(JsonErrorCodes::AN_INVITE_WAS_ACCEPTED_TO_A_GUILD_THE_APPLICATIONS_BOT_IS_NOT_IN(), JsonErrorCodes::anInviteWasAcceptedToAGuildTheApplicationsBotIsNotIn()->value);
        $this->assertSameEnumValue(JsonErrorCodes::INVALID_API_VERSION_PROVIDED(), JsonErrorCodes::invalidApiVersionProvided()->value);
        $this->assertSameEnumValue(JsonErrorCodes::REACTION_WAS_BLOCKED(), JsonErrorCodes::reactionWasBlocked()->value);
        $this->assertSameEnumValue(JsonErrorCodes::API_RESOURCE_IS_CURRENTLY_OVERLOADED(), JsonErrorCodes::apiResourceIsCurrentlyOverloaded()->value);
    }
}