<?php

namespace Bytes\DiscordResponseBundle\Tests;

use Bytes\DiscordResponseBundle\Objects\Embed\Embed;
use Bytes\DiscordResponseBundle\Objects\Message\AllowedMentions;
use Bytes\DiscordResponseBundle\Objects\Message\Content;
use DateTime;
use Exception;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\Str;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

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
        $embed = new Embed();

        try {
            $now = new DateTime();

            $embed->setUrl($this->faker->url);
            $embed->setFooter($this->faker->text(50), $this->faker->imageUrl());
            $embed->setAuthor($this->faker->name, $this->faker->url, $this->faker->imageUrl());


            $embed->setTitle($this->faker->text(50));
            $color = (string)Str::of($this->faker->hexColor)->after('#')->prepend('0x');
            $embed->setColor($color);
            $embed->setThumbnail($this->faker->imageUrl());
        } catch (Exception $x) {
            // Nothing you can do...
        }

        return $embed;
    }

    /**
     * @param Content $content
     * @return array
     */
    protected function generateContentArrayFromContent(Content $content)
    {
        $c = [
            'embed' => $content->getEmbed(),
            'allowed_mentions' => []
        ];
        if (!is_null($content->getAllowedMentions()->getParse())) {
            $c['allowed_mentions']['parse'] = $content->getAllowedMentions()->getParse();
        }
        if (!empty($content->getAllowedMentions()->getRoles())) {
            $c['allowed_mentions']['roles'] = $content->getAllowedMentions()->getRoles();
        }
        $c['content'] = $content->getContent();

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

        foreach(range(1, 10) as $max) {
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

        foreach(range(1, 10) as $max) {
            $content = $this->generateFakeContentClass($this->generateFakeRoles($max));

            $object = $serializer->serialize($content, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

            $de = $serializer->deserialize($object, Content::class, 'json');

            $this->assertEquals($content, $de);
        }
    }

    public function testValidationPass()
    {
        $this->validationPass([
            Content::create($this->generateFakeEmbed(), $this->faker->text(2000))
        ]);
    }

    public function testValidationFail()
    {
        $this->validationFail([
            Content::create($this->generateFakeEmbed(), Str::random(2001))
        ]);
    }
}
