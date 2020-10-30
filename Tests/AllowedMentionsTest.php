<?php

namespace Bytes\DiscordResponseBundle\Tests;

use Bytes\DiscordResponseBundle\Objects\Message\AllowedMentions;
use Bytes\DiscordResponseBundle\Tests\TestRolesSerializationCase;
use Symfony\Component\Validator\Validation;

class AllowedMentionsTest extends TestRolesSerializationCase
{

    public function testCreateForEveryone()
    {
        $manual = new AllowedMentions();
        $manual->setParse(['everyone']);

        $am = $this->generateFakeAllowedMentionsClass();

        $static = AllowedMentions::createForEveryone();

        $this->assertEquals($manual, $am);
        $this->assertEquals($manual, $static);
    }

    public function testCreateForRoles()
    {
        foreach (range(1, 10) as $max) {
            $roles = $this->generateFakeRoles($max);

            $manual = new AllowedMentions();
            $manual->setRoles($roles);

            $am = $this->generateFakeAllowedMentionsClass($roles);

            $static = AllowedMentions::createForRoles($roles);

            $this->assertEquals($manual, $am);
            $this->assertEquals($manual, $static);
        }
    }

    public function testCreate()
    {
        $manual = new AllowedMentions();
        $manual->setParse([]);

        $am = $this->generateFakeAllowedMentionsClass(null, []);

        $static = AllowedMentions::create();

        $this->assertEquals($manual, $am);
        $this->assertEquals($manual, $static);
    }

    public function testCreateWithRoles()
    {
        foreach (range(1, 10) as $max) {
            $roles = $this->generateFakeRoles($max);

            $manual = new AllowedMentions();
            $manual->setRoles($roles);

            $static = AllowedMentions::create($roles);

            $this->assertEquals($manual, $static);
        }

        $role = $this->generateFakeRole();

        $manual = new AllowedMentions();
        $manual->setRoles($role);

        $static = AllowedMentions::create($role);

        $this->assertEquals($manual, $static);

        $static = AllowedMentions::createForRoles($role);

        $this->assertEquals($manual, $static);
    }

    public function testCreateWithParse()
    {
        foreach (range(1, 10) as $max) {
            $roles = $this->generateFakeRoles($max);

            $manual = new AllowedMentions();
            $manual->setParse($roles);

            $static = AllowedMentions::create(null, $roles);

            $this->assertEquals($manual, $static);
        }
    }

    public function testValidationPass()
    {
        $this->validationPass([
                     AllowedMentions::create(null, ['everyone', 'users']),
                     AllowedMentions::create($this->generateFakeRoles(1), ['everyone']),
                     AllowedMentions::create(null, []),
                 ]);
    }

    public function testValidationFail()
    {
        $this->validationFail([
                     AllowedMentions::create(['a'], ['roles']),
                     AllowedMentions::create(null, ['fake'])
                 ]);
    }
}
