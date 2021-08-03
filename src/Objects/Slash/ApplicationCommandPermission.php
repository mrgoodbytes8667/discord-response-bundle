<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandPermissionType;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;

/**
 * Class ApplicationCommandPermission
 * Application command permissions allow you to enable or disable commands for specific users or roles within a guild.
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#application-command-permissions-object-application-command-permissions-structure
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 *
 * @property string|null $id the id of the role or user
 */
class ApplicationCommandPermission
{
    use IDTrait;

    /**
     * @var int|null role or user
     */
    private $type;

    /**
     * true to allow, false, to disallow
     * @var bool|null
     */
    private $permission;

    /**
     * @param string $snowflake
     * @param ApplicationCommandPermissionType $type
     * @param bool $permission
     * @return static
     */
    public static function create(string $snowflake, ApplicationCommandPermissionType $type, bool $permission = true): static
    {
        $static = new static();
        $static->setId($snowflake)
            ->setType($type)
            ->setPermission($permission);
        return $static;
    }

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param ApplicationCommandPermissionType|int|null $type
     * @return $this
     */
    public function setType($type): self
    {
        if ($type instanceof ApplicationCommandPermissionType) {
            $type = $type->value;
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool|null true to allow, false, to disallow
     */
    public function getPermission(): ?bool
    {
        return $this->permission;
    }

    /**
     * @param bool|null $permission true to allow, false, to disallow
     * @return $this
     */
    public function setPermission(?bool $permission): self
    {
        $this->permission = $permission;
        return $this;
    }
}