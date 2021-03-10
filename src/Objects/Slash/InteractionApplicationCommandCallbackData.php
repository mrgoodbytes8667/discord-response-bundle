<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Objects\Embed\Embed;
use Bytes\DiscordResponseBundle\Objects\Message\AllowedMentions;

/**
 * Class InteractionApplicationCommandCallbackData
 * Not all message fields are currently supported.
 *
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#interaction-response-interactionapplicationcommandcallbackdata
 *
 * @version v0.7.0 As of 2021-03-10 Discord Documentation
 */
class InteractionApplicationCommandCallbackData
{
    /**
     * is the response TTS
     * @var boolean|null
     */
    private $tts;

    /**
     * message content
     * @var string|null
     */
    private $content;

    /**
     * supports up to 10 embeds
     * @var Embed[]|null
     */
    private $embeds;

    /**
     * allowed mentions object
     * @var AllowedMentions|null
     */
    private $allowedMentions;

    /**
     * set to 64 to make your response ephemeral
     * @var int|null
     * @since v0.7.0
     */
    private $flags;

    /**
     * @return bool|null
     */
    public function getTts(): ?bool
    {
        return $this->tts;
    }

    /**
     * @param bool|null $tts
     * @return $this
     */
    public function setTts(?bool $tts): self
    {
        $this->tts = $tts;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string|null $content
     * @return $this
     */
    public function setContent(?string $content): self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return Embed[]|null
     */
    public function getEmbeds(): ?array
    {
        return $this->embeds;
    }

    /**
     * @param Embed[]|null $embeds
     * @return $this
     */
    public function setEmbeds(?array $embeds): self
    {
        $this->embeds = $embeds;
        return $this;
    }

    /**
     * @return AllowedMentions|null
     */
    public function getAllowedMentions(): ?AllowedMentions
    {
        return $this->allowedMentions;
    }

    /**
     * @param AllowedMentions|null $allowedMentions
     * @return $this
     */
    public function setAllowedMentions(?AllowedMentions $allowedMentions): self
    {
        $this->allowedMentions = $allowedMentions;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFlags(): ?int
    {
        return $this->flags;
    }

    /**
     * @param int|null $flags
     * @return $this
     */
    public function setFlags(?int $flags): self
    {
        $this->flags = $flags;
        return $this;
    }

}
