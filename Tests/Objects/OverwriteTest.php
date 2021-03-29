<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects;

use Bytes\Common\Faker\Discord\TestDiscordFakerTrait;
use Bytes\DiscordResponseBundle\Objects\Overwrite;
use Generator;
use PHPUnit\Framework\TestCase;
use Symfony\Bridge\PhpUnit\ExpectDeprecationTrait;

/**
 * Class OverwriteTest
 * @package Bytes\DiscordResponseBundle\Tests\Objects
 */
class OverwriteTest extends TestCase
{
    use TestDiscordFakerTrait, ExpectDeprecationTrait;

    /**
     * @dataProvider provideV6Overwrites
     * @param string $id
     * @param $type
     * @param $allow
     * @param $deny
     * @param $allowNew
     * @param $denyNew
     *
     * @group legacy
     */
    public function testGetSetTypeV6(string $id, $type, $allow, $deny, $allowNew, $denyNew)
    {
        $this->expectDeprecation('Since mrgoodbytes8667/discord-response-bundle 0.7.3: The "%s()" method has been deprecated by Discord and is not present in v8.');

        $overwrite = new Overwrite();
        $overwrite->setId($id);
        $overwrite->setType($type);
        $overwrite->setAllow($allow);
        $overwrite->setDeny($deny);
        $overwrite->setAllowNew($allowNew);
        $overwrite->setDenyNew($denyNew);

        $this->assertEquals($id, $overwrite->getId());
        $this->assertEquals($type, $overwrite->getType());
        $this->assertIsString($overwrite->getType());
        $this->assertEquals($allow, $overwrite->getAllow());
        $this->assertIsInt($overwrite->getAllow());
        $this->assertEquals($deny, $overwrite->getDeny());
        $this->assertIsInt($overwrite->getDeny());
        $this->assertEquals($allowNew, $overwrite->getAllowNew());
        $this->assertEquals($denyNew, $overwrite->getDenyNew());
    }

    /**
     * @dataProvider provideV8Overwrites
     * @param string $id
     * @param $type
     * @param $allow
     * @param $deny
     * @param $allowNew
     * @param $denyNew
     *
     * @group legacy
     */
    public function testGetSetTypeV8(string $id, $type, $allow, $deny, $allowNew, $denyNew)
    {
        $this->expectDeprecation('Since mrgoodbytes8667/discord-response-bundle 0.7.3: The "%s()" method has been deprecated by Discord and is not present in v8.');

        $overwrite = new Overwrite();
        $overwrite->setId($id);
        $overwrite->setType($type);
        $overwrite->setAllow($allow);
        $overwrite->setDeny($deny);

        $this->assertEquals($id, $overwrite->getId());
        $this->assertEquals($type, $overwrite->getType());
        $this->assertIsInt($overwrite->getType());
        $this->assertEquals($allow, $overwrite->getAllow());
        $this->assertIsString($overwrite->getAllow());
        $this->assertEquals($deny, $overwrite->getDeny());
        $this->assertIsString($overwrite->getDeny());
        $this->assertNull($overwrite->getAllowNew());
        $this->assertNull($overwrite->getDenyNew());
    }

    /**
     * @return Generator
     */
    public function provideV6Overwrites()
    {
        $this->setupFaker();
        foreach (range(1, 10) as $i) {
            yield [
                'id' => $this->faker->snowflake(),
                'type' => $this->faker->randomElement(['role', 'member']),
                'allow' => $this->faker->numberBetween(),
                'deny' => $this->faker->numberBetween(),
                'allowNew' => (string)$this->faker->numberBetween(),
                'denyNew' => (string)$this->faker->numberBetween(),
            ];
        }
    }

    /**
     * @return Generator
     */
    public function provideV8Overwrites()
    {
        $this->setupFaker();
        foreach (range(1, 10) as $i) {
            yield [
                'id' => $this->faker->snowflake(),
                'type' => $this->faker->numberBetween(0, 1),
                'allow' => (string)$this->faker->numberBetween(),
                'deny' => (string)$this->faker->numberBetween(),
                'allowNew' => null,
                'denyNew' => null,
            ];
        }
    }
}
