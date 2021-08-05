<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\Message;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\Common\Faker\Providers\Discord;
use Bytes\DiscordResponseBundle\Objects\Message\AllowedMentions;
use Bytes\DiscordResponseBundle\Objects\Message\Component;
use Bytes\DiscordResponseBundle\Objects\Message\Content;
use Bytes\DiscordResponseBundle\Objects\MessageReference;
use Bytes\DiscordResponseBundle\Tests\TestRolesSerializationCase;
use Faker\Factory;
use Faker\Generator as FakerGenerator;
use Faker\Provider\Base;
use Generator;
use Symfony\Bridge\PhpUnit\ExpectDeprecationTrait;
use Symfony\Component\String\ByteString;

/**
 *
 */
class ContentTest extends TestRolesSerializationCase
{
    use TestDiscordFakerTrait, ExpectDeprecationTrait;

    /**
     *
     */
    public function testValidationPass()
    {
        $this->validationPass([
            Content::create($this->faker->embed(), ByteString::fromRandom(2000))
        ]);
    }

    /**
     *
     */
    public function testValidationFail()
    {
        $this->validationFail([
            Content::create($this->faker->embed(), ByteString::fromRandom(2001))
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

    /**
     * @dataProvider provideEmbed
     * @group legacy
     */
    public function testGetSetEmbed($embed)
    {
        $this->expectDeprecation('');
        $content = new Content();
        $this->assertNull($content->getEmbed());
        $this->assertInstanceOf(Content::class, $content->setEmbed(null));
        $this->assertNull($content->getEmbed());
        $this->assertInstanceOf(Content::class, $content->setEmbed($embed));
        $this->assertEquals($embed, $content->getEmbed());
    }

    /**
     * @return Generator
     */
    public function provideEmbed()
    {
        $this->setupFaker();
        yield [$this->faker->embed()];
        yield [null];
    }

    /**
     * @dataProvider provideEmbeds
     * @param $embeds
     * @param $count
     */
    public function testGetSetEmbeds($embeds, $count)
    {
        $content = new Content();
        $this->assertCount(0, $content->getEmbeds());
        $this->assertInstanceOf(Content::class, $content->setEmbeds($embeds));
        $this->assertCount($count, $content->getEmbeds());
        $this->assertEquals($embeds, $content->getEmbeds());
    }

    /**
     * @return Generator
     */
    public function provideEmbeds()
    {
        $this->setupFaker();
        yield ['embeds' => [$this->faker->embed()], 'count' => 1];
        yield ['embeds' => [$this->faker->embed(), $this->faker->embed()], 'count' => 2];
        yield ['embeds' => [$this->faker->embed(), $this->faker->embed(), $this->faker->embed()], 'count' => 3];
        yield ['embeds' => [], 'count' => 0];
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

        foreach ([$faker->snowflake(), null] as $channel) {
            foreach ([$faker->snowflake(), null] as $guild) {
                foreach ([true, false] as $failFlag) {
                    yield [MessageReference::create($faker->snowflake(), $channel, $guild, $failFlag)];
                }
            }
        }
    }

    /**
     * @dataProvider provideStickerIds
     * @param $stickers
     * @param $count
     */
    public function testGetSetStickerIds($stickers, $count)
    {
        $content = new Content();
        $this->assertCount(0, $content->getStickerIds());
        $this->assertInstanceOf(Content::class, $content->setStickerIds($stickers));
        $this->assertCount($count, $content->getStickerIds());
        $this->assertEquals($stickers, $content->getStickerIds());
        $this->assertInstanceOf(Content::class, $content->addStickerId($stickers[0]));
        $this->assertCount($count, $content->getStickerIds());
        $this->assertInstanceOf(Content::class, $content->addStickerId($this->faker->snowflake()));
        $this->assertCount($count + 1, $content->getStickerIds());
    }

    /**
     * @return Generator
     */
    public function provideStickerIds()
    {
        $this->setupFaker();
        yield ['stickers' => [$this->faker->snowflake()], 'count' => 1];
        yield ['stickers' => [$this->faker->snowflake(), $this->faker->snowflake()], 'count' => 2];
    }

    /**
     * @return Generator
     */
    public function provideCreate()
    {
        $this->setupFaker();
        $embed = $this->faker->embed();

        foreach ([$this->faker->sentence(), '', null] as $content) {
            foreach ($this->provideAllowedMentions() as $provideAllowedMention) {
                $allowedMention = $provideAllowedMention[0];
                foreach ($this->provideTts() as $provideTts) {
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
     * @return Generator
     */
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
     * @return Generator
     */
    public function provideTts()
    {
        yield [true];
        yield [false];
        yield [null];
    }

    /**
     * @dataProvider provideComponents
     * @param mixed $components
     */
    public function testGetSetAddComponents($components)
    {
        $component = new Component();
        $component->setUrl($this->faker->url());
        $content = new Content();
        $this->assertCount(0, $content->getComponents());
        $this->assertInstanceOf(Content::class, $content->setComponents($components));
        $this->assertEquals($components, $content->getComponents());
        $this->assertCount(1, $content->getComponents());
        $this->assertInstanceOf(Content::class, $content->addComponent($components[0]));
        $this->assertCount(1, $content->getComponents());
        $this->assertInstanceOf(Content::class, $content->addComponent($component));
        $this->assertCount(2, $content->getComponents());
        $this->assertInstanceOf(Content::class, $content->addComponent($component));
        $this->assertCount(2, $content->getComponents());
    }

    /**
     * @return Generator
     */
    public function provideComponents()
    {
        $this->setupFaker();
        yield [[new Component()]];
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