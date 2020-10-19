<?php


namespace Bytes\DiscordResponseBundle\Objects\Traits;


use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Trait IDTrait
 * @package Bytes\DiscordResponseBundle\Objects\Traits
 */
trait IDTrait
{
    /**
     * @var string|null
     * @Groups({"discordapi", "discordjs"})
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