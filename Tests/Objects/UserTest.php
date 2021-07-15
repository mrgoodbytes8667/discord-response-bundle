<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\User;
use PHPUnit\Framework\TestCase;

/**
 * Class UserTest
 * @package Bytes\DiscordResponseBundle\Tests\Objects
 */
class UserTest extends TestCase
{
    use TestDiscordFakerTrait;

    /**
     *
     */
    public function testGetId()
    {
        $userId = $this->faker->userId();

        $user = new User();
        $this->assertNull($user->getId());
        $this->assertNull($user->getUserId());

        $this->assertInstanceOf(User::class, $user->setId($userId));

        $this->assertEquals($userId, $user->getId());
        $this->assertEquals($userId, $user->getUserId());
    }
}