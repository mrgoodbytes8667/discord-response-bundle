<?php

namespace Bytes\DiscordResponseBundle\Objects\Interfaces;

use DateTimeInterface;

/**
 *
 */
interface MessageInterface
{
    /**
     * @return string|null
     */
    public function getChannelId(): ?string;

    /**
     * @return DateTimeInterface|null
     */
    public function getTimestamp(): ?DateTimeInterface;

    /**
     * @return DateTimeInterface|null
     */
    public function getEditedTimestamp(): ?DateTimeInterface;

    /**
     * @return string|null
     */
    public function getMessageId(): ?string;
}