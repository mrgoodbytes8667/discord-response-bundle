<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\GuildIDTrait;
use Bytes\DiscordResponseBundle\Services\DiscordDatetimeInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class Member
 * @package Bytes\DiscordResponseBundle\Objects
 *
 * @link https://discord.com/developers/docs/resources/guild#guild-member-object
 *
 * Note: if deserializing using symfony/serializer, the joined_at and premium_since fields do not get deserialized/
 * denormalized properly if metadata is not enabled
 * @see DiscordDatetimeInterface for the Discord date format
 *
 * @version v0.8.0 As of 2021-03-29 Discord Documentation
 */
class Member implements ErrorInterface
{
    use ErrorTrait, GuildIDTrait;

    /**
     * the user this guild member represents
     * @var User|null
     */
    private $user;

    /**
     * this users guild nickname
     * @var string|null
     */
    private $nick;

    /**
     * array of role object ids
     * @var string[]|null
     */
    private $roles;

    /**
     * whether the user has not yet passed the guild's Membership Screening requirements
     * New for v8
     * @var bool|null
     */
    private $pending;

    /**
     * @var string|null
     */
    private $guildId;

    /**
     * @var string|null
     */
    private $userID;

    /**
     * Virtual only, get via $nick
     * @var string|null
     */
    private $nickname;

    /**
     * @var string|null
     */
    private $displayName;

    /**
     * when the user joined the guild
     * @var \DateTimeInterface|null
     * @SerializedName("joined_at")
     */
    private $joinedAt;

    /**
     * when the user started boosting the guild
     * @var \DateTimeInterface|null
     * @SerializedName("premium_since")
     */
    private $premiumSince;

    /**
     * whether the user is deafened in voice channels
     * @var bool|null
     */
    private $deaf;

    /**
     * whether the user is muted in voice channels
     * @var bool|null
     */
    private $mute;

    /**
     * total permissions of the member in the channel, including overrides, returned when in the interaction object
     * @var string|null
     */
    private $permissions;

    /**
     * the user this guild member represents
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
     * this users guild nickname
     * @return string|null
     */
    public function getNick(): ?string
    {
        return $this->nick;
    }

    /**
     * @param string|null $nick
     * @return $this
     */
    public function setNick(?string $nick): self
    {
        $this->nick = $nick;
        return $this;
    }

    /**
     * array of role object ids
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
     * @return bool|null
     */
    public function getPending(): ?bool
    {
        return $this->pending;
    }

    /**
     * @param bool|null $pending
     * @return $this
     */
    public function setPending(?bool $pending): self
    {
        $this->pending = $pending;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isPending()
    {
        return $this->pending;
    }

    /**
     * when the user joined the guild
     * @return \DateTimeInterface|null
     */
    public function getJoinedAt(): ?\DateTimeInterface
    {
        return $this->joinedAt;
    }

    /**
     * @param \DateTimeInterface|null $joinedAt
     * @return $this
     */
    public function setJoinedAt(?\DateTimeInterface $joinedAt): self
    {
        $this->joinedAt = $joinedAt;
        return $this;
    }

    /**
     * when the user started boosting the guild
     * @return \DateTimeInterface|null
     */
    public function getPremiumSince(): ?\DateTimeInterface
    {
        return $this->premiumSince;
    }

    /**
     * @param \DateTimeInterface|null $premiumSince
     * @return $this
     */
    public function setPremiumSince(?\DateTimeInterface $premiumSince): self
    {
        $this->premiumSince = $premiumSince;
        return $this;
    }

    /**
     * whether the user is deafened in voice channels
     * @return bool|null
     */
    public function getDeaf(): ?bool
    {
        return $this->deaf;
    }

    /**
     * @param bool|null $deaf
     * @return $this
     */
    public function setDeaf(?bool $deaf): self
    {
        $this->deaf = $deaf;
        return $this;
    }

    /**
     * whether the user is muted in voice channels
     * @return bool|null
     */
    public function getMute(): ?bool
    {
        return $this->mute;
    }

    /**
     * @param bool|null $mute
     * @return $this
     */
    public function setMute(?bool $mute): self
    {
        $this->mute = $mute;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserID(): ?string
    {
        return $this->userID;
    }

    /**
     * @param string|null $userID
     * @return $this
     */
    public function setUserID(?string $userID): self
    {
        $this->userID = $userID;
        return $this;
    }

    /**
     * "Virtual" method, actually sets $nick for getNick()
     * @param string|null $nickname
     * @return $this
     */
    public function setNickname(?string $nickname): self
    {
        $this->nick = $nickname;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    /**
     * @param string|null $displayName
     * @return $this
     */
    public function setDisplayName(?string $displayName): self
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPermissions(): ?string
    {
        return $this->permissions;
    }

    /**
     * @param string|null $permissions
     * @return $this
     */
    public function setPermissions(?string $permissions): self
    {
        $this->permissions = $permissions;
        return $this;
    }
}