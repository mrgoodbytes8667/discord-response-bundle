<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\Slash;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Enums\ApplicationCommandPermissionType;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandPermission;
use Generator;
use PHPUnit\Framework\TestCase;

class ApplicationCommandPermissionTest extends TestCase
{
    use TestDiscordFakerTrait;

    /**
     * @dataProvider provideType
     * @param mixed $type
     */
    public function testGetSetType($type)
    {
        $applicationCommandPermission = new ApplicationCommandPermission();
        $this->assertNull($applicationCommandPermission->getType());
        $this->assertInstanceOf(ApplicationCommandPermission::class, $applicationCommandPermission->setType(null));
        $this->assertNull($applicationCommandPermission->getType());
        $this->assertInstanceOf(ApplicationCommandPermission::class, $applicationCommandPermission->setType($type));
        $this->assertEquals($type->value, $applicationCommandPermission->getType());
    }

    /**
     * @return Generator
     */
    public function provideType()
    {
        yield [ApplicationCommandPermissionType::role()];
        yield [ApplicationCommandPermissionType::user()];
    }

    /**
     * @dataProvider providePermission
     * @param mixed $permission
     */
    public function testGetSetPermission($permission)
    {
        $applicationCommandPermission = new ApplicationCommandPermission();
        $this->assertNull($applicationCommandPermission->getPermission());
        $this->assertInstanceOf(ApplicationCommandPermission::class, $applicationCommandPermission->setPermission(null));
        $this->assertNull($applicationCommandPermission->getPermission());
        $this->assertInstanceOf(ApplicationCommandPermission::class, $applicationCommandPermission->setPermission($permission));
        $this->assertEquals($permission, $applicationCommandPermission->getPermission());
    }

    /**
     * @return Generator
     */
    public function providePermission()
    {
        $this->setupFaker();
        yield [$this->faker->boolean()];
    }

    /**
     * @dataProvider provideId
     * @param mixed $id
     */
    public function testGetSetId($id)
    {
        $applicationCommandPermission = new ApplicationCommandPermission();
        $this->assertNull($applicationCommandPermission->getId());
        $this->assertInstanceOf(ApplicationCommandPermission::class, $applicationCommandPermission->setId(null));
        $this->assertNull($applicationCommandPermission->getId());
        $this->assertInstanceOf(ApplicationCommandPermission::class, $applicationCommandPermission->setId($id));
        $this->assertEquals($id, $applicationCommandPermission->getId());
    }

    /**
     * @return Generator
     */
    public function provideId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }
}
