<?php


namespace Bytes\DiscordResponseBundle\Tests;


use Bytes\DiscordResponseBundle\Objects\PartialGuild;
use PHPUnit\Framework\TestCase;
use Symfony\Component\String\ByteString;

/**
 * Class PartialGuildTest
 * @package Bytes\DiscordResponseBundle\Tests
 */
class PartialGuildTest extends TestCase
{
    /**
     *
     */
    public function testIconUrl()
    {
        $guild = new PartialGuild();
        $guild->setId('732307126930327628');
        $guild->setIcon('cfbc5b55d417d6fee18c89c8122e7fe7');

        // Test for png responses (the default) including GIF since this is not a valid hash for a gif
        foreach (['png', 'PnG', 'abc', 'gif', ByteString::fromRandom(5)] as $extension) {
            $this->assertEquals('https://cdn.discordapp.com/icons/732307126930327628/cfbc5b55d417d6fee18c89c8122e7fe7.png', $guild->getIconUrl($extension));
        }

        // Test for jpg responses
        foreach (['jpg', 'jpeg', 'JpG'] as $extension) {
            $this->assertEquals('https://cdn.discordapp.com/icons/732307126930327628/cfbc5b55d417d6fee18c89c8122e7fe7.jpg', $guild->getIconUrl($extension));
        }

        // Test for webp responses
        foreach (['webp', 'wEBp'] as $extension) {
            $this->assertEquals('https://cdn.discordapp.com/icons/732307126930327628/cfbc5b55d417d6fee18c89c8122e7fe7.webp', $guild->getIconUrl($extension));
        }

        // Shouldn't get a GIF if it's not an a_ hash
        $this->assertNotEquals('https://cdn.discordapp.com/icons/732307126930327628/cfbc5b55d417d6fee18c89c8122e7fe7.gif', $guild->getIconUrl('gif'));

        $guild = new PartialGuild();
        $guild->setId('732307126930327628');
        $guild->setIcon('a_cfbc5b55d417d6fee18c89c8122e7fe7');

        // Test for png responses (the default)
        foreach (['png', 'PnG', 'abc', ByteString::fromRandom(5)] as $extension) {
            $this->assertEquals('https://cdn.discordapp.com/icons/732307126930327628/a_cfbc5b55d417d6fee18c89c8122e7fe7.png', $guild->getIconUrl($extension));
        }

        // Test for jpg responses
        foreach (['jpg', 'jpeg', 'JpG'] as $extension) {
            $this->assertEquals('https://cdn.discordapp.com/icons/732307126930327628/a_cfbc5b55d417d6fee18c89c8122e7fe7.jpg', $guild->getIconUrl($extension));
        }

        // Test for webp responses
        foreach (['webp', 'wEBp'] as $extension) {
            $this->assertEquals('https://cdn.discordapp.com/icons/732307126930327628/a_cfbc5b55d417d6fee18c89c8122e7fe7.webp', $guild->getIconUrl($extension));
        }

        // Shouldn't get a GIF if it's not an a_ hash
        $this->assertEquals('https://cdn.discordapp.com/icons/732307126930327628/a_cfbc5b55d417d6fee18c89c8122e7fe7.gif', $guild->getIconUrl('gif'));
    }
}