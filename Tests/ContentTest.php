<?php

namespace Bytes\DiscordResponseBundle\Tests;

use Bytes\Common\Faker\Providers\Discord;
use Bytes\DiscordResponseBundle\Objects\Embed\Embed;
use Bytes\DiscordResponseBundle\Objects\Message\AllowedMentions;
use Bytes\DiscordResponseBundle\Objects\Message\Content;
use Bytes\DiscordResponseBundle\Objects\MessageReference;
use DateTime;
use Exception;
use Faker\Factory;
use Faker\Generator as FakerGenerator;
use Faker\Provider\Base;
use Faker\Provider\Color;
use Faker\Provider\Internet;
use Generator;
use Illuminate\Support\Str;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\String\ByteString;

/**
 * Class ContentTest
 * @package Bytes\DiscordResponseBundle\Tests
 */
class ContentTest extends TestRolesSerializationCase
{
    public function testSerializeEveryone()
    {
        $serializer = $this->createSerializer();

        $content = $this->generateFakeContentClass();

        $object = $serializer->serialize($content, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $c = $this->generateContentArrayFromContent($content);

        $manual = $serializer->serialize($c, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);
        $this->assertEquals($manual, $object);
    }

    /**
     * @param array|null $roles
     * @param array|null $parse
     * @return Content
     */
    protected function generateFakeContentClass(?array $roles = null, ?array $parse = null)
    {
        $allowedMentions = $this->generateFakeAllowedMentionsClass($roles, $parse);

        $content = new Content();
        $content->setEmbed($this->generateFakeEmbed());
        $content->setAllowedMentions($allowedMentions);
        $content->setContent(Str::random());

        return $content;
    }

    /**
     * @return Embed
     */
    protected function generateFakeEmbed()
    {
        /** @var \Faker\Generator|Color|Internet|Discord $faker */
        $faker = Factory::create();
        $faker->addProvider(new Discord($faker));
        return $faker->embed();
    }

    /**
     * @param Content $content
     * @return array
     */
    protected function generateContentArrayFromContent(Content $content)
    {
        $c = [];
        if (!empty($content->getContent())) {
            $c['content'] = $content->getContent();
        }
        $c['embed'] = $content->getEmbed();
        $c['allowed_mentions'] = [];

        if (!is_null($content->getAllowedMentions()->getParse())) {
            $c['allowed_mentions']['parse'] = $content->getAllowedMentions()->getParse();
        }
        if (!empty($content->getAllowedMentions()->getRoles())) {
            $c['allowed_mentions']['roles'] = $content->getAllowedMentions()->getRoles();
        }

        return $c;
    }

    public function testDeserializeEveryone()
    {
        $serializer = $this->createSerializer();

        $content = $this->generateFakeContentClass();

        $object = $serializer->serialize($content, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $de = $serializer->deserialize($object, Content::class, 'json');

        $this->assertEquals($content, $de);
    }

    public function testSerializeEmptyParse()
    {
        $serializer = $this->createSerializer();

        $content = $this->generateFakeContentClass();
        $allowedMentions = $content->getAllowedMentions();
        $allowedMentions->setParse([]);
        $content->setAllowedMentions($allowedMentions);

        $object = $serializer->serialize($content, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $c = $this->generateContentArrayFromContent($content);

        $manual = $serializer->serialize($c, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);
        $this->assertEquals($manual, $object);
    }

    public function testDeserializeEmptyParse()
    {
        $serializer = $this->createSerializer();

        $content = $this->generateFakeContentClass();
        $allowedMentions = $content->getAllowedMentions();
        $allowedMentions->setParse([]);
        $content->setAllowedMentions($allowedMentions);

        $object = $serializer->serialize($content, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $de = $serializer->deserialize($object, Content::class, 'json');

        $this->assertEquals($content, $de);
    }

    public function testSerializeRoles()
    {
        $serializer = $this->createSerializer();

        foreach (range(1, 10) as $max) {
            $content = $this->generateFakeContentClass($this->generateFakeRoles($max));

            $object = $serializer->serialize($content, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

            $c = $this->generateContentArrayFromContent($content);

            $manual = $serializer->serialize($c, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);
            $this->assertEquals($manual, $object);
        }
    }

    public function testDeserializeRoles()
    {
        $serializer = $this->createSerializer();

        foreach (range(1, 10) as $max) {
            $content = $this->generateFakeContentClass($this->generateFakeRoles($max));

            $object = $serializer->serialize($content, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

            $de = $serializer->deserialize($object, Content::class, 'json');

            $this->assertEquals($content, $de);
        }
    }

    public function testValidationPass()
    {
        $this->validationPass([
            Content::create($this->generateFakeEmbed(), ByteString::fromRandom(2000))
        ]);
    }

    public function testValidationFail()
    {
        $this->validationFail([
            Content::create($this->generateFakeEmbed(), ByteString::fromRandom(2001))
        ]);
    }

    /**
     * @dataProvider provideContent
     */
    public function testGetSetContent($input)
    {
        $content = new Content();
        $this->assertNull($content->getContent());
        $this->assertInstanceOf(Content::class, $content->setContent(null));
        $this->assertNull($content->getContent());
        $this->assertInstanceOf(Content::class, $content->setContent($input));
        $this->assertEquals($input, $content->getContent());
    }

    /**
     * @return Generator
     */
    public function provideContent()
    {
        $faker = Factory::create();

        yield [$faker->sentence()];
        yield [''];
        yield [null];
    }

    /**
     * @dataProvider provideNonce
     */
    public function testGetSetNonce($nonce)
    {
        $content = new Content();
        $this->assertNull($content->getNonce());
        $this->assertInstanceOf(Content::class, $content->setNonce(null));
        $this->assertNull($content->getNonce());
        $this->assertInstanceOf(Content::class, $content->setNonce($nonce));
        $this->assertEquals($nonce, $content->getNonce());
    }

    /**
     * @return Generator
     */
    public function provideNonce()
    {
        /** @var FakerGenerator|Base $faker */
        $faker = Factory::create();

        yield [$faker->randomLetter()];
        yield [$faker->randomNumber()];
        yield [''];
        yield [null];
    }

    /**
     * @dataProvider provideTts
     */
    public function testGetSetTts($tts)
    {
        $content = new Content();
        $this->assertNull($content->getTts());
        $this->assertInstanceOf(Content::class, $content->setTts(null));
        $this->assertNull($content->getTts());
        $this->assertInstanceOf(Content::class, $content->setTts($tts));
        $this->assertEquals($tts, $content->getTts());
    }

    public function provideTts()
    {
        yield[true];
        yield[false];
        yield[null];
    }

    /**
     * @dataProvider provideEmbed
     */
    public function testGetSetEmbed($embed)
    {
        $content = new Content();
        $this->assertNull($content->getEmbed());
        $this->assertInstanceOf(Content::class, $content->setEmbed(null));
        $this->assertNull($content->getEmbed());
        $this->assertInstanceOf(Content::class, $content->setEmbed($embed));
        $this->assertEquals($embed, $content->getEmbed());
    }

    public function provideEmbed()
    {
        yield[$this->generateFakeEmbed()];
        yield[null];
    }

    /**
     * @dataProvider provideAllowedMentions
     */
    public function testGetSetAllowedMentions($allowedMentions)
    {
        $content = new Content();
        $this->assertNull($content->getAllowedMentions());
        $this->assertInstanceOf(Content::class, $content->setAllowedMentions(null));
        $this->assertNull($content->getAllowedMentions());
        $this->assertInstanceOf(Content::class, $content->setAllowedMentions($allowedMentions));
        $this->assertEquals($allowedMentions, $content->getAllowedMentions());
    }

    public function provideAllowedMentions()
    {
        /** @var FakerGenerator|Base $faker */
        $faker = Factory::create();

        yield [AllowedMentions::createForEveryone()];

        yield [AllowedMentions::createForRoles($this->generateFakeRoles($faker->randomDigitNotNull()))];

        yield [AllowedMentions::create()];

        yield [null];
    }

    /**
     * @dataProvider provideMessageReference
     */
    public function testGetSetMessageReference($messageReference)
    {
        $content = new Content();
        $this->assertNull($content->getMessageReference());
        $this->assertInstanceOf(Content::class, $content->setMessageReference(null));
        $this->assertNull($content->getMessageReference());
        $this->assertInstanceOf(Content::class, $content->setMessageReference($messageReference));
        $this->assertEquals($messageReference, $content->getMessageReference());
    }

    /**
     * @return Generator
     */
    public function provideMessageReference()
    {
        /** @var FakerGenerator|Discord $faker */
        $faker = Factory::create();
        $faker->addProvider(new Discord($faker));

        foreach([$faker->snowflake(), null] as $channel) {
            foreach ([$faker->snowflake(), null] as $guild) {
                foreach ([true, false] as $failFlag) {
                    yield [MessageReference::create($faker->snowflake(), $channel, $guild, $failFlag)];
                }
            }
        }
    }

    /**
     * @return Generator
     */
    public function provideCreate()
    {
        $faker = Factory::create();

        $embed = $this->generateFakeEmbed();

        foreach ([$faker->sentence(), '', null] as $content)
        {
            foreach($this->provideAllowedMentions() as $provideAllowedMention)
            {
                $allowedMention = $provideAllowedMention[0];
                foreach($this->provideTts() as $provideTts)
                {
                    $tts = $provideTts[0];
                    yield ['object' => Content::create($embed, $content, $allowedMention, $tts), 'embed' => $embed, 'content' => $content, 'allowedMentions' => $allowedMention, 'tts' => $tts];
                    yield ['object' => Content::create($embed, $content, $allowedMention), 'embed' => $embed, 'content' => $content, 'allowedMentions' => $allowedMention, 'tts' => null];
                    yield ['object' => Content::create($embed, $content), 'embed' => $embed, 'content' => $content, 'allowedMentions' => null, 'tts' => null];
                    yield ['object' => Content::create($embed), 'embed' => $embed, 'content' => null, 'allowedMentions' => null, 'tts' => null];
                }
            }
        }
    }

    /**
     * @dataProvider provideCreate
     * @param Content $object
     * @param $embed
     * @param $content
     * @param $allowedMentions
     * @param $tts
     */
    public function testCreate(Content $object, $embed, $content, $allowedMentions, $tts)
    {
        $this->assertEquals($embed, $object->getEmbed());
    }
}
