<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\OAuth\Validate;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\OAuth\Validate\Bot;
use Bytes\DiscordResponseBundle\Objects\User;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * Class BotTest
 * @package Bytes\DiscordResponseBundle\Tests\Objects\OAuth\Validate
 */
class BotTest extends TestCase
{

    use TestDiscordFakerTrait;

    /**
     * @dataProvider provideClientId
     * @param mixed $clientId
     */
    public function testGetClientId($clientId)
    {
        $bot = new Bot();
        $this->assertNull($bot->getClientId());
        $this->assertInstanceOf(Bot::class, $bot->setId(null));
        $this->assertNull($bot->getClientId());
        $this->assertInstanceOf(Bot::class, $bot->setId($clientId));
        $this->assertEquals($clientId, $bot->getClientId());
    }

    /**
     * @return Generator
     */
    public function provideClientId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }

    /**
     * @dataProvider provideUserName
     * @param mixed $userName
     */
    public function testGetUserName($userName)
    {
        $bot = new Bot();
        $this->assertInstanceOf(Bot::class, $bot->setName($userName));
        $this->assertEquals($userName, $bot->getUserName());
    }

    /**
     * @return Generator
     */
    public function provideUserName()
    {
        $this->setupFaker();
        yield [$this->faker->userName()];
    }

    /**
     *
     */
    public function testGetSetScopes()
    {
        $bot = new Bot();
        $this->assertEmpty($bot->getScopes());
    }

    /**
     * @dataProvider provideUserId
     * @param mixed $userId
     */
    public function testGetSetUserId($userId)
    {
        $bot = new Bot();
        $this->assertNull($bot->getUserId());
        $this->assertInstanceOf(Bot::class, $bot->setId(null));
        $this->assertNull($bot->getUserId());
        $this->assertInstanceOf(Bot::class, $bot->setId($userId));
        $this->assertEquals($userId, $bot->getUserId());
    }

    /**
     * @return Generator
     */
    public function provideUserId()
    {
        $this->setupFaker();
        yield [$this->faker->userId()];
    }

    /**
     *
     */
    public function testIsAppToken()
    {
        $bot = new Bot();
        $this->assertTrue($bot->isAppToken());
    }

    /**
     * @dataProvider provideIcon
     * @param mixed $icon
     */
    public function testGetSetIcon($icon)
    {
        $bot = new Bot();
        $this->assertNull($bot->getIcon());
        $this->assertInstanceOf(Bot::class, $bot->setIcon(null));
        $this->assertNull($bot->getIcon());
        $this->assertInstanceOf(Bot::class, $bot->setIcon($icon));
        $this->assertEquals($icon, $bot->getIcon());
    }

    /**
     * @return Generator
     */
    public function provideIcon()
    {
        $this->setupFaker();
        yield [$this->faker->iconHash()];
    }

    /**
     * @dataProvider provideDescription
     * @param mixed $description
     */
    public function testGetSetDescription($description)
    {
        $bot = new Bot();
        $this->assertNull($bot->getDescription());
        $this->assertInstanceOf(Bot::class, $bot->setDescription(null));
        $this->assertNull($bot->getDescription());
        $this->assertInstanceOf(Bot::class, $bot->setDescription($description));
        $this->assertEquals($description, $bot->getDescription());
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
        $bot = new Bot();
        $this->assertNull($bot->getRpcOrigins());
        $this->assertInstanceOf(Bot::class, $bot->setRpcOrigins(null));
        $this->assertNull($bot->getRpcOrigins());
        $this->assertInstanceOf(Bot::class, $bot->setRpcOrigins($rpcOrigins));
        $this->assertCount(count($rpcOrigins), $bot->getRpcOrigins());
        $this->assertEquals($rpcOrigins, $bot->getRpcOrigins());
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
        $bot = new Bot();
        $this->assertNull($bot->getBotPublic());
        $this->assertInstanceOf(Bot::class, $bot->setBotPublic(null));
        $this->assertNull($bot->getBotPublic());
        $this->assertInstanceOf(Bot::class, $bot->setBotPublic($botPublic));
        $this->assertEquals($botPublic, $bot->getBotPublic());
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
        $bot = new Bot();
        $this->assertNull($bot->getBotRequireCodeGrant());
        $this->assertInstanceOf(Bot::class, $bot->setBotRequireCodeGrant(null));
        $this->assertNull($bot->getBotRequireCodeGrant());
        $this->assertInstanceOf(Bot::class, $bot->setBotRequireCodeGrant($botRequireCodeGrant));
        $this->assertEquals($botRequireCodeGrant, $bot->getBotRequireCodeGrant());
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
        $bot = new Bot();
        $this->assertNull($bot->getTermsOfServiceUrl());
        $this->assertInstanceOf(Bot::class, $bot->setTermsOfServiceUrl(null));
        $this->assertNull($bot->getTermsOfServiceUrl());
        $this->assertInstanceOf(Bot::class, $bot->setTermsOfServiceUrl($termsOfServiceUrl));
        $this->assertEquals($termsOfServiceUrl, $bot->getTermsOfServiceUrl());
    }

    /**
     * @return Generator
     */
    public function provideTermsOfServiceUrl()
    {
        $this->setupFaker();
        yield [$this->faker->url()];
    }

    /**
     * @dataProvider providePrivacyPolicyUrl
     * @param mixed $privacyPolicyUrl
     */
    public function testGetSetPrivacyPolicyUrl($privacyPolicyUrl)
    {
        $bot = new Bot();
        $this->assertNull($bot->getPrivacyPolicyUrl());
        $this->assertInstanceOf(Bot::class, $bot->setPrivacyPolicyUrl(null));
        $this->assertNull($bot->getPrivacyPolicyUrl());
        $this->assertInstanceOf(Bot::class, $bot->setPrivacyPolicyUrl($privacyPolicyUrl));
        $this->assertEquals($privacyPolicyUrl, $bot->getPrivacyPolicyUrl());
    }

    /**
     * @return Generator
     */
    public function providePrivacyPolicyUrl()
    {
        $this->setupFaker();
        yield [$this->faker->url()];
    }

    /**
     * @dataProvider provideOwner
     * @param mixed $owner
     */
    public function testGetSetOwner($owner)
    {
        $bot = new Bot();
        $this->assertNull($bot->getOwner());
        $this->assertInstanceOf(Bot::class, $bot->setOwner(null));
        $this->assertNull($bot->getOwner());
        $this->assertInstanceOf(Bot::class, $bot->setOwner($owner));
        $this->assertEquals($owner, $bot->getOwner());
    }

    /**
     * @return Generator
     */
    public function provideOwner()
    {
        $this->setupFaker();
        $user = new User();
        $user->setId($this->faker->userId());
        $user->setUsername($this->faker->userName());
        $user->setDiscriminator($this->faker->discriminator());
        $user->setAvatar($this->faker->iconHash());
        $user->setFlags($this->faker->randomDigit());
        $user->setPublicFlags($this->faker->randomDigit());
        yield [$user];
    }

    /**
     * @dataProvider provideSummary
     * @param mixed $summary
     */
    public function testGetSetSummary($summary)
    {
        $bot = new Bot();
        $this->assertNull($bot->getSummary());
        $this->assertInstanceOf(Bot::class, $bot->setSummary(null));
        $this->assertNull($bot->getSummary());
        $this->assertInstanceOf(Bot::class, $bot->setSummary($summary));
        $this->assertEquals($summary, $bot->getSummary());
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
        $bot = new Bot();
        $this->assertNull($bot->getVerifyKey());
        $this->assertInstanceOf(Bot::class, $bot->setVerifyKey(null));
        $this->assertNull($bot->getVerifyKey());
        $this->assertInstanceOf(Bot::class, $bot->setVerifyKey($verifyKey));
        $this->assertEquals($verifyKey, $bot->getVerifyKey());
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
     * @dataProvider provideMatch
     * @param $application
     * @param $user
     * @param $clientId
     * @param $userId
     * @param $userName
     */
    public function testHasMatches($clientId, $userName)
    {
        $validate = new Bot();
        $validate->setId($clientId);
        $validate->setName($userName);

        $this->assertTrue($validate->hasMatchingClientId($clientId));
        $this->assertFalse($validate->hasMatchingClientId($this->faker->snowflake()));
        $this->assertFalse($validate->hasMatchingClientId(''));

        $this->assertTrue($validate->hasMatchingUserId($clientId));
        $this->assertFalse($validate->hasMatchingUserId($this->faker->snowflake()));
        $this->assertFalse($validate->hasMatchingUserId(''));

        $this->assertTrue($validate->hasMatchingUserName($userName));
        $this->assertFalse($validate->hasMatchingUserName($this->faker->userName()));
        $this->assertFalse($validate->hasMatchingUserName(''));

        $this->assertTrue($validate->isMatch(clientId: $clientId, userName: $userName));
        $this->assertFalse($validate->isMatch(clientId: $this->faker->snowflake(), userName: $this->faker->userName()));
    }

    /**
     * @return Generator
     */
    public function provideMatch()
    {
        $this->setupFaker();
        $appId = $this->faker->snowflake();

        $userName = $this->faker->userName();
        yield ['clientId' => $appId, 'userName' => $userName];
    }

    /**
     *
     */
    public function testCreate()
    {
        $this->assertInstanceOf(Bot::class, Bot::create());
        $this->assertInstanceOf(Bot::class, Bot::create(id: $this->faker->snowflake()));
        $this->assertInstanceOf(Bot::class, Bot::create(id: $this->faker->snowflake(),
            name: $this->faker->userName(), icon: $this->faker->iconHash(), description: $this->faker->sentence(),
            rpcOrigins: [], botPublic: $this->faker->boolean(), botRequireCodeGrant: $this->faker->boolean(),
            termsOfServiceUrl: $this->faker->url(), privacyPolicyUrl: $this->faker->url(), owner: new User(),
            summary: $this->faker->sentence(), verifyKey: $this->faker->randomAlphanumericString()));
    }
}
