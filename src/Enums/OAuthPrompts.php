<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class OAuthPrompts
 * prompt controls how the authorization flow handles existing authorizations.
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @method static self consent() If a user has previously authorized your application with the requested scopes and prompt is set to consent, it will request them to reapprove their authorization
 * @method static self none() If set to none, it will skip the authorization screen and redirect them back to your redirect URI without requesting their authorization.
 *
 * @link https://github.com/spatie/enum
 */
class OAuthPrompts extends Enum
{
}