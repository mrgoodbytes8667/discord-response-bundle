<?php


namespace Bytes\DiscordResponseBundle\Objects\Interfaces;


use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;

/**
 * Interface NameInterface
 * @package Bytes\DiscordResponseBundle\Objects\Interfaces
 *
 * @see NameTrait
 */
interface NameInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name);
}