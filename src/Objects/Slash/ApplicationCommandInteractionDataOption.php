<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandOptionType;
use Bytes\DiscordResponseBundle\Objects\Interfaces\NameInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ApplicationCommandOptionTypeTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;

/**
 * Class ApplicationCommandInteractionDataOption
 * All options have names, and an option can either be a parameter and input value--in which case value will be set--or it can denote a subcommand or group--in which case it will contain a top-level key and another array of options.
 * value and options are mutually exclusive.
 *
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/application-commands#application-command-object-application-command-interaction-data-option-structure
 *
 * @property string|null $name the name of the parameter
 *
 * @version v0.10.7 As of 2021-08-19 Discord Documentation
 */
class ApplicationCommandInteractionDataOption implements NameInterface
{
    use NameTrait, ApplicationCommandOptionTypeTrait;

    /**
     * the value of the pair
     * @todo This needs to be investigated, the documentation references a type that does not exist: OptionType
     * @var mixed|null
     */
    private $value;

    /**
     * present if this option is a group or subcommand
     * @var ApplicationCommandInteractionDataOption[]|null
     */
    private $options;

    /**
     * @param string $name
     * @param ApplicationCommandOptionType|int|null $type
     * @param mixed|null $value
     * @param ApplicationCommandInteractionDataOption[]|null $options
     * @return static
     */
    public static function create(string $name, ApplicationCommandOptionType|int|null $type = null, $value = null, ?array $options = null): static
    {
        $static = new static();
        return $static->setName($name)
            ->setType($type)
            ->setValue($value)
            ->setOptions($options);
    }

    /**
     * @return mixed|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed|null $value
     * @return $this
     */
    public function setValue($value): self
    {
        $this->value = $value;
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
}