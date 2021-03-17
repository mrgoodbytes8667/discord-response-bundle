<?php


namespace Bytes\DiscordResponseBundle\Objects\Interfaces;


use Bytes\DiscordResponseBundle\Objects\Traits\GuildIDTrait;

/**
 * Trait GuildIdInterface
 * @package Bytes\DiscordResponseBundle\Objects\Interfaces
 *
 * @see GuildIDTrait
 */
interface GuildIdInterface
{
    /**
     * id of the guild the message was sent in
     * @return string|null
     */
    public function getGuildId(): ?string;

    /**
     * @param string|null $guildId
     * @return $this
     */
    public function setGuildId(?string $guildId);
}
