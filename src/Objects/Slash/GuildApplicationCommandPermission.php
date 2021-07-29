<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Objects\Traits\ApplicationIdTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\GuildIDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class GuildApplicationCommandPermission
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#application-command-permissions-object-guild-application-command-permissions-structure
 *
 * @version v0.9.4 As of 2021-07-29 Discord Documentation
 */
class GuildApplicationCommandPermission
{
    use IDTrait, ApplicationIdTrait, GuildIDTrait;

    /**
     * the permissions for the command in the guild
     * @var ApplicationCommandPermission[]|ArrayCollection|null
     */
    private $permissions;

    /**
     * @return ApplicationCommandPermission[]|null
     */
    public function getPermissions(): ?array
    {
        return $this->permissions;
    }

    /**
     * @param ApplicationCommandPermission[]|null $permissions
     * @return $this
     */
    public function setPermissions(?array $permissions): self
    {
        $this->permissions = $permissions;
        return $this;
    }

    /**
     * @param ApplicationCommandPermission $permission
     * @return $this
     */
    public function addPermission(ApplicationCommandPermission $permission): self
    {
        if (!$this->permissions->contains($permission)) {
            $this->permissions[] = $permission;
        }
        return $this;
    }
}