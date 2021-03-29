<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\Member;
use Bytes\DiscordResponseBundle\Objects\User;
use Exception;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class MemberTest
 * @package Bytes\DiscordResponseBundle\Tests\Objects
 */
class MemberTest extends TestCase
{
    use TestDiscordFakerTrait;

    /**
     * Tests the non-discord-js group items
     * @dataProvider provideMember
     * @param $user
     * @param $id
     * @param $userName
     * @param $discriminator
     * @param $avatar
     * @param $publicFlags
     * @param $roles
     * @param $deaf
     * @param $mute
     */
    public function testMember($user, $id, $userName, $discriminator, $avatar, $publicFlags, $roles, $deaf, $mute)
    {
        $member = new Member();
        $member->setUser($user);
        $member->setNick($userName);
        $member->setRoles($roles);
        $member->setDeaf($deaf);
        $member->setMute($mute);

        $this->assertEquals($user, $member->getUser());
        $this->assertEquals($userName, $member->getNick());
        $this->assertCount(count($roles), $member->getRoles());
        $this->assertEquals($deaf, $member->getDeaf());
        $this->assertEquals($mute, $member->getMute());

        $this->assertNull($member->getGuildId());
        $this->assertNull($member->getUserID());
        $this->assertNull($member->getDisplayName());
    }

    public function provideMember()
    {
        foreach ($this->provideUser() as $user) {
            foreach ($this->provideRoles() as $roles) {
                foreach ($this->provideBool() as $deaf) {
                    foreach ($this->provideBool() as $mute) {
                        yield ['user' => $user['user'], 'id' => $user['id'], 'userName' => $user['userName'], 'discriminator' => $user['discriminator'], 'avatar' => $user['avatar'], 'publicFlags' => $user['publicFlags'],

                            'roles' => $roles[0], 'deaf' => $deaf[0], 'mute' => $mute[0]];
                    }
                }

            }
        }
    }

    /**
     * @return Generator
     * @throws Exception
     */
    public function provideUser()
    {
        $this->setupFaker();

        $user = new User();
        $userId = $this->faker->userId();
        $user->setId($userId);
        $discriminator = $this->faker->discriminator();
        $user->setDiscriminator($discriminator);
        $userName = $this->faker->userName();
        $user->setUsername($userName);
        $avatar = $this->faker->iconHash();
        $user->setAvatar($avatar);
        $publicFlags = $this->faker->randomDigit();
        $user->setPublicFlags($publicFlags);
        yield ['user' => $user, 'id' => $userId, 'userName' => $userName, 'discriminator' => $discriminator, 'avatar' => $avatar, 'publicFlags' => $publicFlags];
    }

    /**
     * @return Generator
     */
    public function provideRoles()
    {
        $this->setupFaker();
        yield [
            [
                $this->faker->roleId(),
                $this->faker->roleId(),
                $this->faker->roleId(),
            ]
        ];
    }

    /**
     * @return Generator
     */
    public function provideBool()
    {
        yield [true];
        yield [false];
        yield [null];
    }

    /**
     * @dataProvider provideUser
     */
    public function testGetSetUser($user, $userId, $userName, $discriminator, $avatar, $publicFlags)
    {
        $member = new Member();
        $this->assertNull($member->getUser());
        $this->assertInstanceOf(Member::class, $member->setUser(null));
        $this->assertNull($member->getUser());
        $this->assertInstanceOf(Member::class, $member->setUser($user));
        $this->assertEquals($user, $member->getUser());
    }

    /**
     * @dataProvider provideNick
     */
    public function testGetSetNick($nick)
    {
        $member = new Member();
        $this->assertNull($member->getNick());
        $this->assertInstanceOf(Member::class, $member->setNick(null));
        $this->assertNull($member->getNick());
        $this->assertInstanceOf(Member::class, $member->setNick($nick));
        $this->assertEquals($nick, $member->getNick());
    }

    /**
     * @return Generator
     */
    public function provideNick()
    {
        $this->setupFaker();
        yield [$this->faker->userName()];
    }

