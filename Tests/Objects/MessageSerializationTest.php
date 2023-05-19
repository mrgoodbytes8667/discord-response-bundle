<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Tests\TestFullSerializationCase;

/**
 *
 */
class MessageSerializationTest extends TestFullSerializationCase
{
    /**
     * @return void
     */
    public function testDeserialization()
    {
        /** @var Message $output */
        $output = $this->serializer->deserialize(file_get_contents(self::getFixturesFile('create-message-v9.json')), Message::class, 'json');

        self::assertNotEmpty($output);

        self::assertCount(1, $output->getComponents());

        self::assertIsArray($output->getAttachments());
    }
}
