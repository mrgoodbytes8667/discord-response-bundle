<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\DiscordResponseBundle\Objects\MessageReference;
use Bytes\DiscordResponseBundle\Tests\TestDiscordFakerTrait;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class MessageReferenceTest
 * @package Bytes\DiscordResponseBundle\Tests\Objects
 */
class MessageReferenceTest extends TestCase
{
    use TestDiscordFakerTrait;

    /**
     *
     */
    public function testGetSetMessageId()
    {
        $messageId = $this->faker->snowflake();

        $ref = new MessageReference();
        $this->assertNull($ref->getMessageId());
        $this->assertInstanceOf(MessageReference::class, $ref->setMessageId(null));
        $this->assertNull($ref->getMessageId());
        $this->assertInstanceOf(MessageReference::class, $ref->setMessageId($messageId));
        $this->assertEquals($messageId, $ref->getMessageId());
    }

    /**
     *
     */
    public function testGetSetChannelId()
    {
        $channelId = $this->faker->snowflake();

        $ref = new MessageReference();
        $this->assertNull($ref->getChannelId());
        $this->assertInstanceOf(MessageReference::class, $ref->setChannelID(null));
        $this->assertNull($ref->getChannelID());
        $this->assertInstanceOf(MessageReference::class, $ref->setChannelID($channelId));
        $this->assertEquals($channelId, $ref->getChannelID());
    }

    /**
     *
     */
    public function testGetSetGuildId()
    {
        $guildId = $this->faker->snowflake();

        $ref = new MessageReference();
        $this->assertNull($ref->getGuildId());
        $this->assertInstanceOf(MessageReference::class, $ref->setGuildId(null));
        $this->assertNull($ref->getGuildId());
        $this->assertInstanceOf(MessageReference::class, $ref->setGuildId($guildId));
        $this->assertEquals($guildId, $ref->getGuildId());
    }

    /**
     * @dataProvider provideTrueFalseNull
     * @param bool|null $bool
     */
    public function testGetSetFailIfNotExists(?bool $bool)
    {
        $ref = new MessageReference();
        $this->assertTrue($ref->getFailIfNotExists()); // instantiates as true!

        $this->assertInstanceOf(MessageReference::class, $ref->setFailIfNotExists($bool));
        $this->assertEquals($bool, $ref->getFailIfNotExists());
    }

    /**
     * @return Generator
     */
    public function provideTrueFalseNull()
    {
        yield ['bool' => true];
        yield ['bool' => false];
        yield ['bool' => null];
    }
}
