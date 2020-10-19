<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class PartialGuild
 * @package Bytes\DiscordResponseBundle\Objects
 *
 * @link https://discord.com/developers/docs/resources/user#get-current-user-guilds
 */
class PartialGuild implements ErrorInterface
{
    use IDTrait, NameTrait, ErrorTrait;

    /**
     * @var string|null
     * @Groups({"discordapi", "discordjs"})
     */
    protected $icon;

    /**
     * @var bool|null
     */
    protected $owner;

    /**
     * @var int|null
     */
    protected $permissions;

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
     * @return bool|null
     */
    public function getOwner(): ?bool
    {
        return $this->owner;
    }

    /**
     * @param bool|null $owner
     * @return $this
     */
    public function setOwner(?bool $owner): self
    {
        $this->owner = $owner;
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

}