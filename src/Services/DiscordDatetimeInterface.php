<?php


namespace Bytes\DiscordResponseBundle\Services;


/**
 * Interface DiscordDatetimeInterface
 * @package Bytes\DiscordResponseBundle\Services
 */
interface DiscordDatetimeInterface
{
    /**
     * Discord's serialized date format, claims to be ISO8601 but is slightly different than any of the predefined PHP
     * date formats
     */
    const FORMAT = 'Y-m-d\TH:i:s.uP';
}