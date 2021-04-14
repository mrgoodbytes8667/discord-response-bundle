<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Enums\MessageType;
use Bytes\DiscordResponseBundle\Objects\Embed\Embed;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ChannelIdInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\GuildIdInterface;
use Bytes\DiscordResponseBundle\Objects\Slash\MessageInteraction;
use Bytes\DiscordResponseBundle\Objects\Traits\ChannelIdTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\GuildIDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\ResponseBundle\Interfaces\IdInterface;
use DateTime;
use DateTimeInterface;
use Exception;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class Message
 * @package Bytes\DiscordResponseBundle\Objects
 *
 * @property string|null $channelID id of the channel the message was sent in
 *
 * @version v0.7.0 As of 2021-03-17 Discord Documentation
 */
class Message implements ErrorInterface, IdInterface, GuildIdInterface, ChannelIdInterface
{
    use IDTrait, GuildIDTrait, ErrorTrait, ChannelIdTrait;

    /**
     * the author of this message (not guaranteed to be a valid user, see below)
     * @var User|null
     */
    private $author;

    /**
     * member properties for this message's author
     * @var Member|null
     */
    private $member;

    /**
     * contents of the message
     * @var string|null
     */
    private $content;

    /**
     * when this message was sent
     * @var DateTimeInterface|null
     */
    private $timestamp;

    /**
     * when this message was edited (or null if never)
     * @var DateTimeInterface|null
     */
    private $editedTimestamp;

    /**
     * whether this was a TTS message
     * @var boolean|null
     */
    private $tts;

    /**
     * whether this message mentions everyone
     * @var boolean|null
     */
    private $mentionEveryone;

    /**
     * users specifically mentioned in the message
     * array of user objects, with an additional partial member field
     * @var mixed|null
     *
     * @todo
     */
    private $mentions;

    /**
     * roles specifically mentioned in this message
     * @var string[]|null
     */
    private $mentionRoles;

    /**
     * channels specifically mentioned in this message
     * @var ChannelMention[]|null
     */
    private $mentionChannels;

    /**
     * any attached files
     * @var mixed|null
     */
    private $attachments;

    /**
     * any embedded content
     * @var Embed[]|null
     */
    private $embeds;

    /**
     * reactions to the message
     * @var Reaction[]|null
     */
    private $reactions;

    /**
     * used for validating a message was sent
     * @var int|string|null
     */
    private $nonce;

    /**
     * whether this message is pinned
     * @var boolean|null
     */
    private $pinned;

    /**
     * if the message is generated by a webhook, this is the webhook's id
     * @var string|null
     */
    private $webhookId;

    /**
     * type of message
     * @var integer|null = MessageType::toArray()[$any]
     */
    private $type;

    /**
     * sent with Rich Presence-related chat embeds
     * @var mixed|null
     */
    private $activity;

    /**
     * sent with Rich Presence-related chat embeds
     * @var mixed|null
     */
    private $application;

    /**
     * reference data sent with crossposted messages and replies
     * @var MessageReference|null
     * @SerializedName("message_reference")
     */
    private $messageReference;

    /**
     * message flags ORd together, describes extra features of the message
     * @var integer|null
     */
    private $flags;

    /**
     * the stickers sent with the message (bots currently can only receive messages with stickers, not send)
     * @todo
     * @var mixed
     */
    private $stickers;

    /**
     * the message associated with the message_reference
     * This field is only returned for messages with a type of 19 (REPLY). If the message is a reply but the
     * referenced_message field is not present, the backend did not attempt to fetch the message that was being replied
     * to, so its state is unknown. If the field exists but is null, the referenced message was deleted.
     * @var Message|null
     * @SerializedName("referenced_message")
     */
    private $referencedMessage;

    /**
     * sent if the message is a response to an Interaction
     * @var MessageInteraction|null
     */
    private $interaction;

    /**
     * @return User|null
     */
    public function getAuthor(): ?User
    {
        return $this->author;
    }

    /**
     * @param User|null $author
     * @return $this
     */
    public function setAuthor(?User $author): self
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return Member|null
     */
    public function getMember(): ?Member
    {
        return $this->member;
    }

