<?php


namespace Bytes\DiscordResponseBundle\Objects\Embed;


use Bytes\DiscordResponseBundle\Objects\Embed\Traits\IconUrlTrait;
use Bytes\DiscordResponseBundle\Objects\Embed\Traits\NameTrait;
use Bytes\DiscordResponseBundle\Objects\Embed\Traits\UrlTrait;

/**
 * Class Author
 * @package Bytes\DiscordResponseBundle\Objects\Embed
 */
class Author
{
    use NameTrait;
    use UrlTrait;
    use IconUrlTrait;
}