<?php


namespace Bytes\DiscordResponseBundle\Enums;


/**
 * Class OAuthPrompts
 * prompt controls how the authorization flow handles existing authorizations.
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @todo Refactor to be spatie/enum
 */
class OAuthPrompts
{
    /**
     * If a user has previously authorized your application with the requested scopes and prompt is set to consent, it will request them to reapprove their authorization
     */
    const CONSENT = 'consent';

    /**
     * If set to none, it will skip the authorization screen and redirect them back to your redirect URI without requesting their authorization.
     */
    const NONE = 'none';

    /**
     * @param int|string $value
     * @return mixed|string
     */
    public static function getName($value)
    {
        return static::allNames()[$value];
    }

    /**
     * @return string[]
     */
    public static function allNames()
    {
        return static::all();
    }

    /**
     * @return int[]|string[]
     */
    public static function all()
    {
        return [
            static::CONSENT,
            static::NONE,
        ];
    }
}