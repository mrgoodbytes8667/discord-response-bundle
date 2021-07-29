<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\Slash;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Enums\ApplicationCommandPermissionType;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandPermission;
use Bytes\DiscordResponseBundle\Objects\Slash\PartialGuildApplicationCommandPermission;
use Generator;
use PHPUnit\Framework\TestCase;

class PartialGuildApplicationCommandPermissionTest extends TestCase
{
    use TestDiscordFakerTrait;

    /**
     * @dataProvider providePermissions
     * @param ApplicationCommandPermission[] $permissions
     */
    public function testGetSetAddPermissions($permissions)
    {
        $perm = $permissions[0];
        $object = new PartialGuildApplicationCommandPermission();
        $this->assertNull($object->getPermissions());
        $this->assertInstanceOf(PartialGuildApplicationCommandPermission::class, $object->setPermissions(null));
        $this->assertNull($object->getPermissions());
        $this->assertInstanceOf(PartialGuildApplicationCommandPermission::class, $object->setPermissions($permissions));
        $this->assertEquals($permissions, $object->getPermissions());
        $this->assertCount(1, $object->getPermissions());
        $this->assertInstanceOf(PartialGuildApplicationCommandPermission::class, $object->addPermission($perm));
        $this->assertCount(1, $object->getPermissions());

        $id = $this->faker->snowflake();
        $type = $this->faker->randomElement([ApplicationCommandPermissionType::role(), ApplicationCommandPermissionType::user()]);
        $permission = $this->faker->boolean();

        $perm2 = ApplicationCommandPermission::create($id, $type, $permission);
        $this->assertInstanceOf(PartialGuildApplicationCommandPermission::class, $object->addPermission($perm2));
        $this->assertCount(2, $object->getPermissions());
    }

    /**
     * @return Generator
     */
    public function providePermissions()
    {
        $this->setupFaker();
        yield [[new ApplicationCommandPermission()]];
    }

    /**
     * @dataProvider provideId
     * @param mixed $id
     */
    public function testGetSetId($id)
    {
        $PartialGuildApplicationCommandPermission = new PartialGuildApplicationCommandPermission();
        $this->assertNull($PartialGuildApplicationCommandPermission->getId());
        $this->assertInstanceOf(PartialGuildApplicationCommandPermission::class, $PartialGuildApplicationCommandPermission->setId(null));
        $this->assertNull($PartialGuildApplicationCommandPermission->getId());
        $this->assertInstanceOf(PartialGuildApplicationCommandPermission::class, $PartialGuildApplicationCommandPermission->setId($id));
        $this->assertEquals($id, $PartialGuildApplicationCommandPermission->getId());
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
     * 
     */
    public function testCreate()
    {
        $commandId = $this->faker->snowflake();

        $id = $this->faker->snowflake();
        /** @var ApplicationCommandPermissionType $type */
        $type = $this->faker->randomElement([ApplicationCommandPermissionType::role(), ApplicationCommandPermissionType::user()]);
        $permission = $this->faker->boolean();

        $object = PartialGuildApplicationCommandPermission::create($commandId, [ApplicationCommandPermission::create($id, $type, $permission)]);

        $this->assertInstanceOf(PartialGuildApplicationCommandPermission::class, $object);
        $this->assertEquals($commandId, $object->getId());
        $this->assertEquals($id, $object->getPermissions()[0]->getId());
        $this->assertEquals($type->value, $object->getPermissions()[0]->getType());
        $this->assertEquals($permission, $object->getPermissions()[0]->getPermission());
    }
}