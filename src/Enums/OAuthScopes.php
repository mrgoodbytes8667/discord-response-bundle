<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class OAuthScopes
 * @package Bytes\DiscordResponseBundle\Enums
 *
 *
 * @version v0.7.0 As of 2021-03-17 Discord Documentation
 */
enum OAuthScopes: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    /**
     * for oauth2 bots, this puts the bot in the user's selected guild by default
     */
    case BOT = 'bot';

    /**
     * allows `/users/@me/connections` to return linked third-party accounts
     */
    case CONNECTIONS = 'connections';

    /**
     * enables `/users/@me` to return an email
     */
    case EMAIL = 'email';

    /**
     * allows `/users/@me` without email
     */
    case IDENTIFY = 'identify';

    /**
     * allows `/users/@me/guilds` to return basic information about all of a user's guilds
     */
    case GUILDS = 'guilds';

    /**
     * allows `/guilds/{guild.id}/members/{user.id}` to be used for joining users to a guild
     */
    case GUILDS_JOIN = 'guilds.join';

    /**
     * allows your app to join users to a group dm
     */
    case GDM_JOIN = 'gdm.join';

    /**
     * for local rpc server api access, this allows you to read messages from all client channels (otherwise restricted to channels/guilds your app creates)
     */
    case MESSAGES_READ = 'messages.read';

    /**
     * for local rpc server access, this allows you to control a user's local Discord client - whitelist only
     */
    case RPC = 'rpc';

    /**
     * for local rpc server api access, this allows you to access the API as the local user - whitelist only
     */
    case RPC_API = 'rpc.api';

    /**
     * for local rpc server api access, this allows you to receive notifications pushed out to the user - whitelist only
     */
    case RPC_NOTIFICATIONS_READ = 'rpc.notifications.read';

    /**
     * this generates a webhook that is returned in the oauth token response for authorization code grants
     */
    case WEBHOOK_INCOMING = 'webhook.incoming';

    /**
     * allows your app to upload/update builds for a user's applications - whitelist only
     */
    case APPLICATIONS_BUILDS_UPLOAD = 'applications.builds.upload';

    /**
     * allows your app to read build data for a user's applications
     */
    case APPLICATIONS_BUILDS_READ = 'applications.builds.read';

    /**
     * allows your app to read and update store data (SKUs, store listings, achievements, etc.) for a user's applications
     */
    case APPLICATIONS_STORE_UPDATE = 'applications.store.update';

    /**
     * allows your app to read entitlements for a user's applications
     */
    case APPLICATIONS_ENTITLEMENTS = 'applications.entitlements';

    /**
     * allows your app to know a user's friends and implicit relationships - whitelist only
     */
    case RELATIONSHIPS_READ = 'relationships.read';

    /**
     * allows your app to fetch data from a user's 'Now Playing/Recently Played' list - whitelist only
     */
    case ACTIVITIES_READ = 'activities.read';

    /**
     * allows your app to update a user's activity - whitelist only (NOT REQUIRED FOR GAMESDK ACTIVITIY MANAGER) (Whitelist only)
     */
    case ACTIVITIES_WRITE = 'activities.write';

    /**
     * allows your app to use Slash Commands in a guild
     */
    case APPLICATIONS_COMMANDS = 'applications.commands';

    /**
     * allows your app to update its Slash Commands via this bearer token - client credentials grant onl
     */
    case APPLICATIONS_COMMANDS_UPDATE = 'applications.commands.update';

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::EMAIL')]
    public static function EMAIL(): OAuthScopes
    {
        return OAuthScopes::EMAIL;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::GUILDS_JOIN')]
    public static function GUILDS_JOIN(): OAuthScopes
    {
        return OAuthScopes::GUILDS_JOIN;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::GDM_JOIN')]
    public static function GDM_JOIN(): OAuthScopes
    {
        return OAuthScopes::GDM_JOIN;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::MESSAGES_READ')]
    public static function MESSAGES_READ(): OAuthScopes
    {
        return OAuthScopes::MESSAGES_READ;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::RPC')]
    public static function RPC(): OAuthScopes
    {
        return OAuthScopes::RPC;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::RPC_API')]
    public static function RPC_API(): OAuthScopes
    {
        return OAuthScopes::RPC_API;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::RPC_NOTIFICATIONS_READ')]
    public static function RPC_NOTIFICATIONS_READ(): OAuthScopes
    {
        return OAuthScopes::RPC_NOTIFICATIONS_READ;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::WEBHOOK_INCOMING')]
    public static function WEBHOOK_INCOMING(): OAuthScopes
    {
        return OAuthScopes::WEBHOOK_INCOMING;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::APPLICATIONS_BUILDS_UPLOAD')]
    public static function APPLICATIONS_BUILDS_UPLOAD(): OAuthScopes
    {
        return OAuthScopes::APPLICATIONS_BUILDS_UPLOAD;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::APPLICATIONS_BUILDS_READ')]
    public static function APPLICATIONS_BUILDS_READ(): OAuthScopes
    {
        return OAuthScopes::APPLICATIONS_BUILDS_READ;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::APPLICATIONS_STORE_UPDATE')]
    public static function APPLICATIONS_STORE_UPDATE(): OAuthScopes
    {
        return OAuthScopes::APPLICATIONS_STORE_UPDATE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::APPLICATIONS_ENTITLEMENTS')]
    public static function APPLICATIONS_ENTITLEMENTS(): OAuthScopes
    {
        return OAuthScopes::APPLICATIONS_ENTITLEMENTS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::RELATIONSHIPS_READ')]
    public static function RELATIONSHIPS_READ(): OAuthScopes
    {
        return OAuthScopes::RELATIONSHIPS_READ;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::ACTIVITIES_READ')]
    public static function ACTIVITIES_READ(): OAuthScopes
    {
        return OAuthScopes::ACTIVITIES_READ;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::ACTIVITIES_WRITE')]
    public static function ACTIVITIES_WRITE(): OAuthScopes
    {
        return OAuthScopes::ACTIVITIES_WRITE;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::APPLICATIONS_COMMANDS_UPDATE')]
    public static function APPLICATIONS_COMMANDS_UPDATE(): OAuthScopes
    {
        return OAuthScopes::APPLICATIONS_COMMANDS_UPDATE;
    }

    /**
     * @return string[]
     */
    public static function getLoginScopes(): array
    {
        return static::getUserScopes();
    }

    /**
     * @return string[]
     */
    public static function getUserScopes()
    {
        return [
            static::IDENTIFY->value,
            static::CONNECTIONS->value,
            static::GUILDS->value,
        ];
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::IDENTIFY')]
    public static function IDENTIFY(): OAuthScopes
    {
        return OAuthScopes::IDENTIFY;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CONNECTIONS')]
    public static function CONNECTIONS(): OAuthScopes
    {
        return OAuthScopes::CONNECTIONS;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::GUILDS')]
    public static function GUILDS(): OAuthScopes
    {
        return OAuthScopes::GUILDS;
    }

    /**
     * @return string[]
     */
    public static function getBotSlashScopes()
    {
        return array_merge(static::getBotScopes(), static::getSlashScopes());
    }

    /**
     * @return string[]
     */
    public static function getBotScopes()
    {
        return [
            static::IDENTIFY->value,
            static::CONNECTIONS->value,
            static::GUILDS->value,
            static::BOT->value
        ];
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::BOT')]
    public static function BOT(): OAuthScopes
    {
        return OAuthScopes::BOT;
    }

    /**
     * @return string[]
     */
    public static function getSlashScopes()
    {
        return [
            static::APPLICATIONS_COMMANDS->value,
        ];
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::APPLICATIONS_COMMANDS')]
    public static function APPLICATIONS_COMMANDS(): OAuthScopes
    {
        return OAuthScopes::APPLICATIONS_COMMANDS;
    }
}
