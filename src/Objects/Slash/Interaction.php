<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Enums\InteractionType;
use Bytes\DiscordResponseBundle\Objects\Interfaces\GuildIdInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\IdInterface;
use Bytes\DiscordResponseBundle\Objects\Member;
use Bytes\DiscordResponseBundle\Objects\Traits\GuildIDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\DiscordResponseBundle\Objects\User;

/**
 * Class Interaction
 * An interaction is the base "thing" that is sent when a user invokes a command, and is the same for Slash Commands and other future interaction types
 *
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#interaction
 *
 * @property string|null $id id of the interaction (snowflake)
 * @property string|null $guildId the guild it was sent from (snowflake)
 *
 * @version v0.7.0 As of 2021-03-17 Discord Documentation
 */
class Interaction implements IdInterface, GuildIdInterface
{
    use IDTrait, GuildIDTrait;

    /**
     * the type of interaction
     * @var InteractionType|null
     */
    private $type;

    /**
     * the command data payload
     * This is always present on ApplicationCommand interaction types. It is optional for future-proofing against new interaction types
     * @var ApplicationCommandInteractionData|null
     */
    private $data;

    /**
     * the channel it was sent from
     * @var string|null
     */
    private $channelId;

    /**
     * guild member data for the invoking user, including permissions
     * member is sent when the command is invoked in a guild, and user is sent when invoked in a DM
     * @var Member|null
     */
    private $member;

    /**
     * user object for the invoking user, if invoked in a DM
     * member is sent when the command is invoked in a guild, and user is sent when invoked in a DM
     * @var User|null
     */
    private $user;

    /**
     * a continuation token for responding to the interaction
     * @var string|null
     */
    private $token;

    /**
     * read-only property, always 1
     * @var int|null
     */
    private $version;

    /**
     * @return InteractionType|null
     */
    public function getType(): ?InteractionType
    {
        return $this->type;
    }

    /**
     * @param InteractionType|null $type
     * @return Interaction
     */
    public function setType(?InteractionType $type): Interaction
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return ApplicationCommandInteractionData|null
     */
    public function getData(): ?ApplicationCommandInteractionData
    {
        return $this->data;
    }

    /**
     * @param ApplicationCommandInteractionData|null $data
     * @return Interaction
     */
    public function setData(?ApplicationCommandInteractionData $data): Interaction
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getChannelId(): ?string
    {
        return $this->channelId;
    }

    /**
     * @param string|null $channelId
     * @return Interaction
     */
    public function setChannelId(?string $channelId): Interaction
    {
        $this->channelId = $channelId;
        return $this;
    }

    /**
     * @return Member|null
     */
    public function getMember(): ?Member
    {
        return $this->member;
    }

    /**
     * @param Member|null $member
     * @return Interaction
     */
    public function setMember(?Member $member): Interaction
    {
        $this->member = $member;
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
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string|null $token
     * @return Interaction
     */
    public function setToken(?string $token): Interaction
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param int|null $version
     * @return Interaction
     */
    public function setVersion(?int $version): Interaction
    {
        $this->version = $version;
        return $this;
    }


}
