<?php


namespace Bytes\DiscordResponseBundle\Tests;


use Bytes\DiscordResponseBundle\Objects\User;

class DeserializationTest extends TestSerializationCase
{
    public function testMeDeserialization()
    {
        $serializer = $this->createSerializer();

        /** @var User $output */
        $output = $serializer->deserialize(file_get_contents(self::getFixturesFile('me.json')), User::class, 'json');

        $this->assertEquals($output->getId(), "225922625525845374");
        $this->assertEquals($output->getUsername(), "Raymond");
        $this->assertEquals($output->getAvatar(), 'mz9575g5p5v8pyo3d4ps8h4a');
        $this->assertEquals($output->getDiscriminator(), "4421");
        $this->assertEquals($output->getPublicFlags(), 0);
        $this->assertEquals($output->getFlags(), 0);
        $this->assertEquals($output->getBot(), true);
        $this->assertEquals($output->getVerified(), true);
        $this->assertEquals($output->getLocale(), "en-US");
        $this->assertEquals($output->getMfaEnabled(), true);
        $this->assertNull($output->getEmail());
    }
}