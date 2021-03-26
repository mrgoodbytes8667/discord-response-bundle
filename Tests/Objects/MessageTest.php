<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Objects\MessageReference;
use Bytes\Tests\Common\Faker\TestDiscordFakerTrait;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    use TestDiscordFakerTrait;

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
     * @return \Generator
     */
    public function provideMessageReference()
    {
        yield [MessageReference::create('123', '456', '789')];
    }
}
