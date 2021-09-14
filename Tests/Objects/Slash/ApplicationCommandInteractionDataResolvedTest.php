<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\Slash;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\Channel;
use Bytes\DiscordResponseBundle\Objects\Member;
use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Objects\Role;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandInteractionDataResolved;
use Bytes\DiscordResponseBundle\Objects\User;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class ApplicationCommandInteractionDataResolvedTest extends TestCase
{
    use TestDiscordFakerTrait;

    /**
     * @dataProvider provideUsers
     * @param mixed $users
     */
    public function testGetSetUsers($users)
    {
        $applicationCommandInteractionDataResolved = new ApplicationCommandInteractionDataResolved();
        $this->assertNull($applicationCommandInteractionDataResolved->getUsers());
        $this->assertInstanceOf(ApplicationCommandInteractionDataResolved::class, $applicationCommandInteractionDataResolved->setUsers(null));
        $this->assertNull($applicationCommandInteractionDataResolved->getUsers());
        $this->assertInstanceOf(ApplicationCommandInteractionDataResolved::class, $applicationCommandInteractionDataResolved->setUsers($users));
        $this->assertEquals($users, $applicationCommandInteractionDataResolved->getUsers());
    }

    /**
     * @return Generator
     */
    public function provideUsers()
    {
        $this->setupFaker();
        yield [[new User()]];
    }

    /**
     * @dataProvider provideMembers
     * @param mixed $members
     */
    public function testGetSetMembers($members)
    {
        $applicationCommandInteractionDataResolved = new ApplicationCommandInteractionDataResolved();
        $this->assertNull($applicationCommandInteractionDataResolved->getMembers());
        $this->assertInstanceOf(ApplicationCommandInteractionDataResolved::class, $applicationCommandInteractionDataResolved->setMembers(null));
        $this->assertNull($applicationCommandInteractionDataResolved->getMembers());
        $this->assertInstanceOf(ApplicationCommandInteractionDataResolved::class, $applicationCommandInteractionDataResolved->setMembers($members));
        $this->assertEquals($members, $applicationCommandInteractionDataResolved->getMembers());
    }

    /**
     * @return Generator
     */
    public function provideMembers()
    {
        $this->setupFaker();
        yield [[new Member()]];
    }

    /**
     * @dataProvider provideRoles
     * @param mixed $roles
     */
    public function testGetSetRoles($roles)
    {
        $applicationCommandInteractionDataResolved = new ApplicationCommandInteractionDataResolved();
        $this->assertNull($applicationCommandInteractionDataResolved->getRoles());
        $this->assertInstanceOf(ApplicationCommandInteractionDataResolved::class, $applicationCommandInteractionDataResolved->setRoles(null));
        $this->assertNull($applicationCommandInteractionDataResolved->getRoles());
        $this->assertInstanceOf(ApplicationCommandInteractionDataResolved::class, $applicationCommandInteractionDataResolved->setRoles($roles));
        $this->assertEquals($roles, $applicationCommandInteractionDataResolved->getRoles());
    }

    /**
     * @return Generator
     */
    public function provideRoles()
    {
        $this->setupFaker();
        yield [[new Role()]];
    }

    /**
     * @dataProvider provideChannels
     * @param mixed $channels
     */
    public function testGetSetChannels($channels)
    {
        $applicationCommandInteractionDataResolved = new ApplicationCommandInteractionDataResolved();
        $this->assertNull($applicationCommandInteractionDataResolved->getChannels());
        $this->assertInstanceOf(ApplicationCommandInteractionDataResolved::class, $applicationCommandInteractionDataResolved->setChannels(null));
        $this->assertNull($applicationCommandInteractionDataResolved->getChannels());
        $this->assertInstanceOf(ApplicationCommandInteractionDataResolved::class, $applicationCommandInteractionDataResolved->setChannels($channels));
        $this->assertEquals($channels, $applicationCommandInteractionDataResolved->getChannels());
    }

    /**
     * @return Generator
     */
    public function provideChannels()
    {
        $this->setupFaker();
        yield [[new Channel()]];
    }

    /**
     * @dataProvider provideMessages
     * @param mixed $messages
     */
    public function testGetSetMessages($messages)
    {
        $applicationCommandInteractionDataResolved = new ApplicationCommandInteractionDataResolved();
        $this->assertNull($applicationCommandInteractionDataResolved->getMessages());
        $this->assertInstanceOf(ApplicationCommandInteractionDataResolved::class, $applicationCommandInteractionDataResolved->setMessages(null));
        $this->assertNull($applicationCommandInteractionDataResolved->getMessages());
        $this->assertInstanceOf(ApplicationCommandInteractionDataResolved::class, $applicationCommandInteractionDataResolved->setMessages($messages));
        $this->assertEquals($messages, $applicationCommandInteractionDataResolved->getMessages());
    }

    /**
     * @return Generator
     */
    public function provideMessages()
    {
        $this->setupFaker();
        yield [[new Message()]];
    }

    /**
     * @dataProvider provideMessage
     * @param mixed $messages
     */
    public function testGetMessage($messages)
    {
        $applicationCommandInteractionDataResolved = new ApplicationCommandInteractionDataResolved();
        $this->assertInstanceOf(ApplicationCommandInteractionDataResolved::class, $applicationCommandInteractionDataResolved->setMessages([$messages]));
        $this->assertEquals($messages, $applicationCommandInteractionDataResolved->getMessage());
    }

    /**
     * @return Generator
     */
    public function provideMessage()
    {
        $this->setupFaker();
        yield [new Message()];
    }
}