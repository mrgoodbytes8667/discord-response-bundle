<?php


namespace Bytes\DiscordResponseBundle\Objects\Interfaces;


use Doctrine\Common\Collections\ArrayCollection;

/**
 * Interface GuildInterface
 * @package Bytes\DiscordResponseBundle\Objects\Interfaces
 */
interface GuildInterface extends ErrorInterface, IdInterface, NameInterface
{
    /**
     * @return string|null
     */
    public function getIcon(): ?string;

    /**
     * @param string|null $icon
     * @return $this
     */
    public function setIcon(?string $icon);

    /**
     * @return string[]|ArrayCollection|null
     */
    public function getFeatures();

    /**
     * @param string[]|ArrayCollection|null $features
     * @return $this
     */
    public function setFeatures($features);

    /**
     * @param string $feature
     * @return $this
     */
    public function addFeature(string $feature);
}