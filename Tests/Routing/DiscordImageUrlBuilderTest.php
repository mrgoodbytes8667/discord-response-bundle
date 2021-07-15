<?php

namespace Bytes\DiscordResponseBundle\Tests\Routing;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\PartialGuild;
use Bytes\DiscordResponseBundle\Objects\User;
use Bytes\DiscordResponseBundle\Routing\DiscordImageUrlBuilder;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class DiscordImageUrlBuilderTest
 * @package Bytes\DiscordResponseBundle\Tests\Routing
 */
class DiscordImageUrlBuilderTest extends TestCase
{
    use TestDiscordFakerTrait;

    /**
     * @dataProvider provideHashes
     * @param $hash
     * @param $gif
     */
    public function testGetAvatarUrl($hash, $gif)
    {
        $userId = $this->faker->userId();
        $user = new User();
        $user->setId($userId)
            ->setAvatar($hash);

        $url = DiscordImageUrlBuilder::getAvatarUrl($user, extension: 'gif');
        $this->assertEquals(sprintf('https://cdn.discordapp.com/avatars/%s/%s.%s', $userId, $hash, $gif ? 'gif' : 'png'), $url);
    }

    /**
     *
     */
    public function testGetAvatarUrlFromPartsMismatch()
    {
        $guildId = $this->faker->guildId();
        $icon = $this->faker->iconHash();

        $guild = new PartialGuild();
        $guild->setGuildId($guildId)
            ->setIcon($icon);

        $this->assertNull(DiscordImageUrlBuilder::getAvatarUrl($guild, extension: 'png'));
    }

    /**
     * @dataProvider provideHashesAndExtensions
     * @param $hash
     * @param $gif
     * @param $extension
     */
    public function testGetIconUrl($hash, $gif, $extension)
    {
        $userId = $this->faker->userId();

        $resultExtension = $extension != 'jpeg' ? $extension : 'jpg';
        if ($extension == 'gif' && !$gif) {
            $resultExtension = 'png';
        }
        $url = DiscordImageUrlBuilder::getIconUrl($userId, $hash, $extension);
        $this->assertEquals(sprintf('https://cdn.discordapp.com/icons/%s/%s.%s', $userId, $hash, $resultExtension), $url);
    }

    /**
     *
     */
    public function testGetIconUrlFromParts()
    {
        $guildId = $this->faker->guildId();
        $icon = $this->faker->iconHash();
        $guild = new PartialGuild();
        $guild->setGuildId($guildId)
            ->setIcon($icon);

        $url = DiscordImageUrlBuilder::getIconUrl($guild, extension: 'png');
        $this->assertEquals(sprintf('https://cdn.discordapp.com/icons/%s/%s.%s', $guildId, $icon, 'png'), $url);
    }

    /**
     *
     */
    public function testGetIconUrlFromPartsMismatch()
    {
        $userId = $this->faker->userId();
        $icon = $this->faker->iconHash();
        $discriminator = $this->faker->discriminator();

        $user = new User();
        $user->setId($userId)
            ->setAvatar($icon)
            ->setDiscriminator($discriminator);

        $this->assertNull(DiscordImageUrlBuilder::getIconUrl($user, extension: 'png'));
    }

    /**
     * @dataProvider provideDefaultUser
     * @param $user
     */
    public function testGetDefaultAvatarUrl($user)
    {
        if($user instanceof User)
        {
            $userId = $user->getDiscriminator();
        } elseif ($user instanceof PartialGuild)
        {
            $userId = $user->getGuildId();
        } else {
            $userId = $user;
        }
        $userId = $userId % 5;

        $url = DiscordImageUrlBuilder::getDefaultAvatarUrl($user);
        $this->assertEquals(sprintf('https://cdn.discordapp.com/embed/avatars/%s.png', $userId), $url);
    }

    /**
     * @return Generator
     */
    public function provideHashesAndExtensions()
    {
        foreach ($this->provideHashes() as $hash) {
            foreach ($this->provideExtensions() as $ext) {
                yield array_merge($hash, $ext);
            }
        }
    }

    /**
     * @return Generator
     */
    public function provideHashes()
    {
        $this->setupFaker();

        yield ['hash' => $this->faker->iconHash(false), 'gif' => false];
        yield ['hash' => $this->faker->iconHash(true), 'gif' => true];
    }

    /**
     * @return Generator
     */
    public function provideExtensions()
    {
        yield ['extension' => 'jpg'];
        yield ['extension' => 'jpeg'];
        yield ['extension' => 'png'];
        yield ['extension' => 'webp'];
    }

    /**
     * @return Generator
     */
    public function provideDefaultUser()
    {
        $this->setupFaker();

        $user = new User();
        $user->setDiscriminator($this->faker->discriminator());

        $guildId = $this->faker->guildId();
        $icon = $this->faker->iconHash();
        $guild = new PartialGuild();
        $guild->setGuildId($guildId)
            ->setIcon($icon);

        yield ['user' => $user];
        yield ['user' => $this->faker->discriminator()];
        yield ['user' => $guild];
    }
}