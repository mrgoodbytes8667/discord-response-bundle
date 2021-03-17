<?php


namespace Bytes\DiscordResponseBundle\Tests;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\PartialGuild;
use Bytes\DiscordResponseBundle\Objects\User;

class DeserializationTest extends TestSerializationCase
{
    public function testMeDeserialization()
    {
        $serializer = $this->createSerializer();

        /** @var User $output */
        $output = $serializer->deserialize(file_get_contents(self::getFixturesFile('me.json')), User::class, 'json');

        $this->assertEquals("225922625525845374", $output->getId());
        $this->assertEquals("Raymond", $output->getUsername());
        $this->assertEquals('mz9575g5p5v8pyo3d4ps8h4a', $output->getAvatar());
        $this->assertEquals("4421", $output->getDiscriminator());
        $this->assertEquals(0, $output->getPublicFlags());
        $this->assertEquals(0, $output->getFlags());
        $this->assertEquals(true, $output->getBot());
        $this->assertEquals(true, $output->getVerified());
        $this->assertEquals("en-US", $output->getLocale());
        $this->assertEquals(true, $output->getMfaEnabled());
        $this->assertNull($output->getEmail());

        $this->checkForNullErrors($output);
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

        $this->checkForNullErrors($output);
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

        $this->checkForNullErrors($output);
    }

    public function testRoleV6Deserialization()
    {
        $this->markTestIncomplete('@todo');
    }

    public function testRoleV8Deserialization()
    {
        $this->markTestIncomplete('@todo');
    }

    public function testV8ArrayErrorDeserialization()
    {
        $serializer = $this->createSerializer();

        /** @var User $output */
        $output = $serializer->deserialize(file_get_contents(self::getFixturesFile('array-error-v8.json')), User::class, 'json');

        $this->assertEquals('Invalid Form Body', $output->getMessage());
        $this->assertEquals(50035, $output->getCode());
        $this->assertIsArray($output->getErrors());
        $this->assertArrayHasKey('activities', $output->getErrors());
        $this->assertNull($output->getRetryAfter());
        $this->assertNull($output->getGlobal());
    }

    public function testV8ObjectErrorDeserialization()
    {
        $serializer = $this->createSerializer();

        /** @var User $output */
        $output = $serializer->deserialize(file_get_contents(self::getFixturesFile('object-error-v8.json')), User::class, 'json');

        $this->assertEquals('Invalid Form Body', $output->getMessage());
        $this->assertEquals(50035, $output->getCode());
        $this->assertIsArray($output->getErrors());
        $this->assertArrayHasKey('access_token', $output->getErrors());
        $this->assertNull($output->getRetryAfter());
        $this->assertNull($output->getGlobal());
    }

    public function testV6UnauthorizedErrorDeserialization()
    {
        $serializer = $this->createSerializer();

        /** @var User $output */
        $output = $serializer->deserialize(file_get_contents(self::getFixturesFile('unauthorized-v6.json')), User::class, 'json');

        $this->assertEquals('401: Unauthorized', $output->getMessage());
        $this->assertEquals(0, $output->getCode());
        $this->assertNull($output->getErrors());
        $this->assertNull($output->getRetryAfter());
        $this->assertNull($output->getGlobal());
    }

    /**
     * @param ErrorInterface $output
     */
    protected function checkForNullErrors($output)
    {
        $this->assertNull($output->getMessage());
        $this->assertNull($output->getCode());
        $this->assertNull($output->getRetryAfter());
        $this->assertNull($output->getGlobal());
    }
}