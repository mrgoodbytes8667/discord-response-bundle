<?php


namespace Bytes\DiscordResponseBundle\Objects\OAuth\Validate;


use Bytes\DiscordResponseBundle\Objects\Application;
use Bytes\ResponseBundle\Token\Interfaces\TokenValidationResponseInterface;
use DateTimeInterface;
use InvalidArgumentException;

/**
 * Class Bot
 * @package Bytes\DiscordResponseBundle\Objects\OAuth\Validate
 *
 * @link https://discord.com/developers/docs/topics/oauth2#get-current-bot-application-information
 *
 * @version v0.9.0 As of 2021-05-05 Discord Documentation
 */
class Bot extends Application implements TokenValidationResponseInterface
{
    /**
     * @param ...$args = ['id', 'name', 'icon', 'description', 'rpcOrigins', 'botPublic', 'botRequireCodeGrant', 'termsOfServiceUrl', 'privacyPolicyUrl', 'owner', 'summary', 'verifyKey']
     * @return static
     */
    public static function create(...$args): static
    {
        $static = new static();

        if (isset($args['id'])) {
            $static->setId($args['id']);
        }

        if (isset($args['name'])) {
            $static->setName($args['name']);
        }

        if (isset($args['icon'])) {
            $static->setIcon($args['icon']);
        }

        if (isset($args['description'])) {
            $static->setDescription($args['description']);
        }

        if (isset($args['rpcOrigins'])) {
            $static->setRpcOrigins($args['rpcOrigins']);
        }

        if (isset($args['botPublic'])) {
            $static->setBotPublic($args['botPublic']);
        }

        if (isset($args['botRequireCodeGrant'])) {
            $static->setBotRequireCodeGrant($args['botRequireCodeGrant']);
        }

        if (isset($args['termsOfServiceUrl'])) {
            $static->setTermsOfServiceUrl($args['termsOfServiceUrl']);
        }

        if (isset($args['privacyPolicyUrl'])) {
            $static->setPrivacyPolicyUrl($args['privacyPolicyUrl']);
        }

        if (isset($args['owner'])) {
            $static->setOwner($args['owner']);
        }

        if (isset($args['summary'])) {
            $static->setSummary($args['summary']);
        }

        if (isset($args['verifyKey'])) {
            $static->setVerifyKey($args['verifyKey']);
        }
        return $static;
    }

    /**
     * @return string|null
     */
    public function getClientId(): ?string
    {
        return $this->getId();
    }

    /**
     * @return string|null
     */
    public function getUserName(): ?string
    {
        return $this->getName() ?? '';
    }

    /**
     * @return string[]|null
     */
    public function getScopes(): ?array
    {
        return [];
    }

    /**
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->getId();
    }

    /**
     * @param string|null $id
     * @return bool
     */
    public function hasMatchingUserId(?string $id): bool
    {
        if (empty($this->getId()) || empty($id)) {
            return false;
        }
        return $this->getId() === $id;
    }

    /**
     * @param ...$args = ['clientId', 'userName']
     * @return bool
     */
    public function isMatch(...$args): bool
    {
        return $this->hasMatchingClientId($args['clientId'] ?? null) &&
            $this->hasMatchingUserName($args['userName'] ?? null);
    }

    /**
     * @param string|null $clientId
     * @return bool
     */
    public function hasMatchingClientId(?string $clientId): bool
    {
        if (empty($this->getId()) || empty($clientId)) {
            return false;
        }
        return $this->getId() === $clientId;
    }

    /**
     * @param string|null $userName
     * @return bool
     */
    public function hasMatchingUserName(?string $userName): bool
    {
        if (empty($this->getName()) || empty($userName)) {
            return false;
        }
        return $this->getName() === $userName;
    }

    /**
     * Is this token an app/bot token?
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    public function isAppToken(): bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function hasExpired(): bool
    {
        return false;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getExpiresAt(): ?DateTimeInterface
    {
        return null;
    }
}