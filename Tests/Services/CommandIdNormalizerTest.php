<?php

namespace Bytes\DiscordResponseBundle\Tests\Services;

use Bytes\DiscordResponseBundle\Objects\Channel;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ApplicationCommandInterface;
use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommand;
use Bytes\DiscordResponseBundle\Services\IdNormalizer;
use Generator;
use InvalidArgumentException;

/**
 *
 */
class CommandIdNormalizerTest extends IdNormalizerTestCase
{
    /**
     * @dataProvider provideCommandIds
     * @param $object
     * @param $commandId
     */
    public function testNormalizeCommandIdArgument($object, $commandId)
    {
        $message = $this->faker->sentence();
        $result = IdNormalizer::normalizeCommandIdArgument($object, $message, true);

        $this->assertEquals($commandId, $result);
    }

    /**
     * @dataProvider provideNullCommandIds
     * @param $object
     */
    public function testNormalizeCommandIdArgumentAllowNullWithNull($object)
    {
        $message = $this->faker->sentence();
        $result = IdNormalizer::normalizeCommandIdArgument($object, $message, true);

        $this->assertNull($result);
    }

    /**
     * @dataProvider provideIdsForDisallowNulls
     */
    public function testNormalizeCommandIdArgumentDisallowNullWithNull($input)
    {
        $message = $this->faker->sentence();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($message);
        $result = IdNormalizer::normalizeCommandIdArgument($input, $message);

        $this->assertNull($result);
    }

    /**
     * @dataProvider provideIdsForDisallowNullsNoRecursionCommandType
     * @param $input
     */
    public function testNormalizeCommandIdArgumentNoRecursionNoNull($input)
    {
        $message = $this->faker->sentence();
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($message);
        $result = IdNormalizer::normalizeCommandIdArgument($input, $message, false, false);

        $this->assertNull($result);
    }

    public function provideIdsForDisallowNullsNoRecursionCommandType()
    {
        $this->setupFaker();

        $input = new ApplicationCommand();
        $input->setGuildId($this->faker->snowflake());

        yield [$input];
    }

    /**
     *
     */
    public function testNormalizeCommandIdArgumentNoRecursionAllowNull()
    {
        $message = $this->faker->sentence();
        $input = new Message();
        $input->setId($this->faker->snowflake());
        $result = IdNormalizer::normalizeCommandIdArgument($input, $message, true, false);

        $this->assertNull($result);
    }


    /**
     * @return Generator
     */
    public function provideCommandIds()
    {
        $this->setupFaker();

        $commandId = $this->faker->snowflake();

        $object = $this
            ->getMockBuilder(ApplicationCommandInterface::class)
            ->getMock();
        $object->method('getCommandId')
            ->willReturn($commandId);

        yield ['object' => $object, 'commandId' => $commandId];

        $commandId = $this->faker->snowflake();

        $object = new ApplicationCommand();
        $object->setId($commandId);

        yield ['object' => $object, 'commandId' => $commandId];

        yield ['object' => 0, 'commandId' => 0];
    }

    /**
     * @return Generator
     */
    public function provideNullCommandIds()
    {
        $object = $this
            ->getMockBuilder(ApplicationCommandInterface::class)
            ->getMock();
        $object->method('getCommandId')
            ->willReturn(null);

        yield ['object' => $object];

        $object = new ApplicationCommand();

        yield ['object' => $object];

        yield ['object' => new Message()];
        yield ['object' => new Channel()];
    }
}