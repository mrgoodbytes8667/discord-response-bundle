<?php

namespace Bytes\DiscordResponseBundle\Objects\Application\Command;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandType;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommand;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandOption;
use Bytes\DiscordResponseBundle\Objects\Traits\DescriptionTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Slash Commands
 * Slash commands (the CHAT_INPUT type) are a type of application command. They're made up of a name, description, and a
 * block of options, which you can think of like arguments to a function. The name and description help users find your
 * command among many others, and the options validate user input as they fill out your command.
 *
 * Slash commands can also have groups and subcommands to further organize commands.
 *
 * @link https://discord.com/developers/docs/interactions/application-commands#slash-commands
 *
 * @version v0.11.0 As of 2021-09-13 Discord Documentation
 */
class ChatInputCommand extends ApplicationCommand
{
    use DescriptionTrait, NameTrait;

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
     * @param bool $defaultPermission
     * @return static
     */
    public static function createChatCommand(string $name, string $description, ?array $options = null, bool $defaultPermission = true)
    {
        $command = new static();
        $command->setName($name)
            ->setDescription($description)
            ->setOptions($options)
            ->setDefaultPermission($defaultPermission)
            ->setType(ApplicationCommandType::chatInput());

        return $command;
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