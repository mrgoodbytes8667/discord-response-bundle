<?php


namespace Bytes\DiscordResponseBundle\Objects\Traits;

use Symfony\Component\Serializer\Annotation\Ignore;


/**
 * Trait NameDescriptionValueLengthTrait
 * @package Bytes\DiscordResponseBundle\Objects\Traits
 */
trait NameDescriptionValueLengthTrait
{
    /**
     * Calculates the combined character length of the name, description, and value fields (if they exist)
     * @return int
     * @Ignore()
     */
    public function getNameDescriptionValueCharacterLength()
    {
        $length = 0;
        if (property_exists(static::class, 'name')) {
            if (!empty($this->name)) {
                $length += strlen($this->name);
            }
        }
        if (property_exists(static::class, 'description')) {
            if (!empty($this->description)) {
                $length += strlen($this->description);
            }
        }
        if (property_exists(static::class, 'value')) {
            if (isset($this->value)) {
                $length += strlen($this->value);
            }
        }
        return $length;
    }
}