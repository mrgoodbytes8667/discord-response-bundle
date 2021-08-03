<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Objects\Interfaces\ApplicationCommandInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ApplicationIdTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\GuildIDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\DiscordResponseBundle\Services\IdNormalizer;
use Bytes\ResponseBundle\Interfaces\IdInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PartialGuildApplicationCommandPermission
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @property string|null $id the id of the command
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#application-command-permissions-object-guild-application-command-permissions-structure
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 */
class PartialGuildApplicationCommandPermission
{
    use IDTrait;

    /**
     * the permissions for the command in the guild
     * @var ApplicationCommandPermission[]|null
     */
    private $permissions;

    /**
     * @param ApplicationCommandInterface|IdInterface|string $id the id of the command
     * @param ApplicationCommandPermission[] $permissions
     * @return static
     */
    public static function create(ApplicationCommandInterface|IdInterface|string $id, array $permissions = []): static {
        $id = IdNormalizer::normalizeCommandIdArgument($id, 'The "id" argument is required and cannot be blank.');
        $static = new static();
        return $static->setId($id)
            ->setPermissions($permissions);
    }

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
        $permissions = new ArrayCollection($this->permissions);
        if (!$permissions->contains($permission)) {
            $this->permissions[] = $permission;
        }
        return $this;
    }
}