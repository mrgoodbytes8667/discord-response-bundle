<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;

/**
 * Class ApplicationCommand
 * An application command is the base "command" model that belongs to an application. This is what you are creating when you POST a new command.
 * A command, or each individual subcommand, can have a maximum of 10 options
 *
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#applicationcommand
 *
 * @property string|null $id unique id of the command
 * @property string|null $name 3-32 character name matching ^[\w-]{3,32}$
 *
 * @version v0.6.0 As of 2021-02-25 Discord Documentation
 */
class ApplicationCommand
{
    use IDTrait, NameTrait;

    /**
     * unique id of the parent application
     * @var string|null
     */
    private $applicationId;

    /**
     * 1-100 character description
     * @var string|null
     */
    private $description;

    /**
     * the parameters for the command
     * @var ApplicationCommandOption[]|null
     */
    private $options;

    /**
     * @return string|null
     */
    public function getApplicationId(): ?string
    {
        return $this->applicationId;
    }

    /**
     * @param string|null $applicationId
     * @return $this
     */
    public function setApplicationId(?string $applicationId): self
    {
        $this->applicationId = $applicationId;
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
     * @return $thisOption[]|null
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
