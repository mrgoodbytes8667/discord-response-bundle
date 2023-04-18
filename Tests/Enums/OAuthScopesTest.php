<?php


namespace Bytes\DiscordResponseBundle\Tests\Enums;


use BackedEnum;
use Bytes\DiscordResponseBundle\Enums\OAuthScopes;
use Bytes\DiscordResponseBundle\Tests\EnumTestCase;
use Bytes\Tests\Common\TestEnumTrait;
use ReflectionException;

/**
 * Class OAuthScopesTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 */
class OAuthScopesTest extends EnumTestCase
{
    use TestEnumTrait;

    /**
     * @return class-string<BackedEnum>
     */
    public static function getEnumClass(): string
    {
        return OAuthScopes::class;
    }

    /**
     *
     */
    public function testGetUserAndLoginScopes()
    {
        foreach ([OAuthScopes::getUserScopes(), OAuthScopes::getLoginScopes()] as $scopes) {

            $this->assertContains(OAuthScopes::IDENTIFY->value, $scopes);
            $this->assertContains(OAuthScopes::CONNECTIONS->value, $scopes);
            $this->assertContains(OAuthScopes::GUILDS->value, $scopes);

            $this->assertContainsOnly('string', $scopes);

            $this->assertNotContains(OAuthScopes::RPC_NOTIFICATIONS_READ->value, $scopes);
            $this->assertNotContains(OAuthScopes::BOT->value, $scopes);

            $this->assertCount(3, $scopes);
        }
    }

    /**
     *
     */
    public function testGetBotScopes()
    {
        $scopes = OAuthScopes::getBotScopes();

        $this->assertContains(OAuthScopes::IDENTIFY->value, $scopes);
        $this->assertContains(OAuthScopes::CONNECTIONS->value, $scopes);
        $this->assertContains(OAuthScopes::GUILDS->value, $scopes);
        $this->assertContains(OAuthScopes::BOT->value, $scopes);

        $this->assertContainsOnly('string', $scopes);

        $this->assertNotContains(OAuthScopes::RPC_NOTIFICATIONS_READ->value, $scopes);
        $this->assertNotContains(OAuthScopes::APPLICATIONS_COMMANDS->value, $scopes);

        $this->assertCount(4, $scopes);
    }

    /**
     *
     */
    public function testGetSlashScopes()
    {
        $scopes = OAuthScopes::getSlashScopes();

        $this->assertContains(OAuthScopes::APPLICATIONS_COMMANDS->value, $scopes);

        $this->assertContainsOnly('string', $scopes);

        $this->assertNotContains(OAuthScopes::RPC_NOTIFICATIONS_READ->value, $scopes);
        $this->assertNotContains(OAuthScopes::CONNECTIONS->value, $scopes);
        $this->assertNotContains(OAuthScopes::GUILDS->value, $scopes);
        $this->assertNotContains(OAuthScopes::BOT->value, $scopes);

        $this->assertCount(1, $scopes);
    }

    /**
     *
     */
    public function testGetBotSlashScopes()
    {
        $scopes = OAuthScopes::getBotSlashScopes();

        $this->assertContains(OAuthScopes::IDENTIFY->value, $scopes);
        $this->assertContains(OAuthScopes::CONNECTIONS->value, $scopes);
        $this->assertContains(OAuthScopes::GUILDS->value, $scopes);
        $this->assertContains(OAuthScopes::BOT->value, $scopes);
        $this->assertContains(OAuthScopes::APPLICATIONS_COMMANDS->value, $scopes);

        $this->assertContainsOnly('string', $scopes);

        $this->assertNotContains(OAuthScopes::RPC_NOTIFICATIONS_READ->value, $scopes);

        $this->assertCount(5, $scopes);
    }

    /**
     * @throws ReflectionException
     */
    public function testEnumLabelsValues()
    {
        $values = OAuthScopes::cases();
        $this->assertIsArray($values);
        $this->assertCount(21, $values);

        $labels = OAuthScopes::cases();

        $this->assertIsArray($labels);
        $this->assertCount(21, $labels);

        $methods = OAuthScopes::cases();
        $this->assertCount(21, $methods);
    }

    /**
     * @return void
     */
    public function testHydration() {
        $values = OAuthScopes::values();
        $hydrated = OAuthScopes::hydrateScopes($values);
        self::assertEquals(OAuthScopes::cases(), $hydrated);
    }
}
