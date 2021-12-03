<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Traits\ApplicationIdTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\DeletedTrait;

/**
 * Class Guild
 * @package Bytes\DiscordResponseBundle\Objects
 *
 * @link https://discord.com/developers/docs/resources/guild#guild-object
 */
class Guild extends PartialGuild
{
    use ApplicationIdTrait, DeletedTrait;

    /**
     * @var string|null
     */
    private $splash;

    /**
     * @var string|null
     */
    private $discoverySplash;

    /**
     * @var string|null
     */
    private $ownerId;

    /**
     * @var string|null
     */
    private $afkChannelId;

    /**
     * @var int|null
     */
    private $afkTimeout;

    /**
     * @var bool|null
     */
    private $embedEnabled;

    /**
     * @var string|null
     */
    private $embedChannelId;

    /**
     * @var int|null
     */
    private $verificationLevel;

    /**
     * @var int|null
     */
    private $defaultMessageNotifications;

    /**
     * @var int|null
     */
    private $explicitContentFilter;

    /**
     * @var Role[]|null
     */
    private $roles;

    /**
     * @var Emoji|null
     */
    private $emojis;

    /**
     * @var int|null
     */
    private $mfaLevel;

    /**
     * @var bool|null
     */
    private $widgetEnabled;

    /**
     * @var string|null
     */
    private $widgetChannelId;

    /**
     * @var string|null
     */
    private $systemChannelId;

    /**
     * @var int|null
     */
    private $systemChannelFlags;

    /**
     * @var string|null
     */
    private $rulesChannelId;

    /**
     * @var bool|null
     */
    private $large;

    /**
     * @var bool|null
     */
    private $unavailable;

    /**
     * @var int|null
     */
    private $memberCount;

    /**
     * @var User[]|null
     */
    private $members;

    /**
     * @var Channel[]|null
     */
    private $channels;

    /**
     * @var int|null
     */
    private $maxPresences;

    /**
     * @var int|null
     */
    private $maxMembers;

    /**
     * @var string|null
     */
    private $vanityUrlCode;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $banner;

    /**
     * @var int|null
     */
    private $premiumTier;

    /**
     * @var int|null
     */
    private $premiumSubscriptionCount;

    /**
     * @var string|null
     */
    private $preferredLocale;

    /**
     * @var string|null
     */
    private $publicUpdatesChannelId;

    /**
     * @var int|null
     */
    private $max_videoChannelUsers;

    /**
     * @var int|null
     */
    private $approximateMemberCount;

    /**
     * @var int|null
     */
    private $approximatePresenceCount;

    /**
     * @return string|null
     */
    public function getSplash(): ?string
    {
        return $this->splash;
    }

