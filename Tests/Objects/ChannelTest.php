<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\Common\Faker\Providers\Discord;
use Bytes\DiscordResponseBundle\Enums\ChannelTypes;
use Bytes\DiscordResponseBundle\Objects\Channel;
use Bytes\DiscordResponseBundle\Objects\Overwrite;
use Bytes\DiscordResponseBundle\Objects\User;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Faker\FakerEnumProvider;

/**
 * Class ChannelTest
 * @package Bytes\DiscordResponseBundle\Tests\Objects
 */
class ChannelTest extends TestCase
{
    use TestDiscordFakerTrait {
        TestDiscordFakerTrait::getProviders as parentGetProviders;
    }

    protected function getProviders()
    {
        return array_merge([Discord::class, \Spatie\Enum\Faker\FakerEnumProvider::class], $this->parentGetProviders());
    }

    /**
     *
     */
    public function test__toString()
    {
        $channel = new Channel();
        $this->assertEquals('', $channel);

        $channel = new Channel();
        $channel->setName('');
        $this->assertEquals('', $channel);

        $name = $this->faker->word();
        $channel = new Channel();
        $channel->setName($name);
        $this->assertEquals($name, $channel);
    }

    /**
     * 
     */
    public function testGetSetTopic()
    {
        $topic = $this->faker->sentence();

        $channel = new Channel();
        $this->assertNull($channel->getTopic());
        $this->assertInstanceOf(Channel::class, $channel->setTopic(null));
        $this->assertNull($channel->getTopic());
        $this->assertInstanceOf(Channel::class, $channel->setTopic($topic));
        $this->assertEquals($topic, $channel->getTopic());
    }

    /**
     * 
     */
    public function testGetSetBitrate()
    {
        $bitrate = $this->faker->numberBetween(0, 128000);

        $channel = new Channel();
        $this->assertNull($channel->getBitrate());
        $this->assertInstanceOf(Channel::class, $channel->setBitrate(null));
        $this->assertNull($channel->getBitrate());
        $this->assertInstanceOf(Channel::class, $channel->setBitrate($bitrate));
        $this->assertEquals($bitrate, $channel->getBitrate());
    }

    /**
     * 
     */
    public function testGetSetPermissionOverwrites()
    {
        foreach (range(1, 3) as $i)
        {
            $permissionOverwrites[] = $this
                ->getMockBuilder(Overwrite::class)
                ->getMock();
        }

        $channel = new Channel();
        $this->assertNull($channel->getPermissionOverwrites());
        $this->assertInstanceOf(Channel::class, $channel->setPermissionOverwrites(null));
        $this->assertNull($channel->getPermissionOverwrites());
        $this->assertInstanceOf(Channel::class, $channel->setPermissionOverwrites($permissionOverwrites));
        $this->assertCount(3, $channel->getPermissionOverwrites());
    }

    /**
     * 
     */
    public function testGetSetLastMessageId()
    {
        $lastMessageId = $this->faker->messageId();

        $channel = new Channel();
        $this->assertNull($channel->getLastMessageId());
        $this->assertInstanceOf(Channel::class, $channel->setLastMessageId(null));
        $this->assertNull($channel->getLastMessageId());
        $this->assertInstanceOf(Channel::class, $channel->setLastMessageId($lastMessageId));
        $this->assertEquals($lastMessageId, $channel->getLastMessageId());
    }

    /**
     *
     */
    public function testGetSetName()
    {
        $name = $this->faker->guildName();

        $channel = new Channel();
        $this->assertInstanceOf(Channel::class, $channel->setName($name));
        $this->assertEquals($name, $channel->getName());
    }

    /**
     *
     */
    public function testGetNameUninitializedName()
    {
        $this->expectException(\TypeError::class);

        $channel = new Channel();
        $channel->getName();
    }

    /**
     *
     */
    public function testGetSetPosition()
    {
        $position = $this->faker->randomDigitNotNull();

        $channel = new Channel();
        $this->assertNull($channel->getPosition());
        $this->assertInstanceOf(Channel::class, $channel->setPosition(null));
        $this->assertNull($channel->getPosition());
        $this->assertInstanceOf(Channel::class, $channel->setPosition($position));
        $this->assertEquals($position, $channel->getPosition());
        $this->assertInstanceOf(Channel::class, $channel->setRawPosition($position));
        $this->assertEquals($position, $channel->getPosition());
    }

    /**
     *
     */
    public function testGetSetIcon()
    {
        $icon = $this->faker->iconHash();

        $channel = new Channel();
        $this->assertNull($channel->getIcon());
        $this->assertInstanceOf(Channel::class, $channel->setIcon(null));
        $this->assertNull($channel->getIcon());
        $this->assertInstanceOf(Channel::class, $channel->setIcon($icon));
        $this->assertEquals($icon, $channel->getIcon());
    }

    /**
     *
     */
    public function testGetSetParentId()
    {
        $parentId = $this->faker->channelId();

        $channel = new Channel();
        $this->assertNull($channel->getParentId());
        $this->assertInstanceOf(Channel::class, $channel->setParentId(null));
        $this->assertNull($channel->getParentId());
        $this->assertInstanceOf(Channel::class, $channel->setParentId($parentId));
        $this->assertEquals($parentId, $channel->getParentId());
    }

    /**
     *
     */
    public function testGetSetRecipients()
    {
        foreach (range(1, 3) as $i)
        {
            $recipients[] = $this
                ->getMockBuilder(User::class)
                ->getMock();
        }

        $channel = new Channel();
        $this->assertNull($channel->getRecipients());
        $this->assertInstanceOf(Channel::class, $channel->setRecipients(null));
        $this->assertNull($channel->getRecipients());
        $this->assertInstanceOf(Channel::class, $channel->setRecipients($recipients));
        $this->assertCount(3, $channel->getRecipients());
    }

