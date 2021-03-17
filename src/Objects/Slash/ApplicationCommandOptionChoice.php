<?php

namespace Bytes\DiscordResponseBundle\Objects\Slash;

use Bytes\DiscordResponseBundle\Objects\Interfaces\NameInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\NameDescriptionValueLengthTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;
use Symfony\Component\Validator\Constraints as Assert;
use function Symfony\Component\String\u;

/**
 * Class ApplicationCommandOptionChoice
 * If you specify choices for an option, they are the only valid values for a user to pick
 *
 * @package Bytes\DiscordResponseBundle\Objects\Slash
 *
 * @link https://discord.com/developers/docs/interactions/slash-commands#applicationcommandoptionchoice
 *
 * @version v0.6.0 As of 2021-02-25 Discord Documentation
 */
class ApplicationCommandOptionChoice implements NameInterface
{
    use NameTrait, NameDescriptionValueLengthTrait;

    /**
     * 1-100 character choice name
     * @var string|null
     * @Assert\Length(
     *      min = 1,
     *      max = 100,
     *      minMessage = "Your name must be at least {{ limit }} characters long",
     *      maxMessage = "Your name cannot be longer than {{ limit }} characters"
     * )
     */
    private $name;

    /**
     * value of the choice
     * @var string|int|null
     */
    private $value;

    /**
     * @param string $name
     * @param string|int $value
     * @return static
     */
    public static function create(string $name, $value = '')
    {
        if (is_string($value) && empty($value)) {
            $value = u($name)->snake()->toString();
        }

        $choice = new static();
        $choice->setName($name);
        $choice->setValue($value);

        return $choice;
    }

    /**
     * @return int|string|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param int|string|null $value
     * @return $this
     */
    public function setValue($value): self
    {
        $this->value = $value;
        return $this;
    }

}
