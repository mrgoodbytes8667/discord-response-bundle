<?php


namespace Bytes\DiscordResponseBundle\Tests;


use Bytes\DiscordResponseBundle\Enums\ApplicationCommandOptionType;
use Bytes\DiscordResponseBundle\Enums\ApplicationCommandPermissionType;
use Bytes\DiscordResponseBundle\Enums\ApplicationCommandType;
use Bytes\DiscordResponseBundle\Enums\ButtonStyle;
use Bytes\DiscordResponseBundle\Enums\ChannelTypes;
use Bytes\DiscordResponseBundle\Enums\ComponentType;
use Bytes\DiscordResponseBundle\Enums\Emojis;
use Bytes\DiscordResponseBundle\Enums\InteractionResponseType;
use Bytes\DiscordResponseBundle\Enums\JsonErrorCodes;
use Bytes\DiscordResponseBundle\Enums\MessageType;
use Bytes\DiscordResponseBundle\Enums\OAuthPrompts;
use Bytes\DiscordResponseBundle\Enums\OAuthScopes;
use Bytes\DiscordResponseBundle\Enums\Permissions;
use Generator;
use ValueError;

class SerializationTest extends TestSerializationCase
{
    /**
     * @return Generator
     */
    public static function provideStringBackedEnumClasses(): Generator
    {
        yield [OAuthScopes::class];
        yield [OAuthPrompts::class];
        yield [Emojis::class];
    }

    /**
     * @return Generator
     */
    public static function provideIntBackedEnumClasses(): Generator
    {
        yield 'ChannelTypes' => [ChannelTypes::class];
        yield 'JsonErrorCodes' => [JsonErrorCodes::class];
        yield 'Permissions' => [Permissions::class];
    }

    /**
     * @return Generator
     */
    public static function provideOverloadedIntBackedEnumClasses(): Generator
    {
        yield 'ApplicationCommandOptionType' => [ApplicationCommandOptionType::class];
        yield 'ApplicationCommandPermissionType' => [ApplicationCommandPermissionType::class];
        yield 'ApplicationCommandType' => [ApplicationCommandType::class];
        yield 'ButtonStyle' => [ButtonStyle::class];
        yield 'ComponentType' => [ComponentType::class];
        yield 'InteractionResponseType' => [InteractionResponseType::class];
        yield 'MessageType' => [MessageType::class];
    }

    public function testChannelTypesSerializationBadKey()
    {
        $this->expectException(ValueError::class);
        ChannelTypes::from(-999);
    }

    /**
     * @dataProvider provideStringBackedEnumClasses
     * @param $class
     * @return void
     */
    public function testStringSerialization($class)
    {
        $serializer = $this->createSerializer();

        foreach ($class::cases() as $enum) {
            $label = $enum->name;
            $value = $enum->value;
            $output = $serializer->serialize($class::from($value), 'json');

            $this->assertEquals($this->buildFixtureResponse($value, $label), $output);
        }
    }

    /**
     * @dataProvider provideIntBackedEnumClasses
     * @param $class
     * @return void
     */
    public function testIntSerialization($class)
    {
        $serializer = $this->createSerializer();

        foreach ($class::cases() as $enum) {
            $label = $enum->name;
            $value = $enum->value;
            $output = $serializer->serialize($class::from($value), 'json');

            $this->assertEquals($this->buildFixtureResponseIntValue($value, $label), $output);
        }
    }

    /**
     * @dataProvider provideOverloadedIntBackedEnumClasses
     * @param $class
     * @return void
     */
    public function testOverloadedIntSerialization($class)
    {
        $serializer = $this->createSerializer();

        foreach ($class::cases() as $enum) {
            $label = $enum->name;
            $value = $enum->value;
            $output = $serializer->serialize($class::from($value), 'json');

            $this->assertEquals($value, $output);
        }
    }

    public function testEmojisSerializationBadKey()
    {
        $this->expectException(ValueError::class);
        Emojis::from('abc123');
    }

    public function testJsonErrorCodesSerializationBadKey()
    {
        $this->expectException(ValueError::class);
        JsonErrorCodes::from(-999);
    }

    public function testOAuthPromptsSerializationBadKey()
    {
        $this->expectException(ValueError::class);
        OAuthPrompts::from('abc123');
    }

    public function testOAuthScopesSerializationBadKey()
    {
        $this->expectException(ValueError::class);
        OAuthScopes::from('abc123');
    }

    public function testPermissionsSerializationBadKey()
    {
        $this->expectException(ValueError::class);
        Permissions::from(-999);
    }
}
