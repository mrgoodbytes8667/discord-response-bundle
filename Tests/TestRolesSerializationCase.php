<?php

namespace Bytes\DiscordResponseBundle\Tests;


use Bytes\DiscordResponseBundle\Objects\Message\AllowedMentions;
use Faker\Generator;
use Symfony\Component\String\ByteString;

/**
 * Class TestRolesSerializationCase
 * @package Bytes\DiscordResponseBundle\Tests
 */
class TestRolesSerializationCase extends TestSerializationCase
{
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
        return md5(ByteString::fromRandom(30));
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