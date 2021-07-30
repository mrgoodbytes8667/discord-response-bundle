<?php


namespace Bytes\DiscordResponseBundle\Objects\Traits;


/**
 *
 */
trait GuildIDTrait
{
    /**
     * id of the guild the message was sent in
     * @var string|null
     */
    private $guild_id;

    /**
     * @return string|null
     */
    public function getGuildId(): ?string
    {
        return $this->guild_id;
    }

    /**
     * @param string|null $guildId
     * @return $this
     */
    public function setGuildId(?string $guildId): self
    {
        $this->guild_id = $guildId;
        return $this;
    }
}