<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\InteractionResponseType;
use Generator;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Phpunit\EnumAssertions;

/**
 * Class InteractionResponseTypeTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 *
 * @covers \Bytes\DiscordResponseBundle\Enums\InteractionResponseType
 */
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

        $this->assertTrue(InteractionResponseType::isValid($value));
        $type = InteractionResponseType::from($value);
        EnumAssertions::assertSameEnum($entry, $type);
        EnumAssertions::assertSameEnumLabel($entry, $type->label);
        EnumAssertions::assertSameEnumValue($entry, $type->value);
    }

    /**
     *
     */
    public function testInvalidEnum()
    {
        $this->assertFalse(InteractionResponseType::isValid('abc'));
    }

    /**
     * @return Generator
     */
    public function provideData()
    {
        yield ['entry' => InteractionResponseType::pong(), 'label' => 'pong', 'value' => 1];
        yield ['entry' => InteractionResponseType::channelMessageWithSource(), 'label' => 'channelMessageWithSource', 'value' => 4];
        yield ['entry' => InteractionResponseType::deferredChannelMessageWithSource(), 'label' => 'deferredChannelMessageWithSource', 'value' => 5];
        yield ['entry' => InteractionResponseType::deferredUpdateMessage(), 'label' => 'deferredUpdateMessage', 'value' => 6];
        yield ['entry' => InteractionResponseType::updateMessage(), 'label' => 'updateMessage', 'value' => 7];
    }

    /**
     * @dataProvider provideData
     *
     * @param InteractionResponseType $entry
     * @param string $label
     * @param int $value
     */
    public function testJsonSerialize(InteractionResponseType $entry, string $label, int $value)
    {
        $output = json_encode($entry);
        $this->assertIsString($output);
        $this->assertEquals($entry->value, $output);
    }
}