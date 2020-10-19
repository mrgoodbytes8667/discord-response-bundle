<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;

/**
 * Class NoResponse
 * @package Bytes\DiscordResponseBundle\Objects
 */
class NoResponse implements ErrorInterface
{
    use ErrorTrait;
}