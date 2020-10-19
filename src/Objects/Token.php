<?php


namespace Bytes\DiscordResponseBundle\Objects;


use App\Objects\AccessTokenInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\TokenTrait;

/**
 * Class Token
 * @package Bytes\DiscordResponseBundle\Objects
 */
class Token implements ErrorInterface, AccessTokenInterface
{
    use TokenTrait, ErrorTrait;

    /**
     * @var Guild|null
     */
    private $guild;

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

}