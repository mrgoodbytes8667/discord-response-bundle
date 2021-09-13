<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\Slash;

use Bytes\DiscordResponseBundle\Objects\Application\Command\ChatInputCommand;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommand;
use PHPUnit\Framework\TestCase;
use Symfony\Bridge\PhpUnit\ExpectDeprecationTrait;

/**
 *
 */
class LegacyApplicationCommandTest extends TestCase
{
    use ExpectDeprecationTrait;

    /**
     *
     */
    public function testCreate()
    {
        $this->expectDeprecation('Since');
        $this->assertInstanceOf(ChatInputCommand::class, ApplicationCommand::create('abc', '123'));
    }
}