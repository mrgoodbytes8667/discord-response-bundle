<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\Emojis;
use PHPUnit\Framework\TestCase;

/**
 * Class EmojisTest
 * @package Bytes\DiscordResponseBundle\Tests\Enums
 */
class EmojisTest extends TestCase
{
    /**
     *
     */
    public function testRandom()
    {
        $random = Emojis::random();
        $this->assertInstanceOf(Emojis::class, $random);
    }
}
