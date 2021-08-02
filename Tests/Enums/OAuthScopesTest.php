<?php


namespace Bytes\DiscordResponseBundle\Tests\Enums;


use Bytes\DiscordResponseBundle\Enums\OAuthScopes;
use Bytes\Tests\Common\TestEnumTrait;
use Generator;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use Spatie\Enum\Phpunit\EnumAssertions;

/**
 * Class OAuthScopesTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 */
class OAuthScopesTest extends TestCase
{
    use EnumAssertions, TestEnumTrait;

    /**
     *
     */
    public function testGetUserAndLoginScopes()
    {
        foreach ([OAuthScopes::getUserScopes(), OAuthScopes::getLoginScopes()] as $scopes) {

            $this->assertContains(OAuthScopes::IDENTIFY()->value, $scopes);
            $this->assertContains(OAuthScopes::CONNECTIONS()->value, $scopes);
            $this->assertContains(OAuthScopes::GUILDS()->value, $scopes);

            $this->assertContainsOnly('string', $scopes);

            $this->assertNotContains(OAuthScopes::RPC_NOTIFICATIONS_READ()->value, $scopes);
            $this->assertNotContains(OAuthScopes::BOT()->value, $scopes);

            $this->assertCount(3, $scopes);
        }
    }

    /**
     *
     */
    public function testGetBotScopes()
    {
        $scopes = OAuthScopes::getBotScopes();

        $this->assertContains(OAuthScopes::IDENTIFY()->value, $scopes);
        $this->assertContains(OAuthScopes::CONNECTIONS()->value, $scopes);
        $this->assertContains(OAuthScopes::GUILDS()->value, $scopes);
        $this->assertContains(OAuthScopes::BOT()->value, $scopes);

        $this->assertContainsOnly('string', $scopes);

        $this->assertNotContains(OAuthScopes::RPC_NOTIFICATIONS_READ()->value, $scopes);
        $this->assertNotContains(OAuthScopes::APPLICATIONS_COMMANDS()->value, $scopes);

        $this->assertCount(4, $scopes);
    }

    /**
     *
     */
    public function testGetSlashScopes()
    {
        $scopes = OAuthScopes::getSlashScopes();

        $this->assertContains(OAuthScopes::APPLICATIONS_COMMANDS()->value, $scopes);

        $this->assertContainsOnly('string', $scopes);

        $this->assertNotContains(OAuthScopes::RPC_NOTIFICATIONS_READ()->value, $scopes);
        $this->assertNotContains(OAuthScopes::CONNECTIONS()->value, $scopes);
        $this->assertNotContains(OAuthScopes::GUILDS()->value, $scopes);
        $this->assertNotContains(OAuthScopes::BOT()->value, $scopes);

        $this->assertCount(1, $scopes);
    }

    /**
     *
     */
    public function testGetBotSlashScopes()
    {
        $scopes = OAuthScopes::getBotSlashScopes();

        $this->assertContains(OAuthScopes::IDENTIFY()->value, $scopes);
        $this->assertContains(OAuthScopes::CONNECTIONS()->value, $scopes);
        $this->assertContains(OAuthScopes::GUILDS()->value, $scopes);
        $this->assertContains(OAuthScopes::BOT()->value, $scopes);
        $this->assertContains(OAuthScopes::APPLICATIONS_COMMANDS()->value, $scopes);

        $this->assertContainsOnly('string', $scopes);

        $this->assertNotContains(OAuthScopes::RPC_NOTIFICATIONS_READ()->value, $scopes);

        $this->assertCount(5, $scopes);
    }

    /**
     * @dataProvider provideEnums
     * @param string $value
     * @param OAuthScopes $enum
     */
    public function testEnums(string $value, OAuthScopes $enum)
    {
        $this->assertTrue(OAuthScopes::isValid($value));
        $type = OAuthScopes::from($value);
        $this->assertSameEnum($enum, $type);
        $this->assertSameEnumLabel($enum, $type->label);
        $this->assertSameEnumValue($enum, $type->value);
    }

    /**
     *
     */
    public function testInvalidEnums()
    {
        $this->assertFalse(OAuthScopes::isValid('abc'));
    }

    /**
     * @return Generator
     */
    public function provideEnums()
    {
        yield ['value' => 'bot', 'enum' => OAuthScopes::BOT()];
        yield ['value' => 'connections', 'enum' => OAuthScopes::CONNECTIONS()];
        yield ['value' => 'email', 'enum' => OAuthScopes::EMAIL()];
        yield ['value' => 'identify', 'enum' => OAuthScopes::IDENTIFY()];
        yield ['value' => 'guilds', 'enum' => OAuthScopes::GUILDS()];
        yield ['value' => 'guilds.join', 'enum' => OAuthScopes::GUILDS_JOIN()];
        yield ['value' => 'gdm.join', 'enum' => OAuthScopes::GDM_JOIN()];
        yield ['value' => 'messages.read', 'enum' => OAuthScopes::MESSAGES_READ()];
        yield ['value' => 'rpc', 'enum' => OAuthScopes::RPC()];
        yield ['value' => 'rpc.api', 'enum' => OAuthScopes::RPC_API()];
        yield ['value' => 'rpc.notifications.read', 'enum' => OAuthScopes::RPC_NOTIFICATIONS_READ()];
        yield ['value' => 'webhook.incoming', 'enum' => OAuthScopes::WEBHOOK_INCOMING()];
        yield ['value' => 'applications.builds.upload', 'enum' => OAuthScopes::APPLICATIONS_BUILDS_UPLOAD()];
        yield ['value' => 'applications.builds.read', 'enum' => OAuthScopes::APPLICATIONS_BUILDS_READ()];
        yield ['value' => 'applications.store.update', 'enum' => OAuthScopes::APPLICATIONS_STORE_UPDATE()];
        yield ['value' => 'applications.entitlements', 'enum' => OAuthScopes::APPLICATIONS_ENTITLEMENTS()];
        yield ['value' => 'relationships.read', 'enum' => OAuthScopes::RELATIONSHIPS_READ()];
        yield ['value' => 'activities.read', 'enum' => OAuthScopes::ACTIVITIES_READ()];
        yield ['value' => 'activities.write', 'enum' => OAuthScopes::ACTIVITIES_WRITE()];
        yield ['value' => 'applications.commands', 'enum' => OAuthScopes::APPLICATIONS_COMMANDS()];
        yield ['value' => 'applications.commands.update', 'enum' => OAuthScopes::APPLICATIONS_COMMANDS_UPDATE()];

    }

    /**
     * @throws ReflectionException
     */
    public function testEnumLabelsValues()
    {
        $values = OAuthScopes::getValues();
        $this->assertIsArray($values);
        $this->assertCount(21, $values);

        $labels = OAuthScopes::getLabels();

        $this->assertIsArray($labels);
        $this->assertCount(21, $labels);

        $methods = $this->extractAllFromEnum(OAuthScopes::class);
        $this->assertCount(21, $methods);
    }
}