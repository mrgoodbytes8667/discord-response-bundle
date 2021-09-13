<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandType;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ApplicationCommandInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ApplicationIdTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\DescriptionTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\GuildIDTrait;
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
 * @property string|null $applicationId unique id of the parent application (snowflake)
 * @property string|null $guildId guild id of the command, if not global (snowflake)
 *
 * @version v0.9.12 As of 2021-08-03 Discord Documentation
 */
class ApplicationCommand implements ApplicationCommandInterface, IdInterface
{
    use IDTrait, ApplicationIdTrait, NameTrait, DescriptionTrait, NameDescriptionValueLengthTrait, GuildIDTrait;

    /**
     * @var ApplicationCommandType|null
     */
    private $type;

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
     * whether the command is enabled by default when the app is added to a guild
     * @var bool|null Default true
     */
    private $default_permission = true;

    /**
     * @var mixed
     * @Ignore()
     */
    private $entityId;

    /**
     * @param string $name
     * @param string $description
     * @param array|null $options
     * @param bool $defaultPermission
     * @return static
     */
    public static function create(string $name, string $description, ?array $options = null, bool $defaultPermission = true)
    {
        $command = new static();
        $command->setName($name);
        $command->setDescription($description);
        $command->setOptions($options);
        $command->setDefaultPermission($defaultPermission);

        return $command;
    }

    /**
     * @return ApplicationCommandType|null
     */
    public function getType(): ?ApplicationCommandType
    {
        return $this->type;
    }

    /**
     * @param ApplicationCommandType|int|null $type
     * @return $this
     */
    public function setType(ApplicationCommandType|int|null $type): self
    {
        if (!is_null($type)) {
            if (is_int($type)) {
                if (!ApplicationCommandType::isValid($type)) {
                    throw new \UnexpectedValueException(sprintf('The value "%d" is not a member of the "%s" class.', $type, ApplicationCommandType::class));
                }
                $type = ApplicationCommandType::tryFrom($type);
            }
        }
        $this->type = $type;
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
     * @return bool|null
     */
    public function getDefaultPermission(): ?bool
    {
        return $this->default_permission;
    }

    /**
     * @param bool|null $default_permission
     * @return $this
     */
    public function setDefaultPermission(?bool $default_permission): self
    {
        $this->default_permission = $default_permission;
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

    /**
     * @return string|null
     */
    public function getCommandId(): ?string
    {
        return $this->id;
    }

    /**
     * @return mixed
     * @Ignore()
     */
    public function getEntityId(): mixed
    {
        return $this->entityId;
    }

    /**
     * @param mixed $entityId
     * @return $this
     */
    public function setEntityId(mixed $entityId): self
    {
        $this->entityId = $entityId;
        return $this;
    }
}
