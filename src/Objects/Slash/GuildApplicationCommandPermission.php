<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Objects\Traits\ApplicationIdTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\GuildIDTrait;

/**
 * Class GuildApplicationCommandPermission
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#application-command-permissions-object-guild-application-command-permissions-structure
 *
 * @version v0.9.5 As of 2021-07-29 Discord Documentation
 */
class GuildApplicationCommandPermission extends PartialGuildApplicationCommandPermission
{
    use ApplicationIdTrait, GuildIDTrait;
}