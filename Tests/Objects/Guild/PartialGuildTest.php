<?php


namespace Bytes\DiscordResponseBundle\Tests\Objects\Guild;


use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\Interfaces\GuildInterface;
use Bytes\DiscordResponseBundle\Objects\PartialGuild;
use Bytes\DiscordResponseBundle\Routing\DiscordImageUrlBuilder;

/**
 * Class PartialGuildTest
 * @package Bytes\DiscordResponseBundle\Tests
 */
class PartialGuildTest extends TestGuildCase
{
    use TestDiscordFakerTrait;

    /**
     *
     */
    public function testBuildIconUrlEmptyGuild()
    {
        $this->assertNull(DiscordImageUrlBuilder::getIconUrl('', ''));
    }

    /**
     *
     */
    public function testGetSetId()
    {
        $guildId = $this->faker->guildId();

        $guild = new PartialGuild();
        $this->assertNull($guild->getId());
        $this->assertNull($guild->getGuildId());

        $this->assertInstanceOf(PartialGuild::class, $guild->setId($guildId));

        $this->assertEquals($guildId, $guild->getId());
        $this->assertEquals($guildId, $guild->getGuildId());

        $guildId2 = $this->faker->guildId();
        if ($guildId2 === $guildId) {
            $guildId2 .= '1';
        }
        $guildId = $guildId2;

        $this->assertInstanceOf(PartialGuild::class, $guild->setGuildId($guildId));

        $this->assertEquals($guildId, $guild->getId());
        $this->assertEquals($guildId, $guild->getGuildId());
    }

    /**
     *
     */
    public function testGetImageBuilderParts()
    {
        $guildId = $this->faker->guildId();
        $icon = $this->faker->iconHash();

        $guild = new PartialGuild();
        $guild->setGuildId($guildId)
            ->setIcon($icon);

        $this->assertCount(2, $guild->getImageBuilderParts());
        $this->assertArrayHasKey('guildId', $guild->getImageBuilderParts());
        $this->assertArrayHasKey('guildIcon', $guild->getImageBuilderParts());
        $this->assertEquals($guildId, $guild->getImageBuilderParts()['guildId']);
        $this->assertEquals($icon, $guild->getImageBuilderParts()['guildIcon']);
    }

    /**
     * @return GuildInterface
     */
    protected function createGuildClass(): GuildInterface
    {
        return new PartialGuild();
    }
}