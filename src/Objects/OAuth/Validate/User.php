<?php


namespace Bytes\DiscordResponseBundle\Objects\OAuth\Validate;


use Bytes\DiscordResponseBundle\Objects\Application;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\DiscordResponseBundle\Objects\User as UserClass;
use Bytes\ResponseBundle\Token\Interfaces\TokenValidationResponseInterface;
use DateTimeImmutable;
use DateTimeInterface;
use InvalidArgumentException;

/**
 * Class User
 * @package Bytes\DiscordResponseBundle\Objects\OAuth\Validate
 *
 * @link https://discord.com/developers/docs/topics/oauth2#get-current-authorization-information
 *
 * @version v0.9.0 As of 2021-05-05 Discord Documentation
 */
class User implements TokenValidationResponseInterface
{
    use ErrorTrait;

    /**
     * User constructor.
     * @param Application|null $application
     * @param array|null $scopes
     * @param DateTimeInterface|null $expires
     * @param UserClass|null $user
     */
    public function __construct(private ?Application $application = null, private ?array $scopes = [], private ?DateTimeInterface $expires = null, private ?UserClass $user = null)
    {
        if (empty($application)) {
            $this->application = new Application();
        }
        if (empty($user)) {
            $this->user = new UserClass();
        }
    }

    /**
     * @param ...$args = ['application', 'scopes', 'expires', 'user']
     * @return static
     */
    public static function create(...$args): static
    {
        return new static(...$args);
    }

    /**
     * @return Application|null
     */
    public function getApplication(): ?Application
    {
        return $this->application;
    }

    /**
     * @param Application|null $application
     * @return $this
     */
    public function setApplication(?Application $application): self
    {
        $this->application = $application;
        return $this;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getExpires(): ?DateTimeInterface
    {
        return $this->expires;
    }

    /**
     * @param DateTimeInterface|null $expires
     * @return $this
     */
    public function setExpires(?DateTimeInterface $expires): self
    {
        $this->expires = $expires;
        return $this;
    }

    /**
     * @return bool
     */
    public function hasExpired(): bool
    {
        return $this->expires <= new DateTimeImmutable();
    }

    /**
     * @return UserClass|null
     */
    public function getUser(): ?UserClass
    {
        return $this->user;
    }

    /**
     * @param UserClass|null $user
     * @return $this
     */
    public function setUser(?UserClass $user): self
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getClientId(): ?string
    {
        return $this->application->getId();
    }

    /**
     * @return string|null
     */
    public function getUserName(): ?string
    {
        return $this->user?->getUsername();
    }

    /**
     * @return array|null
     */
    public function getScopes(): ?array
    {
        return $this->scopes;
    }

    /**
     * @param array|null $scopes
     * @return $this
     */
    public function setScopes(?array $scopes): self
    {
        $this->scopes = $scopes;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->user?->getId();
    }

    /**
     * @param ...$args
     * @return bool
     */
    public function isMatch(...$args): bool
    {
        return $this->hasMatchingClientId($args['clientId'] ?? null) &&
            $this->hasMatchingUserName($args['userName'] ?? null) &&
            $this->hasMatchingUserId($args['userId'] ?? null);
    }

    /**
     * @param string|null $clientId
     * @return bool
     */
    public function hasMatchingClientId(?string $clientId): bool
    {
        if (empty($this->application?->getId()) || empty($clientId)) {
            return false;
        }
        return $this->application?->getId() === $clientId;
    }

    /**
     * @param string|null $userName
     * @return bool
     */
    public function hasMatchingUserName(?string $userName): bool
    {
        if (empty($this->user?->getUsername()) || empty($userName)) {
            return false;
        }
        return $this->user?->getUsername() === $userName;
    }

    /**
     * @param string|null $id
     * @return bool
     */
    public function hasMatchingUserId(?string $id): bool
    {
        if (empty($this->user?->getId()) || empty($id)) {
            return false;
        }
        return $this->user?->getId() === $id;
    }

    /**
     * Is this token an app/bot token?
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    public function isAppToken(): bool
    {
        return false;
    }
}