    /**
     *
     */
    public function testGetSetUserLimit()
    {
        $userLimit = $this->faker->randomDigit();

        $channel = new Channel();
        $this->assertNull($channel->getUserLimit());
        $this->assertInstanceOf(Channel::class, $channel->setUserLimit(null));
        $this->assertNull($channel->getUserLimit());
        $this->assertInstanceOf(Channel::class, $channel->setUserLimit($userLimit));
        $this->assertEquals($userLimit, $channel->getUserLimit());
    }

    /**
     *
     */
    public function testGetSetRateLimitPerUser()
    {
        $rateLimitPerUser = $this->faker->numberBetween(0, 21600);

        $channel = new Channel();
        $this->assertNull($channel->getRateLimitPerUser());
        $this->assertInstanceOf(Channel::class, $channel->setRateLimitPerUser(null));
        $this->assertNull($channel->getRateLimitPerUser());
        $this->assertInstanceOf(Channel::class, $channel->setRateLimitPerUser($rateLimitPerUser));
        $this->assertEquals($rateLimitPerUser, $channel->getRateLimitPerUser());
    }

    /**
     *
     */
    public function testGetSetApplicationId()
    {
        $applicationId = $this->faker->snowflake();

        $channel = new Channel();
        $this->assertNull($channel->getApplicationId());
        $this->assertInstanceOf(Channel::class, $channel->setApplicationId(null));
        $this->assertNull($channel->getApplicationId());
        $this->assertInstanceOf(Channel::class, $channel->setApplicationId($applicationId));
        $this->assertEquals($applicationId, $channel->getApplicationId());
    }

    /**
     *
     */
    public function testGetSetDeleted()
    {
        $deleted = $this->faker->boolean();

        $channel = new Channel();
        $this->assertNull($channel->getDeleted());
        $this->assertInstanceOf(Channel::class, $channel->setDeleted(null));
        $this->assertNull($channel->getDeleted());
        $this->assertInstanceOf(Channel::class, $channel->setDeleted($deleted));
        $this->assertEquals($deleted, $channel->getDeleted());
    }

    /**
     * @dataProvider provideChannelTypes
     */
    public function testGetSetType($type, $expected)
    {
        $channel = new Channel();
        $this->assertNull($channel->getType());
        $this->assertInstanceOf(Channel::class, $channel->setType($type));
        $this->assertEquals($expected, $channel->getType());
    }

    public function provideChannelTypes()
    {
        $this->setupFaker();
        $this->faker->addProvider(new FakerEnumProvider($this->faker));
        $enum = $this->faker->randomEnumValue(ChannelTypes::class);
        yield ['type' => $enum, 'expected' => $enum];
        yield ['type' => 'dm', 'expected' => ChannelTypes::from(ChannelTypes::DM)->value];
        yield ['type' => 'text', 'expected' => ChannelTypes::from(ChannelTypes::GUILD_TEXT)->value];
        yield ['type' => 'GUILD_TEXT', 'expected' => ChannelTypes::GUILD_TEXT->value];
        yield ['type' => 'GROUP_DM', 'expected' => ChannelTypes::GROUP_DM->value];
    }

    /**
     *
     */
    public function testGetSetTypeNull()
    {
        $channel = new Channel();
        $this->assertNull($channel->getType());
        $this->assertInstanceOf(Channel::class, $channel->setType(null));
        $this->assertNull($channel->getType());
    }

    /**
     *
     */
    public function testGetSetOwnerId()
    {
        $ownerId = $this->faker->userId();

        $channel = new Channel();
        $this->assertNull($channel->getOwnerId());
        $this->assertInstanceOf(Channel::class, $channel->setOwnerId(null));
        $this->assertNull($channel->getOwnerId());
        $this->assertInstanceOf(Channel::class, $channel->setOwnerId($ownerId));
        $this->assertEquals($ownerId, $channel->getOwnerId());
    }

    /**
     *
     */
    public function testGetSetNsfw()
    {
        $nsfw = $this->faker->boolean();

        $channel = new Channel();
        $this->assertNull($channel->getNsfw());
        $this->assertInstanceOf(Channel::class, $channel->setNsfw(null));
        $this->assertNull($channel->getNsfw());
        $this->assertInstanceOf(Channel::class, $channel->setNsfw($nsfw));
        $this->assertEquals($nsfw, $channel->getNsfw());
    }

    /**
     *
     */
    public function testGetSetId()
    {
        $id = $this->faker->channelId();

        $channel = new Channel();
        $this->assertNull($channel->getId());
        $this->assertInstanceOf(Channel::class, $channel->setId(null));
        $this->assertNull($channel->getId());
        $this->assertInstanceOf(Channel::class, $channel->setId($id));
        $this->assertEquals($id, $channel->getId());
    }

    /**
     *
     */
    public function testGetSetGuild()
    {
        $guild = $this->faker->guildId();

        $channel = new Channel();
        $this->assertNull($channel->getGuild());
        $this->assertInstanceOf(Channel::class, $channel->setGuild(null));
        $this->assertNull($channel->getGuild());
        $this->assertInstanceOf(Channel::class, $channel->setGuild($guild));
        $this->assertEquals($guild, $channel->getGuild());
    }

    /**
     *
     */
    public function testGetSetGuildId()
    {
        $guildId = $this->faker->guildId();

        $channel = new Channel();
        $this->assertNull($channel->getGuildId());
        $this->assertInstanceOf(Channel::class, $channel->setGuildId(null));
        $this->assertNull($channel->getGuildId());
        $this->assertInstanceOf(Channel::class, $channel->setGuildId($guildId));
        $this->assertEquals($guildId, $channel->getGuildId());
    }
}
