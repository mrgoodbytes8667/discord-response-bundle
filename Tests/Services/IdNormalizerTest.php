<?php

namespace Bytes\DiscordResponseBundle\Tests\Services;

use Bytes\DiscordResponseBundle\Objects\Channel;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ChannelIdInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\GuildIdInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\IdInterface;
use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Objects\PartialGuild;
use Bytes\DiscordResponseBundle\Services\IdNormalizer;
use Bytes\Tests\Common\Faker\TestDiscordFakerTrait;
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
     * @param $object
     * @param $id
     */
    public function testNormalizeChannelIdArgument($object, $id)
    {
        $message = $this->faker->sentence();
        $result = IdNormalizer::normalizeChannelIdArgument($object, $message, true);

        $this->assertEquals($id, $result);
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
     * @dataProvider provideValidIds
     * @param $object
     * @param $id
     */
    public function testNormalizeIdArgument($object, $id)
    {
        $message = $this->faker->sentence();
        $result = IdNormalizer::normalizeIdArgument($object, $message, true);

        $this->assertEquals($id, $result);
    }

    /**
     * @dataProvider provideIdsForDisallowNulls
     * @param $input
     */
    public function testNormalizeIdArgumentAllowNullWithNull($input)
    {
        $message = $this->faker->sentence();
        $result = IdNormalizer::normalizeIdArgument($input, $message, true);

        $this->assertNull($result);
    }

    /**
     * @dataProvider provideIdsForDisallowNulls
     * @param $input
     */
    public function testNormalizeIdArgumentDisallowNull($input)
    {
        $message = $this->faker->sentence();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($message);
        $result = IdNormalizer::normalizeIdArgument($input, $message);

        $this->assertNull($result);
    }

    /**
     *
     */
    public function testNormalizeIdArgumentMissingMessageObject()
    {
        $result = IdNormalizer::normalizeIdArgument(new Message(), '', true);

        $this->assertNull($result);
    }

    /**
     *
     */
    public function testNormalizeIdArgumentMissingMessageString()
    {
        $result = IdNormalizer::normalizeIdArgument('', '', true);

        $this->assertEmpty($result);
    }

    /**
     * @return Generator
     */
    public function provideValidIds()
    {
        $this->setupFaker();
        $id = $this->faker->snowflake();
        $object = $this
            ->getMockBuilder(IdInterface::class)
            ->getMock();
        $object->method('getId')
            ->willReturn($id);

        yield ['object' => $object, 'id' => $id];

        foreach([Message::class, PartialGuild::class, Channel::class] as $class)
        {
            $id = $this->faker->snowflake();
            $object = new $class();
            $object->setId($id);
            yield ['object' => $object, 'id' => $id];
        }
    }

    /**
     * @return Generator
     */
    public function provideChannelIds()
    {
        $object = $this
            ->getMockBuilder(ChannelIdInterface::class)
            ->getMock();
        $object->method('getChannelId')
            ->willReturn('230858112993375816');

        yield ['object' => $object, 'id' => '230858112993375816'];
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
}
