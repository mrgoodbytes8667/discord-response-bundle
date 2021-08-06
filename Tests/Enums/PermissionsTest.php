<?php


namespace Bytes\DiscordResponseBundle\Tests\Enums;


use Bytes\DiscordResponseBundle\Enums\Permissions;
use Generator;
use PHPUnit\Framework\TestCase;
use Symfony\Bridge\PhpUnit\ExpectDeprecationTrait;

/**
 * Class PermissionsTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 */
class PermissionsTest extends TestCase
{
    use ExpectDeprecationTrait;

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

        $this->assertTrue(Permissions::hasFlag(3221225472, Permissions::USE_SLASH_COMMANDS()));
        $this->assertTrue(Permissions::hasFlag(3221225472, Permissions::MANAGE_EMOJIS()));
        $this->assertFalse(Permissions::hasFlag(3221225472, Permissions::ADMINISTRATOR()));
    }

    /**
     *
     */
    public function testGetPermissions()
    {
        $permissions = Permissions::getPermissions(3221225472, asArrayOfEnums: false);
        $this->assertCount(2, $permissions);
        foreach ($permissions as $permission) {
            $this->assertIsString($permission);
        }

        $permissions = Permissions::getPermissions(3221225472, asArrayOfEnums: true);
        $this->assertCount(2, $permissions);
        foreach ($permissions as $permission) {
            $this->assertInstanceOf(Permissions::class, $permission);
        }

        $permissions = Permissions::getPermissions(0, asArrayOfEnums: false);
        $this->assertCount(0, $permissions);
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