<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ChannelIdInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\GuildIdInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ChannelIdTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\GuildIDTrait;
use Bytes\DiscordResponseBundle\Services\IdNormalizer;
use Bytes\ResponseBundle\Interfaces\IdInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

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
     * id of the originating message
     * @var string|null
     */
    #[SerializedName('message_id')]
    private $messageId;

    /**
     * (snowflake) id of the originating message's channel. optional when creating a reply, but will always be present when receiving an event/response that includes this data model.
     * @var string|null
     */
    #[SerializedName('channel_id')]
    protected $channelID;

    /**
     * (snowflake) id of the originating message's guild
     * @var string|null
     */
    #[SerializedName('guild_id')]
    private $guildId;

    /**
     * when sending, whether to error if the referenced message doesn't exist instead of sending as a normal (non-reply) message, default true
     * @var bool|null
     */
    #[SerializedName('fail_if_not_exists')]
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

    /**
     * @param IdInterface|string $message
     * @param ChannelIdInterface|IdInterface|string|null $channel
     * @param GuildIdInterface|IdInterface|string|null $guild
     * @param bool $failIfNotExists
     * @return static
     */
    public static function create($message, $channel = null, $guild = null, bool $failIfNotExists = true)
    {
        $ref = new static();
        $message = IdNormalizer::normalizeIdArgument($message, 'The "message" argument is required.');
        $channel = IdNormalizer::normalizeChannelIdArgument($channel, 'The "channel" argument was invalid.', true);
        $guild = IdNormalizer::normalizeGuildIdArgument($guild, 'The "guild" argument was invalid.', true);

        $ref->setMessageId($message);
        $ref->setChannelID($channel);
        $ref->setGuildId($guild);
        $ref->setFailIfNotExists($failIfNotExists);

        return $ref;
    }

}