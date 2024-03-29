<?php


namespace Bytes\DiscordResponseBundle\Tests\Objects\Guild;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\Interfaces\GuildInterface;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class TestGuildCase
 * @package Bytes\DiscordResponseBundle\Tests\Objects\Guild
 */
abstract class TestGuildCase extends TestCase
{
    use TestDiscordFakerTrait;

    abstract protected function createGuildClass(): GuildInterface;

    /**
     * @return Generator
     * @todo Can this be changed to a unique generator?
     */
    public function provideIcon()
    {
        $this->setupFaker();
        do {
            $extraExtension = $this->faker->fileExtension();
        } while ($extraExtension == 'gif' || $extraExtension == 'jpg' || $extraExtension == 'webp');

        // Test for png responses (the default) including GIF since this is not a valid hash for a gif
        foreach (['png', 'PnG', 'abc', $extraExtension] as $extension) {
            yield ['guildId' => $this->faker->snowflake(), 'iconHash' => $this->faker->iconHash(), 'expectedExtension' => 'png', 'extension' => $extension];
            yield ['guildId' => $this->faker->snowflake(), 'iconHash' => $this->faker->iconHash(true), 'expectedExtension' => 'png', 'extension' => $extension];
        }

        // Test for jpg responses
        foreach (['jpg', 'jpeg', 'JpG'] as $extension) {
            yield ['guildId' => $this->faker->snowflake(), 'iconHash' => $this->faker->iconHash(), 'expectedExtension' => 'jpg', 'extension' => $extension];
            yield ['guildId' => $this->faker->snowflake(), 'iconHash' => $this->faker->iconHash(true), 'expectedExtension' => 'jpg', 'extension' => $extension];
        }

        // Test for webp responses
        foreach (['webp', 'wEBp'] as $extension) {
            yield ['guildId' => $this->faker->snowflake(), 'iconHash' => $this->faker->iconHash(), 'expectedExtension' => 'webp', 'extension' => $extension];
            yield ['guildId' => $this->faker->snowflake(), 'iconHash' => $this->faker->iconHash(true), 'expectedExtension' => 'webp', 'extension' => $extension];
        }

        yield ['guildId' => $this->faker->snowflake(), 'iconHash' => $this->faker->iconHash(), 'expectedExtension' => 'png', 'extension' => 'gif'];
        yield ['guildId' => $this->faker->snowflake(), 'iconHash' => $this->faker->iconHash(true), 'expectedExtension' => 'gif', 'extension' => 'gif'];
    }

    /**
     * @dataProvider provideIcon
     * @param string $guildId
     * @param string $iconHash
     * @param string $expectedExtension
     * @param string $extension
     */
    public function testIconUrl(string $guildId, string $iconHash, string $expectedExtension, string $extension)
    {
        $guild = $this->createGuildClass();
        $guild->setId($guildId);
        $guild->setIcon($iconHash);

        $icon = sprintf('https://cdn.discordapp.com/icons/%s/%s.%s', $guildId, $iconHash, $expectedExtension);
        $this->assertEquals($icon, $guild->getIconUrl($extension));
    }

    public function testProfileImage()
    {
        $guild = $this->createGuildClass();
        $guildId = $this->faker->snowflake();
        $guild->setId($guildId);
        $iconHash = $this->faker->iconHash();
        $guild->setIcon($iconHash);

        $icon = sprintf('https://cdn.discordapp.com/icons/%s/%s.%s', $guildId, $iconHash, 'png');
        self::assertEquals($icon, $guild->getIconUrl());
        self::assertEquals($icon, $guild->getProfileImage());
    }

    /**
     *
     */
    public function testValidIconNoGuildId()
    {
        $guild = $this->createGuildClass();
        $guild->setIcon($this->faker->iconHash(true));

        $this->assertNull($guild->getIconUrl());
    }

    public function testAddSetFeatures()
    {
        $features = [
            "WELCOME_SCREEN_ENABLED",
            "NEWS",
            "COMMUNITY"
        ];

        $feature = 'ANIMATED_ICON';

        $guild = $this->createGuildClass();
        $this->assertNull($guild->getFeatures());

        $guild->addFeature($features[0]);
        $this->assertCount(1, $guild->getFeatures());
        $this->assertEquals($features[0], $guild->getFeatures()[0]);

        $guild->addFeature($features[0]);
        $this->assertCount(1, $guild->getFeatures());

        $guild = $this->createGuildClass();
        $this->assertNull($guild->getFeatures());

        $guild->setFeatures($features);
        $this->assertCount(3, $guild->getFeatures());
        $this->assertEquals($features[0], $guild->getFeatures()[0]);
        $this->assertEquals($features[1], $guild->getFeatures()[1]);
        $this->assertEquals($features[2], $guild->getFeatures()[2]);

        $guild->addFeature($features[0]);
        $this->assertCount(3, $guild->getFeatures());

        $guild->addFeature($feature);
        $this->assertCount(4, $guild->getFeatures());
        $this->assertEquals($feature, $guild->getFeatures()[3]);
    }

    /**
     * @return Generator
     */
    public function provideGuilds()
    {
        $this->setupFaker();

        foreach (range(1, 10) as $i) {
            yield ['guildId' => $this->faker->snowflake(), 'name' => $this->faker->text(100)];
        }
        yield ['guildId' => $this->faker->snowflake(), 'name' => null];
        yield ['guildId' => $this->faker->snowflake(), 'name' => ''];
    }

    /**
     * @dataProvider provideGuilds
     * @param string $guildId
     * @param string|null $name
     */
    public function testToString(string $guildId, ?string $name)
    {
        $guild = $this->createGuildClass();
        $guild->setId($guildId);
        if (!is_null($name)) {
            $guild->setName($name);
        }

        $this->assertEquals($name ?? $guildId, $guild);
    }
}