<?php

namespace Bytes\DiscordResponseBundle\Objects\Traits;

/**
 *
 */
trait LabelTrait
{
    /**
     * @var string|null
     */
    private $label;

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * @param string|null $label
     * @return $this
     */
    public function setLabel(?string $label): self
    {
        $this->label = $label;
        return $this;
    }
}