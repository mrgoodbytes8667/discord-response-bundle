<?php


namespace Bytes\DiscordResponseBundle\Objects\Embed\Traits;


use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Trait IconUrlTrait
 * @package Bytes\DiscordResponseBundle\Objects\Embed\Traits
 */
trait IconUrlTrait
{
    /**
     * @var string|null
     * @Assert\Url
     * @SerializedName("icon_url")
     */
    protected $iconUrl;

    /**
     * @return string|null
     */
    public function getIconUrl(): ?string
    {
        return $this->iconUrl;
    }

    /**
     * @param string|null $iconUrl
     *
     * @return $this
     */
    public function setIconUrl(?string $iconUrl): self
    {
        $this->iconUrl = $iconUrl ?? '';
        return $this;
    }

}