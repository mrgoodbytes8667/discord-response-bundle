<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\Slash;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Enums\ApplicationCommandPermissionType;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandPermission;
use Bytes\DiscordResponseBundle\Objects\Slash\GuildApplicationCommandPermission;
use Generator;
use PHPUnit\Framework\TestCase;

class GuildApplicationCommandPermissionTest extends TestCase
{
    use TestDiscordFakerTrait;

    /**
     * @dataProvider providePermissions
     * @param ApplicationCommandPermission[] $permissions
     */
    public function testGetSetAddPermissions($permissions)
    {
        $perm = $permissions[0];
        $object = new GuildApplicationCommandPermission();
        $this->assertNull($object->getPermissions());
        $this->assertInstanceOf(GuildApplicationCommandPermission::class, $object->setPermissions(null));
        $this->assertNull($object->getPermissions());
        $this->assertInstanceOf(GuildApplicationCommandPermission::class, $object->setPermissions($permissions));
        $this->assertEquals($permissions, $object->getPermissions());
        $this->assertCount(1, $object->getPermissions());
        $this->assertInstanceOf(GuildApplicationCommandPermission::class, $object->addPermission($perm));
        $this->assertCount(1, $object->getPermissions());

        $id = $this->faker->snowflake();
        $type = $this->faker->randomElement([ApplicationCommandPermissionType::ROLE, ApplicationCommandPermissionType::USER]);
        $permission = $this->faker->boolean();

        $perm2 = ApplicationCommandPermission::create($id, $type, $permission);
        $this->assertInstanceOf(GuildApplicationCommandPermission::class, $object->addPermission($perm2));
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
        $guildApplicationCommandPermission = new GuildApplicationCommandPermission();
        $this->assertNull($guildApplicationCommandPermission->getId());
        $this->assertInstanceOf(GuildApplicationCommandPermission::class, $guildApplicationCommandPermission->setId(null));
        $this->assertNull($guildApplicationCommandPermission->getId());
        $this->assertInstanceOf(GuildApplicationCommandPermission::class, $guildApplicationCommandPermission->setId($id));
        $this->assertEquals($id, $guildApplicationCommandPermission->getId());
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
     * @dataProvider provideApplicationId
     * @param mixed $applicationId
     */
    public function testGetSetApplicationId($applicationId)
    {
        $guildApplicationCommandPermission = new GuildApplicationCommandPermission();
        $this->assertNull($guildApplicationCommandPermission->getApplicationId());
        $this->assertInstanceOf(GuildApplicationCommandPermission::class, $guildApplicationCommandPermission->setApplicationId(null));
        $this->assertNull($guildApplicationCommandPermission->getApplicationId());
        $this->assertInstanceOf(GuildApplicationCommandPermission::class, $guildApplicationCommandPermission->setApplicationId($applicationId));
        $this->assertEquals($applicationId, $guildApplicationCommandPermission->getApplicationId());
    }

    /**
     * @return Generator
     */
    public function provideApplicationId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }

    /**
     * @dataProvider provideGuildId
     * @param mixed $guildId
     */
    public function testGetSetGuildId($guildId)
    {
        $guildApplicationCommandPermission = new GuildApplicationCommandPermission();
        $this->assertNull($guildApplicationCommandPermission->getGuildId());
        $this->assertInstanceOf(GuildApplicationCommandPermission::class, $guildApplicationCommandPermission->setGuildId(null));
        $this->assertNull($guildApplicationCommandPermission->getGuildId());
        $this->assertInstanceOf(GuildApplicationCommandPermission::class, $guildApplicationCommandPermission->setGuildId($guildId));
        $this->assertEquals($guildId, $guildApplicationCommandPermission->getGuildId());
    }

    /**
     * @return Generator
     */
    public function provideGuildId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }
}