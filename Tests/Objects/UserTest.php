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

        $guild = new User();
        $guild->setId($userId)
            ->setAvatar($icon)
            ->setDiscriminator($discriminator);

        $this->assertCount(3, $guild->getImageBuilderParts());
        $this->assertArrayHasKey('userId', $guild->getImageBuilderParts());
        $this->assertArrayHasKey('userAvatar', $guild->getImageBuilderParts());
        $this->assertArrayHasKey('userDiscriminator', $guild->getImageBuilderParts());
        $this->assertEquals($userId, $guild->getImageBuilderParts()['userId']);
        $this->assertEquals($icon, $guild->getImageBuilderParts()['userAvatar']);
        $this->assertEquals($discriminator, $guild->getImageBuilderParts()['userDiscriminator']);
    }
}