    /**
     * @param string|null $splash
     * @return $this
     */
    public function setSplash(?string $splash): self
    {
        $this->splash = $splash;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDiscoverySplash(): ?string
    {
        return $this->discoverySplash;
    }

    /**
     * @param string|null $discoverySplash
     * @return $this
     */
    public function setDiscoverySplash(?string $discoverySplash): self
    {
        $this->discoverySplash = $discoverySplash;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOwnerId(): ?string
    {
        return $this->ownerId;
    }

    /**
     * @param string|null $ownerId
     * @return $this
     */
    public function setOwnerId(?string $ownerId): self
    {
        $this->ownerId = $ownerId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAfkChannelId(): ?string
    {
        return $this->afkChannelId;
    }

    /**
     * @param string|null $afkChannelId
     * @return $this
     */
    public function setAfkChannelId(?string $afkChannelId): self
    {
        $this->afkChannelId = $afkChannelId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getAfkTimeout(): ?int
    {
        return $this->afkTimeout;
    }

    /**
     * @param int|null $afkTimeout
     * @return $this
     */
    public function setAfkTimeout(?int $afkTimeout): self
    {
        $this->afkTimeout = $afkTimeout;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getEmbedEnabled(): ?bool
    {
        return $this->embedEnabled;
    }

    /**
     * @param bool|null $embedEnabled
     * @return $this
     */
    public function setEmbedEnabled(?bool $embedEnabled): self
    {
        $this->embedEnabled = $embedEnabled;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmbedChannelId(): ?string
    {
        return $this->embedChannelId;
    }

    /**
     * @param string|null $embedChannelId
     * @return $this
     */
    public function setEmbedChannelId(?string $embedChannelId): self
    {
        $this->embedChannelId = $embedChannelId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVerificationLevel(): ?int
    {
        return $this->verificationLevel;
    }

    /**
     * @param int|null $verificationLevel
     * @return $this
     */
    public function setVerificationLevel(?int $verificationLevel): self
    {
        $this->verificationLevel = $verificationLevel;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getDefaultMessageNotifications(): ?int
    {
        return $this->defaultMessageNotifications;
    }

    /**
     * @param int|null $defaultMessageNotifications
     * @return $this
     */
    public function setDefaultMessageNotifications(?int $defaultMessageNotifications): self
    {
        $this->defaultMessageNotifications = $defaultMessageNotifications;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getExplicitContentFilter(): ?int
    {
        return $this->explicitContentFilter;
    }

    /**
     * @param int|null $explicitContentFilter
     * @return $this
     */
    public function setExplicitContentFilter(?int $explicitContentFilter): self
    {
        $this->explicitContentFilter = $explicitContentFilter;
        return $this;
    }

    /**
     * @return Role[]|null
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param Role[]|null $roles
     * @return $this
     */
    public function setRoles(?array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * @return Emoji|null
     */
    public function getEmojis(): ?Emoji
    {
        return $this->emojis;
    }

    /**
     * @param Emoji|null $emojis
     * @return $this
     */
    public function setEmojis(?Emoji $emojis): self
    {
        $this->emojis = $emojis;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMfaLevel(): ?int
    {
        return $this->mfaLevel;
    }

    /**
     * @param int|null $mfaLevel
     * @return $this
     */
    public function setMfaLevel(?int $mfaLevel): self
    {
        $this->mfaLevel = $mfaLevel;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getWidgetEnabled(): ?bool
    {
        return $this->widgetEnabled;
    }

    /**
     * @param bool|null $widgetEnabled
     * @return $this
     */
    public function setWidgetEnabled(?bool $widgetEnabled): self
    {
        $this->widgetEnabled = $widgetEnabled;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getWidgetChannelId(): ?string
    {
        return $this->widgetChannelId;
    }

    /**
     * @param string|null $widgetChannelId
     * @return $this
     */
    public function setWidgetChannelId(?string $widgetChannelId): self
    {
        $this->widgetChannelId = $widgetChannelId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSystemChannelId(): ?string
    {
        return $this->systemChannelId;
    }

    /**
     * @param string|null $systemChannelId
     * @return $this
     */
    public function setSystemChannelId(?string $systemChannelId): self
    {
        $this->systemChannelId = $systemChannelId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSystemChannelFlags(): ?int
    {
        return $this->systemChannelFlags;
    }

    /**
     * @param int|null $systemChannelFlags
     * @return $this
     */
    public function setSystemChannelFlags(?int $systemChannelFlags): self
    {
        $this->systemChannelFlags = $systemChannelFlags;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRulesChannelId(): ?string
    {
        return $this->rulesChannelId;
    }

    /**
     * @param string|null $rulesChannelId
     * @return $this
     */
    public function setRulesChannelId(?string $rulesChannelId): self
    {
        $this->rulesChannelId = $rulesChannelId;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getLarge(): ?bool
    {
        return $this->large;
    }

    /**
     * @param bool|null $large
     * @return $this
     */
    public function setLarge(?bool $large): self
    {
        $this->large = $large;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getUnavailable(): ?bool
    {
        return $this->unavailable;
    }

    /**
     * @param bool|null $unavailable
     * @return $this
     */
    public function setUnavailable(?bool $unavailable): self
    {
        $this->unavailable = $unavailable;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMemberCount(): ?int
    {
        return $this->memberCount;
    }

    /**
     * @param int|null $memberCount
     * @return $this
     */
    public function setMemberCount(?int $memberCount): self
    {
        $this->memberCount = $memberCount;
        return $this;
    }

    /**
     * @return User[]|null
     */
    public function getMembers(): ?array
    {
        return $this->members;
    }

    /**
     * @param User[]|null $members
     * @return $this
     */
    public function setMembers(?array $members): self
    {
        $this->members = $members;
        return $this;
    }

    /**
     * @return Channel[]|null
     */
    public function getChannels(): ?array
    {
        return $this->channels;
    }

    /**
     * @param Channel[]|null $channels
     * @return $this
     */
    public function setChannels(?array $channels): self
    {
        $this->channels = $channels;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxPresences(): ?int
    {
        return $this->maxPresences;
    }

    /**
     * @param int|null $maxPresences
     * @return $this
     */
    public function setMaxPresences(?int $maxPresences): self
    {
        $this->maxPresences = $maxPresences;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxMembers(): ?int
    {
        return $this->maxMembers;
    }

    /**
     * @param int|null $maxMembers
     * @return $this
     */
    public function setMaxMembers(?int $maxMembers): self
    {
        $this->maxMembers = $maxMembers;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVanityUrlCode(): ?string
    {
        return $this->vanityUrlCode;
    }

    /**
     * @param string|null $vanityUrlCode
     * @return $this
     */
    public function setVanityUrlCode(?string $vanityUrlCode): self
    {
        $this->vanityUrlCode = $vanityUrlCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getBanner(): ?string
    {
        return $this->banner;
    }

    /**
     * @param string|null $banner
     * @return $this
     */
    public function setBanner(?string $banner): self
    {
        $this->banner = $banner;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPremiumTier(): ?int
    {
        return $this->premiumTier;
    }

    /**
     * @param int|null $premiumTier
     * @return $this
     */
    public function setPremiumTier(?int $premiumTier): self
    {
        $this->premiumTier = $premiumTier;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPremiumSubscriptionCount(): ?int
    {
        return $this->premiumSubscriptionCount;
    }

    /**
     * @param int|null $premiumSubscriptionCount
     * @return $this
     */
    public function setPremiumSubscriptionCount(?int $premiumSubscriptionCount): self
    {
        $this->premiumSubscriptionCount = $premiumSubscriptionCount;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPreferredLocale(): ?string
    {
        return $this->preferredLocale;
    }

    /**
     * @param string|null $preferredLocale
     * @return $this
     */
    public function setPreferredLocale(?string $preferredLocale): self
    {
        $this->preferredLocale = $preferredLocale;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPublicUpdatesChannelId(): ?string
    {
        return $this->publicUpdatesChannelId;
    }

    /**
     * @param string|null $publicUpdatesChannelId
     * @return $this
     */
    public function setPublicUpdatesChannelId(?string $publicUpdatesChannelId): self
    {
        $this->publicUpdatesChannelId = $publicUpdatesChannelId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxVideoChannelUsers(): ?int
    {
        return $this->max_videoChannelUsers;
    }

    /**
     * @param int|null $max_videoChannelUsers
     * @return $this
     */
    public function setMaxVideoChannelUsers(?int $max_videoChannelUsers): self
    {
        $this->max_videoChannelUsers = $max_videoChannelUsers;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getApproximateMemberCount(): ?int
    {
        return $this->approximateMemberCount;
    }

    /**
     * @param int|null $approximateMemberCount
     * @return $this
     */
    public function setApproximateMemberCount(?int $approximateMemberCount): self
    {
        $this->approximateMemberCount = $approximateMemberCount;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getApproximatePresenceCount(): ?int
    {
        return $this->approximatePresenceCount;
    }

    /**
     * @param int|null $approximatePresenceCount
     * @return $this
     */
    public function setApproximatePresenceCount(?int $approximatePresenceCount): self
    {
        $this->approximatePresenceCount = $approximatePresenceCount;
        return $this;
    }

}