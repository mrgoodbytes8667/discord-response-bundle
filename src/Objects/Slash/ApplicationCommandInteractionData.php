<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Enums\ComponentType;
use Bytes\DiscordResponseBundle\Objects\Interfaces\NameInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;
use Bytes\ResponseBundle\Interfaces\IdInterface;
use UnexpectedValueException;

/**
 * Class ApplicationCommandInteractionData
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#interaction-applicationcommandinteractiondata
 *
 * @property string|null $id the ID of the invoked command (snowflake)
 * @property string|null $name the name of the invoked command
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 */
class ApplicationCommandInteractionData implements IdInterface, NameInterface
{
    use IDTrait, NameTrait;

    /**
     * @var ApplicationCommandInteractionDataResolved|null
     */
    private $resolved;

    /**
     * the params + values from the user
     * @var ApplicationCommandInteractionDataOption[]|null
     */
    private $options;

    /**
     * @var string|null
     */
    private $customId;

    /**
     * @var ComponentType|null
     */
    private $componentType;

    /**
     * @return ApplicationCommandInteractionDataResolved|null
     */
    public function getResolved(): ?ApplicationCommandInteractionDataResolved
    {
        return $this->resolved;
    }

    /**
     * @param ApplicationCommandInteractionDataResolved|null $resolved
     * @return $this
     */
    public function setResolved(?ApplicationCommandInteractionDataResolved $resolved): self
    {
        $this->resolved = $resolved;
        return $this;
    }

    /**
     * @return ApplicationCommandInteractionDataOption[]|null
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * @param ApplicationCommandInteractionDataOption[]|null $options
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
     * @return ComponentType|null
     */
    public function getComponentType(): ?ComponentType
    {
        return $this->componentType;
    }

    /**
     * @param ComponentType|int|null $type
     * @return $this
     */
    public function setComponentType(ComponentType|int|null $type): self
    {
        if (!is_null($type)) {
            if (is_int($type)) {
                if (!ComponentType::isValid($type)) {
                    throw new UnexpectedValueException(sprintf('The value "%d" is not a member of the "%s" class.', $type, ComponentType::class));
                }
                
                $type = ComponentType::tryFrom($type);
            }
        }
        
        $this->componentType = $type;
        return $this;
    }
}