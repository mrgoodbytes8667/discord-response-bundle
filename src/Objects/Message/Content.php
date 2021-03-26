<?php


namespace Bytes\DiscordResponseBundle\Objects\Message;


use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Bytes\DiscordResponseBundle\Objects\Embed\Embed;
use Bytes\DiscordResponseBundle\Objects\MessageReference;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Content
 * @package Bytes\DiscordResponseBundle\Objects\Message
 */
class Content
{
    /**
     * @var string|null
     * @Assert\Length(
     *     max = 2000
     * )
     */
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
     * @var Embed|null
     */
    private $embed;

    /**
     * @var AllowedMentions|null
     * @SerializedName("allowed_mentions")
     */
    private $allowedMentions;

    /**
     * @var MessageReference|null
     */
    private $messageReference;

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
     * @return Embed|null
     */
    public function getEmbed(): ?Embed
    {
        return $this->embed;
    }

    /**
     * @param Embed|null $embed
     * @return $this
     */
    public function setEmbed(?Embed $embed): self
    {
        $this->embed = $embed;
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
     * @param Embed $embed
     * @param string|null $content
     * @param AllowedMentions|null $allowedMentions
     * @param bool|null $tts
     * @return static
     */
    public static function create(Embed $embed, ?string $content = null, ?AllowedMentions $allowedMentions = null, ?bool $tts = null)
    {
        if(empty($allowedMentions))
        {
            $allowedMentions = AllowedMentions::create();
        }
        $static = new static();
        $static->setEmbed($embed);
        $static->setAllowedMentions($allowedMentions);
        if(!empty($content))
        {
            $static->setContent($content);
        }
        if(!is_null($tts))
        {
            $static->setTts($tts);
        }
        return $static;
    }

    /**
     * @param ExecutionContextInterface $context
     * @param $payload
     * @Assert\Callback
     */
    public function validate(ExecutionContextInterface $context, $payload)
    {
        if (empty($this->content) && empty($this->embed)) {
            $context->buildViolation('Either content or embed must be populated.')
                ->atPath('content')
                ->addViolation();
        }
    }
}