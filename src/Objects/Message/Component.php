<?php

namespace Bytes\DiscordResponseBundle\Objects\Message;

use Bytes\DiscordResponseBundle\Enums\ButtonStyle;
use Bytes\DiscordResponseBundle\Enums\ComponentType;
use Bytes\DiscordResponseBundle\Objects\PartialEmoji;
use Bytes\DiscordResponseBundle\Objects\Traits\LabelTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\PartialEmojiTrait;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use UnexpectedValueException;

/**
 * @link https://discord.com/developers/docs/interactions/message-components#component-object-component-structure
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 */
class Component
{
    use LabelTrait, PartialEmojiTrait;

    /**
     * Types: All
     * @var ComponentType|null
     */
    private $type;

    /**
     * a developer-defined identifier for the component, max 100 characters
     * Types: Buttons, Select Menus
     * @var string|null
     */
    #[Assert\Length(max: 100)]
    #[SerializedName('custom_id')]
    private $customId;

    /**
     * whether the component is disabled, default false
     * Types: Buttons, Select Menus
     * @var bool|null
     */
    private $disabled;

    /**
     * one of button styles
     * Types: Buttons
     * @var ButtonStyle|null
     */
    private $style;

    /**
     * text that appears on the button, max 80 characters
     * Types: Buttons
     * @var string|null
     */
    #[Assert\Length(max: 80)]
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
     */
    #[Assert\Url]
    private $url;

    /**
     * the choices in the select, max 25
     * Types: Select Menus
     * @var SelectOption[]|null
     */
    #[Assert\Count(max: 25, maxMessage: 'This component should contain {{ limit }} options or less.')]
    private $options;

    /**
     * custom placeholder text if nothing is selected, max 100 characters
     * Types: Select Menus
     * @var string|null
     */
    #[Assert\Length(max: 100)]
    private $placeholder;

    /**
     * the minimum number of items that must be chosen; default 1, min 0, max 25
     * Types: Select Menus
     * @var int|null
     */
    #[Assert\GreaterThanOrEqual(0)]
    #[Assert\LessThanOrEqual(25)]
    #[SerializedName('min_values')]
    private $minValues;

    /**
     * the maximum number of items that can be chosen; default 1, max 25
     * Types: Select Menus
     * @var int|null
     */
    #[Assert\GreaterThanOrEqual(1)]
    #[Assert\LessThanOrEqual(25)]
    #[SerializedName('max_values')]
    private $maxValues;

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
        return static::create(ComponentType::ACTION_ROW, components: $components);
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
    public static function create(ComponentType $type, ?string $customId = null, ?bool $disabled = null,
                                  ?ButtonStyle  $style = null, ?string $label = null, ?PartialEmoji $emoji = null,
                                  ?string       $url = null, ?array $options = null, ?string $placeholder = null, ?int $minValues = null,
                                  ?int          $maxValues = null, ?array $components = null): static
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
     * @param ButtonStyle $style
     * @param string|null $customId
     * @param string|null $url
     * @param string|null $label
     * @param PartialEmoji|null $emoji
     * @param bool $disabled
     * @return static
     */
    public static function createButton(ButtonStyle $style, ?string $customId = null, ?string $url = null,
                                        ?string     $label = null, ?PartialEmoji $emoji = null, bool $disabled = false): static
    {
        return static::create(ComponentType::BUTTON, customId: !$style->equals(ButtonStyle::LINK) ? $customId : null,
            disabled: $disabled, style: $style, label: $label, emoji: $emoji,
            url: $style->equals(ButtonStyle::LINK) ? $url : null);
    }

    /**
     * @param ButtonStyle $style
     * @param string $customId
     * @param string|null $label
     * @param PartialEmoji|null $emoji
     * @param bool $disabled
     * @return static
     */
    public static function createInteractiveButton(ButtonStyle   $style, string $customId, ?string $label = null,
                                                   ?PartialEmoji $emoji = null, bool $disabled = false): static
    {
        if ($style->equals(ButtonStyle::LINK)) {
            throw new UnexpectedValueException('Interactive buttons cannot use the link style');
        }
        
        return static::create(ComponentType::BUTTON, customId: $customId, disabled: $disabled, style: $style,
            label: $label, emoji: $emoji);
    }

