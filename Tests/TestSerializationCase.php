<?php


namespace Bytes\DiscordResponseBundle\Tests;


use Bytes\EnumSerializerBundle\Serializer\Normalizer\EnumNormalizer;
use Doctrine\Common\Annotations\AnnotationReader;
use PHPUnit\Framework\TestCase;
use Symfony\Component\PropertyAccess\PropertyAccessor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\CsvEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ConstraintViolationListNormalizer;
use Symfony\Component\Serializer\Normalizer\DataUriNormalizer;
use Symfony\Component\Serializer\Normalizer\DateIntervalNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeZoneNormalizer;
use Symfony\Component\Serializer\Normalizer\JsonSerializableNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ProblemNormalizer;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\RecursiveValidator;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class TestSerializationCase extends TestCase
{
    use TestValidatorTrait;

    /**
     * @param string $file
     * @return string
     */
    public static function getFixturesFile(string $file)
    {
        return __DIR__ . '/Fixtures/' . $file;
    }

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

    protected function createSerializer(bool $includeEnumNormalizer = true, bool $includeObjectNormalizer = true, array $prependNormalizers = [], array $appendNormalizers = [])
    {
        if (empty($appendNormalizers)) {
            $appendNormalizers = [
                new ProblemNormalizer(),
                new JsonSerializableNormalizer(),
                new DateTimeNormalizer(),
                new ConstraintViolationListNormalizer(),
                new DateTimeZoneNormalizer(),
                new DateIntervalNormalizer(),
                new DataUriNormalizer(),
                new ArrayDenormalizer(),
            ];
        }

        $encoders = [new XmlEncoder(), new JsonEncoder(), new CsvEncoder()];
        $normalizers = $this->getNormalizers($includeEnumNormalizer, $includeObjectNormalizer, array_merge($prependNormalizers, [new UnwrappingDenormalizer()]), $appendNormalizers);

        return new Serializer($normalizers, $encoders);
    }

    /**
     * @param bool $includeEnumNormalizer
     * @param bool $includeObjectNormalizer
     * @param array $prependNormalizers
     * @param array $appendNormalizers
     * @return array
     */
    protected function getNormalizers(bool $includeEnumNormalizer = true, bool $includeObjectNormalizer = true, array $prependNormalizers = [], array $appendNormalizers = [])
    {
        $normalizers = $prependNormalizers;
        if ($includeEnumNormalizer || $includeObjectNormalizer || !empty($appendNormalizers)) {
            $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
            $metadataAwareNameConverter = new MetadataAwareNameConverter($classMetadataFactory);

            $objectNormalizer = new ObjectNormalizer($classMetadataFactory, $metadataAwareNameConverter, new PropertyAccessor(), new ReflectionExtractor(), new ClassDiscriminatorFromClassMetadata($classMetadataFactory));
            if ($includeEnumNormalizer) {
                $normalizers[] = new EnumNormalizer($objectNormalizer);
            }
            foreach ($appendNormalizers as $normalizer) {
                $normalizers[] = $normalizer;
            }
            if ($includeObjectNormalizer) {
                $normalizers[] = $objectNormalizer;
            }
        }
        return $normalizers;
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