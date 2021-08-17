<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\Embed\Embed;
use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\DiscordResponseBundle\Objects\Message\AllowedMentions;
use Bytes\DiscordResponseBundle\Objects\Message\WebhookContent;
use Bytes\DiscordResponseBundle\Tests\TestRolesSerializationCase;
use Exception;
use Generator;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\String\ByteString;

/**
 * Class WebhookContentTest
 * @package Bytes\DiscordResponseBundle\Tests
 */
class WebhookContentTest extends TestRolesSerializationCase
{
    use TestDiscordFakerTrait;

    /**
     *
     */
    public function testSerializeEveryone()
    {
        $serializer = $this->createSerializer();

        $content = $this->generateFakeWebhookContentClass();

        $object = $serializer->serialize($content, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $c = $this->generateWebhookContentArrayFromWebhookContent($content);

        $manual = $serializer->serialize($c, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);
        $this->assertEquals($manual, $object);
    }

    /**
     * @param array|null $roles
     * @param array|null $parse
     * @return WebhookContent
     */
    protected function generateFakeWebhookContentClass(?array $roles = null, ?array $parse = null)
    {
        $allowedMentions = $this->generateFakeAllowedMentionsClass($roles, $parse);

        $content = new WebhookContent();
        $content->addEmbed($this->generateFakeEmbed());
        $content->setAllowedMentions($allowedMentions);
        $content->setContent($this->faker->paragraph());
        $content->setUsername($this->faker->userName());
        $content->setAvatarUrl($this->faker->imageUrl());

        return $content;
    }

    /**
     * @return Embed
     */
    protected function generateFakeEmbed()
    {
        $this->setupFaker();
        return $this->faker->embed();
    }

    /**
     * @param WebhookContent $webhookContent
     * @return array
     */
    protected function generateWebhookContentArrayFromWebhookContent(WebhookContent $webhookContent)
    {
        $c = [];
        if (!empty($webhookContent->getContent())) {
            $c['content'] = $webhookContent->getContent();
        }
        $c['username'] = $webhookContent->getUsername();
        $c['avatarUrl'] = $webhookContent->getAvatarUrl();
        $c['embeds'] = $webhookContent->getEmbeds();
        $c['allowed_mentions'] = [];

        if (!is_null($webhookContent->getAllowedMentions()->getParse())) {
            $c['allowed_mentions']['parse'] = $webhookContent->getAllowedMentions()->getParse();
        }
        if (!empty($webhookContent->getAllowedMentions()->getRoles())) {
            $c['allowed_mentions']['roles'] = $webhookContent->getAllowedMentions()->getRoles();
        }

        return $c;
    }

    /**
     *
     */
    public function testDeserializeEveryone()
    {
        $serializer = $this->createSerializer();

        $content = $this->generateFakeWebhookContentClass();

        $object = $serializer->serialize($content, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $de = $serializer->deserialize($object, WebhookContent::class, 'json');

        $this->assertEquals($content, $de);
    }

    /**
     *
     */
    public function testSerializeEmptyParse()
    {
        $serializer = $this->createSerializer();

        $content = $this->generateFakeWebhookContentClass();
        $allowedMentions = $content->getAllowedMentions();
        $allowedMentions->setParse([]);
        $content->setAllowedMentions($allowedMentions);

        $object = $serializer->serialize($content, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $c = $this->generateWebhookContentArrayFromWebhookContent($content);

        $manual = $serializer->serialize($c, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);
        $this->assertEquals($manual, $object);
    }

    /**
     *
     */
    public function testDeserializeEmptyParse()
    {
        $serializer = $this->createSerializer();

        $webhookContent = $this->generateFakeWebhookContentClass();
        $allowedMentions = $webhookContent->getAllowedMentions();
        $allowedMentions->setParse([]);
        $webhookContent->setAllowedMentions($allowedMentions);

        $object = $serializer->serialize($webhookContent, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $de = $serializer->deserialize($object, WebhookContent::class, 'json');

        $this->assertEquals($webhookContent, $de);
    }

    /**
     *
     */
    public function testSerializeRoles()
    {
        $serializer = $this->createSerializer();

        foreach (range(1, 10) as $max) {
            $webhookContent = $this->generateFakeWebhookContentClass($this->generateFakeRoles($max));

            $object = $serializer->serialize($webhookContent, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

            $c = $this->generateWebhookContentArrayFromWebhookContent($webhookContent);

            $manual = $serializer->serialize($c, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);
            $this->assertEquals($manual, $object);
        }
    }

    /**
     *
     */
    public function testDeserializeRoles()
    {
        $serializer = $this->createSerializer();

        foreach (range(1, 10) as $max) {
            $webhookContent = $this->generateFakeWebhookContentClass($this->generateFakeRoles($max));

            $object = $serializer->serialize($webhookContent, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

            $de = $serializer->deserialize($object, WebhookContent::class, 'json');

            $this->assertEquals($webhookContent, $de);
        }
    }

    /**
     *
     */
    public function testValidationPass()
    {
        $this->validationPass([
            WebhookContent::create($this->generateFakeEmbed(), ByteString::fromRandom(2000))
        ]);
    }

    /**
     * @dataProvider provideValidationFail
     * @param $content
     */
    public function testValidationFail($content)
    {
        $this->validationFail([
            $content
        ]);
    }

    /**
     * @return Generator
     */
    public function provideValidationFail()
    {
        yield [WebhookContent::create($this->generateFakeEmbed(), ByteString::fromRandom(2001))];
        yield [WebhookContent::create()];
    }

    /**
     * @dataProvider provideWebhookContent
     */
    public function testGetSetContent($input)
    {
        $webhookContent = new WebhookContent();
        $this->assertNull($webhookContent->getContent());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->setContent(null));
        $this->assertNull($webhookContent->getContent());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->setContent($input));
        $this->assertEquals($input, $webhookContent->getContent());
    }

    /**
     * @return Generator
     */
    public function provideWebhookContent()
    {
        $this->setupFaker();

        yield [$this->faker->sentence()];
        yield [''];
        yield [null];
    }

    /**
     * @dataProvider provideUsername
     */
    public function testGetSetUsername($username)
    {
        $webhookContent = new WebhookContent();
        $this->assertNull($webhookContent->getUsername());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->setUsername(null));
        $this->assertNull($webhookContent->getUsername());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->setUsername($username));
        $this->assertEquals($username, $webhookContent->getUsername());
    }

    /**
     * @dataProvider provideAvatarUrl
     */
    public function testGetSetAvatarUrl($avatarUrl)
    {
        $webhookContent = new WebhookContent();
        $this->assertNull($webhookContent->getAvatarUrl());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->setAvatarUrl(null));
        $this->assertNull($webhookContent->getAvatarUrl());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->setAvatarUrl($avatarUrl));
        $this->assertEquals($avatarUrl, $webhookContent->getAvatarUrl());
    }

