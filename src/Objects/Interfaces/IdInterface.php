<?php


namespace Bytes\DiscordResponseBundle\Objects\Interfaces;


use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;

/**
 * Interface IdInterface
 * @package Bytes\DiscordResponseBundle\Objects\Interfaces
 *
 * @see IDTrait
 */
interface IdInterface
{
    /**
     * @return string|null
     */
    public function getId(): ?string;

    /**
     * @param string|null $id
     * @return $this
     */
    public function setId(?string $id);
}