<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Enums\InteractionType;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ChannelIdInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\GuildIdInterface;
use Bytes\DiscordResponseBundle\Objects\Member;
use Bytes\DiscordResponseBundle\Objects\Traits\ChannelIdTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\GuildIDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\DiscordResponseBundle\Objects\User;
use Bytes\ResponseBundle\Interfaces\IdInterface;

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
 * @property string|null $channelID the channel it was sent from
 *
 * @version v0.7.0 As of 2021-03-17 Discord Documentation
 */
class Interaction implements IdInterface, GuildIdInterface, ChannelIdInterface
{
    use IDTrait, GuildIDTrait, ChannelIdTrait;

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
     * @return $thisType|null
     */
    public function getType(): ?InteractionType
    {
        return $this->type;
    }

    /**
     * @param InteractionType|null $type
     * @return $this
     */
    public function setType(?InteractionType $type): self
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
     * @return $this
     */
    public function setData(?ApplicationCommandInteractionData $data): self
    {
        $this->data = $data;
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
     * @return $this
     */
    public function setMember(?Member $member): self
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
     * @return $this
     */
    public function setToken(?string $token): self
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
     * @return $this
     */
    public function setVersion(?int $version): self
    {
        $this->version = $version;
        return $this;
    }


}
