<?php


namespace Bytes\DiscordResponseBundle\Objects\Traits;


use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Trait ErrorTrait
 * @package Bytes\DiscordResponseBundle\Objects\Traits
 */
trait ErrorTrait
{
    /**
     * @var string|null
     * @Groups({"discordapi", "discordjs"})
     */
    protected $message;

    /**
     * @var int|null
     * @Groups({"discordapi", "discordjs"})
     */
    protected $code;

    /**
     * @var int|null
     * @Groups({"discordapi", "discordjs"})
     */
    protected $retryAfter;

    /**
     * @var bool|null
     * @Groups({"discordapi", "discordjs"})
     */
    protected $global;

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



}