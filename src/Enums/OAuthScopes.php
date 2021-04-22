<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;
use Illuminate\Support\Arr;

/**
 * Class OAuthScopes
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @method static self BOT() for oauth2 bots, this puts the bot in the user's selected guild by default
 * @method static self CONNECTIONS() allows `/users/@me/connections` to return linked third-party accounts
 * @method static self EMAIL() enables `/users/@me` to return an email
 * @method static self IDENTIFY() allows `/users/@me` without email
 * @method static self GUILDS() allows `/users/@me/guilds` to return basic information about all of a user's guilds
 * @method static self GUILDS_JOIN() allows `/guilds/{guild.id}/members/{user.id}` to be used for joining users to a guild
 * @method static self GDM_JOIN() allows your app to join users to a group dm
 * @method static self MESSAGES_READ() for local rpc server api access, this allows you to read messages from all client channels (otherwise restricted to channels/guilds your app creates)
 * @method static self RPC() for local rpc server access, this allows you to control a user's local Discord client - whitelist only
 * @method static self RPC_API() for local rpc server api access, this allows you to access the API as the local user - whitelist only
 * @method static self RPC_NOTIFICATIONS_READ() for local rpc server api access, this allows you to receive notifications pushed out to the user - whitelist only
 * @method static self WEBHOOK_INCOMING() this generates a webhook that is returned in the oauth token response for authorization code grants
 * @method static self APPLICATIONS_BUILDS_UPLOAD() allows your app to upload/update builds for a user's applications - whitelist only
 * @method static self APPLICATIONS_BUILDS_READ() allows your app to read build data for a user's applications
 * @method static self APPLICATIONS_STORE_UPDATE() allows your app to read and update store data (SKUs, store listings, achievements, etc.) for a user's applications
 * @method static self APPLICATIONS_ENTITLEMENTS() allows your app to read entitlements for a user's applications
 * @method static self RELATIONSHIPS_READ() allows your app to know a user's friends and implicit relationships - whitelist only
 * @method static self ACTIVITIES_READ() allows your app to fetch data from a user's 'Now Playing/Recently Played' list - whitelist only
 * @method static self ACTIVITIES_WRITE() allows your app to update a user's activity - whitelist only (NOT REQUIRED FOR GAMESDK ACTIVITIY MANAGER) (Whitelist only)
 * @method static self APPLICATIONS_COMMANDS() allows your app to use Slash Commands in a guild
 * @method static self APPLICATIONS_COMMANDS_UPDATE() allows your app to update its Slash Commands via this bearer token - client credentials grant only
 *
 * @todo Refactor these to proper camel case functions
 *
 * @link https://github.com/spatie/enum
 *
 * @version v0.7.0 As of 2021-03-17 Discord Documentation
 */
class OAuthScopes extends Enum
{

    /**
     * @param mixed ...$scopes
     * @return string
     *
     * @deprecated Since 0.9.0, use \Bytes\ResponseBundle\HttpClient\AbstractClient::buildOAuthString() instead from mrgoodbytes8667/response-bundle
     */
    public static function buildOAuthString(...$scopes)
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.9.0', 'Using "%s" is deprecated, use "%s" in "mrgoodbytes8667/response-bundle" instead.', __METHOD__, '\Bytes\ResponseBundle\HttpClient\AbstractClient::buildOAuthString()');
        return implode(' ', Arr::flatten($scopes));
    }

    /**
     * @return string[]
     */
    public static function getUserScopes()
    {
        return [
            static::IDENTIFY()->value,
            static::CONNECTIONS()->value,
            static::GUILDS()->value,
        ];
    }

    /**
     * @return string[]
     */
    public static function getBotScopes()
    {
        return [
            static::IDENTIFY()->value,
            static::CONNECTIONS()->value,
            static::GUILDS()->value,
            static::BOT()->value
        ];
    }

    /**
     * @return string[]
     */
    public static function getSlashScopes()
    {
        return [
            static::APPLICATIONS_COMMANDS()->value,
        ];
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
    protected static function values(): array
    {
        return [
            'BOT' => 'bot',
            'CONNECTIONS' => 'connections',
            'EMAIL' => 'email',
            'IDENTIFY' => 'identify',
            'GUILDS' => 'guilds',
            'GUILDS_JOIN' => 'guilds.join',
            'GDM_JOIN' => 'gdm.join',
            'MESSAGES_READ' => 'messages.read',
            'RPC' => 'rpc',
            'RPC_API' => 'rpc.api',
            'RPC_NOTIFICATIONS_READ' => 'rpc.notifications.read',
            'WEBHOOK_INCOMING' => 'webhook.incoming',
            'APPLICATIONS_BUILDS_UPLOAD' => 'applications.builds.upload',
            'APPLICATIONS_BUILDS_READ' => 'applications.builds.read',
            'APPLICATIONS_STORE_UPDATE' => 'applications.store.update',
            'APPLICATIONS_ENTITLEMENTS' => 'applications.entitlements',
            'RELATIONSHIPS_READ' => 'relationships.read',
            'ACTIVITIES_READ' => 'activities.read',
            'ACTIVITIES_WRITE' => 'activities.write',
            'APPLICATIONS_COMMANDS' => 'applications.commands',
            'APPLICATIONS_COMMANDS_UPDATE' => 'applications.commands.update',
        ];
    }

    /**
     * @return string[]
     * @deprecated Only included for backwards compatibility
     */
    protected static function labels(): array
    {
        return [
            'BOT' => 'BOT',
            'CONNECTIONS' => 'CONNECTIONS',
            'EMAIL' => 'EMAIL',
            'IDENTIFY' => 'IDENTIFY',
            'GUILDS' => 'GUILDS',
            'GUILDS_JOIN' => 'GUILDS_JOIN',
            'GDM_JOIN' => 'GDM_JOIN',
            'MESSAGES_READ' => 'MESSAGES_READ',
            'RPC' => 'RPC',
            'RPC_API' => 'RPC_API',
            'RPC_NOTIFICATIONS_READ' => 'RPC_NOTIFICATIONS_READ',
            'WEBHOOK_INCOMING' => 'WEBHOOK_INCOMING',
            'APPLICATIONS_BUILDS_UPLOAD' => 'APPLICATIONS_BUILDS_UPLOAD',
            'APPLICATIONS_BUILDS_READ' => 'APPLICATIONS_BUILDS_READ',
            'APPLICATIONS_STORE_UPDATE' => 'APPLICATIONS_STORE_UPDATE',
            'APPLICATIONS_ENTITLEMENTS' => 'APPLICATIONS_ENTITLEMENTS',
            'RELATIONSHIPS_READ' => 'RELATIONSHIPS_READ',
            'ACTIVITIES_READ' => 'ACTIVITIES_READ',
            'ACTIVITIES_WRITE' => 'ACTIVITIES_WRITE',
            'APPLICATIONS_COMMANDS' => 'APPLICATIONS_COMMANDS',
            'APPLICATIONS_COMMANDS_UPDATE' => 'APPLICATIONS_COMMANDS_UPDATE',
        ];
    }
}