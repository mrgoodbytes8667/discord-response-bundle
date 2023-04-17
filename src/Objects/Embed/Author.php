<?php


namespace Bytes\DiscordResponseBundle\Objects\Embed;


use Bytes\DiscordResponseBundle\Objects\Embed\Traits\IconUrlTrait;
use Bytes\DiscordResponseBundle\Objects\Embed\Traits\UrlTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;

/**
 * Class Author
 * @package Bytes\DiscordResponseBundle\Objects\Embed
 */
class Author
{
    use NameTrait;
    use UrlTrait;
    use IconUrlTrait;

    /**
     * @param string $name
     * @param string|null $iconUrl
     * @param string|null $url
     * @return static
     */
    public static function create(string $name, ?string $iconUrl = null, ?string $url = null)
    {
        $author = new static();
        $author->setName($name);
        if(!empty($iconUrl)) {
            $author->setIconUrl($iconUrl);
        }
        
        if(!empty($url)) {
            $author->setUrl($url);
        }

        return $author;
    }
}