<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\Slash;

use Bytes\Common\Faker\Providers\Discord;
use Bytes\Common\Faker\Providers\MiscProvider;
use Bytes\Common\Faker\TestFakerTrait;
use Bytes\DiscordResponseBundle\Enums\InteractionType;
use Bytes\DiscordResponseBundle\Objects\Member;
use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandInteractionData;
use Bytes\DiscordResponseBundle\Objects\Slash\Interaction;
use Bytes\DiscordResponseBundle\Objects\User;
use Faker\Generator as FakerGenerator;
use Faker\Provider\Address;
use Faker\Provider\Barcode;
use Faker\Provider\Biased;
use Faker\Provider\Color;
use Faker\Provider\Company;
use Faker\Provider\DateTime;
use Faker\Provider\File;
use Faker\Provider\HtmlLorem;
use Faker\Provider\Image;
use Faker\Provider\Internet;
use Faker\Provider\Lorem;
use Faker\Provider\Medical;
use Faker\Provider\Miscellaneous;
use Faker\Provider\Payment;
use Faker\Provider\Person;
use Faker\Provider\PhoneNumber;
use Faker\Provider\Text;
use Faker\Provider\UserAgent;
use Faker\Provider\Uuid;
use Generator;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Faker\FakerEnumProvider;

/**
 * @property Discord|FakerEnumProvider|FakerGenerator|MiscProvider|Address|Barcode|Biased|Color|Company|DateTime|File|HtmlLorem|Image|Internet|Lorem|Medical|Miscellaneous|Payment|Person|PhoneNumber|Text|UserAgent|Uuid $faker
 */
class InteractionTest extends TestCase
{
    use TestFakerTrait;

    /**
     * @dataProvider provideType
     * @param mixed $type
     */
    public function testGetSetType($type)
    {
        $interaction = new Interaction();
        $this->assertNull($interaction->getType());
        $this->assertInstanceOf(Interaction::class, $interaction->setType(null));
        $this->assertNull($interaction->getType());
        $this->assertInstanceOf(Interaction::class, $interaction->setType($type));
        $this->assertEquals($type, $interaction->getType());
    }

    /**
     * @return Generator
     */
    public function provideType()
    {
        $this->setupFaker();
        yield [$this->faker->randomEnum(InteractionType::class)];
    }

    /**
     * @dataProvider provideData
     * @param mixed $data
     */
    public function testGetSetData($data)
    {
        $interaction = new Interaction();
        $this->assertNull($interaction->getData());
        $this->assertInstanceOf(Interaction::class, $interaction->setData(null));
        $this->assertNull($interaction->getData());
        $this->assertInstanceOf(Interaction::class, $interaction->setData($data));
        $this->assertEquals($data, $interaction->getData());
    }

    /**
     * @return Generator
     */
    public function provideData()
    {
        yield [new ApplicationCommandInteractionData()];
    }

    /**
     * @dataProvider provideMember
     * @param mixed $member
     */
    public function testGetSetMember($member)
    {
        $interaction = new Interaction();
        $this->assertNull($interaction->getMember());
        $this->assertInstanceOf(Interaction::class, $interaction->setMember(null));
        $this->assertNull($interaction->getMember());
        $this->assertInstanceOf(Interaction::class, $interaction->setMember($member));
        $this->assertEquals($member, $interaction->getMember());
    }

    /**
     * @return Generator
     */
    public function provideMember()
    {
        yield [new Member()];
    }

    /**
     * @dataProvider provideUser
     * @param mixed $user
     */
    public function testGetSetUser($user)
    {
        $interaction = new Interaction();
        $this->assertNull($interaction->getUser());
        $this->assertInstanceOf(Interaction::class, $interaction->setUser(null));
        $this->assertNull($interaction->getUser());
        $this->assertInstanceOf(Interaction::class, $interaction->setUser($user));
        $this->assertEquals($user, $interaction->getUser());
    }

    /**
     * @return Generator
     */
    public function provideUser()
    {
        yield [new User()];
    }

