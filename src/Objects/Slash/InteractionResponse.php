<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Enums\InteractionResponseType;

/**
 * Class InteractionResponse
 * After receiving an interaction, you must respond to acknowledge it. This may be a pong for a ping, a message, or simply an acknowledgement that you have received it and will handle the command async.
 * Interaction responses may choose to "eat" the user's command input if you do not wish to have their slash command show up as message in chat. This may be helpful for slash commands, or commands whose responses are asynchronous or ephemeral messages.
 *
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#interaction-response
 *
 * @version v0.6.0 As of 2021-02-25 Discord Documentation
 */
class InteractionResponse
{
    /**
     * the type of response
     * @var int|null
     */
    private $type;

    /**
     * an optional response message
     * @var InteractionApplicationCommandCallbackData|null
     */
    private $data;

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param InteractionResponseType|int|null $type
     * @return $this
     */
    public function setType($type): self
    {
        if ($type instanceof InteractionResponseType) {
            $type = $type->value;
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @return InteractionApplicationCommandCallbackData|null
     */
    public function getData(): ?InteractionApplicationCommandCallbackData
    {
        return $this->data;
    }

    /**
     * @param InteractionApplicationCommandCallbackData|null $data
     * @return $this
     */
    public function setData(?InteractionApplicationCommandCallbackData $data): self
    {
        $this->data = $data;
        return $this;
    }

}
