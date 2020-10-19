<?php


namespace Bytes\DiscordResponseBundle\Objects\Traits;


/**
 * Trait GuildIDTrait
 * @package Bytes\DiscordResponseBundle\Objects\Traits
 */
trait GuildIDTrait
{

    /**
     * id of the guild the message was sent in
     * @var string|null
     */
    private $guildId;

    /**
     * @return string|null
     */
    public function getGuildId(): ?string
    {
        return $this->guildId;
    }

    /**
     * @param string|null $guildId
     * @return $this
     */
    public function setGuildId(?string $guildId): self
    {
        $this->guildId = $guildId;
        return $this;
    }



}