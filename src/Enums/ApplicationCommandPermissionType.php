<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\IntBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\IntBackedEnumTrait;
use JetBrains\PhpStorm\Deprecated;

/**
 * Class ApplicationCommandPermissionType
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#application-command-permissions-object-application-command-permission-type
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 */
enum ApplicationCommandPermissionType: int implements IntBackedEnumInterface
{
    use IntBackedEnumTrait;

    case ROLE = 1;
    case USER = 2;

    #[Deprecated('Since 0.15.0, use the enum variant', '%class%::ROLE')]
    public static function role(): ApplicationCommandPermissionType
    {
        return ApplicationCommandPermissionType::ROLE;
    }

    #[Deprecated('Since 0.15.0, use the enum variant', '%class%::USER')]
    public static function user(): ApplicationCommandPermissionType
    {
        return ApplicationCommandPermissionType::USER;
    }

    /**
     * @return int
     */
    public function jsonSerialize(): int
    {
        return $this->value;
    }
}
