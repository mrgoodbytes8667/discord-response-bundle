<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\IdInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\NameInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;

/**
 * Class Connections
 * @package Bytes\DiscordResponseBundle\Objects
 *
 * @link https://discord.com/developers/docs/resources/user#connection-object
 */
class Connections implements ErrorInterface, IdInterface, NameInterface
{
    use IDTrait, NameTrait, ErrorTrait;

    /**
     * The service of the connection
     * @var string|null = ['twitch','youtube'][$any]
     */
    private $type;

    /**
     * whether the connection is revoked
     * @var bool|null
     */
    private $revoked;

    /**
     * an array of partial server integrations
     * @var array|null
     */
    private $integrations;

    /**
     * whether the connection is verified
     * @var bool|null
     */
    private $verified;

    /**
     * whether friend sync is enabled for this connection
     * @var bool|null
     */
    private $friendSync;

    /**
     * whether activities related to this connection will be shown in presence updates
     * @var bool|null
     */
    private $showActivity;

    /**
     * visibility of this connection
     * 0 None invisible to everyone except the user themselves
     * 1 Everyone    visible to everyone
     * @var int|null = [0,1][$any]
     */
    private $visibility;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return $this
     */
    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRevoked(): ?bool
    {
        return $this->revoked;
    }

    /**
     * @param bool|null $revoked
     * @return $this
     */
    public function setRevoked(?bool $revoked): self
    {
        $this->revoked = $revoked;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getIntegrations(): ?array
    {
        return $this->integrations;
    }

    /**
     * @param array|null $integrations
     * @return $this
     */
    public function setIntegrations(?array $integrations): self
    {
        $this->integrations = $integrations;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getVerified(): ?bool
    {
        return $this->verified;
    }

    /**
     * @param bool|null $verified
     * @return $this
     */
    public function setVerified(?bool $verified): self
    {
        $this->verified = $verified;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getFriendSync(): ?bool
    {
        return $this->friendSync;
    }

    /**
     * @param bool|null $friendSync
     * @return $this
     */
    public function setFriendSync(?bool $friendSync): self
    {
        $this->friendSync = $friendSync;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShowActivity(): ?bool
    {
        return $this->showActivity;
    }

    /**
     * @param bool|null $showActivity
     * @return $this
     */
    public function setShowActivity(?bool $showActivity): self
    {
        $this->showActivity = $showActivity;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVisibility(): ?int
    {
        return $this->visibility;
    }

    /**
     * @param int|null $visibility
     * @return $this
     */
    public function setVisibility(?int $visibility): self
    {
        $this->visibility = $visibility;
        return $this;
    }
    
}