    /**
     * @param Member|null $member
     * @return $this
     */
    public function setMember(?Member $member): self
    {
        $this->member = $member;
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
     * @return DateTimeInterface|null
     */
    public function getTimestamp(): ?DateTimeInterface
    {
        return $this->timestamp;
    }

    /**
     * @param DateTimeInterface|null $timestamp
     * @return $this
     */
    public function setTimestamp(?DateTimeInterface $timestamp): self
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getEditedTimestamp(): ?DateTimeInterface
    {
        return $this->editedTimestamp;
    }

    /**
     * @param DateTimeInterface|string|null $editedTimestamp
     * @return $this
     * @throws Exception
     */
    public function setEditedTimestamp($editedTimestamp): self
    {
        if (is_string($editedTimestamp)) {
            $editedTimestamp = new DateTime($editedTimestamp);
        }
        $this->editedTimestamp = $editedTimestamp;
        return $this;
    }

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
     * @return bool|null
     */
    public function getMentionEveryone(): ?bool
    {
        return $this->mentionEveryone;
    }

    /**
     * @param bool|null $mentionEveryone
     * @return $this
     */
    public function setMentionEveryone(?bool $mentionEveryone): self
    {
        $this->mentionEveryone = $mentionEveryone;
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getMentions()
    {
        return $this->mentions;
    }

    /**
     * @param mixed|null $mentions
     * @return $this
     */
    public function setMentions($mentions): self
    {
        $this->mentions = $mentions;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getMentionRoles(): ?array
    {
        return $this->mentionRoles;
    }

    /**
     * @param string[]|null $mentionRoles
     * @return $this
     */
    public function setMentionRoles(?array $mentionRoles): self
    {
        $this->mentionRoles = $mentionRoles;
        return $this;
    }

    /**
     * @return ChannelMention[]|null
     */
    public function getMentionChannels(): ?array
    {
        return $this->mentionChannels;
    }

    /**
     * @param ChannelMention[]|null $mentionChannels
     * @return $this
     */
    public function setMentionChannels(?array $mentionChannels): self
    {
        $this->mentionChannels = $mentionChannels;
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param mixed|null $attachments
     * @return $this
     */
    public function setAttachments($attachments): self
    {
        $this->attachments = $attachments;
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
     * @return Reaction[]|null
     */
    public function getReactions(): ?array
    {
        return $this->reactions;
    }

    /**
     * @param Reaction[]|null $reactions
     * @return $this
     */
    public function setReactions(?array $reactions): self
    {
        $this->reactions = $reactions;
        return $this;
    }

    /**
     * @return int|string|null
     */
    public function getNonce()
    {
        return $this->nonce;
    }

    /**
     * @param int|string|null $nonce
     * @return $this
     */
    public function setNonce($nonce)
    {
        $this->nonce = $nonce;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPinned(): ?bool
    {
        return $this->pinned;
    }

    /**
     * @param bool|null $pinned
     * @return $this
     */
    public function setPinned(?bool $pinned): self
    {
        $this->pinned = $pinned;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getWebhookId(): ?string
    {
        return $this->webhookId;
    }

    /**
     * @param string|null $webhookId
     * @return $this
     */
    public function setWebhookId(?string $webhookId): self
    {
        $this->webhookId = $webhookId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param MessageType|int|null $type
     * @return $this
     */
    public function setType($type): self
    {
        $this->type = $type instanceof MessageType ? $type->value : $type;
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param mixed|null $activity
     * @return $this
     */
    public function setActivity($activity): self
    {
        $this->activity = $activity;
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @param mixed|null $application
     * @return $this
     */
    public function setApplication($application): self
    {
        $this->application = $application;
        return $this;
    }

    /**
     * @return MessageReference|null
     */
    public function getMessageReference(): ?MessageReference
    {
        return $this->messageReference;
    }

    /**
     * @param MessageReference|null $messageReference
     * @return $this
     */
    public function setMessageReference(?MessageReference $messageReference): self
    {
        $this->messageReference = $messageReference;
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

    /**
     * @return Message|null
     */
    public function getReferencedMessage(): ?Message
    {
        return $this->referencedMessage;
    }

    /**
     * @param Message|null $referencedMessage
     * @return $this
     */
    public function setReferencedMessage(?Message $referencedMessage): self
    {
        $this->referencedMessage = $referencedMessage;
        return $this;
    }

    /**
     * @return MessageInteraction|null
     */
    public function getInteraction(): ?MessageInteraction
    {
        return $this->interaction;
    }

    /**
     * @param MessageInteraction|null $interaction
     * @return $this
     */
    public function setInteraction(?MessageInteraction $interaction): self
    {
        $this->interaction = $interaction;
        return $this;
    }
}