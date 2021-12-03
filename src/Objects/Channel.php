<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Enums\ChannelTypes;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\NameInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ApplicationIdTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\DeletedTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;
use Bytes\ResponseBundle\Interfaces\IdInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class Channel
 * @package Bytes\DiscordResponseBundle\Objects
 *
 * @link https://discord.com/developers/docs/resources/channel#channel-object
 */
class Channel implements ErrorInterface, IdInterface, NameInterface
{
    use ApplicationIdTrait, IDTrait, NameTrait, ErrorTrait, DeletedTrait;

    /**
     * the name of the channel (2-100 characters)
     * @var string|null
     */
    private $name;

    /**
     * the type of channel
     * @var string|int|null = ChannelTypes::all()[$any]
     */
    private $type;

    /**
     * the id of the guild
     * @var string|null
     */
    private $guildId;

    /**
     * sorting position of the channel
     * @var int|null
     */
    private $position;

    /**
     * sorting position of the channel
     * @var int|null
     */
    private $rawPosition;

    /**
     * explicit permission overwrites for members and roles
     * @var Overwrite[]|null
     * @SerializedName("permission_overwrites")
     */
    private $permissionOverwrites;

    /**
     * the channel topic (0-1024 characters)
     * @var string|null
     */
    private $topic;

    /**
     * whether the channel is nsfw
     * @var bool|null
     */
    private $nsfw;

    /**
     * the id of the last message sent in this channel (may not point to an existing or valid message)
     * @var string|null
     */
    private $lastMessageId;

    /**
     * the bitrate (in bits) of the voice channel
     * @var int|null
     */
    private $bitrate;

    /**
     * the user limit of the voice channel
     * @var int|null
     */
    private $userLimit;

    /**
     * amount of seconds a user has to wait before sending another message (0-21600); bots, as well as users with the permission manage_messages or manage_channel, are unaffected
     * @var int|null
     */
    private $rateLimitPerUser;

    /**
     * the recipients of the DM
     * @var User[]|null
     */
    private $recipients;

    /**
     * icon hash
     * @var string|null
     */
    private $icon;

    /**
     * id of the DM creator
     * @var string|null
     */
    private $ownerId;

    /**
     * application id of the group DM creator if it is bot-created
     * @var string|null
     */
    private $applicationId;

    /**
     * id of the parent category for a channel (each parent category can contain up to 50 channels)
     * @var string|null
     */
    private $parentId;

    /**
     * @return int|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int|string|null $type
     * @return $this
     */
    public function setType($type): self
    {
        if (!is_null($type) && !is_numeric($type)) {
            $enum = ChannelTypes::getFromDiscordJS($type) ?? ChannelTypes::tryFrom($type);

            if (!empty($enum)) {
                $type = $enum->value;
            }
        }
        $this->type = $type;
        return $this;
    }

//    /**
//     * when the last pinned message was pinned
//     * @var \DateTimeInterface|null
//     */
//    private $lastPinTimestamp;


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

    /**
     * @return string|null
     */
    public function getGuild(): ?string
    {
        return $this->guildId;
    }

    /**
     * @param string|null $guildId
     * @return $this
     */
    public function setGuild(?string $guildId): self
    {
        $this->guildId = $guildId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @param int|null $position
     * @return $this
     */
    public function setPosition(?int $position): self
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @param int|null $rawPosition
     * @return Channel
     */
    public function setRawPosition(?int $rawPosition): self
    {
        return $this->setPosition($rawPosition);
    }

    /**
     * @return Overwrite[]|null
     */
    public function getPermissionOverwrites(): ?array
    {
        return $this->permissionOverwrites;
    }

    /**
     * @param Overwrite[]|null $permissionOverwrites
     * @return $this
     */
    public function setPermissionOverwrites(?array $permissionOverwrites): self
    {
        $this->permissionOverwrites = $permissionOverwrites;
        return $this;
    }

    /**
     * @param Overwrite $permissionOverwrites
     * @return $this
     */
    public function addPermissionOverwrite(Overwrite $permissionOverwrites): self
    {
        if (!in_array($permissionOverwrites, $this->permissionOverwritess ?? [])) {
            $this->permissionOverwrites[] = $permissionOverwrites;
        }
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTopic(): ?string
    {
        return $this->topic;
    }

    /**
     * @param string|null $topic
     * @return $this
     */
    public function setTopic(?string $topic): self
    {
        $this->topic = $topic;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNsfw(): ?bool
    {
        return $this->nsfw;
    }

    /**
     * @param bool|null $nsfw
     * @return $this
     */
    public function setNsfw(?bool $nsfw): self
    {
        $this->nsfw = $nsfw;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastMessageId(): ?string
    {
        return $this->lastMessageId;
    }

    /**
     * @param string|null $lastMessageId
     * @return $this
     */
    public function setLastMessageId(?string $lastMessageId): self
    {
        $this->lastMessageId = $lastMessageId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getBitrate(): ?int
    {
        return $this->bitrate;
    }

    /**
     * @param int|null $bitrate
     * @return $this
     */
    public function setBitrate(?int $bitrate): self
    {
        $this->bitrate = $bitrate;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserLimit(): ?int
    {
        return $this->userLimit;
    }

    /**
     * @param int|null $userLimit
     * @return $this
     */
    public function setUserLimit(?int $userLimit): self
    {
        $this->userLimit = $userLimit;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRateLimitPerUser(): ?int
    {
        return $this->rateLimitPerUser;
    }

    /**
     * @param int|null $rateLimitPerUser
     * @return $this
     */
    public function setRateLimitPerUser(?int $rateLimitPerUser): self
    {
        $this->rateLimitPerUser = $rateLimitPerUser;
        return $this;
    }

    /**
     * @return User[]|null
     */
    public function getRecipients(): ?array
    {
        return $this->recipients;
    }

    /**
     * @param User[]|null $recipients
     * @return $this
     */
    public function setRecipients(?array $recipients): self
    {
        $this->recipients = $recipients;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param string|null $icon
     * @return $this
     */
    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOwnerId(): ?string
    {
        return $this->ownerId;
    }

    /**
     * @param string|null $ownerId
     * @return $this
     */
    public function setOwnerId(?string $ownerId): self
    {
        $this->ownerId = $ownerId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    /**
     * @param string|null $parentId
     * @return $this
     */
    public function setParentId(?string $parentId): self
    {
        $this->parentId = $parentId;
        return $this;
    }

//    /**
//     * @return \DateTimeInterface|null
//     */
//    public function getLastPinTimestamp(): ?\DateTimeInterface
//    {
//        return $this->lastPinTimestamp;
//    }
//
//    /**
//     * @param \DateTimeInterface|null $lastPinTimestamp
//     * @return $this
//     */
//    public function setLastPinTimestamp(?\DateTimeInterface $lastPinTimestamp): self
//    {
//        $this->lastPinTimestamp = $lastPinTimestamp;
//        return $this;
//    }


}