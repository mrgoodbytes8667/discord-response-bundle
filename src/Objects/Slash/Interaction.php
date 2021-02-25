<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Enums\InteractionType;
use Bytes\DiscordResponseBundle\Objects\Member;
use Bytes\DiscordResponseBundle\Objects\Traits\GuildIDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;

/**
 * Class Interaction
 * An interaction is the base "thing" that is sent when a user invokes a command, and is the same for Slash Commands and other future interaction types
 *
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#interaction
 *
 * @property string|null $id id of the interaction
 * @property string|null $guildId the guild it was sent from
 *
 * @version v0.6.0 As of 2021-02-25 Discord Documentation
 */
class Interaction
{
    use IDTrait, GuildIDTrait;

    /**
     * the type of interaction
     * @var int|null
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
     * @var Member|null
     */
    private $member;

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
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param InteractionType|int|null $type
     * @return Interaction
     */
    public function setType($type): Interaction
    {
        if ($type instanceof InteractionType) {
            $type = $type->value;
        }
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
