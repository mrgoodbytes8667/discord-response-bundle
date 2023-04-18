<?php

namespace Bytes\DiscordResponseBundle\Tests\Enums;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandType;
use Generator;
use PHPUnit\Framework\TestCase;
use Spatie\Enum\Phpunit\EnumAssertions;

class ApplicationCommandTypeTest extends TestCase
{
    /**
     * @dataProvider provideEnums
     * @param int $value
     * @param ApplicationCommandType $enum
     */
    public function testJsonSerialize(int $value, ApplicationCommandType $enum)
    {
        $output = json_encode($enum);
        $this->assertIsString($output);
        $this->assertEquals($enum->value, $output);
    }

    /**
     * @dataProvider provideEnums
     * @param int $value
     * @param ApplicationCommandType $enum
     */
    public function testEnums(int $value, ApplicationCommandType $enum)
    {
        $this->assertTrue(ApplicationCommandType::isValid($value));
        $type = ApplicationCommandType::from($value);
        EnumAssertions::assertSameEnum($enum, $type);
        EnumAssertions::assertSameEnumLabel($enum, $type->label);
        EnumAssertions::assertSameEnumValue($enum, $type->value);
    }

    /**
     *
     */
    public function testInvalidEnums()
    {
        $this->assertFalse(ApplicationCommandType::isValid('abc'));
    }

    /**
     * @return Generator
     */
    public function provideEnums()
    {
        yield ['value' => 1, 'enum' => ApplicationCommandType::CHAT_INPUT];
        yield ['value' => 2, 'enum' => ApplicationCommandType::USER];
        yield ['value' => 3, 'enum' => ApplicationCommandType::MESSAGE];
    }

    /**
     *
     */
    public function testFormChoices()
    {
        $choices = ApplicationCommandType::formChoices();
        $this->assertCount(3, $choices);

        $this->assertArrayHasKey('Chat Input', $choices);
        $this->assertArrayHasKey('User', $choices);
        $this->assertArrayHasKey('Message', $choices);
        $this->assertEquals(1, $choices['Chat Input']);
        $this->assertEquals(2, $choices['User']);
        $this->assertEquals(3, $choices['Message']);
    }
}