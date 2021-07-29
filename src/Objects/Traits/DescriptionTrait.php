<?php

namespace Bytes\DiscordResponseBundle\Objects\Traits;

/**
 * Trait DescriptionTrait
 * @package Bytes\DiscordResponseBundle\Objects\Traits
 */
trait DescriptionTrait
{
    /**
     * 1-100 character description
     * @var string|null
     */
    private $description;

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }
}