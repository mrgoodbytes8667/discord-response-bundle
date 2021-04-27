<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\ResponseBundle\Token\AccessTokenCreateUpdateFromTrait;
use Bytes\ResponseBundle\Token\Interfaces\AccessTokenInterface;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Illuminate\Support\Arr;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class Token
 * @package Bytes\DiscordResponseBundle\Objects
 */
class Token implements ErrorInterface, AccessTokenInterface
{
    use AccessTokenCreateUpdateFromTrait, ErrorTrait;

    /**
     * @var Guild|null
     */
    private $guild;

    /**
     * @var string|null
     */
    private $error;

    /**
     * @var string|null
     */
    private $errorDescription;

    /**
     * @return Guild|null
     */
    public function getGuild(): ?Guild
    {
        return $this->guild;
    }

    /**
     * @param Guild|null $guild
     * @return $this
     */
    public function setGuild(?Guild $guild): self
    {
        $this->guild = $guild;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * @param string|null $error
     * @return $this
     */
    public function setError(?string $error): self
    {
        $this->error = $error;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getErrorDescription(): ?string
    {
        return $this->errorDescription;
    }

    /**
     * @param string|null $errorDescription
     * @return $this
     */
    public function setErrorDescription(?string $errorDescription): self
    {
        $this->errorDescription = $errorDescription;
        return $this;
    }

    /**
     * Update the current access token with details from another access token (ie: a refresh token)
     * @param AccessTokenInterface $token
     * @return $this
     * @throws Exception
     */
    public function updateFromAccessToken(AccessTokenInterface $token): static
    {
        $this->setAccessToken($token->getAccessToken());
        $this->setRefreshToken($token->getRefreshToken());
        $this->setExpiresIn($token->getExpiresIn());
        $this->setScope(implode(' ', Arr::wrap($token->getScope()) ?? []));
        $this->setTokenType($token->getTokenType());

        return $this;
    }
}