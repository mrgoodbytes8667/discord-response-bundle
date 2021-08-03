<?php

namespace Bytes\DiscordResponseBundle\Tests\Services;

use Bytes\DiscordResponseBundle\Objects\Interfaces\ChannelIdInterface;
use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Services\IdNormalizer;
use Generator;
use InvalidArgumentException;

/**
 *
 */
class ChannelIdNormalizerTest extends IdNormalizerTestCase
{
    /**
     * @dataProvider provideChannelIds
     * @dataProvider provideMessage
     * @param $object
     * @param $channelId
     * @param $messageId
     */
    public function testNormalizeChannelIdArgument($object, $channelId, $messageId)
    {
        $message = $this->faker->sentence();
        $result = IdNormalizer::normalizeChannelIdArgument($object, $message, true);

        $this->assertEquals($channelId, $result);
    }

    /**
     *
     */
    public function testNormalizeChannelIdArgumentAllowNullWithNull()
    {
        $message = $this->faker->sentence();
        $result = IdNormalizer::normalizeChannelIdArgument(new Message(), $message, true);

        $this->assertNull($result);
    }

    /**
     * @dataProvider provideIdsForDisallowNulls
     */
    public function testNormalizeChannelIdArgumentDisallowNullWithNull($input)
    {
        $message = $this->faker->sentence();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($message);
        $result = IdNormalizer::normalizeChannelIdArgument($input, $message);

        $this->assertNull($result);
    }

    /**
     * @dataProvider provideIdsForDisallowNullsNoRecursionMessageType
     */
    public function testNormalizeChannelIdArgumentNoRecursionNoNull($input)
    {
        $message = $this->faker->sentence();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($message);
        $result = IdNormalizer::normalizeChannelIdArgument($input, $message, false, false);

        $this->assertNull($result);
    }

    /**
     *
     */
    public function testNormalizeChannelIdArgumentNoRecursionAllowNull()
    {
        $message = $this->faker->sentence();
        $input = new Message();
        $input->setId($this->faker->snowflake());
        $result = IdNormalizer::normalizeChannelIdArgument($input, $message, true, false);

        $this->assertNull($result);
    }

    /**
     * @return Generator
     */
    public function provideChannelIds()
    {
        $this->setupFaker();

        $channelId = $this->faker->channelId();

        $object = $this
            ->getMockBuilder(ChannelIdInterface::class)
            ->getMock();
        $object->method('getChannelId')
            ->willReturn($channelId);

        yield ['object' => $object, 'channelId' => $channelId, 'messageId' => null];

        yield ['object' => 0, 'channelId' => 0, 'messageId' => null];
    }
}