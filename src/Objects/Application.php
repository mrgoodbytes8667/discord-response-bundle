<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;

/**
 * Class Application
 * @package Bytes\DiscordResponseBundle\Objects
 *
 * @link https://discord.com/developers/docs/topics/oauth2#application
 *
 * @version v0.9.0 As of 2021-05-05 Discord Documentation
 */
class Application
{
    use IDTrait, NameTrait, ErrorTrait;

    /**
     * @var string|null
     */
    private $icon;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string[]|null
     */
    private $rpc_origins;

    /**
     * @var bool|null
     */
    private $bot_public;

    /**
     * @var bool|null
     */
    private $bot_require_code_grant;

    /**
     * @var string|null
     */
    private $terms_of_service_url;

    /**
     * @var string|null
     */
    private $privacy_policy_url;

    /**
     * @var User|null
     */
    private $owner;

    /**
     * @var string|null
     */
    private $summary;

    /**
     * @var string|null
     */
    private $verify_key;

    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @param string|null $icon
     * @return $this
     */
    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getRpcOrigins(): ?array
    {
        return $this->rpc_origins;
    }

    /**
     * @param string[]|null $rpc_origins
     * @return $this
     */
    public function setRpcOrigins(?array $rpc_origins): self
    {
        $this->rpc_origins = $rpc_origins;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getBotPublic(): ?bool
    {
        return $this->bot_public;
    }

    /**
     * @param bool|null $bot_public
     * @return $this
     */
    public function setBotPublic(?bool $bot_public): self
    {
        $this->bot_public = $bot_public;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getBotRequireCodeGrant(): ?bool
    {
        return $this->bot_require_code_grant;
    }

    /**
     * @param bool|null $bot_require_code_grant
     * @return $this
     */
    public function setBotRequireCodeGrant(?bool $bot_require_code_grant): self
    {
        $this->bot_require_code_grant = $bot_require_code_grant;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTermsOfServiceUrl(): ?string
    {
        return $this->terms_of_service_url;
    }

    /**
     * @param string|null $terms_of_service_url
     * @return $this
     */
    public function setTermsOfServiceUrl(?string $terms_of_service_url): self
    {
        $this->terms_of_service_url = $terms_of_service_url;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPrivacyPolicyUrl(): ?string
    {
        return $this->privacy_policy_url;
    }

    /**
     * @param string|null $privacy_policy_url
     * @return $this
     */
    public function setPrivacyPolicyUrl(?string $privacy_policy_url): self
    {
        $this->privacy_policy_url = $privacy_policy_url;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getOwner(): ?User
    {
        return $this->owner;
    }

    /**
     * @param User|null $owner
     * @return $this
     */
    public function setOwner(?User $owner): self
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSummary(): ?string
    {
        return $this->summary;
    }

    /**
     * @param string|null $summary
     * @return $this
     */
    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVerifyKey(): ?string
    {
        return $this->verify_key;
    }

    /**
     * @param string|null $verify_key
     * @return $this
     */
    public function setVerifyKey(?string $verify_key): self
    {
        $this->verify_key = $verify_key;
        return $this;
    }
}