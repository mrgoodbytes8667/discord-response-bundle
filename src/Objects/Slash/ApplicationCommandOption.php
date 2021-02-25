<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandOptionType;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;

/**
 * Class ApplicationCommandOption
 * You can specify a maximum of 10 choices per option
 *
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#applicationcommandoption
 *
 * @property string|null $name 1-32 character name matching ^[\w-]{1,32}$
 *
 * @version v0.5.8 As of 2021-02-25 Discord Documentation
 */
class ApplicationCommandOption
{
    use NameTrait;

    /**
     * value of ApplicationCommandOptionType
     * @var int|null
     */
    private $type;

    /**
     * 1-100 character description
     * @var string|null
     */
    private $description;

    /**
     * if the parameter is required or optional--default false
     * @var boolean|null
     */
    private $required;

    /**
     * choices for string and int types for the user to pick from
     * @var ApplicationCommandOptionChoice[]|null
     */
    private $choices;

    /**
     * if the option is a subcommand or subcommand group type, this nested options will be the parameters
     * @var ApplicationCommandOption[]|null
     */
    private $options;

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param ApplicationCommandOptionType|int|null $type
     * @return $this
     */
    public function setType($type): self
    {
        if ($type instanceof ApplicationCommandOptionType) {
            $type = $type->value;
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getRequired(): ?bool
    {
        return $this->required;
    }

    /**
     * @param bool|null $required
     * @return $this
     */
    public function setRequired(?bool $required): self
    {
        $this->required = $required;
        return $this;
    }

    /**
     * @return $thisChoice[]|null
     */
    public function getChoices(): ?array
    {
        return $this->choices;
    }

    /**
     * @param ApplicationCommandOptionChoice[]|null $choices
     * @return $this
     */
    public function setChoices(?array $choices): self
    {
        $this->choices = $choices;
        return $this;
    }

    /**
     * @return $this[]|null
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * @param ApplicationCommandOption[]|null $options
     * @return $this
     */
    public function setOptions(?array $options): self
    {
        $this->options = $options;
        return $this;
    }
}
