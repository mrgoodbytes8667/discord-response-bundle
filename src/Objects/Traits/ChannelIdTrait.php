<?php


namespace Bytes\DiscordResponseBundle\Objects\Traits;


/**
 * Trait ChannelIdTrait
 * @package Bytes\DiscordResponseBundle\Objects\Traits
 */
trait ChannelIdTrait
{
    /**
     * @var string|null
     */
    protected $channelID;

    /**
     * @return string|null
     */
    public function getChannelID(): ?string
    {
        return $this->channelID;
    }

    /**
     * @param string|null $channelID
     * @return $this
     */
    public function setChannelID(?string $channelID): self
    {
        $this->channelID = $channelID;
        return $this;
    }
}