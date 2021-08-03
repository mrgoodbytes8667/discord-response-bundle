<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;

/**
 * @link https://discord.com/developers/docs/resources/emoji#emoji-object
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 */
class Emoji extends PartialEmoji implements ErrorInterface
{
    use ErrorTrait;

    /**
     * @var string[]|null
     */
    private $roles;

    /**
     * @var User|null
     */
    private $user;

    /**
     * @var bool|null
     */
    private $require_colons;

    /**
     * @var bool|null
     */
    private $managed;

    /**
     * @var bool|null
     */
    private $animated;

    /**
     * @var bool|null
     */
    private $available;

    /**
     * @return string[]|null
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    /**
     * @param string[]|null $roles
     * @return $this
     */
    public function setRoles(?array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return $this
     */
    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequireColons(): ?bool
    {
        return $this->require_colons;
    }

    /**
     * @param bool|null $require_colons
     * @return $this
     */
    public function setRequireColons(?bool $require_colons): self
    {
        $this->require_colons = $require_colons;
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
    public function getAnimated(): ?bool
    {
        return $this->animated;
    }

    /**
     * @param bool|null $animated
     * @return $this
     */
    public function setAnimated(?bool $animated): self
    {
        $this->animated = $animated;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    /**
     * @param bool|null $available
     * @return $this
     */
    public function setAvailable(?bool $available): self
    {
        $this->available = $available;
        return $this;
    }
}