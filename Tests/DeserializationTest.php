<?php


namespace Bytes\DiscordResponseBundle\Tests;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
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