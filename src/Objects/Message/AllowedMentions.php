<?php


namespace Bytes\DiscordResponseBundle\Objects\Message;


/**
 * Class AllowedMentions
 * @package Bytes\DiscordResponseBundle\Objects\Message
 *
 * Arrays must be initialized to null or the PropertyAccessor component will fail to serialize.
 * The property "AllowedMentions::$roles" is not readable because it is typed "array". You should initialize it or
 * declare a default value instead.
 */
class AllowedMentions
{
    /**
     * @var string[]|null
     */
    private ?array $parse = null;

    /**
     * @var string[]|null
     */
    private ?array $roles = null;

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