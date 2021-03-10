<?php

namespace Bytes\DiscordResponseBundle\Tests;

use Bytes\DiscordResponseBundle\Enums\InteractionResponseType;
use PHPUnit\Framework\TestCase;
use Symfony\Bridge\PhpUnit\ExpectDeprecationTrait;

class InteractionResponseTypeTest extends TestCase
{
    use ExpectDeprecationTrait;

    /**
     * @dataProvider provideData
     *
     * @param InteractionResponseType $entry
     * @param string $label
     * @param int $value
     */
    public function testEnum(InteractionResponseType $entry, string $label, int $value)
    {
        $this->assertNotNull($entry);
        $this->assertInstanceOf(InteractionResponseType::class, $entry);
        $this->assertEquals($label, $entry->label);
        $this->assertEquals($value, $entry->value);
    }

    /**
     *
     */
    public function testInvalidEnum()
    {
        $this->expectException(\BadMethodCallException::class);
        $entry = new InteractionResponseType('abc123');
    }

    /**
     * @group legacy
     */
    public function testAcknowledge()
    {
        $this->expectDeprecation('Since mrgoodbytes8667/discord-response-bundle 0.7.0: The "%s()" method has been deprecated by Discord and will stop functioning on April 9, 2021. Use `channelMessageWithSource()` or `deferredChannelMessageWithSource()` instead.');
        $entry = InteractionResponseType::acknowledge();

        $this->assertNotNull($entry);
        $this->assertInstanceOf(InteractionResponseType::class, $entry);
        $this->assertEquals('acknowledge', $entry->label);
        $this->assertEquals(2, $entry->value);
    }

    /**
     * @group legacy
     */
    public function testChannelMessage()
    {
        $this->expectDeprecation('Since mrgoodbytes8667/discord-response-bundle 0.7.0: The "%s()" method has been deprecated by Discord and will stop functioning on April 9, 2021. Use `channelMessageWithSource()` or `deferredChannelMessageWithSource()` instead.');
        $entry = InteractionResponseType::channelMessage();

        $this->assertNotNull($entry);
        $this->assertInstanceOf(InteractionResponseType::class, $entry);
        $this->assertEquals('channelMessage', $entry->label);
        $this->assertEquals(3, $entry->value);
    }

    /**
     * @group legacy
     */
    public function testAcknowledgeWithSource()
    {
        $this->expectDeprecation('Since mrgoodbytes8667/discord-response-bundle 0.7.0: The "%s()" method has been deprecated by Discord and will stop functioning on April 9, 2021. Use `deferredChannelMessageWithSource()` instead.');
        $entry = InteractionResponseType::acknowledgeWithSource();

        $this->assertNotNull($entry);
        $this->assertInstanceOf(InteractionResponseType::class, $entry);
        $this->assertEquals('deferredChannelMessageWithSource', $entry->label);
        $this->assertEquals(5, $entry->value);
    }

    /**
     * @return \Generator
     */
    public function provideData()
    {
        yield ['entry' => InteractionResponseType::pong(), 'label' => 'pong', 'value' => 1];
        yield ['entry' => InteractionResponseType::channelMessageWithSource(), 'label' => 'channelMessageWithSource', 'value' => 4];
        yield ['entry' => InteractionResponseType::deferredChannelMessageWithSource(), 'label' => 'deferredChannelMessageWithSource', 'value' => 5];
    }
}
