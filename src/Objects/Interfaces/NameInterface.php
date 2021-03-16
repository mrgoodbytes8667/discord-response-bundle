<?php


namespace Bytes\DiscordResponseBundle\Objects\Interfaces;


/**
 * Interface NameInterface
 * @package Bytes\DiscordResponseBundle\Objects\Interfaces
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