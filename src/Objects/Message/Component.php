<?php

namespace Bytes\DiscordResponseBundle\Objects\Message;

use Bytes\DiscordResponseBundle\Enums\ButtonStyle;
use Bytes\DiscordResponseBundle\Enums\ComponentType;
use Bytes\DiscordResponseBundle\Objects\PartialEmoji;
use Bytes\DiscordResponseBundle\Objects\Traits\LabelTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\PartialEmojiTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://discord.com/developers/docs/interactions/message-components#component-object-component-structure
 *
 * @version v0.9.8 As of 2021-08-02 Discord Documentation
 */
class Component
{
    use LabelTrait, PartialEmojiTrait;

    /**
     * Types: All
     * @var int|null
     * @see ComponentType
     * @Assert\Expression(
     *     "value in [1, 2, 3]"
     * )
     */
    private $type;

    /**
     * a developer-defined identifier for the component, max 100 characters
     * Types: Buttons, Select Menus
     * @var string|null
     * @Assert\Length(max=100)
     */
    private $custom_id;

    /**
     * whether the component is disabled, default false
     * Types: Buttons, Select Menus
     * @var bool|null
     */
    private $disabled;

    /**
     * one of button styles
     * Types: Buttons
     * @var int|null
     * @see ButtonStyle
     */
    private $style;

    /**
     * text that appears on the button, max 80 characters
     * Types: Buttons
     * @var string|null
     * @Assert\Length(max=80)
     */
    private $label;

    /**
     * name, id, and animated
     * Types: Buttons
     * @var PartialEmoji|null
     */
    private $emoji;

    /**
     * a url for link-style buttons
     * Types: Buttons
     * @var string|null
     * @Assert\Url()
     */
    private $url;

    /**
     * the choices in the select, max 25
     * Types: Select Menus
     * @var SelectOption[]|null
     * @Assert\Count(
     *     max=25,
     *     maxMessage = "This component should contain {{ limit }} options or less."
     * )
     */
    private $options;

    /**
     * custom placeholder text if nothing is selected, max 100 characters
     * Types: Select Menus
     * @var string|null
     * @Assert\Length(max=100)
     */
    private $placeholder;

    /**
     * the minimum number of items that must be chosen; default 1, min 0, max 25
     * Types: Select Menus
     * @var int|null
     * @Assert\GreaterThanOrEqual(0)
     * @Assert\LessThanOrEqual(25)
     */
    private $min_values;

    /**
     * the maximum number of items that can be chosen; default 1, max 25
     * Types: Select Menus
     * @var int|null
     * @Assert\GreaterThanOrEqual(1)
     * @Assert\LessThanOrEqual(25)
     */
    private $max_values;

    /**
     * a list of child components
     * Types: Action Rows
     * @var Component[]|null
     */
    private $components;

    /**
     * @param Component[] $components
     * @return static
     */
    public static function createActionRow(array $components): static
    {
        return static::create(ComponentType::actionRow(), components: $components);
    }

    /**
     * @param ComponentType $type
     * @param string|null $customId
     * @param bool $disabled
     * @param ButtonStyle|null $style
     * @param string|null $label
     * @param PartialEmoji|null $emoji
     * @param string|null $url
     * @param SelectOption[]|null $options
     * @param string|null $placeholder
     * @param int|null $minValues
     * @param int|null $maxValues
     * @param Component[]|null $components
     * @return static
     */
    public static function create(ComponentType $type, ?string $customId = null, bool $disabled = false,
                                  ?ButtonStyle  $style = null, ?string $label = null, ?PartialEmoji $emoji = null,
                                  ?string       $url = null, ?array $options = [], ?string $placeholder = null, ?int $minValues = null,
                                  ?int          $maxValues = null, ?array $components = []): static
    {
        $static = new static();
        $static->setType($type)
            ->setCustomId($customId)
            ->setDisabled($disabled)
            ->setStyle($style)
            ->setLabel($label)
            ->setEmoji($emoji)
            ->setUrl($url)
            ->setOptions($options)
            ->setPlaceholder($placeholder)
            ->setMinValues($minValues)
            ->setMaxValues($maxValues)
            ->setComponents($components);

        return $static;
    }

    /**
     * @param string|null $customId
     * @param bool $disabled
     * @param ButtonStyle|null $style
     * @param string|null $label
     * @param PartialEmoji|null $emoji
     * @param string|null $url
     * @return static
     */
    public static function createButton(?string $customId = null, bool $disabled = false, ?ButtonStyle $style = null,
                                        ?string $label = null, ?PartialEmoji $emoji = null, ?string $url = null): static
    {
        return static::create(ComponentType::button(), customId: $customId, disabled: $disabled, style: $style,
            label: $label, emoji: $emoji, url: $url);
    }

    /**
     * @param string|null $customId
     * @param bool $disabled
     * @param SelectOption[]|null $options
     * @param string|null $placeholder
     * @param int $minValues
     * @param int|null $maxValues
     * @return static
     */
    public static function createSelectMenu(?string $customId = null, bool $disabled = false, ?array $options = [],
                                            ?string $placeholder = null, int $minValues = 1, ?int $maxValues = 1): static
    {
        return static::create(ComponentType::selectMenu(), $customId, $disabled, options: $options,
            placeholder: $placeholder, minValues: $minValues, maxValues: $maxValues);
    }

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param ComponentType|int|null $type
     * @return $this
     */
    public function setType(ComponentType|int|null $type): self
    {
        if ($type instanceof ComponentType) {
            $type = $type->value;
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomId(): ?string
    {
        return $this->custom_id;
    }

    /**
     * @param string|null $custom_id
     * @return $this
     */
    public function setCustomId(?string $custom_id): self
    {
        $this->custom_id = $custom_id;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDisabled(): ?bool
    {
        return $this->disabled;
    }

    /**
     * @param bool|null $disabled
     * @return $this
     */
    public function setDisabled(?bool $disabled): self
    {
        $this->disabled = $disabled;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getStyle(): ?int
    {
        return $this->style;
    }

    /**
     * @param ButtonStyle|int|null $style
     * @return $this
     */
    public function setStyle(ButtonStyle|int|null $style): self
    {
        if ($style instanceof ButtonStyle) {
            $style = $style->value;
        }
        $this->style = $style;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string|null $url
     * @return $this
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return SelectOption[]|null
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * @param SelectOption[]|null $options
     * @return $this
     */
    public function setOptions(?array $options): self
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPlaceholder(): ?string
    {
        return $this->placeholder;
    }

    /**
     * @param string|null $placeholder
     * @return $this
     */
    public function setPlaceholder(?string $placeholder): self
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinValues(): ?int
    {
        return $this->min_values;
    }

    /**
     * @param int|null $min_values
     * @return $this
     */
    public function setMinValues(?int $min_values): self
    {
        $this->min_values = $min_values;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxValues(): ?int
    {
        return $this->max_values;
    }

    /**
     * @param int|null $max_values
     * @return $this
     */
    public function setMaxValues(?int $max_values): self
    {
        $this->max_values = $max_values;
        return $this;
    }

    /**
     * @return Component[]|null
     */
    public function getComponents(): ?array
    {
        return $this->components;
    }

    /**
     * @param Component[]|null $components
     * @return $this
     */
    public function setComponents(?array $components): self
    {
        $this->components = $components;
        return $this;
    }
}