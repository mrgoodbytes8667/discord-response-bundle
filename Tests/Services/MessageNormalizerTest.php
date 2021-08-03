<?php

namespace Bytes\DiscordResponseBundle\Tests\Services;

use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Services\IdNormalizer;
use Generator;
use InvalidArgumentException;

/**
 *
 */
class MessageNormalizerTest extends IdNormalizerTestCase
{
    /**
     * @dataProvider provideMessage
     * @param $object
     * @param $channelId
     * @param $messageId
     */
    public function testNormalizeMessageIntoIds($object, $channelId, $messageId)
    {
        $ids = IdNormalizer::normalizeMessageIntoIds($object,
            'The "channelId" argument is required and cannot be blank.',
            'The "messageId" argument is required and cannot be blank.');

        $this->assertArrayHasKey('channelId', $ids);
        $this->assertArrayHasKey('messageId', $ids);

        $this->assertEquals($channelId, $ids['channelId']);
        $this->assertEquals($messageId, $ids['messageId']);

    }

    /**
     * @dataProvider provideInvalidNormalizeMessageIntoIds
     * @param $object
     * @param $message
     */
    public function testNormalizeMessageIntoIdsInvalidArgument($object, $message)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($message);

        IdNormalizer::normalizeMessageIntoIds($object,
            'The "channelId" argument is required and cannot be blank.',
            'The "messageId" argument is required and cannot be blank.');
    }

    /**
     * @return Generator
     */
    public function provideInvalidNormalizeMessageIntoIds()
    {
        $this->setupFaker();

        $object = new Message();
        $object->setId($this->faker->snowflake());

        yield ['object' => $object, 'message' => 'The "channelId" argument is required and cannot be blank.'];

        $object = new Message();
        $object->setChannelID($this->faker->channelId());

        yield ['object' => $object, 'message' => 'The "messageId" argument is required and cannot be blank.'];
    }
}