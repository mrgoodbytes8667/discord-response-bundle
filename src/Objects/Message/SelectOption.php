<?php

namespace Bytes\DiscordResponseBundle\Objects\Message;

use Bytes\DiscordResponseBundle\Objects\PartialEmoji;
use Bytes\DiscordResponseBundle\Objects\Traits\DescriptionTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\LabelTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\PartialEmojiTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://discord.com/developers/docs/interactions/message-components#select-menu-object-select-option-structure
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 */
class SelectOption
{
    use LabelTrait, DescriptionTrait, PartialEmojiTrait;

    /**
     * the user-facing name of the option, max 25 characters
     * @var string|null
     * @Assert\AtLeastOneOf({
     *     @Assert\Blank(),
     *     @Assert\Length(max=25)
     * })
     */
    private $label;

    /**
     * the user-facing name of the option, max 25 characters
     * @var string|null
     * @Assert\AtLeastOneOf({
     *     @Assert\Blank(),
     *     @Assert\Length(max=100)
     * })
     */
    private $value;

    /**
     *    an additional description of the option, max 50 characters
     * @var string|null
     * @Assert\AtLeastOneOf({
     *     @Assert\Blank(),
     *     @Assert\Length(max=50)
     * })
     */
    private $description;

    /**
     * name, id, and animated
     * @var PartialEmoji|null
     */
    private $emoji;

    /**
     * will render this option as selected by default
     * @var bool|null
     */
    private $default;

    /**
     * @param string $label
     * @param string $value
     * @param string|null $description
     * @param PartialEmoji|null $emoji
     * @param bool|null $default
     * @return static
     */
    public static function create(string $label, string $value, ?string $description = null, ?PartialEmoji $emoji = null, ?bool $default = null): static
    {
        $static = new static();
        $static->setLabel($label)
            ->setValue($value)
            ->setDescription($description)
            ->setEmoji($emoji)
            ->setDefault($default);

        return $static;
    }

    /**
     * @return string|null
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param string|null $value
     * @return $this
     */
    public function setValue(?string $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDefault(): ?bool
    {
        return $this->default;
    }

    /**
     * @param bool|null $default
     * @return $this
     */
    public function setDefault(?bool $default): self
    {
        $this->default = $default;
        return $this;
    }
}