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

    /**
     *
     */
    public function testGetImageBuilderParts()
    {
        $userId = $this->faker->userId();
        $icon = $this->faker->iconHash();
        $discriminator = $this->faker->discriminator();

        $user = new User();
        $user->setId($userId)
            ->setAvatar($icon)
            ->setDiscriminator($discriminator);

        $this->assertCount(3, $user->getImageBuilderParts());
        $this->assertArrayHasKey('userId', $user->getImageBuilderParts());
        $this->assertArrayHasKey('userAvatar', $user->getImageBuilderParts());
        $this->assertArrayHasKey('userDiscriminator', $user->getImageBuilderParts());
        $this->assertEquals($userId, $user->getImageBuilderParts()['userId']);
        $this->assertEquals($icon, $user->getImageBuilderParts()['userAvatar']);
        $this->assertEquals($discriminator, $user->getImageBuilderParts()['userDiscriminator']);
    }
}