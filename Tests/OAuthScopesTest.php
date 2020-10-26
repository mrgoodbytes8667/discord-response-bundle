<?php


namespace Bytes\DiscordResponseBundle\Tests;


use Bytes\DiscordResponseBundle\Enums\OAuthScopes;
use PHPUnit\Framework\TestCase;

class OAuthScopesTest extends TestCase
{
    public function testGetUserScopes()
    {
        $scopes = OAuthScopes::getUserScopes();

        $this->assertContains(OAuthScopes::IDENTIFY()->value, $scopes);
        $this->assertContains(OAuthScopes::CONNECTIONS()->value, $scopes);
        $this->assertContains(OAuthScopes::GUILDS()->value, $scopes);

        $this->assertContainsOnly('string', $scopes);

        $this->assertNotContains(OAuthScopes::RPC_NOTIFICATIONS_READ()->value, $scopes);
        $this->assertNotContains(OAuthScopes::BOT()->value, $scopes);

        $this->assertEquals(count($scopes), 3);
    }

    public function testGetBotScopes()
    {
        $scopes = OAuthScopes::getBotScopes();

        $this->assertContains(OAuthScopes::IDENTIFY()->value, $scopes);
        $this->assertContains(OAuthScopes::CONNECTIONS()->value, $scopes);
        $this->assertContains(OAuthScopes::GUILDS()->value, $scopes);
        $this->assertContains(OAuthScopes::BOT()->value, $scopes);

        $this->assertContainsOnly('string', $scopes);

        $this->assertNotContains(OAuthScopes::RPC_NOTIFICATIONS_READ()->value, $scopes);

        $this->assertEquals(count($scopes), 4);
    }

}