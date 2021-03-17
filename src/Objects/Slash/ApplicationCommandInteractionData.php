<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Objects\Interfaces\IdInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\NameInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;

/**
 * Class ApplicationCommandInteractionData
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#interaction-applicationcommandinteractiondata
 *
 * @property string|null $id the ID of the invoked command
 * @property string|null $name the name of the invoked command
 *
 * @version v0.6.0 As of 2021-02-25 Discord Documentation
 */
class ApplicationCommandInteractionData implements IdInterface, NameInterface
{
    use IDTrait, NameTrait;

    /**
     * the params + values from the user
     * @var ApplicationCommandInteractionDataOption[]|null
     */
    private $options;

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
