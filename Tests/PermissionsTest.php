<?php


namespace Bytes\DiscordResponseBundle\Tests;


use Bytes\DiscordResponseBundle\Enums\Permissions;
use PHPUnit\Framework\TestCase;

class PermissionsTest extends TestCase
{
    public function testGetFlags()
    {
        $var = Permissions::getFlags(Permissions::BAN_MEMBERS(), Permissions::ADMINISTRATOR());
        $this->assertEquals($var, 12);

        $var = Permissions::getFlags(Permissions::MANAGE_WEBHOOKS(), Permissions::USE_EXTERNAL_EMOJIS(), Permissions::MOVE_MEMBERS(), Permissions::MANAGE_WEBHOOKS());
        $this->assertEquals($var, 553910272);

        $var = Permissions::getFlags(Permissions::MANAGE_WEBHOOKS(), Permissions::USE_EXTERNAL_EMOJIS(), Permissions::MOVE_MEMBERS());
        $this->assertEquals($var, 553910272);

        $var = Permissions::getFlags();
        $this->assertEquals($var, 0);
    }

    public function testHasFlag()
    {
        $this->assertTrue(Permissions::hasFlag(12, Permissions::ADMINISTRATOR()));
        $this->assertFalse(Permissions::hasFlag(12, Permissions::MOVE_MEMBERS()));
    }
}