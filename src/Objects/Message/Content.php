<?php


namespace Bytes\DiscordResponseBundle\Objects\Message;


use Bytes\DiscordResponseBundle\Objects\Embed\Embed;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Content
{
    /**
     * @var Embed
     */
    private $embed;

    /**
     * @var AllowedMentions
     * @SerializedName("allowed_mentions")
     */
    private AllowedMentions $allowedMentions;

    /**
     * @var string|null
     */
    private ?string $content;

    /**
     * @return Embed
     */
    public function getEmbed(): Embed
    {
        return $this->embed;
    }

    /**
     * @param Embed $embed
     * @return $this
     */
    public function setEmbed(Embed $embed): self
    {
        $this->embed = $embed;
        return $this;
    }

    /**
     * @return AllowedMentions
     */
    public function getAllowedMentions(): AllowedMentions
    {
        return $this->allowedMentions;
    }

    /**
     * @param AllowedMentions $allowedMentions
     * @return $this
     */
    public function setAllowedMentions(AllowedMentions $allowedMentions): self
    {
        $this->allowedMentions = $allowedMentions;
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
}