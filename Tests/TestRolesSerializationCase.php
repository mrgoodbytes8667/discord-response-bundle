<?php

namespace Bytes\DiscordResponseBundle\Tests;


use Bytes\DiscordResponseBundle\Objects\Message\AllowedMentions;
use Faker\Factory;
use Faker\Generator;

class TestRolesSerializationCase extends TestSerializationCase
{

    /**
     * @var Generator
     * @deprecated v0.5.7
     */
    protected Generator $faker;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();
        if (empty($this->faker)) {
            $this->faker = Factory::create();
        }
    }

    /**
     * @param int $max
     * @return string[]
     */
    protected function generateFakeRoles(int $max)
    {
        $roles = [];
        for ($i = 0; $i <= $max; $i++) {
            $roles[] = $this->generateFakeRole();
        }
        return $roles;
    }

    protected function generateFakeRole()
    {
        return md5($this->faker->text(30));
    }

    /**
     * @param array|null $roles
     * @param array|null $parse
     * @return AllowedMentions
     */
    protected function generateFakeAllowedMentionsClass(?array $roles = null, ?array $parse = null)
    {
        $hasRoles = !is_null($roles);
        $hasParse = !is_null($parse);

        /** @var AllowedMentions $allowedMentions */
        $allowedMentions = null;
        if (!$hasRoles && !$hasParse) {
            $allowedMentions = AllowedMentions::createForEveryone();
        } elseif ($hasParse) {
            $allowedMentions = AllowedMentions::create(null, $parse);
        } else {
            $allowedMentions = AllowedMentions::createForRoles($roles);
        }

        return $allowedMentions;
    }
}