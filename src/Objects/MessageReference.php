<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ChannelIdInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\GuildIdInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ChannelIdTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\GuildIDTrait;

/**
 * Class MessageReference
 * @package Bytes\DiscordResponseBundle\Objects
 *
 * @link https://discord.com/developers/docs/resources/channel#message-object-message-reference-structure
 *
 * @property string|null $channelID (snowflake) id of the originating message's channel. optional when creating a reply, but will always be present when receiving an event/response that includes this data model.
 * @property string|null $guildId (snowflake) id of the originating message's guild
 *
 * @version v0.8.0 As of 2021-03-25 Discord Documentation
 */
class MessageReference implements ChannelIdInterface, GuildIdInterface
{
    use ChannelIdTrait, GuildIDTrait;

    /**
     * 	id of the originating message
     * @var string|null
     */
    private $messageId;

    /**
     * when sending, whether to error if the referenced message doesn't exist instead of sending as a normal (non-reply) message, default true
     * @var bool|null
     */
    private $failIfNotExists = true;

    /**
     * @return string|null
     */
    public function getMessageId(): ?string
    {
        return $this->messageId;
    }

    /**
     * @param string|null $messageId
     * @return $this
     */
    public function setMessageId(?string $messageId): self
    {
        $this->messageId = $messageId;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getFailIfNotExists(): ?bool
    {
        return $this->failIfNotExists;
    }

    /**
     * @param bool|null $failIfNotExists
     * @return $this
     */
    public function setFailIfNotExists(?bool $failIfNotExists): self
    {
        $this->failIfNotExists = $failIfNotExists;
        return $this;
    }



}