<?php


namespace Bytes\DiscordResponseBundle\Objects\Embed;


use Bytes\DiscordResponseBundle\Objects\Embed\Traits\IconUrlTrait;

/**
 * Class Footer
 * @package Bytes\DiscordResponseBundle\Objects\Embed
 */
class Footer
{
    use IconUrlTrait;

    /**
     * @var string
     */
    private $text;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Footer
     */
    public function setText(string $text): Footer
    {
        $this->text = $text;
        return $this;
    }

}