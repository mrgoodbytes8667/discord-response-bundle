<?php

namespace Bytes\DiscordResponseBundle\Tests\Services;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Objects\PartialGuild;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class IdNormalizerTestCase extends TestCase
{
    use TestDiscordFakerTrait;

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
     * @return Generator
     */
    public function provideIdsForDisallowNullsNoRecursionMessageType()
    {
        $this->setupFaker();

        $input = new Message();
        $input->setId($this->faker->snowflake());

        yield [$input];
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
}