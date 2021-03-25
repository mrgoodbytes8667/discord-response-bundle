<?php


namespace Bytes\DiscordResponseBundle\Tests;


use Bytes\Tests\Common\Faker\Providers\Discord;
use Faker\Factory;
use Faker\Generator as FakerGenerator;
use Faker\Provider\Miscellaneous;

/**
 * Trait TestDiscordFakerTrait
 * @package Bytes\DiscordResponseBundle\Tests
 */
trait TestDiscordFakerTrait
{
    /**
     * @var Discord|FakerGenerator|Miscellaneous
     */
    protected $faker;

    /**
     * @before
     */
    protected function setupFaker(): void
    {
        if (is_null($this->faker)) {
            /** @var FakerGenerator|Discord $faker */
            $faker = Factory::create();
            $faker->addProvider(new Discord($faker));
            $this->faker = $faker;
        }
    }

    /**
     * @after
     */
    protected function tearDownFaker(): void
    {
        $this->faker = null;
    }
}