<?php


namespace Bytes\DiscordResponseBundle\Objects\Interfaces;


/**
 * Interface ErrorInterface
 * @package Bytes\DiscordResponseBundle\Objects\Interfaces
 */
interface ErrorInterface
{
    /**
     * @return string|null
     */
    public function getMessage(): ?string;

    /**
     * @return int|null
     */
    public function getCode(): ?int;
}