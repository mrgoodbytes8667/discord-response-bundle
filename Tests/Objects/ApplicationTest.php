<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\Application;
use Bytes\DiscordResponseBundle\Objects\User;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class ApplicationTest
 * @package Bytes\DiscordResponseBundle\Tests\Objects
 */
class ApplicationTest extends TestCase
{
    use TestDiscordFakerTrait;

    /**
     * @dataProvider provideIcon
     * @param mixed $icon
     */
    public function testGetSetIcon($icon)
    {
        $application = new Application();
        $this->assertNull($application->getIcon());
        $this->assertInstanceOf(Application::class, $application->setIcon(null));
        $this->assertNull($application->getIcon());
        $this->assertInstanceOf(Application::class, $application->setIcon($icon));
        $this->assertEquals($icon, $application->getIcon());
    }

    /**
     * @return Generator
     */
    public function provideIcon()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider provideDescription
     * @param mixed $description
     */
    public function testGetSetDescription($description)
    {
        $application = new Application();
        $this->assertNull($application->getDescription());
        $this->assertInstanceOf(Application::class, $application->setDescription(null));
        $this->assertNull($application->getDescription());
        $this->assertInstanceOf(Application::class, $application->setDescription($description));
        $this->assertEquals($description, $application->getDescription());
    }

    /**
     * @return Generator
     */
    public function provideDescription()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider provideRpcOrigins
     * @param mixed $rpcOrigins
     */
    public function testGetSetRpcOrigins($rpcOrigins)
    {
        $application = new Application();
        $this->assertNull($application->getRpcOrigins());
        $this->assertInstanceOf(Application::class, $application->setRpcOrigins(null));
        $this->assertNull($application->getRpcOrigins());
        $this->assertInstanceOf(Application::class, $application->setRpcOrigins($rpcOrigins));
        $this->assertEquals($rpcOrigins, $application->getRpcOrigins());
    }

    /**
     * @return Generator
     */
    public function provideRpcOrigins()
    {
        $this->setupFaker();
        yield [$this->faker->words()];
    }

    /**
     * @dataProvider provideBotPublic
     * @param mixed $botPublic
     */
    public function testGetSetBotPublic($botPublic)
    {
        $application = new Application();
        $this->assertNull($application->getBotPublic());
        $this->assertInstanceOf(Application::class, $application->setBotPublic(null));
        $this->assertNull($application->getBotPublic());
        $this->assertInstanceOf(Application::class, $application->setBotPublic($botPublic));
        $this->assertEquals($botPublic, $application->getBotPublic());
    }

    /**
     * @return Generator
     */
    public function provideBotPublic()
    {
        $this->setupFaker();
        yield [$this->faker->boolean()];
    }

    /**
     * @dataProvider provideBotRequireCodeGrant
     * @param mixed $botRequireCodeGrant
     */
    public function testGetSetBotRequireCodeGrant($botRequireCodeGrant)
    {
        $application = new Application();
        $this->assertNull($application->getBotRequireCodeGrant());
        $this->assertInstanceOf(Application::class, $application->setBotRequireCodeGrant(null));
        $this->assertNull($application->getBotRequireCodeGrant());
        $this->assertInstanceOf(Application::class, $application->setBotRequireCodeGrant($botRequireCodeGrant));
        $this->assertEquals($botRequireCodeGrant, $application->getBotRequireCodeGrant());
    }

    /**
     * @return Generator
     */
    public function provideBotRequireCodeGrant()
    {
        $this->setupFaker();
        yield [$this->faker->boolean()];
    }

    /**
     * @dataProvider provideTermsOfServiceUrl
     * @param mixed $termsOfServiceUrl
     */
    public function testGetSetTermsOfServiceUrl($termsOfServiceUrl)
    {
        $application = new Application();
        $this->assertNull($application->getTermsOfServiceUrl());
        $this->assertInstanceOf(Application::class, $application->setTermsOfServiceUrl(null));
        $this->assertNull($application->getTermsOfServiceUrl());
        $this->assertInstanceOf(Application::class, $application->setTermsOfServiceUrl($termsOfServiceUrl));
        $this->assertEquals($termsOfServiceUrl, $application->getTermsOfServiceUrl());
    }

    /**
     * @return Generator
     */
    public function provideTermsOfServiceUrl()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider providePrivacyPolicyUrl
     * @param mixed $privacyPolicyUrl
     */
    public function testGetSetPrivacyPolicyUrl($privacyPolicyUrl)
    {
        $application = new Application();
        $this->assertNull($application->getPrivacyPolicyUrl());
        $this->assertInstanceOf(Application::class, $application->setPrivacyPolicyUrl(null));
        $this->assertNull($application->getPrivacyPolicyUrl());
        $this->assertInstanceOf(Application::class, $application->setPrivacyPolicyUrl($privacyPolicyUrl));
        $this->assertEquals($privacyPolicyUrl, $application->getPrivacyPolicyUrl());
    }

    /**
     * @return Generator
     */
    public function providePrivacyPolicyUrl()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider provideOwner
     * @param mixed $owner
     */
    public function testGetSetOwner($owner)
    {
        $application = new Application();
        $this->assertNull($application->getOwner());
        $this->assertInstanceOf(Application::class, $application->setOwner(null));
        $this->assertNull($application->getOwner());
        $this->assertInstanceOf(Application::class, $application->setOwner($owner));
        $this->assertEquals($owner, $application->getOwner());
    }

    /**
     * @return Generator
     */
    public function provideOwner()
    {
        $this->setupFaker();
        $user = new User();
        $user->setId($this->faker->userId());
        $user->setUserName($this->faker->userName());
        yield [$user];
    }

    /**
     * @dataProvider provideSummary
     * @param mixed $summary
     */
    public function testGetSetSummary($summary)
    {
        $application = new Application();
        $this->assertNull($application->getSummary());
        $this->assertInstanceOf(Application::class, $application->setSummary(null));
        $this->assertNull($application->getSummary());
        $this->assertInstanceOf(Application::class, $application->setSummary($summary));
        $this->assertEquals($summary, $application->getSummary());
    }

    /**
     * @return Generator
     */
    public function provideSummary()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider provideVerifyKey
     * @param mixed $verifyKey
     */
    public function testGetSetVerifyKey($verifyKey)
    {
        $application = new Application();
        $this->assertNull($application->getVerifyKey());
        $this->assertInstanceOf(Application::class, $application->setVerifyKey(null));
        $this->assertNull($application->getVerifyKey());
        $this->assertInstanceOf(Application::class, $application->setVerifyKey($verifyKey));
        $this->assertEquals($verifyKey, $application->getVerifyKey());
    }

    /**
     * @return Generator
     */
    public function provideVerifyKey()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }

    /**
     * @dataProvider provideId
     * @param mixed $id
     */
    public function testGetSetId($id)
    {
        $application = new Application();
        $this->assertNull($application->getId());
        $this->assertInstanceOf(Application::class, $application->setId(null));
        $this->assertNull($application->getId());
        $this->assertInstanceOf(Application::class, $application->setId($id));
        $this->assertEquals($id, $application->getId());
    }

    /**
     * @return Generator
     */
    public function provideId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }

    /**
     * @dataProvider provideName
     * @param mixed $name
     */
    public function testGetSetName($name)
    {
        $application = new Application();

        $this->assertInstanceOf(Application::class, $application->setName($name));
        $this->assertEquals($name, $application->getName());
    }

    /**
     * @return Generator
     */
    public function provideName()
    {
        $this->setupFaker();
        yield [$this->faker->word()];
    }
}
