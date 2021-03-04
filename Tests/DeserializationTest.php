<?php


namespace Bytes\DiscordResponseBundle\Tests;


use Bytes\DiscordResponseBundle\Objects\PartialGuild;
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

    public function testPartialGuildV6Deserialization()
    {
        $serializer = $this->createSerializer();

        /** @var PartialGuild $output */
        $output = $serializer->deserialize(file_get_contents(self::getFixturesFile('partial-guild-v6.json')), PartialGuild::class, 'json');

        $this->assertEquals("732307126930327628", $output->getId());
        $this->assertEquals("PZjj2rimTJQeMYYTCKKw7siBknEUdE", $output->getName());
        $this->assertEquals('cfbc5b55d417d6fee18c89c8122e7fe7', $output->getIcon());
        $this->assertFalse($output->getOwner());
        $this->assertEquals(372633152, $output->getPermissions());
        $this->assertIsInt($output->getPermissions());

        $this->assertNull($output->getMessage());
        $this->assertNull($output->getCode());
        $this->assertNull($output->getRetryAfter());
        $this->assertNull($output->getGlobal());
    }

    public function testPartialGuildV8Deserialization()
    {
        $serializer = $this->createSerializer();

        /** @var PartialGuild $output */
        $output = $serializer->deserialize(file_get_contents(self::getFixturesFile('partial-guild-v8.json')), PartialGuild::class, 'json');

        $this->assertEquals("732307126930327628", $output->getId());
        $this->assertEquals("PZjj2rimTJQeMYYTCKKw7siBknEUdE", $output->getName());
        $this->assertEquals('cfbc5b55d417d6fee18c89c8122e7fe7', $output->getIcon());
        $this->assertFalse($output->getOwner());
        $this->assertEquals('6815084096', $output->getPermissions());
        $this->assertIsString($output->getPermissions());

        $this->assertNull($output->getMessage());
        $this->assertNull($output->getCode());
        $this->assertNull($output->getRetryAfter());
        $this->assertNull($output->getGlobal());
    }
}