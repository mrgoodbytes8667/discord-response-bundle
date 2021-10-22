<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\RoleTag;
use Generator;
use PHPUnit\Framework\TestCase;

class RoleTagTest extends TestCase
{
    use TestDiscordFakerTrait;

    /**
     * @dataProvider provideBotId
     * @param mixed $botId
     */
    public function testGetSetBotId($botId)
    {
        $roleTag = new RoleTag();
        $this->assertNull($roleTag->getBotId());
        $this->assertInstanceOf(RoleTag::class, $roleTag->setBotId(null));
        $this->assertNull($roleTag->getBotId());
        $this->assertInstanceOf(RoleTag::class, $roleTag->setBotId($botId));
        $this->assertEquals($botId, $roleTag->getBotId());
    }

    /**
     * @return Generator
     */
    public function provideBotId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }

    /**
     * @dataProvider provideIntegrationId
     * @param mixed $integrationId
     */
    public function testGetSetIntegrationId($integrationId)
    {
        $roleTag = new RoleTag();
        $this->assertNull($roleTag->getIntegrationId());
        $this->assertInstanceOf(RoleTag::class, $roleTag->setIntegrationId(null));
        $this->assertNull($roleTag->getIntegrationId());
        $this->assertInstanceOf(RoleTag::class, $roleTag->setIntegrationId($integrationId));
        $this->assertEquals($integrationId, $roleTag->getIntegrationId());
    }

    /**
     * @return Generator
     */
    public function provideIntegrationId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }

    /**
     * @dataProvider providePremiumSubscriber
     * @param mixed $flag
     */
    public function testGetSetPremiumSubscriber($flag)
    {
        $roleTag = new RoleTag();
        $this->assertInstanceOf(RoleTag::class, $roleTag->setPremiumSubscriber($flag));
        $this->assertEquals($flag, $roleTag->getPremiumSubscriber());
    }

    /**
     * @return Generator
     */
    public function providePremiumSubscriber()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
        yield [$this->faker->word()];
        yield [$this->faker->boolean()];
    }
}