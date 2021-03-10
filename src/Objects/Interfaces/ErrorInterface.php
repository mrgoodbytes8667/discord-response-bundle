<?php


namespace Bytes\DiscordResponseBundle\Objects\Interfaces;


use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;

/**
 * Interface ErrorInterface
 * @package Bytes\DiscordResponseBundle\Objects\Interfaces
 *
 * @see ErrorTrait
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

    /**
     * @return int|null
     */
    public function getRetryAfter(): ?int;

    /**
     * @return bool|null
     */
    public function getGlobal(): ?bool;

    /**
     * @return mixed|null
     */
    public function getErrors();
}