<?php

namespace Bytes\DiscordResponseBundle\Tests\Services;

use Bytes\DiscordResponseBundle\Objects\Application\Command\ChatInputCommand;
use Bytes\DiscordResponseBundle\Objects\Interfaces\GuildIdInterface;
use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommand;
use Bytes\DiscordResponseBundle\Services\IdNormalizer;
use Generator;
use InvalidArgumentException;

/**
 *
 */
class GuildIdNormalizerTest extends IdNormalizerTestCase
{
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
     * @dataProvider provideIdsForDisallowNullsNoRecursionMessageType
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
    public function provideGuildIds()
    {
        $object = $this
            ->getMockBuilder(GuildIdInterface::class)
            ->getMock();
        $object->method('getGuildId')
            ->willReturn('230858112993375816');

        yield ['object' => $object, 'id' => '230858112993375816'];

        $object = new ChatInputCommand();
        $object->setGuildId('230858112993375816');

        yield ['object' => $object, 'id' => '230858112993375816'];

        yield ['object' => 0, 'id' => 0];
    }
}