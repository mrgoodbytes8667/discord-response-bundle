<?php


namespace Bytes\DiscordResponseBundle\Objects\Interfaces;


use Bytes\DiscordResponseBundle\Objects\Traits\ChannelIDTrait;

/**
 * Trait ChannelIdInterface
 * @package Bytes\DiscordResponseBundle\Objects\Interfaces
 *
 * @see ChannelIDTrait
 */
interface ChannelIdInterface
{
    /**
     * id of the channel the message was sent in
     * @return string|null
     */
    public function getChannelId(): ?string;

    /**
     * @param string|null $channelId
     * @return $this
     */
    public function setChannelId(?string $channelId);
}
