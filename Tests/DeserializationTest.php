<?php


namespace Bytes\DiscordResponseBundle\Tests;


use Bytes\DiscordResponseBundle\Objects\Channel;
use Bytes\DiscordResponseBundle\Objects\Guild;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Member;
use Bytes\DiscordResponseBundle\Objects\Overwrite;
use Bytes\DiscordResponseBundle\Objects\PartialGuild;
use Bytes\DiscordResponseBundle\Objects\User;
use Bytes\DiscordResponseBundle\Services\DiscordDatetimeInterface;
use Symfony\Bridge\PhpUnit\ExpectDeprecationTrait;

class DeserializationTest extends TestSerializationCase
{
    use ExpectDeprecationTrait;

    public function testMeDeserialization()
    {
        $serializer = $this->createSerializer();

        /** @var User $output */
        $output = $serializer->deserialize(file_get_contents(self::getFixturesFile('me.json')), User::class, 'json');

        $this->assertEquals("225922625525845374", $output->getId());
        $this->assertEquals("Raymond", $output->getUsername());
        $this->assertEquals('mz9575g5p5v8pyo3d4ps8h4a', $output->getAvatar());
        $this->assertEquals("4421", $output->getDiscriminator());
        $this->assertEquals(0, $output->getPublicFlags());
        $this->assertEquals(0, $output->getFlags());
        $this->assertEquals(true, $output->getBot());
        $this->assertEquals(true, $output->getVerified());
        $this->assertEquals("en-US", $output->getLocale());
        $this->assertEquals(true, $output->getMfaEnabled());
        $this->assertNull($output->getEmail());

        $this->checkForNullErrors($output);
    }

    public function testPartialGuildV6Deserialization()
    {
        /** @var PartialGuild $output */
        $output = $this->deserializeGuild('partial-guild-v6.json', PartialGuild::class);

        $this->assertFalse($output->getOwner());
        $this->assertEquals(372633152, $output->getPermissions());
        $this->assertIsInt($output->getPermissions());
        $this->assertCount(7, $output->getFeatures());
        $this->assertContains('MEMBER_VERIFICATION_GATE_ENABLED', $output->getFeatures());

        $this->checkForNullErrors($output);
    }

    public function testPartialGuildV8Deserialization()
    {
        /** @var PartialGuild $output */
        $output = $this->deserializeGuild('partial-guild-v8.json', PartialGuild::class);

        $this->assertFalse($output->getOwner());
        $this->assertEquals('6815084096', $output->getPermissions());
        $this->assertIsString($output->getPermissions());
        $this->assertCount(7, $output->getFeatures());
        $this->assertContains('MEMBER_VERIFICATION_GATE_ENABLED', $output->getFeatures());

        $this->checkForNullErrors($output);
    }

    public function testRoleV6Deserialization()
    {
        $this->expectDeprecation('Since vendor-name/package-name 5.1: This "%s" method is deprecated');
        /** @var Guild $output */
        $output = $this->deserializeGuild('guild-v6.json', Guild::class);

        $this->assertNull($output->getOwner());
        $this->assertNull($output->getPermissions());

        $this->assertCount(2, $output->getRoles());

        $roles = $output->getRoles();

        $role = array_pop($roles);
        $this->assertEquals('714479665842275767', $role->getId());
        $this->assertEquals('Manager', $role->getName());
        $this->assertFalse($role->getMentionable());

        $this->assertIsNumeric($role->getPermissions());
        $this->assertIsInt($role->getPermissions());
        $this->assertEquals(104320577, $role->getPermissions());

        $role = array_pop($roles);
        $this->assertEquals('732307126930327628', $role->getId());
        $this->assertEquals('@everyone', $role->getName());
        $this->assertFalse($role->getMentionable());

        $this->assertIsNumeric($role->getPermissions());
        $this->assertIsInt($role->getPermissions());
        $this->assertEquals(104320577, $role->getPermissions());

        $this->checkForNullErrors($output);
    }

    protected function deserializeGuild(string $file, string $class)
    {
        $serializer = $this->createSerializer();

        /** @var PartialGuild|Guild $output */
        $output = $serializer->deserialize(file_get_contents(self::getFixturesFile($file)), $class, 'json');

        $this->assertEquals("732307126930327628", $output->getId());
        $this->assertEquals("PZjj2rimTJQeMYYTCKKw7siBknEUdE", $output->getName());
        $this->assertEquals('cfbc5b55d417d6fee18c89c8122e7fe7', $output->getIcon());

        return $output;
    }

