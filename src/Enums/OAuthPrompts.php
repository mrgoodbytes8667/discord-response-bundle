<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;
use Bytes\ResponseBundle\Routing\OAuthPromptInterface;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class OAuthPrompts
 * prompt controls how the authorization flow handles existing authorizations.
 * @package Bytes\DiscordResponseBundle\Enums
 */
enum OAuthPrompts: string implements StringBackedEnumInterface, OAuthPromptInterface
{
    use StringBackedEnumTrait;

    /**
     * If a user has previously authorized your application with the requested scopes and prompt is set to consent, it will request them to reapprove their authorization
     */
    case CONSENT = 'consent';

    /**
     * If set to none, it will skip the authorization screen and redirect them back to your redirect URI without requesting their authorization.
     */
    case NONE = 'none';

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::CONSENT')]
    public static function consent(): OAuthPrompts
    {
        return OAuthPrompts::CONSENT;
    }

    #[Deprecated('Since mrgoodbytes8667/discord-response-bundle v0.15.0, use the enum variant', '%class%::NONE')]
    public static function none(): OAuthPrompts
    {
        return OAuthPrompts::NONE;
    }

    /**
     * Returns the prompt value
     * @return string
     */
    public function prompt()
    {
        return $this->value;
    }
}
