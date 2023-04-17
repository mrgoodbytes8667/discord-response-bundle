<?php

namespace Bytes\DiscordResponseBundle\Objects\Application\Command;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandType;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommand;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @link https://discord.com/developers/docs/interactions/application-commands#message-commands
 *
 * @version v0.11.0 As of 2021-09-13 Discord Documentation
 */
class MessageCommand extends ApplicationCommand
{
    use NameTrait;

    /**
     * 1-32 character name
     * @var string|null
     */
    #[Assert\Length(min: 1, max: 32, minMessage: 'Your name must be at least {{ limit }} characters long', maxMessage: 'Your name cannot be longer than {{ limit }} characters')]
    private $name;

    /**
     * @param string $name
     * @param bool $defaultPermission
     * @return static
     */
    public static function createMessageCommand(string $name, bool $defaultPermission = true)
    {
        $command = new static();
        $command->setName($name)
            ->setDefaultPermission($defaultPermission)
            ->setType(ApplicationCommandType::message());

        return $command;
    }
}