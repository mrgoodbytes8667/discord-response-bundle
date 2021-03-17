<?php

namespace Bytes\DiscordResponseBundle\Tests;

use Bytes\DiscordResponseBundle\Enums\InteractionResponseType;
use PHPUnit\Framework\TestCase;

class InteractionResponseTypeTest extends TestCase
{
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
     * @return \Generator
     */
    public function provideData()
    {
        yield ['entry' => InteractionResponseType::pong(), 'label' => 'pong', 'value' => 1];
        yield ['entry' => InteractionResponseType::channelMessageWithSource(), 'label' => 'channelMessageWithSource', 'value' => 4];
        yield ['entry' => InteractionResponseType::deferredChannelMessageWithSource(), 'label' => 'deferredChannelMessageWithSource', 'value' => 5];
    }
}