    public function testRoleV8Deserialization()
    {
        $this->expectDeprecation('Since vendor-name/package-name 5.1: This "%s" method is deprecated');
        /** @var Guild $output */
        $output = $this->deserializeGuild('guild-v8.json', Guild::class);

        $this->assertNull($output->getOwner());
        $this->assertNull($output->getPermissions());

        $this->assertCount(2, $output->getRoles());

        $roles = $output->getRoles();

        $role = array_pop($roles);
        $this->assertEquals('714479665842275767', $role->getId());
        $this->assertEquals('Manager', $role->getName());
        $this->assertFalse($role->getMentionable());

        $this->assertIsNumeric($role->getPermissions());
        $this->assertIsString($role->getPermissions());
        $this->assertEquals('6546771521', $role->getPermissions());

        $role = array_pop($roles);
        $this->assertEquals('732307126930327628', $role->getId());
        $this->assertEquals('@everyone', $role->getName());
        $this->assertFalse($role->getMentionable());

        $this->assertIsNumeric($role->getPermissions());
        $this->assertIsString($role->getPermissions());
        $this->assertEquals('6546771521', $role->getPermissions());

        $this->checkForNullErrors($output);
    }

    public function testV8ArrayErrorDeserialization()
    {
        $serializer = $this->createSerializer();

        /** @var User $output */
        $output = $serializer->deserialize(file_get_contents(self::getFixturesFile('array-error-v8.json')), User::class, 'json');

        $this->assertEquals('Invalid Form Body', $output->getMessage());
        $this->assertEquals(50035, $output->getCode());
        $this->assertIsArray($output->getErrors());
        $this->assertArrayHasKey('activities', $output->getErrors());
        $this->assertNull($output->getRetryAfter());
        $this->assertNull($output->getGlobal());
    }

    public function testV8ObjectErrorDeserialization()
    {
        $serializer = $this->createSerializer();

        /** @var User $output */
        $output = $serializer->deserialize(file_get_contents(self::getFixturesFile('object-error-v8.json')), User::class, 'json');

        $this->assertEquals('Invalid Form Body', $output->getMessage());
        $this->assertEquals(50035, $output->getCode());
        $this->assertIsArray($output->getErrors());
        $this->assertArrayHasKey('access_token', $output->getErrors());
        $this->assertNull($output->getRetryAfter());
        $this->assertNull($output->getGlobal());
    }

    public function testV6UnauthorizedErrorDeserialization()
    {
        $serializer = $this->createSerializer();

        /** @var User $output */
        $output = $serializer->deserialize(file_get_contents(self::getFixturesFile('unauthorized-v6.json')), User::class, 'json');

        $this->assertEquals('401: Unauthorized', $output->getMessage());
        $this->assertEquals(0, $output->getCode());
        $this->assertNull($output->getErrors());
        $this->assertNull($output->getRetryAfter());
        $this->assertNull($output->getGlobal());
    }

    /**
     * @param ErrorInterface $output
     */
    protected function checkForNullErrors($output)
    {
        $this->assertNull($output->getMessage());
        $this->assertNull($output->getCode());
        $this->assertNull($output->getRetryAfter());
        $this->assertNull($output->getGlobal());
    }

    public function testMember()
    {
        $serializer = $this->createSerializer();

        /** @var Member $output */
        $output = $serializer->deserialize(file_get_contents(self::getFixturesFile('member-v8.json')), Member::class, 'json');

        $this->assertInstanceOf(\DateTimeInterface::class, $output->getJoinedAt());
        $this->assertEquals("2021-03-16T17:12:09.458000+00:00", $output->getJoinedAt()->format(DiscordDatetimeInterface::FORMAT));
        $this->assertEquals("2021-03-16T17:12:09+00:00", $output->getJoinedAt()->format(DATE_ATOM));

        $this->assertNull($output->getPremiumSince());

        $this->checkForNullErrors($output);
    }

    /**
     * 
     */
    public function testChannels()
    {
        $serializer = $this->createSerializer();

        /** @var Channel[] $channels */
        $channels = $serializer->deserialize(file_get_contents(self::getFixturesFile('channels-v8.json')), '\Bytes\DiscordResponseBundle\Objects\Channel[]', 'json');

        $this->assertCount(12, $channels);

        $channel = $channels[0];
        $this->assertInstanceOf(Channel::class, $channel);
        $this->assertEquals('276921226399262614', $channel->getId());
        $this->assertEquals(6, $channel->getType());
        $this->assertEquals('721716783525430558', $channel->getGuildId());
        $this->assertEquals(5, $channel->getPosition());
        $this->assertEquals('Ad sed blanditiis incidunt quae. Et unde optio corporis. Nihil eum ad odio ab.', $channel->getName());

        $this->assertCount(3, $channel->getPermissionOverwrites());
        $overwrite = $channel->getPermissionOverwrites()[0];

        $this->assertInstanceOf(Overwrite::class, $overwrite);
        $this->assertEquals("263397620755496871", $overwrite->getId());
        $this->assertEquals('role', $overwrite->getType());
        $this->assertEquals('6546771529', $overwrite->getAllow());
        $this->assertEquals('6546771529', $overwrite->getDeny());

        foreach($channels as $channel)
        {
            $this->checkForNullErrors($channel);
        }
    }
}