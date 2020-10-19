<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;

/**
 * Class Overwrite
 * @package Bytes\DiscordResponseBundle\Objects
 *
 * @link https://discord.com/developers/docs/resources/channel#overwrite-object
 *
 * @property string $id Role or User ID
 */
class Overwrite implements ErrorInterface
{
    use IDTrait, ErrorTrait;

    /**
     * either "role" or "member"
     * @var string|null
     */
    private $type;

    /**
     * permission bit set
     * @var int|null
     */
    private $allow;

    /**
     * permission bit set
     * @var int|null
     */
    private $deny;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     * @return $this
     */
    public function setType(?string $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAllow(): ?int
    {
        return $this->allow;
    }

    /**
     * @param int|null $allow
     * @return $this
     */
    public function setAllow(?int $allow): self
    {
        $this->allow = $allow;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDeny(): ?int
    {
        return $this->deny;
    }

    /**
     * @param int|null $deny
     * @return $this
     */
    public function setDeny(?int $deny): self
    {
        $this->deny = $deny;
        return $this;
    }
}