    /**
     * @dataProvider provideTts
     */
    public function testGetSetTts($tts)
    {
        $webhookContent = new WebhookContent();
        $this->assertNull($webhookContent->getTts());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->setTts(null));
        $this->assertNull($webhookContent->getTts());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->setTts($tts));
        $this->assertEquals($tts, $webhookContent->getTts());
    }

    /**
     * @dataProvider provideEmbeds
     * @param $embeds
     */
    public function testGetSetEmbeds($embeds)
    {
        $webhookContent = new WebhookContent();
        $this->assertNull($webhookContent->getEmbeds());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->setEmbeds(null));
        $this->assertNull($webhookContent->getEmbeds());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->setEmbeds($embeds));
        if (is_null($embeds)) {
            $this->assertNull($webhookContent->getEmbeds());
        } else {
            $this->assertCount(count($embeds), $webhookContent->getEmbeds());
        }
    }

    /**
     * @return Generator
     */
    public function provideEmbeds()
    {
        $this->setupFaker();
        $embeds = [];
        $range = $this->faker->rangeBetween(4, 1, 2);
        foreach ($range as $index) {
            $embeds[] = $this->faker->embed();
        }
        yield [$embeds];
        yield [[$this->faker->embed()]];
        yield [null];
    }

    /**
     *
     */
    public function testAddEmbed()
    {
        $embed = $this->faker->embed();
        $webhookContent = new WebhookContent();
        $this->assertNull($webhookContent->getEmbeds());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->addEmbed($embed));
        $embeds = $webhookContent->getEmbeds();
        $this->assertCount(1, $embeds);
        $this->assertEquals($embed, array_shift($embeds));
    }

    /**
     * @dataProvider provideAllowedMentions
     */
    public function testGetSetAllowedMentions($allowedMentions)
    {
        $webhookContent = new WebhookContent();
        $this->assertNull($webhookContent->getAllowedMentions());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->setAllowedMentions(null));
        $this->assertNull($webhookContent->getAllowedMentions());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->setAllowedMentions($allowedMentions));
        $this->assertEquals($allowedMentions, $webhookContent->getAllowedMentions());
    }

    /**
     * @return Generator
     */
    public function provideCreate()
    {
        $this->setupFaker();

        $embeds = $this->faker->embeds(10);

        foreach ([$this->faker->sentence(), '', null] as $content) {
            foreach ($this->provideAllowedMentions() as $provideAllowedMention) {
                $allowedMention = $provideAllowedMention[0];
                foreach ($this->provideTts() as $provideTts) {
                    $tts = $provideTts[0];
                    foreach ($this->provideUsername() as $username) {
                        $username = $username[0];
                        foreach ($this->provideAvatarUrl() as $avatarUrl) {
                            $avatarUrl = $avatarUrl[0];
                            foreach ([[new Message\Component()], []] as $component) {
                                yield ['object' => WebhookContent::create($embeds, $content, $allowedMention, $username, $avatarUrl, $tts, $component), 'embed' => $embeds, 'content' => $content, 'allowedMentions' => $allowedMention, 'username' => $username, 'avatarUrl' => $avatarUrl, 'tts' => $tts, 'components' => $component];
                                yield ['object' => WebhookContent::create($embeds, $content, $allowedMention, $username, $avatarUrl, $tts), 'embed' => $embeds, 'content' => $content, 'allowedMentions' => $allowedMention, 'username' => $username, 'avatarUrl' => $avatarUrl, 'tts' => $tts, 'components' => null];
                                yield ['object' => WebhookContent::create($embeds, $content, $allowedMention, $username, $avatarUrl), 'embed' => $embeds, 'content' => $content, 'allowedMentions' => $allowedMention, 'username' => $username, 'avatarUrl' => $avatarUrl, 'tts' => null, 'components' => null];
                                yield ['object' => WebhookContent::create($embeds, $content, $allowedMention, $username), 'embed' => $embeds, 'content' => $content, 'allowedMentions' => $allowedMention, 'username' => $username, 'avatarUrl' => null, 'tts' => null, 'components' => null];
                                yield ['object' => WebhookContent::create($embeds, $content, $allowedMention), 'embed' => $embeds, 'content' => $content, 'allowedMentions' => $allowedMention, 'username' => null, 'avatarUrl' => null, 'tts' => null, 'components' => null];
                                yield ['object' => WebhookContent::create($embeds, $content), 'embed' => $embeds, 'content' => $content, 'allowedMentions' => null, 'username' => null, 'avatarUrl' => null, 'tts' => null, 'components' => null];
                                yield ['object' => WebhookContent::create($embeds), 'embed' => $embeds, 'content' => null, 'allowedMentions' => null, 'username' => null, 'avatarUrl' => null, 'tts' => null, 'components' => null];
                            }
                        }
                    }
                }
            }
        }
    }

    /**
     * @return Generator
     */
    public function provideAllowedMentions()
    {
        $this->setupFaker();

        yield [AllowedMentions::createForEveryone()];

        yield [AllowedMentions::createForRoles($this->generateFakeRoles($this->faker->randomDigitNotNull()))];

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
     * @return Generator
     */
    public function provideUsername()
    {
        $this->setupFaker();

        yield [$this->faker->userName()];
        yield [''];
        yield [null];
    }

    /**
     * @return Generator
     */
    public function provideAvatarUrl()
    {
        $this->setupFaker();

        yield [$this->faker->imageUrl()];
        yield [''];
        yield [null];
    }

    /**
     * @dataProvider provideCreate
     * @param WebhookContent $object
     * @param $embed
     * @param $content
     * @param $allowedMentions
     * @param $username
     * @param $avatarUrl
     * @param $tts
     */
    public function testCreate(WebhookContent $object, $embed, $content, $allowedMentions, $username, $avatarUrl, $tts, $components)
    {
        $this->assertEquals($embed, $object->getEmbeds());
        $this->assertEquals($content, $object->getContent());
        $this->assertEquals($allowedMentions ?? AllowedMentions::create(), $object->getAllowedMentions());
        $this->assertEquals($username, $object->getUsername());
        $this->assertEquals($avatarUrl, $object->getAvatarUrl());
        $this->assertEquals($tts, $object->getTts());
        $this->assertEquals($components, $object->getComponents());
    }

    /**
     * @throws Exception
     */
    public function testCreateInstance()
    {
        $object = WebhookContent::create($this->faker->embed(), $this->faker->paragraph(), AllowedMentions::create(), $this->faker->userName(), $this->faker->imageUrl(), true);
        $this->assertInstanceOf(WebhookContent::class, $object);
    }

    /**
     * @dataProvider provideFile
     */
    public function testGetSetFile($file)
    {
        $webhookContent = new WebhookContent();
        $this->assertNull($webhookContent->getFile());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->setFile(null));
        $this->assertNull($webhookContent->getFile());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->setFile($file));
        $this->assertEquals($file, $webhookContent->getFile());
    }

    /**
     * @return Generator
     */
    public function provideFile()
    {
        $this->setupFaker();
        yield [$this->faker->userName()];
        yield [$this->faker->randomDigitNotNull()];
        yield [''];
        yield [null];
    }

    /**
     * @dataProvider providePayloadJson
     */
    public function testGetSetPayloadJson($payloadJson)
    {
        $webhookContent = new WebhookContent();
        $this->assertNull($webhookContent->getPayloadJson());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->setPayloadJson(null));
        $this->assertNull($webhookContent->getPayloadJson());
        $this->assertInstanceOf(WebhookContent::class, $webhookContent->setPayloadJson($payloadJson));
        $this->assertEquals($payloadJson, $webhookContent->getPayloadJson());
    }

    /**
     * @return Generator
     */
    public function providePayloadJson()
    {
        $this->setupFaker();
        yield [$this->faker->jobTitle()];
        yield [null];
    }


    /**
     * @dataProvider provideComponents
     * @param $count
     * @param $components
     */
    public function testGetSetComponents($count, $components)
    {
        $message = new WebhookContent();
        $this->assertNull($message->getComponents());
        $this->assertInstanceOf(WebhookContent::class, $message->setComponents(null));
        $this->assertNull($message->getComponents());
        $this->assertInstanceOf(WebhookContent::class, $message->setComponents($components));
        $this->assertCount($count, $message->getComponents());
        $this->assertEquals($components, $message->getComponents());

        $message = WebhookContent::create(components: $components);
        $this->assertCount($count, $message->getComponents());
        $this->assertEquals($components, $message->getComponents());

    }

    /**
     * @return Generator
     */
    public function provideComponents()
    {
        yield ['count' => 1, 'components' => [new Message\Component()]];
        yield ['count' => 5, 'components' => [new Message\Component(), new Message\Component(), new Message\Component(), new Message\Component(), new Message\Component()]];
    }
}