<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Enums\InteractionResponseType;

/**
 * Class InteractionResponse
 * After receiving an interaction, you must respond to acknowledge it. You can choose to respond with a message
 * immediately using type 4, or you can choose to send a deferred response with type 5. If choosing a deferred response,
 * the user will see a loading state for the interaction, and you'll have up to 15 minutes to edit the original deferred
 * response using Edit Original Interaction Response.
 *
 * A deferred response tells the user "Bot name is thinking"
 *
 * Interaction responses can also be public—everyone can see it—or "ephemeral"—only the invoking user can see it. That
 * is determined by setting flags to 64 on the InteractionApplicationCommandCallbackData.
 *
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#interaction-response
 *
 * @version v0.7.0 As of 2021-03-17 Discord Documentation
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
