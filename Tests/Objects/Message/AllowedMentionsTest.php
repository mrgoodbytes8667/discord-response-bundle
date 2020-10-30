<?php

namespace Objects\Message;

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
        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();

        foreach ([
                     AllowedMentions::create(null, ['everyone', 'users']),
                     AllowedMentions::create($this->generateFakeRoles(1), ['everyone']),
                     AllowedMentions::create(null, []),
                 ] as $allowedMention) {
            $violations = $validator->validate($allowedMention);
            if (0 !== count($violations)) {
                // there are errors, now you can show them
                foreach ($violations as $violation) {
                    $this->fail($violation->getMessage());
                }
            }
            $this->assertEquals(0, count($violations));
        }
    }

    public function testValidationFail()
    {
        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();

        foreach ([
                     AllowedMentions::create(['a'], ['roles']),
                     AllowedMentions::create(null, ['fake'])
                 ] as $allowedMention) {
            $violations = $validator->validate($allowedMention);
            $this->assertGreaterThanOrEqual(1, count($violations));
        }
    }
}
