<?php


namespace Bytes\DiscordResponseBundle\Objects\Traits;


use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Trait DeletedTrait
 * @package Bytes\DiscordResponseBundle\Objects\Traits
 */
trait DeletedTrait
{
    /**
     * @var bool|null
     * @Groups("discordjs")
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