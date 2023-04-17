<?php


namespace Bytes\DiscordResponseBundle\Objects\Embed;


use Bytes\DiscordResponseBundle\Objects\Embed\Traits\UrlTrait;

/**
 * Class Image
 * @package App\Objects\Discord\Embed
 */
class Image
{
    use UrlTrait;

    /**
     * @param string|null $url
     * @param bool $uuid Adds a unique id to the end of the URL as a query string if true.
     * @return $this
     */
    public function setUrl(?string $url, bool $uuid = false): self
    {
        $this->url = $url ?? '';
        if (!empty($url) && $uuid) {
            $this->url .= '?' . uuid_create(UUID_TYPE_RANDOM);
        }
        
        return $this;
    }
}