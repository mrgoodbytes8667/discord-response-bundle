<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandOptionType;
use Bytes\DiscordResponseBundle\Objects\Interfaces\NameInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ApplicationCommandOptionTypeTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\DescriptionTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameDescriptionValueLengthTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * Class ApplicationCommandOption
 * You can specify a maximum of 25 choices per option
 *
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#applicationcommandoption
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 */
class ApplicationCommandOption implements NameInterface
{
    use NameTrait, DescriptionTrait, NameDescriptionValueLengthTrait, ApplicationCommandOptionTypeTrait;

    /**
     * 1-32 character name matching ^[\w-]{1,32}$
     * @var string|null
     */
    #[Assert\Length(min: 1, max: 32, minMessage: 'Your name must be at least {{ limit }} characters long', maxMessage: 'Your name cannot be longer than {{ limit }} characters')]
    #[Assert\Regex('/^[\w-]{1,32}$/')]
    #[Assert\Regex(pattern: '/([A-Z].*)/', match: false, message: 'Your option name may not contain uppercase characters.')]
    private $name;

    /**
     * 1-100 character description
     * @var string|null
     */
    #[Assert\Length(min: 1, max: 100, minMessage: 'Your description must be at least {{ limit }} characters long', maxMessage: 'Your description cannot be longer than {{ limit }} characters')]
    private $description;

    /**
     * if the parameter is required or optional--default false
     * @var boolean|null
     */
    private $required;

    /**
     * choices for STRING, INTEGER, and NUMBER types for the user to pick from
     * @var ApplicationCommandOptionChoice[]|ArrayCollection|null
     */
    #[Assert\Count(max: 25, maxMessage: 'You cannot specify more than {{ limit }} choices per command/option')]
    #[Assert\Valid]
    private $choices;

    /**
     * if the option is a subcommand or subcommand group type, this nested options will be the parameters
     * @var ApplicationCommandOption[]|ArrayCollection|null
     */
    #[Assert\Valid]
    private $options;

    /**
     * @param ApplicationCommandOptionType $type
     * @param string $name
     * @param string $description
     * @param bool $required
     * @param ApplicationCommandOptionChoice[]|null $choices
     * @param ApplicationCommandOption[]|null $options
     * @return static
     */
    public static function create(ApplicationCommandOptionType $type, string $name, string $description, bool $required = false, ?array $choices = [], ?array $options = [])
    {
        $option = new static();
        $option->setType($type);
        $option->setName($name);
        $option->setDescription($description);
        $option->setRequired($required);
        $option->setChoices($choices);
        $option->setOptions($options);

        return $option;
    }

    /**
     * @param string $name
     * @param string $description
     * @param ApplicationCommandOption[]|null $options
     * @return static
     */
    public static function createSubcommand(string $name, string $description, ?array $options = [])
    {
        $option = new static();
        $option->setType(ApplicationCommandOptionType::SUBCOMMAND);
        $option->setName($name);
        $option->setDescription($description);
        $option->setOptions($options);

        return $option;
    }

    /**
     * @param string $name
     * @param string $description
     * @param ApplicationCommandOption[]|null $options
     * @return static
     */
    public static function createSubcommandGroup(string $name, string $description, ?array $options = [])
    {
        $option = new static();
        $option->setType(ApplicationCommandOptionType::SUB_COMMAND_GROUP);
        $option->setName($name);
        $option->setDescription($description);
        $option->setOptions($options);

        return $option;
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
     * @return ApplicationCommandOptionChoice[]|null
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
     * @param ApplicationCommandOptionChoice $choice
     * @return $this
     */
    public function addChoice(ApplicationCommandOptionChoice $choice): self
    {
        if (!$this->choices->contains($choice)) {
            $this->choices[] = $choice;
        }
        
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

    /**
     * @param ApplicationCommandOption $option
     * @return $this
     */
    public function addOption(ApplicationCommandOption $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
        }
        
        return $this;
    }

    /**
     * @param ExecutionContextInterface $context
     * @param $payload
     */
    #[Assert\Callback]
    public function validate(ExecutionContextInterface $context, $payload)
    {
        if (!empty($this->type) && !ApplicationCommandOptionType::isValid($this->type)) {
            $context->buildViolation('This is not a valid type.')
                ->atPath('type')
                ->addViolation();
        }
    }
}
