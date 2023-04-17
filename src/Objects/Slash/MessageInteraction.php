<?php


namespace Bytes\DiscordResponseBundle\Objects\Slash;


use Bytes\DiscordResponseBundle\Enums\InteractionType;
use Bytes\DiscordResponseBundle\Objects\Interfaces\NameInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;
use Bytes\DiscordResponseBundle\Objects\User;
use Bytes\ResponseBundle\Interfaces\IdInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class MessageInteraction
 * This is sent on the message object when the message is a response to an Interaction.
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#messageinteraction
 *
 * @property string|null $id id of the interaction (snowflake)
 *
 * @version v0.7.0 As of 2021-03-17 Discord Documentation
 */
class MessageInteraction implements IdInterface, NameInterface
{
    use IDTrait, NameTrait;

    /**
     * the type of interaction
     * @var InteractionType|null
     */
    private $type;

    /**
     * the name of the ApplicationCommand
     * 1-32 character name matching ^[\w-]{1,32}$
     * @var string|null
     */
    #[Assert\Length(min: 1, max: 32, minMessage: 'Your name must be at least {{ limit }} characters long', maxMessage: 'Your name cannot be longer than {{ limit }} characters')]
    #[Assert\Regex('/^[\w-]{1,32}$/')]
    private $name;

    /**
     * the user who invoked the interaction
     * @var User|null
     */
    private $user;

    /**
     * @return InteractionType|null
     */
    public function getType(): ?InteractionType
    {
        return $this->type;
    }

    /**
     * @param InteractionType|null $type
     * @return $this
     */
    public function setType(?InteractionType $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return $this
     */
    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }


}