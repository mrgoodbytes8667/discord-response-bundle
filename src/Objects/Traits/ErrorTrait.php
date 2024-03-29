<?php


namespace Bytes\DiscordResponseBundle\Objects\Traits;



/**
 * Trait ErrorTrait
 * @package Bytes\DiscordResponseBundle\Objects\Traits
 */
trait ErrorTrait
{
    /**
     * @var string|null
     */
    protected $message;

    /**
     * @var int|null
     */
    protected $code;

    /**
     * @var int|null
     */
    protected $retryAfter;

    /**
     * @var bool|null
     */
    protected $global;

    /**
     * @var mixed|null
     * New for API v8
     * @link https://discord.com/developers/docs/reference#error-messages
     * @since v0.7.0
     */
    protected $errors;

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     *
     * @return $this
     */
    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCode(): ?int
    {
        return $this->code;
    }

    /**
     * @param int|null $code
     *
     * @return $this
     */
    public function setCode(?int $code): self
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getRetryAfter(): ?int
    {
        return $this->retryAfter;
    }

    /**
     * @param int|null $retryAfter
     * @return $this
     */
    public function setRetryAfter(?int $retryAfter): self
    {
        $this->retryAfter = $retryAfter;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getGlobal(): ?bool
    {
        return $this->global;
    }

    /**
     * @param bool|null $global
     * @return $this
     */
    public function setGlobal(?bool $global): self
    {
        $this->global = $global;
        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param mixed|null $errors
     * @return $this
     */
    public function setErrors($errors): self
    {
        $this->errors = $errors;
        return $this;
    }

}