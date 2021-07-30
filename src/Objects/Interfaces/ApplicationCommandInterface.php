<?php

namespace Bytes\DiscordResponseBundle\Objects\Interfaces;

/**
 * An application command is the base "command" model that belongs to an application. This is what you are creating when you POST a new command.
 * A command, or each individual subcommand, can have a maximum of 25 options
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#applicationcommand
 *
 * @version v0.9.6 As of 2021-07-30 Discord Documentation
 */
interface ApplicationCommandInterface extends NameInterface, GuildIdInterface
{
    /**
     * @return string|null
     */
    public function getCommandId(): ?string;

    /**
     * @return mixed
     */
    public function getEntityId();

    /**
     * @return bool|null
     */
    public function getDefaultPermission(): ?bool;

    /**
     * @param bool|null $default_permission
     * @return $this
     */
    public function setDefaultPermission(?bool $default_permission);
}