    /**
     * @dataProvider provideToken
     * @param mixed $token
     */
    public function testGetSetToken($token)
    {
        $interaction = new Interaction();
        $this->assertNull($interaction->getToken());
        $this->assertInstanceOf(Interaction::class, $interaction->setToken(null));
        $this->assertNull($interaction->getToken());
        $this->assertInstanceOf(Interaction::class, $interaction->setToken($token));
        $this->assertEquals($token, $interaction->getToken());
    }

    /**
     * @return Generator
     */
    public function provideToken()
    {
        $this->setupFaker();
        yield [$this->faker->accessToken()];
    }

    /**
     * @dataProvider provideVersion
     * @param mixed $version
     */
    public function testGetSetVersion($version)
    {
        $interaction = new Interaction();
        $this->assertNull($interaction->getVersion());
        $this->assertInstanceOf(Interaction::class, $interaction->setVersion(null));
        $this->assertNull($interaction->getVersion());
        $this->assertInstanceOf(Interaction::class, $interaction->setVersion($version));
        $this->assertEquals($version, $interaction->getVersion());
    }

    /**
     * @return Generator
     */
    public function provideVersion()
    {
        $this->setupFaker();
        yield [$this->faker->randomDigit()];
    }

    /**
     * @dataProvider provideMessage
     * @param mixed $message
     */
    public function testGetSetMessage($message)
    {
        $interaction = new Interaction();
        $this->assertNull($interaction->getMessage());
        $this->assertInstanceOf(Interaction::class, $interaction->setMessage(null));
        $this->assertNull($interaction->getMessage());
        $this->assertInstanceOf(Interaction::class, $interaction->setMessage($message));
        $this->assertEquals($message, $interaction->getMessage());
    }

    /**
     * @return Generator
     */
    public function provideMessage()
    {
        yield [new Message()];
    }

    /**
     * @dataProvider provideId
     * @param mixed $id
     */
    public function testGetSetId($id)
    {
        $interaction = new Interaction();
        $this->assertNull($interaction->getId());
        $this->assertInstanceOf(Interaction::class, $interaction->setId(null));
        $this->assertNull($interaction->getId());
        $this->assertInstanceOf(Interaction::class, $interaction->setId($id));
        $this->assertEquals($id, $interaction->getId());
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
     * @dataProvider provideApplicationId
     * @param mixed $applicationId
     */
    public function testGetSetApplicationId($applicationId)
    {
        $interaction = new Interaction();
        $this->assertNull($interaction->getApplicationId());
        $this->assertInstanceOf(Interaction::class, $interaction->setApplicationId(null));
        $this->assertNull($interaction->getApplicationId());
        $this->assertInstanceOf(Interaction::class, $interaction->setApplicationId($applicationId));
        $this->assertEquals($applicationId, $interaction->getApplicationId());
    }

    /**
     * @return Generator
     */
    public function provideApplicationId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }

    /**
     * @dataProvider provideGuildId
     * @param mixed $guildId
     */
    public function testGetSetGuildId($guildId)
    {
        $interaction = new Interaction();
        $this->assertNull($interaction->getGuildId());
        $this->assertInstanceOf(Interaction::class, $interaction->setGuildId(null));
        $this->assertNull($interaction->getGuildId());
        $this->assertInstanceOf(Interaction::class, $interaction->setGuildId($guildId));
        $this->assertEquals($guildId, $interaction->getGuildId());
    }

    /**
     * @return Generator
     */
    public function provideGuildId()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }

    /**
     * @dataProvider provideChannelID
     * @param mixed $channelID
     */
    public function testGetSetChannelID($channelID)
    {
        $interaction = new Interaction();
        $this->assertNull($interaction->getChannelID());
        $this->assertInstanceOf(Interaction::class, $interaction->setChannelID(null));
        $this->assertNull($interaction->getChannelID());
        $this->assertInstanceOf(Interaction::class, $interaction->setChannelID($channelID));
        $this->assertEquals($channelID, $interaction->getChannelID());
    }

    /**
     * @return Generator
     */
    public function provideChannelID()
    {
        $this->setupFaker();
        yield [$this->faker->snowflake()];
    }

    /**
     * @return string[]
     */
    protected function getProviders()
    {
        return [Discord::class, FakerEnumProvider::class];
    }
}