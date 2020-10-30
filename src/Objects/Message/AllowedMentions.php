<?php


namespace Bytes\DiscordResponseBundle\Objects\Message;


/**
 * Class AllowedMentions
 * @package Bytes\DiscordResponseBundle\Objects\Message
 */
class AllowedMentions
{
    /**
     * @var string[]|null
     */
    private ?array $parse;

    /**
     * @var string[]|null
     */
    private ?array $roles;

    /**
     * @return string[]|null
     */
    public function getParse(): ?array
    {
        return $this->parse;
    }

    /**
     * @param string[]|null $parse
     * @return $this
     */
    public function setParse(?array $parse): self
    {
        $this->parse = $parse;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    /**
     * @param string[]|null $roles
     * @return $this
     */
    public function setRoles(?array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }
}