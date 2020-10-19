<?php


namespace Bytes\DiscordResponseBundle\Objects\Traits;


/**
 * Trait TokenTrait
 * @package Bytes\DiscordResponseBundle\Objects\Traits
 */
trait TokenTrait
{
    /**
     * @var string|null
     */
    private $tokenType;

    /**
     * @var string|null
     */
    private $accessToken;

    /**
     * @var string|null
     */
    private $scope;

    /**
     * @var int|null
     */
    private $expiresIn;

    /**
     * @var string|null
     */
    private $refreshToken;



    /**
     * @return string|null
     */
    public function getTokenType(): ?string
    {
        return $this->tokenType;
    }

    /**
     * @param string|null $tokenType
     * @return $this
     */
    public function setTokenType(?string $tokenType): self
    {
        $this->tokenType = $tokenType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    /**
     * @param string|null $accessToken
     * @return $this
     */
    public function setAccessToken(?string $accessToken): self
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getScope(): ?string
    {
        return $this->scope;
    }

    /**
     * @param string|null $scope
     * @return $this
     */
    public function setScope(?string $scope): self
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getExpiresIn(): ?int
    {
        return $this->expiresIn;
    }

    /**
     * @param int|null $expiresIn
     * @return $this
     */
    public function setExpiresIn(?int $expiresIn): self
    {
        $this->expiresIn = $expiresIn;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRefreshToken(): ?string
    {
        return $this->refreshToken;
    }

    /**
     * @param string|null $refreshToken
     * @return $this
     */
    public function setRefreshToken(?string $refreshToken): self
    {
        $this->refreshToken = $refreshToken;
        return $this;
    }
}