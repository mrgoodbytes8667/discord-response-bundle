<?php


namespace Bytes\DiscordResponseBundle\Enums;



use Illuminate\Support\Arr;

/**
 * Class OAuthScopes
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @todo Refactor to be spatie/enum
 */
class OAuthScopes
{
    /**
     * for oauth2 bots, this puts the bot in the user's selected guild by default
     */
    const BOT = 'bot';

    /**
     * allows `/users/@me/connections` to return linked third-party accounts
     */
    const CONNECTIONS = 'connections';

    /**
     * enables `/users/@me` to return an email
     */
    const EMAIL = 'email';

    /**
     * allows `/users/@me` without email
     */
    const IDENTIFY = 'identify';

    /**
     * allows `/users/@me/guilds` to return basic information about all of a user's guilds
     */
    const GUILDS = 'guilds';

    /**
     * allows `/guilds/{guild.id}/members/{user.id}` to be used for joining users to a guild
     */
    const GUILDS_JOIN = 'guilds.join';

    /**
     * allows your app to join users to a group dm
     */
    const GDM_JOIN = 'gdm.join';

    /**
     * for local rpc server api access, this allows you to read messages from all client channels (otherwise restricted to channels/guilds your app creates)
     */
    const MESSAGES_READ = 'messages.read';

    /**
     * for local rpc server access, this allows you to control a user's local Discord client - whitelist only
     * @internal Whitelist only
     */
    const RPC = 'rpc';

    /**
     * for local rpc server api access, this allows you to access the API as the local user - whitelist only
     * @internal Whitelist only
     */
    const RPC_API = 'rpc.api';

    /**
     * for local rpc server api access, this allows you to receive notifications pushed out to the user - whitelist only
     * @internal Whitelist only
     */
    const RPC_NOTIFICATIONS_READ = 'rpc.notifications.read';

    /**
     * this generates a webhook that is returned in the oauth token response for authorization code grants
     */
    const WEBHOOK_INCOMING = 'webhook.incoming';

    /**
     * allows your app to upload/update builds for a user's applications - whitelist only
     * @internal Whitelist only
     */
    const APPLICATIONS_BUILDS_UPLOAD = 'applications.builds.upload';

    /**
     * allows your app to read build data for a user's applications
     */
    const APPLICATIONS_BUILDS_READ = 'applications.builds.read';

    /**
     * allows your app to read and update store data (SKUs, store listings, achievements, etc.) for a user's applications
     */
    const APPLICATIONS_STORE_UPDATE = 'applications.store.update';

    /**
     * allows your app to read entitlements for a user's applications
     */
    const APPLICATIONS_ENTITLEMENTS = 'applications.entitlements';

    /**
     * allows your app to know a user's friends and implicit relationships - whitelist only
     * @internal Whitelist only
     */
    const RELATIONSHIPS_READ = 'relationships.read';

    /**
     * allows your app to fetch data from a user's "Now Playing/Recently Played" list - whitelist only
     * @internal Whitelist only
     */
    const ACTIVITIES_READ = 'activities.read';

    /**
     * allows your app to update a user's activity - whitelist only (NOT REQUIRED FOR GAMESDK ACTIVITIY MANAGER)
     * @internal Whitelist only
     */
    const ACTIVITIES_WRITE = 'activities.write';

    /**
     * @return string[]
     */
    public static function allNames()
    {
        return static::all();
    }

    /**
     * @return string[]
     */
    public static function all()
    {
        return [
            static::BOT,
            static::CONNECTIONS,
            static::EMAIL,
            static::IDENTIFY,
            static::GUILDS,
            static::GUILDS_JOIN,
            static::GDM_JOIN,
            static::MESSAGES_READ,
//            static::RPC,
//            static::RPC_API,
//            static::RPC_NOTIFICATIONS_READ,
            static::WEBHOOK_INCOMING,
//            static::APPLICATIONS_BUILDS_UPLOAD,
            static::APPLICATIONS_BUILDS_READ,
            static::APPLICATIONS_STORE_UPDATE,
            static::APPLICATIONS_ENTITLEMENTS,
//            static::RELATIONSHIPS_READ,
//            static::ACTIVITIES_READ,
//            static::ACTIVITIES_WRITE,
        ];
    }

    /**
     * @param int|string $value
     * @return string
     */
    public static function getName($value)
    {
        return $value;
    }

    /**
     * @param mixed ...$scopes
     * @return string
     */
    public static function buildOAuthString(...$scopes)
    {
        return implode(' ', Arr::flatten($scopes));
    }

    /**
     * @return string[]
     */
    public static function getUserScopes()
    {
        return [
            OAuthScopes::IDENTIFY,
            OAuthScopes::CONNECTIONS,
            OAuthScopes::GUILDS,
        ];
    }

    /**
     * @return string[]
     */
    public static function getBotScopes()
    {
        return [
            OAuthScopes::IDENTIFY,
            OAuthScopes::CONNECTIONS,
            OAuthScopes::GUILDS,
            OAuthScopes::BOT
        ];
    }
}