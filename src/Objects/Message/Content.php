<?php


namespace Bytes\DiscordResponseBundle\Objects\Message;


use Bytes\DiscordResponseBundle\Objects\Embed\Embed;
use Bytes\DiscordResponseBundle\Objects\MessageReference;
use Doctrine\Common\Collections\ArrayCollection;
use Illuminate\Support\Arr;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class Content
 * @package Bytes\DiscordResponseBundle\Objects\Message
 *
 * @link https://discord.com/developers/docs/resources/channel#create-message-jsonform-params
 *
 * @version v0.10.0 As of 2021-08-05 Discord Documentation
 */
class Content
{
    /**
     * @var string|null
     */
    #[Assert\Length(max: 2000)]
    private ?string $content = null;

    /**
     * @var string|int|null
     */
    private $nonce;

    /**
     * @var boolean|null
     */
    private $tts;

    /**
     * @var Embed[]|null
     * @Assert\All({
     *     @Assert\Type(type="\Bytes\DiscordResponseBundle\Objects\Embed\Embed"),
     *     @Assert\NotNull()
     * })
     */
    #[Assert\Valid]
    private $embeds;

    /**
     * @var AllowedMentions|null
     */
    #[SerializedName('allowed_mentions')]
    #[Assert\Valid]
    private $allowedMentions;

    /**
     * @var MessageReference|null
     */
    #[Assert\Valid]
    private $messageReference;

    /**
     * @var Component[]|null
     * @Assert\All({
     *     @Assert\Type(type="\Bytes\DiscordResponseBundle\Objects\Message\Component"),
     *     @Assert\NotNull()
     * })
     */
    #[Assert\Valid]
    private $components;

    /**
     * @var string[]|null
     * @Assert\All({
     *     @Assert\Type(type="string"),
     *     @Assert\NotNull()
     * })
     */
    #[SerializedName('sticker_ids')]
    #[Assert\Count(max: 3, maxMessage: 'You cannot specify more than {{ limit }} stickers per message.')]
    private $sticker_ids;

    /**
     *
     */
    public function __construct()
    {
        $this->embeds = new ArrayCollection();
        $this->components = new ArrayCollection();
        $this->sticker_ids = new ArrayCollection();
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
     * @return Embed[]|null
     */
    public function getEmbeds(): ?array
    {
        return $this->embeds->toArray();
    }

    /**
     * @param Embed[]|null $embeds
     * @return Content
     */
    public function setEmbeds(?array $embeds): self
    {
        $this->embeds = new ArrayCollection($embeds);
        return $this;
    }

    /**
     * @param Embed $embed
     * @return $this
     */
    public function addEmbed(Embed $embed): self
    {
        if (!$this->embeds->contains($embed)) {
            $this->embeds->add($embed);
        }
        
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
     * @return Component[]|null
     */
    public function getComponents(): ?array
    {
        if($this->components->isEmpty())
        {
            return null;
        }
        
        return $this->components->toArray();
    }

    /**
     * @param Component[]|null $components
     * @return $this
     */
    public function setComponents(?array $components): self
    {
        $this->components = new ArrayCollection($components ?? []);
        return $this;
    }

    /**
     * @param Component $component
     * @return $this
     */
    public function addComponent(Component $component): self
    {
        if (!$this->components->contains($component)) {
            $this->components->add($component);
        }
        
        return $this;
    }

    /**
     * @return string[]|null
     */
    #[SerializedName('sticker_ids')]
    public function getStickerIds(): ?array
    {
        if($this->sticker_ids->isEmpty())
        {
            return null;
        }
        
        return $this->sticker_ids->toArray();
    }

    /**
     * @param string[]|null $stickerIds
     * @return $this
     */
    public function setStickerIds(?array $stickerIds): self
    {
        $this->sticker_ids = new ArrayCollection($stickerIds ?? []);
        return $this;
    }

    /**
     * @param string $stickerId
     * @return $this
     */
    public function addStickerId(string $stickerId): self
    {
        if (!$this->sticker_ids->contains($stickerId)) {
            $this->sticker_ids->add($stickerId);
        }
        
        return $this;
    }

    /**
     * @param Embed|array|null $embeds
     * @param string|null $content
     * @param AllowedMentions|null $allowedMentions
     * @param Component|array|null $components
     * @param string[]|null $stickers
     * @param bool|null $tts
     * @return static
     */
    public static function create(Embed|array|null $embeds = null, ?string $content = null, ?AllowedMentions $allowedMentions = null, Component|array|null $components = null, ?array $stickers = null, ?bool $tts = null): static
    {
        if (empty($allowedMentions)) {
            $allowedMentions = AllowedMentions::create();
        }
        
        $static = new static();
        if (!empty($embeds)) {
            $static->setEmbeds(Arr::wrap($embeds));
        }
        
        if (!empty($components)) {
            $static->setComponents(Arr::wrap($components));
        }
        
        $static->setAllowedMentions($allowedMentions);
        if (!empty($content)) {
            $static->setContent($content);
        }
        
        if (!is_null($stickers)) {
            $static->setStickerIds($stickers);
        }
        
        if (!is_null($tts)) {
            $static->setTts($tts);
        }
        
        return $static;
    }

    /**
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    #[Assert\Callback]
    public function validate(ExecutionContextInterface $context, $payload)
    {
        if (empty($this->content) && $this->embeds->isEmpty() && $this->sticker_ids->isEmpty()) {
            $context->buildViolation('Either content, embeds, or stickers must be populated.')
                ->atPath('content')
                ->addViolation();
        }
    }
}