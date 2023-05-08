<?php


namespace Bytes\DiscordResponseBundle\Tests;


use Bytes\Tests\Common\TestSerializerTrait;
use Bytes\Tests\Common\TestValidatorTrait;
use Symfony\Component\Validator\Validator\RecursiveValidator;
use Symfony\Component\Validator\Validator\ValidatorInterface;


abstract class TestSerializationCase extends FixtureTestCase
{
    use TestValidatorTrait, TestSerializerTrait;

    /**
     * @param $validations
     */
    public function validationPass($validations)
    {
        $validator = $this->getValidator();

        foreach ($validations as $validation) {
            $violations = $validator->validate($validation);
            if (0 !== count($violations)) {
                // there are errors, now you can show them
                foreach ($violations as $violation) {
                    $this->fail($violation->getMessage());
                }
            }
            $this->assertEquals(0, count($violations));
        }
    }

    /**
     * @return RecursiveValidator|ValidatorInterface
     */
    protected function getValidator()
    {
        return $this->validator ?? $this->createValidator();
    }

    /**
     * @param $validations
     */
    public function validationFail($validations)
    {
        $validator = $this->getValidator();

        foreach ($validations as $validation) {
            $violations = $validator->validate($validation);
            $this->assertGreaterThanOrEqual(1, count($violations));
        }
    }

    protected function buildFixtureResponse(string $value, string $label = null)
    {
        return json_encode([
            'label' => $label ?? $value,
            'value' => $value
        ]);
    }

    protected function buildFixtureResponseIntValue(int $value, string $label = null)
    {
        return json_encode([
            'label' => $label ?? $value,
            'value' => $value
        ]);
    }

    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->validator = $this->createValidator();
    }

    /**
     * This method is called after each test.
     */
    protected function tearDown(): void
    {
        parent::tearDown();
        $this->validator = null;
    }
}
