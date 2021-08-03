<?php

namespace Bytes\DiscordResponseBundle\Objects;

use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\ResponseBundle\Interfaces\IdInterface;

/**
 * @link https://discord.com/developers/docs/resources/emoji#emoji-object
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 */
class PartialEmoji implements IdInterface
{
    use IDTrait;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var bool|null
     */
    private $animated;

    /**
     * @param string $id
     * @param string $name
     * @param bool $animated
     * @return static
     */
    public static function create(string $id, string $name, bool $animated = false): static
    {
        $static = new static();
        $static->setId($id)
            ->setName($name)
            ->setAnimated($animated);

        return $static;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return $this
     */
    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAnimated(): ?bool
    {
        return $this->animated;
    }

    /**
     * @param bool|null $animated
     * @return $this
     */
    public function setAnimated(?bool $animated): self
    {
        $this->animated = $animated;
        return $this;
    }
}