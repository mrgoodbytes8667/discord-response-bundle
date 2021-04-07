<?php


namespace Bytes\DiscordResponseBundle\Objects\Message;


use Bytes\DiscordResponseBundle\Objects\Embed\Embed;
use Illuminate\Support\Arr;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class WebhookContent
 * @package Bytes\DiscordResponseBundle\Objects\Message
 *
 * @version v0.8.1 As of 2021-04-07 Discord Documentation
 * @link https://discord.com/developers/docs/resources/webhook#execute-webhook
 */
class WebhookContent
{
    /**
     * @var string|null
     * @Assert\AtLeastOneOf({
     *     @Assert\Blank(),
     *     @Assert\Length(
     *         max = 2000
     *     )
     * })
     * @SerializedName("content")
     */
    private $content = null;

    /**
     * @var string|null
     * @SerializedName("username")
     */
    private $username;

    /**
     * @var string|null
     * @Assert\AtLeastOneOf({
     *     @Assert\Blank(),
     *     @Assert\Url()
     * })
     * @SerializedName("avatar_url")
     */
    private $avatar_url;

    /**
     * @var boolean|null
     * @SerializedName("tts")
     */
    private $tts;

    /**
     * @var mixed|null
     * @SerializedName("file")
     */
    private $file;

    /**
     * @var Embed[]|null
     * @Assert\Count(
     *      max = 10,
     *      maxMessage = "You cannot specify more than {{ limit }} embeds"
     * )
     * @SerializedName("embeds")
     */
    private $embeds;

    /**
     * @var string|null
     * @SerializedName("payload_json")
     */
    private $payload_json;

    /**
     * @var AllowedMentions|null
     * @SerializedName("allowed_mentions")
     */
    private $allowedMentions;

    /**
     * @param Embed[]|Embed|null $embeds
     * @param string|null $content
     * @param AllowedMentions|null $allowedMentions
     * @param string|null $username
     * @param string|null $avatarUrl
     * @param bool|null $tts
     * @return static
     */
    public static function create($embeds = null, ?string $content = null, ?AllowedMentions $allowedMentions = null, ?string $username = null, ?string $avatarUrl = null, ?bool $tts = null)
    {
        $static = new static();

        if (empty($allowedMentions)) {
            $allowedMentions = AllowedMentions::create();
        }
        $static->setAllowedMentions($allowedMentions);
        if(!empty($embeds)) {
            $static->setEmbeds(Arr::wrap($embeds));
        }
        if (!empty($content)) {
            $static->setContent($content);
        }
        if (!is_null($tts)) {
            $static->setTts($tts);
        }
        if (!is_null($username)) {
            $static->setUsername($username);
        }
        if (!is_null($avatarUrl)) {
            $static->setAvatarUrl($avatarUrl);
        }
        return $static;
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
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     * @return $this
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAvatarUrl(): ?string
    {
        return $this->avatar_url;
    }

    /**
     * @param string|null $avatar_url
     * @return $this
     */
    public function setAvatarUrl(?string $avatar_url): self
    {
        $this->avatar_url = $avatar_url;
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
     * @return mixed|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed|null $file
     * @return $this
     */
    public function setFile($file)
    {
        $this->file = $file;
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
     * @param Embed $embed
     * @return $this
     */
    public function addEmbed(Embed $embed): self
    {
        if (!in_array($embed, $this->embeds ?? [])) {
            $this->embeds[] = $embed;
        }
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPayloadJson(): ?string
    {
        return $this->payload_json;
    }

    /**
     * @param string|null $payload_json
     * @return $this
     */
    public function setPayloadJson(?string $payload_json): self
    {
        $this->payload_json = $payload_json;
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
     * @param ExecutionContextInterface $context
     * @param $payload
     * @Assert\Callback
     */
    public function validate(ExecutionContextInterface $context, $payload)
    {
        if (empty($this->content) && empty($this->embeds)) {
            $context->buildViolation('Either content or embed(s) must be populated.')
                ->atPath('content')
                ->addViolation();
        }
    }
}