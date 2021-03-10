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
     * @param string|null $deprecation
     * @param string|null $exception
     */
    public function testEnum(InteractionResponseType $entry, string $label, int $value, ?string $deprecation, ?string $exception) {
        $this->assertNotNull($entry);
        $this->assertInstanceOf(InteractionResponseType::class, $entry);
        $this->assertEquals($label, $entry->label);
        $this->assertEquals($value, $entry->value);
    }

    /**
     * @return \Generator
     */
    public function provideData() {

        yield ['entry' => InteractionResponseType::pong(), 'label' => 'pong', 'value' => 1, 'deprecation' => null, 'exception' => null];
        yield ['entry' => InteractionResponseType::acknowledge(), 'label' => 'acknowledge', 'value' => 2, 'deprecation' => 'Since mrgoodbytes8667/discord-response-bundle 0.7.0: The "%s()" method has been deprecated by Discord and will stop functioning on April 9, 2021.', 'exception' => null];
        yield ['entry' => InteractionResponseType::channelMessage(), 'label' => 'channelMessage', 'value' => 3, 'deprecation' => 'Since mrgoodbytes8667/discord-response-bundle 0.7.0: The "%s()" method has been deprecated by Discord and will stop functioning on April 9, 2021.', 'exception' => null];
        yield ['entry' => InteractionResponseType::channelMessageWithSource(), 'label' => 'channelMessageWithSource', 'value' => 4, 'deprecation' => null, 'exception' => null];
        yield ['entry' => InteractionResponseType::acknowledgeWithSource(), 'label' => 'deferredChannelMessageWithSource', 'value' => 5, 'deprecation' => 'Since mrgoodbytes8667/discord-response-bundle 0.7.0: The "%s()" method has been deprecated by Discord and will stop functioning on April 9, 2021. Please use deferredChannelMessageWithSource() instead.', 'exception' => null];
        yield ['entry' => InteractionResponseType::deferredChannelMessageWithSource(), 'label' => 'deferredChannelMessageWithSource', 'value' => 5, 'deprecation' => null, 'exception' => null];
    }
}
