<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\Slash;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Enums\ApplicationCommandPermissionType;
use Bytes\DiscordResponseBundle\Objects\Application\Command\ChatInputCommand;
use Bytes\DiscordResponseBundle\Objects\Channel;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ApplicationCommandInterface;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommand;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandPermission;
use Bytes\DiscordResponseBundle\Objects\Slash\PartialGuildApplicationCommandPermission;
use Bytes\ResponseBundle\Interfaces\IdInterface;
use Generator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 *
 */
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
        $type = $this->faker->randomElement([ApplicationCommandPermissionType::ROLE, ApplicationCommandPermissionType::USER]);
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
     * @dataProvider provideCommand
     * @dataProvider provideId
     * @param $commandId
     */
    public function testCreate($commandId)
    {
        $commandId = $this->faker->snowflake();

        $id = $this->faker->snowflake();
        /** @var ApplicationCommandPermissionType $type */
        $type = $this->faker->randomElement([ApplicationCommandPermissionType::ROLE, ApplicationCommandPermissionType::USER]);
        $permission = $this->faker->boolean();

        $object = PartialGuildApplicationCommandPermission::create($commandId, [ApplicationCommandPermission::create($id, $type, $permission)]);

        $this->assertInstanceOf(PartialGuildApplicationCommandPermission::class, $object);
        $this->assertEquals($commandId, $object->getId());
        $this->assertEquals($id, $object->getPermissions()[0]->getId());
        $this->assertEquals($type->value, $object->getPermissions()[0]->getType());
        $this->assertEquals($permission, $object->getPermissions()[0]->getPermission());
    }

    /**
     * @return Generator
     */
    public function provideCommand()
    {
        $this->setupFaker();

        $command = new ChatInputCommand();
        $command->setId($this->faker->snowflake());
        yield [$command];

        $command = $this
            ->getMockBuilder(ApplicationCommandInterface::class)
            ->getMock();
        $command->method('getCommandId')
            ->willReturn($this->faker->snowflake());
        yield [$command];

        $command = $this
            ->getMockBuilder(IdInterface::class)
            ->getMock();
        $command->method('getId')
            ->willReturn($this->faker->snowflake());
        yield [$command];
    }

    /**
     * @dataProvider provideInvalidCommands
     * @param $commandId
     */
    public function testCreateInvalidCommand($commandId)
    {
        $this->expectException(InvalidArgumentException::class);
        PartialGuildApplicationCommandPermission::create($commandId, [
            ApplicationCommandPermission::create(
                $this->faker->snowflake(),
                $this->faker->randomElement([ApplicationCommandPermissionType::ROLE, ApplicationCommandPermissionType::USER]),
                $this->faker->boolean())
        ]);
    }

    /**
     * @return Generator
     */
    public function provideInvalidCommands()
    {
        $this->setupFaker();

        yield [new ChatInputCommand()];
        yield [new Channel()];

        $command = new ChatInputCommand();
        $command->setGuildId($this->faker->snowflake());
        yield [$command];

        $command = $this
            ->getMockBuilder(ApplicationCommandInterface::class)
            ->getMock();
        yield [$command];
    }
}