<?php

namespace Bytes\DiscordResponseBundle\Tests;

use Bytes\DiscordResponseBundle\Enums\Permissions;
use Bytes\DiscordResponseBundle\Objects\Role;
use Bytes\Tests\Common\TestEnumTrait;
use Generator;
use Illuminate\Support\Arr;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use Symfony\Component\String\ByteString;
use TypeError;

/**
 * Class RoleTest
 * @package Bytes\DiscordResponseBundle\Tests
 */
class RoleTest extends TestCase
{
    use TestEnumTrait;

    /**
     * @return Generator
     */
    public function provideColors()
    {
        foreach (range(1, 10) as $index) {
            yield ['color' => hexdec(ByteString::fromRandom(6, 'ABCDEF0123456789'))];
        }
    }

    /**
     * @dataProvider provideColors
     * @param $color
     */
    public function testGetSetColor($color)
    {
        $role = new Role();
        $role->setColor($color);
        $this->assertEquals($color, $role->getColor());
    }

    /**
     *
     */
    public function testSetColorTypeError()
    {
        $this->expectException(TypeError::class);
        $role = new Role();
        $role->setColor('abc123');
    }

    /**
     * @dataProvider provideGuildIds
     * @param string $guildId
     */
    public function testGetSetGuild(string $guildId)
    {
        $role = new Role();
        $role->setGuild($guildId);
        $this->assertEquals($guildId, $role->getGuild());
    }

    /**
     * @return Generator
     */
    public function provideGuildIds()
    {
        foreach (range(1, 10) as $index) {
            yield ['guildId' => ByteString::fromRandom(18, '123456789')->toString()];
        }
    }

    /**
     * @dataProvider provideGuildIds
     * @param string $guildId
     */
    public function testGetSetGuildId(string $guildId)
    {
        $role = new Role();
        $role->setGuild($guildId);
        $this->assertEquals($guildId, $role->getGuildId());
    }

    /**
     * @return Generator
     */
    public function provideBooleans()
    {
        yield ['bool' => true];
        yield ['bool' => false];
    }

    /**
     * @dataProvider provideBooleans
     * @param bool $bool
     */
    public function testGetSetHoist(bool $bool)
    {
        $role = new Role();
        $role->setHoist($bool);
        $this->assertIsBool($role->getHoist());
        $this->assertEquals($bool, $role->getHoist());
    }

    /**
     * @dataProvider provideBooleans
     * @param bool $bool
     */
    public function testGetSetManaged(bool $bool)
    {
        $role = new Role();
        $role->setManaged($bool);
        $this->assertIsBool($role->getManaged());
        $this->assertEquals($bool, $role->getManaged());
    }

    /**
     * @dataProvider provideBooleans
     * @param bool $bool
     */
    public function testGetSetMentionable(bool $bool)
    {
        $role = new Role();
        $role->setMentionable($bool);
        $this->assertIsBool($role->getMentionable());
        $this->assertEquals($bool, $role->getMentionable());
    }

    /**
     * @dataProvider providePermissions
     * @param Permissions[] $permissions
     */
    public function testGetSetPermissionsV6Int(array $permissions)
    {
        $perm = Permissions::getFlags($permissions);
        $this->assertIsInt($perm);

        $role = new Role();
        $role->setPermissions($perm);

        $this->assertIsInt($role->getPermissions());
        $this->assertEquals($perm, $role->getPermissions());
    }

    /**
     * @dataProvider providePermissions
     * @param Permissions[] $permissions
     */
    public function testGetSetPermissionsV8String(array $permissions)
    {
        $perm = (string)Permissions::getFlags($permissions);
        $this->assertIsString($perm);

        $role = new Role();
        $role->setPermissions($perm);

        $this->assertIsString($role->getPermissions());
        $this->assertEquals($perm, $role->getPermissions());
    }

    /**
     * @return Generator
     * @throws ReflectionException
     */
    public function providePermissions()
    {
        $all = self::extractAllFromEnum(Permissions::class);
        foreach (range(1, 10) as $index) {
            yield ['permissions' => Arr::random($all, rand(1, count($all) - 1))];
        }
    }

    /**
     * @dataProvider provideIntegers
     * @param int $int
     */
    public function testGetSetPosition(int $int)
    {
        $role = new Role();
        $role->setPosition($int);
        $this->assertIsInt($role->getPosition());
        $this->assertEquals($int, $role->getPosition());
    }

    /**
     * @return Generator
     */
    public function provideIntegers()
    {
        foreach (range(0, 10) as $index) {
            yield ['int' => $index];
        }
    }
}
