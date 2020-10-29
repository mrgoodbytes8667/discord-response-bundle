<?php


namespace Bytes\DiscordResponseBundle\Objects\Embed;


use Bytes\DiscordResponseBundle\Objects\Embed\Traits\NameTrait;

/**
 * Class Field
 * @package Bytes\DiscordResponseBundle\Objects\Embed
 */
class Field
{
    use NameTrait;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @var bool
     */
    private $inline = false;

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return Field
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInline(): bool
    {
        return $this->inline;
    }

    /**
     * @param bool $inline
     * @return Field
     */
    public function setInline(bool $inline): Field
    {
        $this->inline = $inline;
        return $this;
    }

}