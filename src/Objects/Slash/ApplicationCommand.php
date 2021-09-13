<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandType;
use Bytes\DiscordResponseBundle\Objects\Application\Command\ChatInputCommand;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ApplicationCommandInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ApplicationIdTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\GuildIDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameDescriptionValueLengthTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;
use Bytes\ResponseBundle\Interfaces\IdInterface;
use JetBrains\PhpStorm\Deprecated;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Annotation\SerializedName;
use UnexpectedValueException;

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
 * @version v0.11.0 As of 2021-09-13 Discord Documentation
 */
class ApplicationCommand implements ApplicationCommandInterface, IdInterface
{
    use IDTrait, ApplicationIdTrait, NameTrait, NameDescriptionValueLengthTrait, GuildIDTrait;

    /**
     * @var ApplicationCommandType|null
     */
    private $type;

    /**
     * whether the command is enabled by default when the app is added to a guild
     * @var bool|null Default true
     * @SerializedName("default_permission")
     */
    private $defaultPermission = true;

    /**
     * autoincrementing version identifier updated during substantial record changes
     * @var string|null
     */
    private $version;

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
    #[Deprecated(
        reason: 'since 0.10.8, use createChatCommand instead',
        replacement: '\Bytes\DiscordResponseBundle\Objects\Application\Command\ChatInputCommand::createChatCommand(%parametersList%)'
    )]
    public static function create(string $name, string $description, ?array $options = null, bool $defaultPermission = true)
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.8', 'Using "%s" is deprecated, use "%s::%s()" instead.', __METHOD__, ChatInputCommand::class, 'createChatCommand');
        return ChatInputCommand::createChatCommand($name, $description, $options, $defaultPermission);
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
                    throw new UnexpectedValueException(sprintf('The value "%d" is not a member of the "%s" class.', $type, ApplicationCommandType::class));
                }
                $type = ApplicationCommandType::tryFrom($type);
            }
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getDefaultPermission(): ?bool
    {
        return $this->defaultPermission;
    }

    /**
     * @param bool|null $defaultPermission
     * @return $this
     */
    public function setDefaultPermission(?bool $defaultPermission): self
    {
        $this->defaultPermission = $defaultPermission;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @param string|null $version
     * @return $this
     */
    public function setVersion(?string $version): self
    {
        $this->version = $version;
        return $this;
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