    /**
     * @dataProvider provideRoles
     */
    public function testGetSetRoles($roles)
    {
        $member = new Member();
        $this->assertNull($member->getRoles());
        $this->assertInstanceOf(Member::class, $member->setRoles(null));
        $this->assertNull($member->getRoles());
        $this->assertInstanceOf(Member::class, $member->setRoles($roles));
        $this->assertCount(3, $member->getRoles());
        $this->assertEquals($roles, $member->getRoles());
    }

    /**
     * @dataProvider provideGuildId
     */
    public function testGetSetGuildId($guildId)
    {
        $member = new Member();
        $this->assertNull($member->getGuildId());
        $this->assertInstanceOf(Member::class, $member->setGuildId(null));
        $this->assertNull($member->getGuildId());
        $this->assertInstanceOf(Member::class, $member->setGuildId($guildId));
        $this->assertEquals($guildId, $member->getGuildId());
    }

    /**
     * @return Generator
     */
    public function provideGuildId()
    {
        $this->setupFaker();
        yield [$this->faker->guildId()];
    }

    /**
     * @dataProvider provideUserId
     */
    public function testGetSetUserId($userId)
    {
        $member = new Member();
        $this->assertNull($member->getUserId());
        $this->assertInstanceOf(Member::class, $member->setUserId(null));
        $this->assertNull($member->getUserId());
        $this->assertInstanceOf(Member::class, $member->setUserId($userId));
        $this->assertEquals($userId, $member->getUserId());
    }

    /**
     * @return Generator
     */
    public function provideUserId()
    {
        $this->setupFaker();
        yield [$this->faker->userId()];
    }

    /**
     * @dataProvider provideNick
     */
    public function testGetSetNickname($nickname)
    {
        $member = new Member();
        $this->assertNull($member->getNick());
        $this->assertInstanceOf(Member::class, $member->setNickname(null));
        $this->assertNull($member->getNick());
        $this->assertInstanceOf(Member::class, $member->setNickname($nickname));
        $this->assertEquals($nickname, $member->getNick());
    }

    /**
     * @dataProvider provideNick
     */
    public function testGetSetDisplayName($displayName)
    {
        $member = new Member();
        $this->assertNull($member->getDisplayName());
        $this->assertInstanceOf(Member::class, $member->setDisplayName(null));
        $this->assertNull($member->getDisplayName());
        $this->assertInstanceOf(Member::class, $member->setDisplayName($displayName));
        $this->assertEquals($displayName, $member->getDisplayName());
    }

    /**
     * @dataProvider provideBool
     */
    public function testGetSetDeaf($deaf)
    {
        $member = new Member();
        $this->assertNull($member->getDeaf());
        $this->assertInstanceOf(Member::class, $member->setDeaf(null));
        $this->assertNull($member->getDeaf());
        $this->assertInstanceOf(Member::class, $member->setDeaf($deaf));
        $this->assertEquals($deaf, $member->getDeaf());
    }

    /**
     * @dataProvider provideBool
     */
    public function testGetSetMute($mute)
    {
        $member = new Member();
        $this->assertNull($member->getMute());
        $this->assertInstanceOf(Member::class, $member->setMute(null));
        $this->assertNull($member->getMute());
        $this->assertInstanceOf(Member::class, $member->setMute($mute));
        $this->assertEquals($mute, $member->getMute());
    }

    /**
     * @dataProvider provideBool
     */
    public function testGetSetPending($pending)
    {
        $member = new Member();
        $this->assertNull($member->getPending());
        $this->assertInstanceOf(Member::class, $member->setPending(null));
        $this->assertNull($member->getPending());
        $this->assertInstanceOf(Member::class, $member->setPending($pending));
        $this->assertEquals($pending, $member->getPending());
        $this->assertEquals($pending, $member->isPending());
    }

    /**
     * @dataProvider providePermissions
     */
    public function testGetSetPermissions($permissions)
    {
        $member = new Member();
        $this->assertNull($member->getPermissions());
        $this->assertInstanceOf(Member::class, $member->setPermissions(null));
        $this->assertNull($member->getPermissions());
        $this->assertInstanceOf(Member::class, $member->setPermissions($permissions));
        $this->assertEquals($permissions, $member->getPermissions());
    }

    /**
     * @return Generator
     */
    public function providePermissions()
    {
        $this->setupFaker();
        yield [$this->faker->permissionInteger()];
    }
}
