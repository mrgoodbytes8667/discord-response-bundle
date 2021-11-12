<?php


namespace Bytes\DiscordResponseBundle\Objects\Traits;



/**
 * Trait DeletedTrait
 * @package Bytes\DiscordResponseBundle\Objects\Traits
 */
trait DeletedTrait
{
    /**
     * @var bool|null
     */
    private $deleted;

    /**
     * @return bool|null
     */
    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    /**
     * @param bool|null $deleted
     * @return $this
     */
    public function setDeleted(?bool $deleted): self
    {
        $this->deleted = $deleted;
        return $this;
    }


}