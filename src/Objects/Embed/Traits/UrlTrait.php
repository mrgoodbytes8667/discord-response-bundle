<?php


namespace Bytes\DiscordResponseBundle\Objects\Embed\Traits;


use Symfony\Component\Validator\Constraints as Assert;


/**
 * Trait UrlTrait
 * @package App\Objects\Discord\Embed
 */
trait UrlTrait
{
    /**
     * @var string|null
     * @Assert\Url
     */
    protected $url;

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return $this
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url ?? '';
        return $this;
    }
}