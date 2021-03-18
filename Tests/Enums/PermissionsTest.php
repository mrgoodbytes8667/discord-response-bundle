<?php


namespace Bytes\DiscordResponseBundle\Tests\Enums;


use Bytes\DiscordResponseBundle\Enums\Permissions;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class PermissionsTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 */
class PermissionsTest extends TestCase
{
    /**
     * @dataProvider providePermissions
     * @param array $flags
     * @param int $int
     */
    public function testGetFlags(array $flags, int $int)
    {
        $this->assertEquals(Permissions::getFlags($flags), $int);
    }

    /**
     *
     */
    public function testHasFlag()
    {
        $this->assertTrue(Permissions::hasFlag(12, Permissions::ADMINISTRATOR()));
        $this->assertFalse(Permissions::hasFlag(12, Permissions::MOVE_MEMBERS()));
    }

    /**
     * @return Generator
     */
    public function providePermissions()
    {
        yield ['flags' => [Permissions::BAN_MEMBERS(), Permissions::ADMINISTRATOR()], 'int' => 12];
        yield ['flags' => [Permissions::MANAGE_WEBHOOKS(), Permissions::USE_EXTERNAL_EMOJIS(), Permissions::MOVE_MEMBERS(), Permissions::MANAGE_WEBHOOKS()], 'int' => 553910272];
        yield ['flags' => [Permissions::MANAGE_WEBHOOKS(), Permissions::USE_EXTERNAL_EMOJIS(), Permissions::MOVE_MEMBERS()], 'int' => 553910272];
        yield ['flags' => [], 'int' => 0];
    }
}