<?php


namespace Bytes\DiscordResponseBundle\Tests\Objects\Guild;


use Bytes\DiscordResponseBundle\Objects\Interfaces\GuildInterface;
use Bytes\DiscordResponseBundle\Objects\PartialGuild;

/**
 * Class PartialGuildTest
 * @package Bytes\DiscordResponseBundle\Tests
 */
class PartialGuildTest extends TestGuildCase
{
    /**
     * @return GuildInterface
     */
    protected function createGuildClass(): GuildInterface
    {
        return new PartialGuild();
    }

    /**
     *
     */
    public function testBuildIconUrlEmptyGuild()
    {
        $this->assertNull(PartialGuild::buildIconUrl('', ''));
    }
}