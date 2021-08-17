<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash\Interfaces;

use Bytes\DiscordResponseBundle\Enums\InteractionType;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ChannelIdInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\GuildIdInterface;
use Bytes\DiscordResponseBundle\Objects\Member;
use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandInteractionData;
use Bytes\DiscordResponseBundle\Objects\User;
use Bytes\ResponseBundle\Interfaces\IdInterface;

/**
 *
 */
interface InteractionInterface extends IdInterface, GuildIdInterface, ChannelIdInterface
{
    /**
     * @return InteractionType|null
     */
    public function getType(): ?InteractionType;

    /**
     * @param InteractionType|null $type
     * @return $this
     */
    public function setType(?InteractionType $type);

    /**
     * @return ApplicationCommandInteractionData|null
     */
    public function getData(): ?ApplicationCommandInteractionData;

    /**
     * @param ApplicationCommandInteractionData|null $data
     * @return $this
     */
    public function setData(?ApplicationCommandInteractionData $data);

    /**
     * @return Member|null
     */
    public function getMember(): ?Member;

    /**
     * @param Member|null $member
     * @return $this
     */
    public function setMember(?Member $member);

    /**
     * @return User|null
     */
    public function getUser(): ?User;

    /**
     * @param User|null $user
     * @return $this
     */
    public function setUser(?User $user);

    /**
     * @return string|null
     */
    public function getToken(): ?string;

    /**
     * @param string|null $token
     * @return $this
     */
    public function setToken(?string $token);

    /**
     * @return int|null
     */
    public function getVersion(): ?int;

    /**
     * @param int|null $version
     * @return $this
     */
    public function setVersion(?int $version);

    /**
     * @return Message|null
     */
    public function getMessage(): ?Message;

    /**
     * @param Message|null $message
     * @return $this
     */
    public function setMessage(?Message $message);
}