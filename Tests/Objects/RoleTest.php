<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Enums\Permissions;
use Bytes\DiscordResponseBundle\Objects\Role;
use Bytes\DiscordResponseBundle\Objects\RoleTag;
use Bytes\Tests\Common\TestEnumTrait;
use Generator;
use Illuminate\Support\Arr;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use Symfony\Component\String\ByteString;
use TypeError;

class RoleTest extends TestCase
{
    use TestDiscordFakerTrait;
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
        $all = Permissions::cases();
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

    /**
     * @dataProvider provideIcon
     * @param mixed $icon
     */
    public function testGetSetIcon($icon)
    {
        $role = new Role();
        $this->assertNull($role->getIcon());
        $this->assertInstanceOf(Role::class, $role->setIcon(null));
        $this->assertNull($role->getIcon());
        $this->assertInstanceOf(Role::class, $role->setIcon($icon));
        $this->assertEquals($icon, $role->getIcon());
    }

    /**
     * @return Generator
     */
    public function provideIcon()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider provideUnicodeEmoji
     * @param mixed $unicodeEmoji
     */
    public function testGetSetUnicodeEmoji($unicodeEmoji)
    {
        $role = new Role();
        $this->assertNull($role->getUnicodeEmoji());
        $this->assertInstanceOf(Role::class, $role->setUnicodeEmoji(null));
        $this->assertNull($role->getUnicodeEmoji());
        $this->assertInstanceOf(Role::class, $role->setUnicodeEmoji($unicodeEmoji));
        $this->assertEquals($unicodeEmoji, $role->getUnicodeEmoji());
    }

    /**
     * @return Generator
     */
    public function provideUnicodeEmoji()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider provideTags
     * @param mixed $tags
     */
    public function testGetSetTags($tags)
    {
        $role = new Role();
        $this->assertNull($role->getTags());
        $this->assertInstanceOf(Role::class, $role->setTags(null));
        $this->assertNull($role->getTags());
        $this->assertInstanceOf(Role::class, $role->setTags($tags));
        $this->assertEquals($tags, $role->getTags());
    }

    /**
     * @return Generator
     */
    public function provideTags()
    {
        yield [new RoleTag()];
    }

    /**
     * @dataProvider provideId
     * @param mixed $id
     */
    public function testGetSetId($id)
    {
        $role = new Role();
        $this->assertNull($role->getId());
        $this->assertInstanceOf(Role::class, $role->setId(null));
        $this->assertNull($role->getId());
        $this->assertInstanceOf(Role::class, $role->setId($id));
        $this->assertEquals($id, $role->getId());
    }

    /**
     * @return Generator
     */
    public function provideId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }

    /**
     * @dataProvider provideName
     * @param mixed $name
     */
    public function testGetSetName($name)
    {
        $role = new Role();
        $this->assertInstanceOf(Role::class, $role->setName($name));
        $this->assertEquals($name, $role->getName());
    }

    /**
     * @return Generator
     */
    public function provideName()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider provideDeleted
     * @param mixed $deleted
     */
    public function testGetSetDeleted($deleted)
    {
        $role = new Role();
        $this->assertNull($role->getDeleted());
        $this->assertInstanceOf(Role::class, $role->setDeleted(null));
        $this->assertNull($role->getDeleted());
        $this->assertInstanceOf(Role::class, $role->setDeleted($deleted));
        $this->assertEquals($deleted, $role->getDeleted());
    }

    /**
     * @return Generator
     */
    public function provideDeleted()
    {
        $this->setupFaker();
        yield [$this->faker->boolean()];
    }
}