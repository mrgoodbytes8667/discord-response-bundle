<?php


namespace Bytes\DiscordResponseBundle\Objects\Traits;


use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Trait NameTrait
 * @package Bytes\DiscordResponseBundle\Objects\Traits
 */
trait NameTrait
{
    /**
     * @var string
     * @Groups({"discordapi", "discordjs"})
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