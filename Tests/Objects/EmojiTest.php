<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\PartialEmoji;
use Bytes\DiscordResponseBundle\Objects\User;
use Bytes\Tests\Common\DataProvider\BooleanProviderTrait;
use Bytes\Tests\Common\DataProvider\NullProviderTrait;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class EmojiTest extends PartialEmojiTest
{
    use BooleanProviderTrait, NullProviderTrait;

    /**
     * @dataProvider provideRoles
     * @param mixed $roles
     */
    public function testGetSetRoles($roles)
    {
        $emoji = new \Bytes\DiscordResponseBundle\Objects\Emoji();
        $this->assertNull($emoji->getRoles());
        $this->assertInstanceOf(\Bytes\DiscordResponseBundle\Objects\Emoji::class, $emoji->setRoles(null));
        $this->assertNull($emoji->getRoles());
        $this->assertInstanceOf(\Bytes\DiscordResponseBundle\Objects\Emoji::class, $emoji->setRoles($roles));
        $this->assertEquals($roles, $emoji->getRoles());
        $this->assertCount(3, $emoji->getRoles());
    }

    /**
     * @return \Generator
     */
    public function provideRoles()
    {
        $this->setupFaker();
        yield [$this->faker->words(nb: 3)];
    }

    /**
     * @dataProvider provideUser
     * @param mixed $user
     */
    public function testGetSetUser($user)
    {
        $emoji = new \Bytes\DiscordResponseBundle\Objects\Emoji();
        $this->assertNull($emoji->getUser());
        $this->assertInstanceOf(\Bytes\DiscordResponseBundle\Objects\Emoji::class, $emoji->setUser(null));
        $this->assertNull($emoji->getUser());
        $this->assertInstanceOf(\Bytes\DiscordResponseBundle\Objects\Emoji::class, $emoji->setUser($user));
        $this->assertEquals($user, $emoji->getUser());
    }

    /**
     * @return \Generator
     */
    public function provideUser()
    {
        yield [new User()];
        yield [null];
    }

    /**
     * @dataProvider provideBooleans
     * @dataProvider provideNull
     * @param mixed $requireColons
     */
    public function testGetSetRequireColons($requireColons)
    {
        $emoji = new \Bytes\DiscordResponseBundle\Objects\Emoji();
        $this->assertNull($emoji->getRequireColons());
        $this->assertInstanceOf(\Bytes\DiscordResponseBundle\Objects\Emoji::class, $emoji->setRequireColons(null));
        $this->assertNull($emoji->getRequireColons());
        $this->assertInstanceOf(\Bytes\DiscordResponseBundle\Objects\Emoji::class, $emoji->setRequireColons($requireColons));
        $this->assertEquals($requireColons, $emoji->getRequireColons());
    }

    /**
     * @dataProvider provideBooleans
     * @dataProvider provideNull
     * @param mixed $managed
     */
    public function testGetSetManaged($managed)
    {
        $emoji = new \Bytes\DiscordResponseBundle\Objects\Emoji();
        $this->assertNull($emoji->getManaged());
        $this->assertInstanceOf(\Bytes\DiscordResponseBundle\Objects\Emoji::class, $emoji->setManaged(null));
        $this->assertNull($emoji->getManaged());
        $this->assertInstanceOf(\Bytes\DiscordResponseBundle\Objects\Emoji::class, $emoji->setManaged($managed));
        $this->assertEquals($managed, $emoji->getManaged());
    }

    /**
     * @dataProvider provideBooleans
     * @dataProvider provideNull
     * @param mixed $animated
     */
    public function testGetSetAnimated($animated)
    {
        $emoji = new \Bytes\DiscordResponseBundle\Objects\Emoji();
        $this->assertNull($emoji->getAnimated());
        $this->assertInstanceOf(\Bytes\DiscordResponseBundle\Objects\Emoji::class, $emoji->setAnimated(null));
        $this->assertNull($emoji->getAnimated());
        $this->assertInstanceOf(\Bytes\DiscordResponseBundle\Objects\Emoji::class, $emoji->setAnimated($animated));
        $this->assertEquals($animated, $emoji->getAnimated());
    }

    /**
     * @dataProvider provideBooleans
     * @dataProvider provideNull
     * @param mixed $available
     */
    public function testGetSetAvailable($available)
    {
        $emoji = new \Bytes\DiscordResponseBundle\Objects\Emoji();
        $this->assertNull($emoji->getAvailable());
        $this->assertInstanceOf(\Bytes\DiscordResponseBundle\Objects\Emoji::class, $emoji->setAvailable(null));
        $this->assertNull($emoji->getAvailable());
        $this->assertInstanceOf(\Bytes\DiscordResponseBundle\Objects\Emoji::class, $emoji->setAvailable($available));
        $this->assertEquals($available, $emoji->getAvailable());
    }
}