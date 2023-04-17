<?php

namespace Bytes\DiscordResponseBundle\Objects\Traits;

use Bytes\DiscordResponseBundle\Enums\ApplicationCommandOptionType;

/**
 *
 */
trait ApplicationCommandOptionTypeTrait
{
    /**
     * value of ApplicationCommandOptionType
     * @var int|null
     */
    private $type;

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param ApplicationCommandOptionType|int|null $type
     * @return $this
     */
    public function setType($type): self
    {
        if ($type instanceof ApplicationCommandOptionType) {
            $type = $type->value;
        }
        
        $this->type = $type;
        return $this;
    }
}