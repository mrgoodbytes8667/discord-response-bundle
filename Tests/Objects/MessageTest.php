<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Enums\MessageType;
use Bytes\DiscordResponseBundle\Objects\Channel;
use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Objects\MessageReference;
use Bytes\Tests\Common\DataProvider\BooleanProviderTrait;
use Bytes\Tests\Common\DataProvider\NullProviderTrait;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class MessageTest extends TestCase
{
    use TestDiscordFakerTrait, BooleanProviderTrait, NullProviderTrait;

    /**
     * @dataProvider provideMessageReference
     */
    public function testGetSetMessageReference($ref)
    {
        $message = new Message();
        $this->assertNull($message->getMessageReference());
        $this->assertInstanceOf(Message::class, $message->setMessageReference(null));
        $this->assertNull($message->getMessageReference());
        $this->assertInstanceOf(Message::class, $message->setMessageReference($ref));
        $this->assertEquals($ref, $message->getMessageReference());
    }

    /**
     * @return Generator
     */
    public function provideMessageReference()
    {
        yield [MessageReference::create('123', '456', '789')];
    }

    /**
     * @dataProvider provideThread
     * @dataProvider provideNull
     * @param $thread
     */
    public function testGetSetThread($thread)
    {
        $message = new Message();
        $this->assertNull($message->getThread());
        $this->assertInstanceOf(Message::class, $message->setThread(null));
        $this->assertNull($message->getThread());
        $this->assertInstanceOf(Message::class, $message->setThread($thread));
        $this->assertEquals($thread, $message->getThread());
    }

    /**
     * @return Generator
     */
    public function provideThread()
    {
        yield [new Channel()];
    }

    /**
     * @dataProvider provideComponents
     * @param $count
     * @param $components
     */
    public function testGetSetComponents($count, $components)
    {
        $message = new Message();
        $this->assertNull($message->getComponents());
        $this->assertInstanceOf(Message::class, $message->setComponents(null));
        $this->assertNull($message->getComponents());
        $this->assertInstanceOf(Message::class, $message->setComponents($components));
        $this->assertCount($count, $message->getComponents());
        $this->assertEquals($components, $message->getComponents());
    }

    /**
     * @return Generator
     */
    public function provideComponents()
    {
        yield ['count' => 1, 'components' => [new Message\Component()]];
        yield ['count' => 5, 'components' => [new Message\Component(), new Message\Component(), new Message\Component(), new Message\Component(), new Message\Component()]];
    }

    /**
     * @dataProvider provideTimestamp
     * @param mixed $timestamp
     */
    public function testGetSetTimestamp($timestamp)
    {
        $message = new Message();
        $this->assertNull($message->getTimestamp());
        $this->assertInstanceOf(Message::class, $message->setTimestamp(null));
        $this->assertNull($message->getTimestamp());
        $this->assertInstanceOf(Message::class, $message->setTimestamp($timestamp));
        $this->assertEquals($timestamp, $message->getTimestamp());
    }

    /**
     * @return Generator
     */
    public function provideTimestamp()
    {
        $this->setupFaker();
        yield [$this->faker->dateTimeInInterval('-1 week', 'now')];
    }

    /**
     * @dataProvider provideEditedTimestamp
     * @param mixed $editedTimestamp
     */
    public function testGetSetEditedTimestamp($editedTimestamp)
    {
        $message = new Message();
        $this->assertNull($message->getEditedTimestamp());
        $this->assertInstanceOf(Message::class, $message->setEditedTimestamp(null));
        $this->assertNull($message->getEditedTimestamp());
        $this->assertInstanceOf(Message::class, $message->setEditedTimestamp($editedTimestamp));
        $this->assertEquals($editedTimestamp, $message->getEditedTimestamp());
    }

    /**
     * @return Generator
     */
    public function provideEditedTimestamp()
    {
        $this->setupFaker();
        yield [$this->faker->dateTimeInInterval('-1 week', 'now')];
    }

    /**
     * @dataProvider provideBooleans
     * @dataProvider provideNull
     * @param mixed $tts
     */
    public function testGetSetTts($tts)
    {
        $message = new Message();
        $this->assertNull($message->getTts());
        $this->assertInstanceOf(Message::class, $message->setTts(null));
        $this->assertNull($message->getTts());
        $this->assertInstanceOf(Message::class, $message->setTts($tts));
        $this->assertEquals($tts, $message->getTts());
    }

    /**
     * @dataProvider provideBooleans
     * @dataProvider provideNull
     * @param mixed $mentionEveryone
     */
    public function testGetSetMentionEveryone($mentionEveryone)
    {
        $message = new Message();
        $this->assertNull($message->getMentionEveryone());
        $this->assertInstanceOf(Message::class, $message->setMentionEveryone(null));
        $this->assertNull($message->getMentionEveryone());
        $this->assertInstanceOf(Message::class, $message->setMentionEveryone($mentionEveryone));
        $this->assertEquals($mentionEveryone, $message->getMentionEveryone());
    }

    /**
     * @dataProvider provideMentionRoles
     * @param mixed $mentionRoles
     */
    public function testGetSetMentionRoles($mentionRoles)
    {
        $message = new Message();
        $this->assertNull($message->getMentionRoles());
        $this->assertInstanceOf(Message::class, $message->setMentionRoles(null));
        $this->assertNull($message->getMentionRoles());
        $this->assertInstanceOf(Message::class, $message->setMentionRoles($mentionRoles));
        $this->assertEquals($mentionRoles, $message->getMentionRoles());
    }

    /**
     * @return Generator
     */
    public function provideMentionRoles()
    {
        $this->setupFaker();
        yield [$this->faker->words()];
    }

    /**
     * @dataProvider provideBooleans
     * @dataProvider provideNull
     * @param mixed $pinned
     */
    public function testGetSetPinned($pinned)
    {
        $message = new Message();
        $this->assertNull($message->getPinned());
        $this->assertInstanceOf(Message::class, $message->setPinned(null));
        $this->assertNull($message->getPinned());
        $this->assertInstanceOf(Message::class, $message->setPinned($pinned));
        $this->assertEquals($pinned, $message->getPinned());
    }

    /**
     * @dataProvider provideWebhookId
     * @param mixed $webhookId
     */
    public function testGetSetWebhookId($webhookId)
    {
        $message = new Message();
        $this->assertNull($message->getWebhookId());
        $this->assertInstanceOf(Message::class, $message->setWebhookId(null));
        $this->assertNull($message->getWebhookId());
        $this->assertInstanceOf(Message::class, $message->setWebhookId($webhookId));
        $this->assertEquals($webhookId, $message->getWebhookId());
    }

    /**
     * @return Generator
     */
    public function provideWebhookId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }

    /**
     * @dataProvider provideType
     * @param mixed $type
     */
    public function testGetSetType($type)
    {
        $message = new Message();
        $this->assertNull($message->getType());
        $this->assertInstanceOf(Message::class, $message->setType(null));
        $this->assertNull($message->getType());
        $this->assertInstanceOf(Message::class, $message->setType($type));
        $this->assertEquals($type, $message->getType());
    }

    /**
     * @return Generator
     */
    public function provideType()
    {
        $this->setupFaker();
        yield [$this->faker->randomEnumValue(MessageType::class)];
    }

    /**
     * @dataProvider provideFlags
     * @param mixed $flags
     */
    public function testGetSetFlags($flags)
    {
        $message = new Message();
        $this->assertNull($message->getFlags());
        $this->assertInstanceOf(Message::class, $message->setFlags(null));
        $this->assertNull($message->getFlags());
        $this->assertInstanceOf(Message::class, $message->setFlags($flags));
        $this->assertEquals($flags, $message->getFlags());
    }

    /**
     * @return Generator
     */
    public function provideFlags()
    {
        $this->setupFaker();
        yield [$this->faker->randomDigit()];
    }

    /**
     * @dataProvider provideId
     * @param mixed $id
     */
    public function testGetSetId($id)
    {
        $message = new Message();
        $this->assertNull($message->getId());
        $this->assertNull($message->getMessageId());
        $this->assertInstanceOf(Message::class, $message->setId(null));
        $this->assertNull($message->getId());
        $this->assertNull($message->getMessageId());
        $this->assertInstanceOf(Message::class, $message->setId($id));
        $this->assertEquals($id, $message->getId());
        $this->assertEquals($id, $message->getMessageId());
    }

    /**
     * @return Generator
     */
    public function provideId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }

    /**
     * @dataProvider provideGuildId
     * @param mixed $guildId
     */
    public function testGetSetGuildId($guildId)
    {
        $message = new Message();
        $this->assertNull($message->getGuildId());
        $this->assertInstanceOf(Message::class, $message->setGuildId(null));
        $this->assertNull($message->getGuildId());
        $this->assertInstanceOf(Message::class, $message->setGuildId($guildId));
        $this->assertEquals($guildId, $message->getGuildId());
    }

    /**
     * @return Generator
     */
    public function provideGuildId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }

    /**
     * @dataProvider provideChannelId
     * @param mixed $channelID
     */
    public function testGetSetChannelID($channelID)
    {
        $message = new Message();
        $this->assertNull($message->getChannelID());
        $this->assertInstanceOf(Message::class, $message->setChannelID(null));
        $this->assertNull($message->getChannelID());
        $this->assertInstanceOf(Message::class, $message->setChannelID($channelID));
        $this->assertEquals($channelID, $message->getChannelID());
    }

    /**
     * @return Generator
     */
    public function provideChannelId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }
}