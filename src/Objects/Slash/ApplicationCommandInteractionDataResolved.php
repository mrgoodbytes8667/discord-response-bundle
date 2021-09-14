<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Objects\Channel;
use Bytes\DiscordResponseBundle\Objects\Member;
use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Objects\Role;
use Bytes\DiscordResponseBundle\Objects\User;

/**
 * @link https://discord.com/developers/docs/interactions/receiving-and-responding#interaction-object-resolved-data-structure
 *
 * @version v0.11.1 As of 2021-09-14 Discord Documentation
 */
class ApplicationCommandInteractionDataResolved
{
    /**
     * @var User[]|null
     */
    private $users;

    /**
     * @var Member[]|null
     */
    private $members;

    /**
     * @var Role[]|null
     */
    private $roles;

    /**
     * @var Channel[]|null
     */
    private $channels;

    /**
     * @var Message[]|null
     */
    private $messages;

    /**
     * @return User[]|null
     */
    public function getUsers(): ?array
    {
        return $this->users;
    }

    /**
     * @param User[]|null $users
     * @return $this
     */
    public function setUsers(?array $users): self
    {
        $this->users = $users;
        return $this;
    }

    /**
     * @return Member[]|null
     */
    public function getMembers(): ?array
    {
        return $this->members;
    }

    /**
     * @param Member[]|null $members
     * @return $this
     */
    public function setMembers(?array $members): self
    {
        $this->members = $members;
        return $this;
    }

    /**
     * @return Role[]|null
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    /**
     * @param Role[]|null $roles
     * @return $this
     */
    public function setRoles(?array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @return Channel[]|null
     */
    public function getChannels(): ?array
    {
        return $this->channels;
    }

    /**
     * @param Channel[]|null $channels
     * @return $this
     */
    public function setChannels(?array $channels): self
    {
        $this->channels = $channels;
        return $this;
    }

    /**
     * @return Message[]|null
     */
    public function getMessages(): ?array
    {
        return $this->messages;
    }

    /**
     * @param Message[]|null $messages
     * @return $this
     */
    public function setMessages(?array $messages): self
    {
        $this->messages = $messages;
        return $this;
    }
}