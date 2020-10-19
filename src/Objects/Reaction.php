<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;

/**
 * Class Reaction
 * @package Bytes\DiscordResponseBundle\Objects
 *
 * @link https://discord.com/developers/docs/resources/channel#reaction-object
 */
class Reaction implements ErrorInterface
{
    use ErrorTrait;

    /**
     * @var int|null
     */
    private $count;

    /**
     * @var bool|null
     */
    private $me;

    /**
     * @var Emoji|null
     */
    private $emoji;

    /**
     * @return int|null
     */
    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @param int|null $count
     * @return $this
     */
    public function setCount(?int $count): self
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getMe(): ?bool
    {
        return $this->me;
    }

    /**
     * @param bool|null $me
     * @return $this
     */
    public function setMe(?bool $me): self
    {
        $this->me = $me;
        return $this;
    }

    /**
     * @return Emoji|null
     */
    public function getEmoji(): ?Emoji
    {
        return $this->emoji;
    }

    /**
     * @param Emoji|null $emoji
     * @return $this
     */
    public function setEmoji(?Emoji $emoji): self
    {
        $this->emoji = $emoji;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmojiName(): ?string {
        if(empty($this->getEmoji()))
        {
            return '';
        } else {
            return $this->getEmoji()->getName() ?? '';
        }
    }
}