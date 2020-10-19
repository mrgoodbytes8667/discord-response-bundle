<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\DeletedTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Role
 *
 * Roles represent a set of permissions attached to a group of users. Roles have unique names, colors, and can be "pinned" to the side bar, causing their members to be listed separately. Roles are unique per guild, and can have separate permission profiles for the global context (guild) and channel context. The `@everyone` role has the same ID as the guild it belongs to.
 *
 * @package Bytes\DiscordResponseBundle\Objects
 *
 * @link https://discord.com/developers/docs/topics/permissions#role-object
 */
class Role implements ErrorInterface
{
use IDTrait, NameTrait, ErrorTrait, DeletedTrait;

    /**
     * integer representation of hexadecimal color code
     * Roles without colors (color == 0) do not count towards the final computed color in the user list.
     * @var int|null
     */
    private $color;

    /**
     * if this role is pinned in the user listing
     * @var bool|null
     */
    private $hoist;

    /**
     * position of this role
     * @var int|null
     */
    private $position;

    /**
     * permission bit set
     * @var int|null
     * @Groups({"discordapi", "discordjs"})
     */
    private $permissions;

    /**
     * whether this role is managed by an integration
     * @var bool|null
     */
    private $managed;

    /**
     * whether this role is mentionable
     * @var bool|null
     */
    private $mentionable;

    /**
     * Provided by DiscordJS only
     * @var string|null
     * @Groups("discordjs")
     */
    private $guild;

    /**
     * @return int|null
     */
    public function getColor(): ?int
    {
        return $this->color;
    }

    /**
     * @param int|null $color
     * @return $this
     */
    public function setColor(?int $color): self
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHoist(): ?bool
    {
        return $this->hoist;
    }

    /**
     * @param bool|null $hoist
     * @return $this
     */
    public function setHoist(?bool $hoist): self
    {
        $this->hoist = $hoist;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @param int|null $position
     * @return $this
     */
    public function setPosition(?int $position): self
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPermissions(): ?int
    {
        return $this->permissions;
    }

    /**
     * @param int|null $permissions
     * @return $this
     */
    public function setPermissions(?int $permissions): self
    {
        $this->permissions = $permissions;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getManaged(): ?bool
    {
        return $this->managed;
    }

    /**
     * @param bool|null $managed
     * @return $this
     */
    public function setManaged(?bool $managed): self
    {
        $this->managed = $managed;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getMentionable(): ?bool
    {
        return $this->mentionable;
    }

    /**
     * @param bool|null $mentionable
     * @return $this
     */
    public function setMentionable(?bool $mentionable): self
    {
        $this->mentionable = $mentionable;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGuild(): ?string
    {
        return $this->guild;
    }

    /**
     * @return string|null
     */
    public function getGuildId(): ?string
    {
        return $this->guild;
    }

    /**
     * @param string|null $guild
     * @return $this
     */
    public function setGuild(?string $guild): self
    {
        $this->guild = $guild;
        return $this;
    }
    
}