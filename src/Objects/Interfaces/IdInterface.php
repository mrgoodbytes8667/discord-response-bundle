<?php


namespace Bytes\DiscordResponseBundle\Objects\Interfaces;


use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;

trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.8.3', 'The "%s" interface is deprecated, use "%s" in "mrgoodbytes8667/response-bundle" instead.', __CLASS__, __CLASS__);

/**
 * Interface IdInterface
 * @package Bytes\DiscordResponseBundle\Objects\Interfaces
 *
 * @see IDTrait
 *
 * @deprecated v0.8.3 IdInterface has moved to "mrgoodbytes8667/response-bundle"
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