<?php

namespace Bytes\DiscordResponseBundle\Tests\Objects\Application\Command;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandOptionType as ACOT;
use Bytes\DiscordResponseBundle\Objects\Application\Command\UserCommand;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandOption as Option;
use Bytes\DiscordResponseBundle\Objects\Slash\ApplicationCommandOptionChoice;
use Bytes\Tests\Common\TestEnumTrait;
use Bytes\Tests\Common\TestSerializerTrait;
use Bytes\Tests\Common\TestValidatorTrait;
use Generator;
use Illuminate\Support\Arr;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use Symfony\Component\String\ByteString;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\Exception\ValidationFailedException;

class UserCommandTest extends TestCase
{
    use TestSerializerTrait, TestValidatorTrait, TestEnumTrait;

    /**
     * @param UserCommand $command
     * @dataProvider provideValidUserCommands
     */
    public function testCreate(UserCommand $command)
    {
        $this->assertEquals(1, $this->validate($command));
    }

    /**
     * @return Generator
     */
    public function provideValidUserCommands()
    {
        yield ['command' => UserCommand::createUserCommand('sample')];
    }

    public function testCreateNameTooLong()
    {
        // Name is too long
        $command = UserCommand::createUserCommand(ByteString::fromRandom(33));

        try {
            $this->validate($command);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(1, count($exception->getViolations()));

            /** @var ConstraintViolationInterface $violation */
            $violation = $exception->getViolations()[0];
            $this->assertEquals('Your name cannot be longer than 32 characters', $violation->getMessage());
            $this->assertEquals('name', $violation->getPropertyPath());
        }
    }
}
