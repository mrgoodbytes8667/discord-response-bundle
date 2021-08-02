<?php

namespace Bytes\DiscordResponseBundle\Objects\Traits;

use Bytes\DiscordResponseBundle\Objects\PartialEmoji;

/**
 *
 */
trait PartialEmojiTrait
{
    /**
     * name, id, and animated
     * Types: Buttons
     * @var PartialEmoji|null
     */
    private $emoji;

    /**
     * @return PartialEmoji|null
     */
    public function getEmoji(): ?PartialEmoji
    {
        return $this->emoji;
    }

    /**
     * @param PartialEmoji|null $emoji
     * @return $this
     */
    public function setEmoji(?PartialEmoji $emoji): self
    {
        $this->emoji = $emoji;
        return $this;
    }
}