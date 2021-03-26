<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\DiscordResponseBundle\Objects\Guild;
use Bytes\DiscordResponseBundle\Objects\Token;
use Bytes\DiscordResponseBundle\Objects\User;
use Bytes\Tests\Common\Faker\TestDiscordFakerTrait;
use PHPUnit\Framework\TestCase;

class TokenTest extends TestCase
{
    use TestDiscordFakerTrait;
    
    /**
     *
     */
    public function testGetSetGuild()
    {
        $guild = $this
            ->getMockBuilder(Guild::class)
            ->getMock();;

        $token = new Token();
        $this->assertNull($token->getGuild());
        $this->assertInstanceOf(Token::class, $token->setGuild(null));
        $this->assertNull($token->getGuild());
        $this->assertInstanceOf(Token::class, $token->setGuild($guild));
        $this->assertEquals($guild, $token->getGuild());
    }

    /**
     *
     */
    public function testGetSetTokenType()
    {
        $tokenType = $this->faker->tokenType();

        $token = new Token();
        $this->assertNull($token->getTokenType());
        $this->assertInstanceOf(Token::class, $token->setTokenType(null));
        $this->assertNull($token->getTokenType());
        $this->assertInstanceOf(Token::class, $token->setTokenType($tokenType));
        $this->assertEquals($tokenType, $token->getTokenType());
    }

    /**
     * @dataProvider provideAccessTokens
     */
    public function testGetSetAccessToken($accessToken)
    {
        $token = new Token();
        $this->assertNull($token->getAccessToken());
        $this->assertInstanceOf(Token::class, $token->setAccessToken(null));
        $this->assertNull($token->getAccessToken());
        $this->assertInstanceOf(Token::class, $token->setAccessToken($accessToken));
        $this->assertEquals($accessToken, $token->getAccessToken());
    }

    /**
     * @dataProvider provideAccessTokens
     */
    public function testGetSetRefreshToken($accessToken)
    {
        $token = new Token();
        $this->assertNull($token->getRefreshToken());
        $this->assertInstanceOf(Token::class, $token->setRefreshToken(null));
        $this->assertNull($token->getRefreshToken());
        $this->assertInstanceOf(Token::class, $token->setRefreshToken($accessToken));
        $this->assertEquals($accessToken, $token->getRefreshToken());
    }

    public function provideAccessTokens()
    {
        $this->setupFaker();
        foreach (range(1, 10) as $i) {
            yield ['accessToken' => $this->faker->accessToken()];
        }
    }

    /**
     *
     */
    public function testGetSetScope()
    {
        $scope = $this->faker->sentence();

        $token = new Token();
        $this->assertNull($token->getScope());
        $this->assertInstanceOf(Token::class, $token->setScope(null));
        $this->assertNull($token->getScope());
        $this->assertInstanceOf(Token::class, $token->setScope($scope));
        $this->assertEquals($scope, $token->getScope());
    }

    /**
     *
     */
    public function testGetSetExpiresIn()
    {
        $expiresIn = $this->faker->numberBetween(1, 500000);

        $token = new Token();
        $this->assertNull($token->getExpiresIn());
        $this->assertInstanceOf(Token::class, $token->setExpiresIn(null));
        $this->assertNull($token->getExpiresIn());
        $this->assertInstanceOf(Token::class, $token->setExpiresIn($expiresIn));
        $this->assertEquals($expiresIn, $token->getExpiresIn());
    }

    /**
     *
     */
    public function testGetSetError()
    {
        $error = $this->faker->sentence();

        $token = new Token();
        $this->assertNull($token->getError());
        $this->assertInstanceOf(Token::class, $token->setError(null));
        $this->assertNull($token->getError());
        $this->assertInstanceOf(Token::class, $token->setError($error));
        $this->assertEquals($error, $token->getError());
    }

    /**
     *
     */
    public function testGetSetErrorDescription()
    {
        $errorDescription = $this->faker->sentence();

        $token = new Token();
        $this->assertNull($token->getErrorDescription());
        $this->assertInstanceOf(Token::class, $token->setErrorDescription(null));
        $this->assertNull($token->getErrorDescription());
        $this->assertInstanceOf(Token::class, $token->setErrorDescription($errorDescription));
        $this->assertEquals($errorDescription, $token->getErrorDescription());
    }


    public function testGetCode()
    {
        $code = $this->faker->randomNumber();

        $token = new Token();
        $this->assertNull($token->getCode());
        $this->assertInstanceOf(Token::class, $token->setCode(null));
        $this->assertNull($token->getCode());
        $this->assertInstanceOf(Token::class, $token->setCode($code));
        $this->assertEquals($code, $token->getCode());
    }
}
