<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ChannelIdInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\GuildIdInterface;
use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Objects\MessageReference;
use Bytes\ResponseBundle\Interfaces\IdInterface;
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

    /**
     * @dataProvider provideMessageReferences
     * @param string $messageId
     * @param $message
     * @param $channelId
     * @param $channel
     * @param $guildId
     * @param $guild
     * @param $fail
     */
    public function testCreate(string $messageId, $message, $channelId, $channel, $guildId, $guild, $fail)
    {
        $ref = MessageReference::create($message, $channel, $guild, $fail);
        $this->assertInstanceOf(MessageReference::class, $ref);

        $this->assertNotNull($ref->getMessageId());
        $this->assertEquals($messageId, $ref->getMessageId());

        $this->assertEquals($channelId, $ref->getChannelID());
        $this->assertEquals($guildId, $ref->getGuildId());
        $this->assertEquals($fail, $ref->getFailIfNotExists());
    }

    /**
     * @dataProvider provideMessageReferences
     * @param string $messageId
     * @param $message
     * @param $channelId
     * @param $channel
     * @param $guildId
     * @param $guild
     * @param $fail
     */
    public function testCreateNoFail(string $messageId, $message, $channelId, $channel, $guildId, $guild, $fail)
    {
        $ref = MessageReference::create($message, $channel, $guild);
        $this->assertInstanceOf(MessageReference::class, $ref);

        $this->assertNotNull($ref->getMessageId());
        $this->assertEquals($messageId, $ref->getMessageId());

        $this->assertEquals($channelId, $ref->getChannelID());
        $this->assertEquals($guildId, $ref->getGuildId());
        $this->assertTrue($ref->getFailIfNotExists());
    }

    /**
     * @return Generator
     */
    public function provideMessageReferences()
    {
        $this->setupFaker();
        $messageId = $this->faker->messageId();
        $channelId = $this->faker->channelId();
        $guildId = $this->faker->guildId();

        $message = new Message();
        $message->setId($messageId)->setChannelID($channelId);

        foreach ([
                     $messageId,
                     $message,
                     $this->mock(IdInterface::class, 'getId', $messageId),
                 ] as $m) {
            foreach ([
                         $channelId,
                         $message,
                         $this->mock(ChannelIdInterface::class, 'getChannelId', $channelId),
                         $this->mock(IdInterface::class, 'getId', $channelId),
                         null
                     ] as $c) {
                foreach ([
                             $guildId,
                             $this->mock(GuildIdInterface::class, 'getGuildId', $guildId),
                             $this->mock(IdInterface::class, 'getId', $guildId),
                             null
                         ] as $g) {
                    yield ['messageId' => $messageId, 'message' => $m, 'channelId' => !is_null($c) ? $channelId : null, 'channel' => $c, 'guildId' => !is_null($g) ? $guildId : null, 'guild' => $g, 'fail' => true];
                    yield ['messageId' => $messageId, 'message' => $m, 'channelId' => !is_null($c) ? $channelId : null, 'channel' => $c, 'guildId' => !is_null($g) ? $guildId : null, 'guild' => $g, 'fail' => false];
                }
            }
        }
    }

    /**
     * @param string $class
     * @param string $method
     * @param string|null $return
     * @return IdInterface
     */
    protected function mock(string $class, string $method, ?string $return)
    {
        $mock = $this->getMockBuilder($class)->getMock();
        $mock->method($method)
            ->willReturn($return);

        return $mock;
    }
}
