<?php


namespace Bytes\DiscordResponseBundle\Objects\Traits;



/**
 * Trait IDTrait
 * @package Bytes\DiscordResponseBundle\Objects\Traits
 */
trait IDTrait
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return $this
     */
    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }
}