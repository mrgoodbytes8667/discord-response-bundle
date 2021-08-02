<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\Channel;
use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Objects\MessageReference;
use Bytes\Tests\Common\DataProvider\NullProviderTrait;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class MessageTest extends TestCase
{
    use TestDiscordFakerTrait, NullProviderTrait;

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
}