<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\OAuth\Validate;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\Application;
use Bytes\DiscordResponseBundle\Objects\OAuth\Validate\User;
use Bytes\DiscordResponseBundle\Objects\User as UserClass;
use DateTimeImmutable;
use DateTimeInterface;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class UserTest
 * @package Bytes\DiscordResponseBundle\Tests\Objects\OAuth\Validate
 */
class UserTest extends TestCase
{
    use TestDiscordFakerTrait;

    /**
     * @dataProvider provideApplication
     * @param mixed $application
     */
    public function testGetSetApplication($application)
    {
        $user = new User();
        $this->assertInstanceOf(Application::class, $user->getApplication());
        $this->assertInstanceOf(User::class, $user->setApplication(null));
        $this->assertNull($user->getApplication());
        $this->assertInstanceOf(User::class, $user->setApplication($application));
        $this->assertEquals($application, $user->getApplication());
    }

    /**
     * @return Generator
     */
    public function provideApplication()
    {
        $this->setupFaker();
        $app = new Application();
        $app->setId($this->faker->snowflake());
        $app->setName($this->faker->sentence());
        yield [$app];
    }

    /**
     * @dataProvider provideExpires
     * @param mixed $expires
     */
    public function testGetSetExpires($expires)
    {
        $user = new User();
        $this->assertNull($user->getExpires());
        $this->assertInstanceOf(User::class, $user->setExpires(null));
        $this->assertNull($user->getExpires());
        $this->assertInstanceOf(User::class, $user->setExpires($expires));
        $this->assertEquals($expires, $user->getExpires());
    }

    /**
     * @return Generator
     */
    public function provideExpires()
    {
        $this->setupFaker();
        yield [$this->faker->dateTimeInInterval('-1 week', 'now')];
    }

    /**
     * @dataProvider provideExpired
     * @param DateTimeInterface $date
     * @param bool $expired
     */
    public function testHasExpired(DateTimeInterface $date, bool $expired)
    {
        $user = new User();
        $this->assertTrue($user->hasExpired());
        $user->setExpires($date);
        $this->assertEquals($expired, $user->hasExpired());
    }

    /**
     * @return Generator
     */
    public function provideExpired()
    {
        $this->setupFaker();
        yield ['date' => $this->faker->dateTimeBetween('-2 years', '-1 years'), 'expired' => true];
        yield ['date' => $this->faker->dateTimeBetween('+2 years', '+3 year'), 'expired' => false];
    }

    /**
     * @dataProvider provideUser
     * @param mixed $user
     */
    public function testGetSetUser($user)
    {
        $validate = new User();
        $this->assertInstanceOf(User::class, $validate->setUser(null));
        $this->assertNull($validate->getUser());
        $this->assertInstanceOf(User::class, $validate->setUser($user));
        $this->assertEquals($user, $validate->getUser());
    }

    /**
     * @return Generator
     */
    public function provideUser()
    {
        yield [new userClass()];
    }

    /**
     * @dataProvider provideApplication
     * @param Application $application
     */
    public function testGetSetClientId(Application $application)
    {
        $user = new User();
        $this->assertNull($user->getClientId());

        $user->setApplication($application);

        $this->assertEquals($application->getId(), $user->getClientId());
    }

    /**
     * @dataProvider provideUserName
     * @param mixed $userName
     */
    public function testGetUserName($userName)
    {
        $validate = new User();

        $this->assertNull($validate->getUserName());

        $user = new userClass();
        $user->setUsername($userName);

        $this->assertInstanceOf(User::class, $validate->setUser($user));
        $this->assertEquals($userName, $validate->getUserName());
    }

    /**
     * @return Generator
     */
    public function provideUserName()
    {
        $this->setupFaker();
        yield [$this->faker->userName()];
    }

    /**
     * @dataProvider provideScopes
     * @param mixed $scopes
     */
    public function testGetSetScopes($scopes)
    {
        $user = new User();
        $this->assertEmpty($user->getScopes());
        $this->assertInstanceOf(User::class, $user->setScopes(null));
        $this->assertNull($user->getScopes());
        $this->assertInstanceOf(User::class, $user->setScopes($scopes));
        $this->assertEquals($scopes, $user->getScopes());
    }

    /**
     * @return Generator
     */
    public function provideScopes()
    {
        $this->setupFaker();
        yield [$this->faker->words()];
    }

    /**
     * @dataProvider provideUserId
     * @param mixed $userId
     */
    public function testGetUserId($userId)
    {
        $validate = new User();

        $this->assertNull($validate->getUserId());

        $user = new userClass();
        $user->setId($userId);

        $this->assertInstanceOf(User::class, $validate->setUser($user));
        $this->assertEquals($userId, $validate->getUserId());
    }

    /**
     * @return Generator
     */
    public function provideUserId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }

    /**
     * @dataProvider provideMatch
     * @param $application
     * @param $user
     * @param $clientId
     * @param $userId
     * @param $userName
     */
    public function testHasMatches($application, $user, $clientId, $userId, $userName)
    {
        $validate = new User();
        $validate->setApplication($application);
        $validate->setUser($user);

        $this->assertTrue($validate->hasMatchingClientId($clientId));
        $this->assertFalse($validate->hasMatchingClientId($this->faker->snowflake()));
        $this->assertFalse($validate->hasMatchingClientId(''));

        $this->assertTrue($validate->hasMatchingUserId($userId));
        $this->assertFalse($validate->hasMatchingUserId($this->faker->snowflake()));
        $this->assertFalse($validate->hasMatchingUserId(''));

        $this->assertTrue($validate->hasMatchingUserName($userName));
        $this->assertFalse($validate->hasMatchingUserName($this->faker->userName()));
        $this->assertFalse($validate->hasMatchingUserName(''));

        $this->assertTrue($validate->isMatch(clientId: $clientId, userName: $userName, userId: $userId));
        $this->assertFalse($validate->isMatch(clientId: $this->faker->snowflake(), userName: $this->faker->userName(), userId: $this->faker->snowflake()));
    }

    /**
     * @return Generator
     */
    public function provideMatch()
    {
        $this->setupFaker();
        $appId = $this->faker->snowflake();
        $app = new Application();
        $app->setId($appId);
        $app->setName($this->faker->sentence());

        $userId = $this->faker->userId();
        $userName = $this->faker->userName();
        $user = new userClass();
        $user->setId($userId);
        $user->setUsername($userName);
        yield ['application' => $app, 'user' => $user, 'clientId' => $appId, 'userId' => $userId, 'userName' => $userName];
    }

    /**
     *
     */
    public function testIsAppToken()
    {
        $user = new User();
        $this->assertFalse($user->isAppToken());
    }

    /**
     *
     */
    public function testCreate()
    {
        $this->assertInstanceOf(User::class, User::create(application: new Application(), scopes: $this->faker->words(), expires: new DateTimeImmutable(), user: new userClass()));
    }
}