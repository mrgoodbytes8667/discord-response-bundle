<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Objects\Interfaces\NameInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameDescriptionValueLengthTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;
use Bytes\ResponseBundle\Interfaces\IdInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ApplicationCommand
 * An application command is the base "command" model that belongs to an application. This is what you are creating when you POST a new command.
 * A command, or each individual subcommand, can have a maximum of 25 options
 *
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#applicationcommand
 *
 * @property string|null $id unique id of the command (snowflake)
 *
 * @version v0.7.0 As of 2021-03-17 Discord Documentation
 */
class ApplicationCommand implements IdInterface, NameInterface
{
    use IDTrait, NameTrait, NameDescriptionValueLengthTrait;

    /**
     * unique id of the parent application (snowflake)
     * @var string|null
     */
    private $applicationId;

    /**
     * 1-32 character name matching ^[\w-]{1,32}$
     * @var string|null
     * @Assert\Length(
     *      min = 1,
     *      max = 32,
     *      minMessage = "Your name must be at least {{ limit }} characters long",
     *      maxMessage = "Your name cannot be longer than {{ limit }} characters"
     * )
     * @Assert\Regex("/^[\w-]{1,32}$/")
     */
    private $name;

    /**
     * 1-100 character description
     * @var string|null
     * @Assert\Length(
     *      min = 1,
     *      max = 100,
     *      minMessage = "Your description must be at least {{ limit }} characters long",
     *      maxMessage = "Your description cannot be longer than {{ limit }} characters"
     * )
     */
    private $description;

    /**
     * the parameters for the command
     * @var ApplicationCommandOption[]|ArrayCollection|null
     * @Assert\Count(
     *      max = 25,
     *      maxMessage = "You cannot specify more than {{ limit }} options per command"
     * )
     * @Assert\Valid()
     */
    private $options;

    /**
     * @param string $name
     * @param string $description
     * @param ApplicationCommandOption[]|null $options
     * @return static
     */
    public static function create(string $name, string $description, ?array $options = null)
    {
        $command = new static();
        $command->setName($name);
        $command->setDescription($description);
        $command->setOptions($options);

        return $command;
    }

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
     * @return ApplicationCommandOption[]|null
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
     * @return int
     * @Assert\LessThanOrEqual(4000,
     *      message = "Your combined name, description, and value properties for each command and its subcommands and groups ({{ value }}) cannot be longer than {{ compared_value }} characters"
     * )
     * @Ignore()
     */
    public function getNameDescriptionValueCharacterLengthRecursively()
    {
        $length = $this->getNameDescriptionValueCharacterLength();
        foreach ($this->options ?? [] as $option) {
            $length += $option->getNameDescriptionValueCharacterLength();
            if (!empty($option->getOptions())) {
                foreach ($option->getOptions() as $i) {
                    $length += $i->getNameDescriptionValueCharacterLength();
                    foreach ($i->getOptions() as $j) {
                        $length += $j->getNameDescriptionValueCharacterLength();
                        if (!empty($j->getChoices())) {
                            foreach ($j->getChoices() as $k) {
                                $length += $k->getNameDescriptionValueCharacterLength();
                            }
                        }
                    }
                }
            }
            if (!empty($option->getChoices())) {
                foreach ($option->getChoices() as $i) {
                    $length += $i->getNameDescriptionValueCharacterLength();
                }
            }
        }

        return $length;
    }

}
