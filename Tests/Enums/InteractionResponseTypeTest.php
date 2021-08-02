<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\InteractionResponseType;
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
    use EnumAssertions;

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
        $this->assertSameEnum($entry, $type);
        $this->assertSameEnumLabel($entry, $type->label);
        $this->assertSameEnumValue($entry, $type->value);
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
