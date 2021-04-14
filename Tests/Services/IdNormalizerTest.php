<?php

namespace Bytes\DiscordResponseBundle\Tests\Services;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ChannelIdInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\GuildIdInterface;
use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Objects\PartialGuild;
use Bytes\DiscordResponseBundle\Services\IdNormalizer;
use Generator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * Class IdNormalizerTest
 * @package Bytes\DiscordResponseBundle\Tests\Services
 */
class IdNormalizerTest extends TestCase
{
    use TestDiscordFakerTrait;

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
     * @return Generator
     */
    public function provideIdsForDisallowNulls()
    {
        yield [new Message()];
        yield [new PartialGuild()];
        yield [null];
    }

    /**
     * @dataProvider provideIdsForDisallowNullsNoRecursion
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
     * @dataProvider provideGuildIds
     * @param $object
     * @param $id
     */
    public function testNormalizeGuildIdArgument($object, $id)
    {
        $message = $this->faker->sentence();
        $result = IdNormalizer::normalizeGuildIdArgument($object, $message, true);

        $this->assertEquals($id, $result);
    }

    /**
     *
     */
    public function testNormalizeGuildIdArgumentAllowNullWithNull()
    {
        $message = $this->faker->sentence();
        $result = IdNormalizer::normalizeGuildIdArgument(new Message(), $message, true);

        $this->assertNull($result);
    }

    /**
     * @dataProvider provideIdsForDisallowNulls
     */
    public function testNormalizeGuildIdArgumentDisallowNullWithNull($input)
    {
        $message = $this->faker->sentence();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($message);
        $result = IdNormalizer::normalizeGuildIdArgument($input, $message);

        $this->assertNull($result);
    }

    /**
     * @dataProvider provideIdsForDisallowNullsNoRecursion
     */
    public function testNormalizeGuildIdArgumentNoRecursionNoNull($input)
    {
        $message = $this->faker->sentence();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($message);
        $result = IdNormalizer::normalizeGuildIdArgument($input, $message, false, false);

        $this->assertNull($result);
    }

    /**
     * @return Generator
     */
    public function provideIdsForDisallowNullsNoRecursion()
    {
        $this->setupFaker();

        $input = new Message();
        $input->setId($this->faker->snowflake());

        yield [$input];

        yield [$this->faker->randomNumber()];
    }

    /**
     *
     */
    public function testNormalizeGuildIdArgumentNoRecursionAllowNull()
    {
        $message = $this->faker->sentence();
        $input = new Message();
        $input->setId($this->faker->snowflake());
        $result = IdNormalizer::normalizeGuildIdArgument($input, $message, true, false);

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
    }

    /**
     * @return Generator
     */
    public function provideMessage()
    {
        $this->setupFaker();

        $channelId = $this->faker->channelId();
        $messageId = $this->faker->snowflake();

        $object = new Message();
        $object->setChannelID($channelId);
        $object->setId($messageId);

        yield ['object' => $object, 'channelId' => $channelId, 'messageId' => $messageId];
    }

    /**
     * @return Generator
     */
    public function provideGuildIds()
    {
        $object = $this
            ->getMockBuilder(GuildIdInterface::class)
            ->getMock();
        $object->method('getGuildId')
            ->willReturn('230858112993375816');

        yield ['object' => $object, 'id' => '230858112993375816'];
    }

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