<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;

/**
 * Class ApplicationCommandOptionChoice
 * If you specify choices for an option, they are the only valid values for a user to pick
 *
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#applicationcommandoptionchoice
 *
 * @property string|null $name 1-100 character choice name
 *
 * @version v0.5.8 As of 2021-02-25 Discord Documentation
 */
class ApplicationCommandOptionChoice
{
    use NameTrait;

    /**
     * value of the choice
     * @var string|int|null
     */
    private $value;

    /**
     * @return int|string|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int|string|null $value
     * @return $this
     */
    public function setValue($value): self
    {
        $this->value = $value;
        return $this;
    }

}
