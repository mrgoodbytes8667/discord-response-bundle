<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\GuildInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\NameInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\NameTrait;
use Bytes\ResponseBundle\Interfaces\IdInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use function Symfony\Component\String\u;

/**
 * Class PartialGuild
 * @package Bytes\DiscordResponseBundle\Objects
 *
 * @link https://discord.com/developers/docs/resources/user#get-current-user-guilds
 */
class PartialGuild implements ErrorInterface, IdInterface, NameInterface, GuildInterface
{
    use IDTrait, NameTrait, ErrorTrait;

    /**
     * @var string|null
     * @Groups({"discordapi", "discordjs"})
     */
    protected $icon;

    /**
     * @var bool|null
     */
    protected $owner;

    /**
     * API v6 returns an integer, API v8 returns a string
     * @var string|int|null
     *
     * @link https://discord.com/developers/docs/change-log#september-24-2020
     */
    protected $permissions;

    /**
     * @var string[]|null
     */
    protected $features;

    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name ?? $this->id ?? '';
    }

    /**
     * @param string|null $icon
     * @return $this
     */
    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * Create the fully resolvable Url for the guild's icon
     * @param string $extension
     * @return string|null
     */
    public function getIconUrl(string $extension = 'png'): ?string
    {
        if (empty($this->getId()) || empty($this->getIcon())) {
            return null;
        }
        return static::buildIconUrl($this->getId(), $this->getIcon(), $extension);
    }


    /**
     * Create the fully resolvable Url for the guild's icon
     * @param string $guildId
     * @param string $icon
     * @param string $extension
     * @return string|null
     */
    public static function buildIconUrl(string $guildId, string $icon, string $extension = 'png'): ?string
    {
        if (empty($guildId) || empty($icon)) {
            return null;
        }
        switch (strtolower($extension)) {
            case 'jpg':
            case 'webp':
                $extension = strtolower($extension);
                break;
            case 'jpeg':
                $extension = 'jpg';
                break;
            case 'gif':
                $extension = u($icon)->startsWith('a_') ? 'gif' : 'png';
                break;
            default:
                $extension = 'png';
                break;
        }
        return implode('/', [
            'https://cdn.discordapp.com/icons',
            $guildId,
            $icon . '.' . $extension
        ]);
    }

    /**
     * @return bool|null
     */
    public function getOwner(): ?bool
    {
        return $this->owner;
    }

    /**
     * @param bool|null $owner
     * @return $this
     */
    public function setOwner(?bool $owner): self
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * @return string|int|null
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param string|int|null $permissions
     * @return $this
     */
    public function setPermissions($permissions): self
    {
        $this->permissions = $permissions;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getFeatures()
    {
        return $this->features;
    }

    /**
     * @param string[]|null $features
     * @return $this
     */
    public function setFeatures($features): self
    {
        $this->features = $features;
        return $this;
    }

    /**
     * @param string $feature
     * @return $this
     */
    public function addFeature(string $feature): self
    {
        if (!in_array($feature, $this->features ?? [])) {
            $this->features[] = $feature;
        }
        return $this;
    }
}