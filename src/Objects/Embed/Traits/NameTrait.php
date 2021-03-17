<?php


namespace Bytes\DiscordResponseBundle\Objects\Embed\Traits;


/**
 * Trait NameTrait
 * @package Bytes\DiscordResponseBundle\Objects\Embed\Traits
 *
 * @deprecated v0.7.0 Replace with Bytes\DiscordResponseBundle\Objects\Traits\NameTrait
 */
trait NameTrait
{
    /**
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}