<?php

namespace Bytes\DiscordResponseBundle\Tests;

use Bytes\DiscordResponseBundle\Objects\Embed\Embed;
use Bytes\DiscordResponseBundle\Objects\Message\AllowedMentions;
use Bytes\DiscordResponseBundle\Objects\Message\Content;
use Illuminate\Support\Str;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

class ContentTest extends TestSerializationCase
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

    protected function generateFakeContentClass(?array $roles = null, ?array $parse = null)
    {
        $hasRoles = !empty($roles);
        $hasParse = !empty($parse);

        $allowedMentions = new AllowedMentions();
        if (!$hasRoles && !$hasParse) {
            $allowedMentions->setParse(['everyone']);
        } elseif ($hasParse) {
            $allowedMentions->setParse($parse);
        } else {
            $allowedMentions->setRoles($roles);
        }

        $content = new Content();
        $content->setEmbed($this->generateFakeEmbed());
        $content->setAllowedMentions($allowedMentions);
        $content->setContent(Str::random());

        return $content;
    }

    protected function generateFakeEmbed()
    {
        $embed = new Embed();

        try {
            $now = new \DateTime();

            $embed->setUrl(Str::random());
            $embed->setFooter(Str::random(), 'https://' . Str::random() . '/image.png');
            $embed->setAuthor(Str::random(), 'https://www.' . Str::random() . '.com', 'https://www.' . Str::random() . '.com/image.png');


            $embed->setTitle(Str::random());
            $embed->setColor('0xFF0000');
            $embed->setThumbnail('https://www.' . Str::random() . '.com/image.png');
        } catch (\Exception $x) {
            // Nothing you can do...
        }

        return $embed;
    }

    protected function generateContentArrayFromContent(Content $content)
    {
        $c = [
            'embed' => $content->getEmbed(),
            'allowed_mentions' => [
            ]
        ];
        if (!empty($content->getAllowedMentions()->getParse())) {
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

    public function testSerializeRoles()
    {
        $serializer = $this->createSerializer();

        $content = $this->generateFakeContentClass([Str::random(), Str::random()]);

        $object = $serializer->serialize($content, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $c = $this->generateContentArrayFromContent($content);

        $manual = $serializer->serialize($c, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);
        $this->assertEquals($manual, $object);
    }

    public function testDeserializeRoles()
    {
        $serializer = $this->createSerializer();

        $content = $this->generateFakeContentClass([Str::random(), Str::random()]);

        $object = $serializer->serialize($content, 'json', [AbstractObjectNormalizer::SKIP_NULL_VALUES => true]);

        $de = $serializer->deserialize($object, Content::class, 'json');

        $this->assertEquals($content, $de);
    }
}
