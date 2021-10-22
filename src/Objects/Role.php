<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\NameInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\DeletedTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;
use Bytes\ResponseBundle\Interfaces\IdInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Role
 *
 * Roles represent a set of permissions attached to a group of users. Roles have unique names, colors, and can be "pinned" to the side bar, causing their members to be listed separately. Roles are unique per guild, and can have separate permission profiles for the global context (guild) and channel context. The `@everyone` role has the same ID as the guild it belongs to.
 *
 * @package Bytes\DiscordResponseBundle\Objects
 *
 * @link https://discord.com/developers/docs/topics/permissions#role-object
 *
 * @version v0.12.2 As of 2021-10-22 Discord Documentation
 */
class Role implements ErrorInterface, IdInterface, NameInterface
{
    use IDTrait, NameTrait, ErrorTrait, DeletedTrait;

    /**
     * @var string
     * @Groups({"discordapi", "discordjs"})
     * @Assert\AtLeastOneOf({
     *     @Assert\Blank(),
     *     @Assert\Length(
     *          min = 1,
     *          max = 100,
     *          minMessage = "Name must be at least {{ limit }} characters long",
     *          maxMessage = "Name cannot be longer than {{ limit }} characters"
     *     )
     * })
     */
    private $name;

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
     * role icon hash
     * @var string|null
     */
    private $icon;

    /**
     * role unicode emoji
     * @var string|null
     */
    private $unicode_emoji;

    /**
     * position of this role
     * @var int|null
     */
    private $position;

    /**
     * permission bit set
     * API v6 returns an integer, API v8 returns a string
     * @var string|int|null
     *
     * @link https://discord.com/developers/docs/change-log#september-24-2020
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
     * the tags this role has
     * @var RoleTag|null
     */
    private $tags;

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
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param string|null $icon
     * @return $this
     */
    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUnicodeEmoji(): ?string
    {
        return $this->unicode_emoji;
    }

    /**
     * @param string|null $unicode_emoji
     * @return $this
     */
    public function setUnicodeEmoji(?string $unicode_emoji): self
    {
        $this->unicode_emoji = $unicode_emoji;
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
     * @return string|int|null
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param string|int|null $permissions
     * @return $this
     */
    public function setPermissions($permissions): self
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
     * @return RoleTag|null
     */
    public function getTags(): ?RoleTag
    {
        return $this->tags;
    }

    /**
     * @param RoleTag|null $tags
     * @return $this
     */
    public function setTags(?RoleTag $tags): self
    {
        $this->tags = $tags;
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