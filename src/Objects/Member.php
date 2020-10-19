<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Member
 * @package Bytes\DiscordResponseBundle\Objects
 *
 * @link https://discord.com/developers/docs/resources/guild#guild-member-object
 */
class Member implements ErrorInterface
{
    use ErrorTrait;

    /**
     * @var User|null
     */
    private $user;

    /**
     * @var string|null
     */
    private $nick;

    /**
     * @var string[]|null
     */
    private $roles;

    /**
     * @var string|null
     * @Groups("discordjs")
     */
    private $guildID;

    /**
     * @var string|null
     * @Groups("discordjs")
     */
    private $userID;

    /**
     * Virtual only, get via $nick
     * @var string|null
     * @Groups("discordjs")
     */
    private $nickname;

    /**
     * @var string|null
     * @Groups("discordjs")
     */
    private $displayName;


//    /**
//     * @var \DateTimeInterface|null
//     */
//    private $joinedAt;
//
//    /**
//     * @var \DateTimeInterface|null
//     */
//    private $premiumSince;

    /**
     * @var bool|null
     */
    private $deaf;

    /**
     * @var bool|null
     */
    private $mute;

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

//    /**
//     * when the user joined the guild
//     * @return \DateTimeInterface|null
//     */
//    public function getJoinedAt(): ?\DateTimeInterface
//    {
//        return $this->joinedAt;
//    }
//
//    /**
//     * @param \DateTimeInterface|string|null $joinedAt
//     * @return $this
//     */
//    public function setJoinedAt($joinedAt): self
//    {
//        if(is_string($joinedAt))
//        {
//            $joinedAt = new \DateTime($joinedAt);
//        }
//        $this->joinedAt = $joinedAt;
//        return $this;
//    }
//
//    /**
//     * when the user started boosting the guild
//     * @return \DateTimeInterface|null
//     */
//    public function getPremiumSince(): ?\DateTimeInterface
//    {
//        return $this->premiumSince;
//    }
//
//    /**
//     * @param \DateTimeInterface|null $premiumSince
//     * @return $this
//     */
//    public function setPremiumSince(?\DateTimeInterface $premiumSince): self
//    {
//        $this->premiumSince = $premiumSince;
//        return $this;
//    }

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
    public function getGuildID(): ?string
    {
        return $this->guildID;
    }

    /**
     * @param string|null $guildID
     * @return $this
     */
    public function setGuildID(?string $guildID): self
    {
        $this->guildID = $guildID;
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


}