    /**
     * @param string $url
     * @param string|null $label
     * @param PartialEmoji|null $emoji
     * @param bool $disabled
     * @return static
     */
    public static function createLinkButton(string $url, ?string $label = null, ?PartialEmoji $emoji = null, bool $disabled = false): static
    {
        return static::create(ComponentType::BUTTON, disabled: $disabled, style: ButtonStyle::LINK, label: $label,
            emoji: $emoji, url: $url);
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
        return static::create(ComponentType::SELECT_MENU, $customId, $disabled, options: $options,
            placeholder: $placeholder, minValues: $minValues, maxValues: $maxValues);
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
        return $this->minValues;
    }

    /**
     * @param int|null $minValues
     * @return $this
     */
    public function setMinValues(?int $minValues): self
    {
        $this->minValues = $minValues;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxValues(): ?int
    {
        return $this->maxValues;
    }

    /**
     * @param int|null $maxValues
     * @return $this
     */
    public function setMaxValues(?int $maxValues): self
    {
        $this->maxValues = $maxValues;
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

    /**
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    #[Assert\Callback]
    public function validate(ExecutionContextInterface $context, $payload)
    {
        switch ($this->getType()) {
            // If this is a button
            case ComponentType::BUTTON:
                // If this is a link button
                if ($this->getStyle()->equals(ButtonStyle::LINK)) {
                    // Custom ID must be null
                    if (!is_null($this->getCustomId())) {
                        $context->buildViolation('The field "customId" cannot be populated for link buttons.')
                            ->atPath('customId')
                            ->addViolation();
                        // URL cannot be empty
                    } elseif (empty($this->getUrl())) {
                        $context->buildViolation('The field "url" is required for link buttons.')
                            ->atPath('url')
                            ->addViolation();
                    }
                    
                    // For non-link buttons
                    // URL must be null
                } elseif (!is_null($this->getUrl())) {
                    $context->buildViolation('The field "url" can only be populated for link buttons.')
                        ->atPath('url')
                        ->addViolation();
                    // Custom ID cannot be empty
                } elseif (empty($this->getCustomId())) {
                    $context->buildViolation('The field "customId" is required for non-link buttons.')
                        ->atPath('customId')
                        ->addViolation();
                }
                
                break;
        }
    }

    /**
     * @return ComponentType|null
     */
    public function getType(): ?ComponentType
    {
        return $this->type;
    }

    /**
     * @param ComponentType|int|null $type
     * @return $this
     */
    public function setType(ComponentType|int|null $type): self
    {
        if (!is_null($type)) {
            if (is_int($type)) {
                if (!ComponentType::isValid($type)) {
                    throw new UnexpectedValueException(sprintf('The value "%d" is not a member of the "%s" class.', $type, ComponentType::class));
                }
                
                $type = ComponentType::tryFrom($type);
            }
        }
        
        $this->type = $type;
        return $this;
    }

    /**
     * @return ButtonStyle|null
     */
    public function getStyle(): ?ButtonStyle
    {
        return $this->style;
    }

    /**
     * @param ButtonStyle|int|null $style
     * @return $this
     */
    public function setStyle(ButtonStyle|int|null $style): self
    {
        if (!is_null($style)) {
            if (is_int($style)) {
                if (!ButtonStyle::isValid($style)) {
                    throw new UnexpectedValueException(sprintf('The value "%d" is not a member of the "%s" class.', $style, ButtonStyle::class));
                }
                
                $style = ButtonStyle::tryFrom($style);
            }
        }
        
        $this->style = $style;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomId(): ?string
    {
        return $this->customId;
    }

    /**
     * @param string|null $customId
     * @return $this
     */
    public function setCustomId(?string $customId): self
    {
        $this->customId = $customId;
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
}