<?php


namespace Bytes\DiscordResponseBundle\Enums;


use Bytes\EnumSerializerBundle\Enums\Enum;

/**
 * Class ApplicationCommandPermissionType
 * @package Bytes\DiscordResponseBundle\Enums
 *
 * @method static self role()
 * @method static self user()
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#application-command-permissions-object-application-command-permission-type
 *
 * @version v0.9.6 As of 2021-07-30 Discord Documentation
 */
class ApplicationCommandPermissionType extends Enum
{

    /**
     * @return int[]
     */
    protected static function values(): array
    {
        return [
            "role" => 1,
            "user" => 2,
        ];
    }

    /**
     * @return int
     */
    public function jsonSerialize()
    {
        return $this->value;
    }
}