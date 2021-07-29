<?php

namespace Bytes\DiscordResponseBundle\Objects\Traits;

/**
 * Trait ApplicationIdTrait
 * @package Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommand
 */
trait ApplicationIdTrait
{
    /**
     * unique id of the parent application (snowflake)
     * @var string|null
     */
    private $applicationId;

    /**
     * @return string|null
     */
    public function getApplicationId(): ?string
    {
        return $this->applicationId;
    }

    /**
     * @param string|null $applicationId
     * @return $this
     */
    public function setApplicationId(?string $applicationId): self
    {
        $this->applicationId = $applicationId;
        return $this;
    }
}