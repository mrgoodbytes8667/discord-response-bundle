<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ImageBuilderInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;
use Bytes\ResponseBundle\Interfaces\IdInterface;
use Bytes\ResponseBundle\Interfaces\ProfileImageInterface;
use Bytes\ResponseBundle\Interfaces\UserIdInterface;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Class User
 * @package Bytes\DiscordResponseBundle\Objects
 */
class User implements ErrorInterface, IdInterface, UserIdInterface, ImageBuilderInterface, ProfileImageInterface
{
    use IDTrait, ErrorTrait;
    
    /**
     * the user's username, not unique across the platform
     * @var string|null
     */
    private $username;

    /**
     * the user's 4-digit discord-tag
     * @var string|null
     */
    private $discriminator;
    
    /**
     * the user's avatar hash
     * @var string|null
     */
    private $avatar;
    
    /**
     * @var bool|null
     */
    private $bot;
    
    /**
     * @var bool|null
     */
    private $system;
    
    /**
     * @var bool|null
     */
    #[SerializedName('mfa_enabled')]
    private $mfaEnabled;
    
    /**
     * @var string|null
     */
    private $locale;
    
    /**
     * @var bool|null
     */
    private $verified;
    
    /**
     * @var string|null
     */
    private $email;
    
    /**
     * @var int|null
     */
    private $flags;
    
    /**
     * @var int|null
     */
    private $premiumType;
    
    /**
     * @var int|null
     */
    private $publicFlags;

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @param string|null $username
     * @return $this
     */
    public function setUsername(?string $username): self
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDiscriminator(): ?string
    {
        return $this->discriminator;
    }

    /**
     * @param string|null $discriminator
     * @return $this
     */
    public function setDiscriminator(?string $discriminator): self
    {
        $this->discriminator = $discriminator;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    /**
     * @param string|null $avatar
     * @return $this
     */
    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getBot(): ?bool
    {
        return $this->bot;
    }

    /**
     * @param bool|null $bot
     * @return $this
     */
    public function setBot(?bool $bot): self
    {
        $this->bot = $bot;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSystem(): ?bool
    {
        return $this->system;
    }

    /**
     * @param bool|null $system
     * @return $this
     */
    public function setSystem(?bool $system): self
    {
        $this->system = $system;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getMfaEnabled(): ?bool
    {
        return $this->mfaEnabled;
    }

    /**
     * @param bool|null $mfaEnabled
     * @return $this
     */
    public function setMfaEnabled(?bool $mfaEnabled): self
    {
        $this->mfaEnabled = $mfaEnabled;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @param string|null $locale
     * @return $this
     */
    public function setLocale(?string $locale): self
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getVerified(): ?bool
    {
        return $this->verified;
    }

    /**
     * @param bool|null $verified
     * @return $this
     */
    public function setVerified(?bool $verified): self
    {
        $this->verified = $verified;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return $this
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFlags(): ?int
    {
        return $this->flags;
    }

    /**
     * @param int|null $flags
     * @return $this
     */
    public function setFlags(?int $flags): self
    {
        $this->flags = $flags;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPremiumType(): ?int
    {
        return $this->premiumType;
    }

    /**
     * @param int|null $premiumType
     * @return $this
     */
    public function setPremiumType(?int $premiumType): self
    {
        $this->premiumType = $premiumType;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPublicFlags(): ?int
    {
        return $this->publicFlags;
    }

    /**
     * @param int|null $publicFlags
     * @return $this
     */
    public function setPublicFlags(?int $publicFlags): self
    {
        $this->publicFlags = $publicFlags;
        return $this;
    }

    /**
     * id of the user
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->id;
    }

    /**
     * @return array
     */
    #[ArrayShape(['userId' => "null|string", 'userAvatar' => "null|string", 'userDiscriminator' => "null|string"])]
    public function getImageBuilderParts(): array
    {
        return [
            'userId' => $this->id,
            'userAvatar' => $this->avatar,
            'userDiscriminator' => $this->discriminator,
        ];
    }

    /**
     * Return the profile image
     * @param int|null $width
     * @param int|null $height
     * @return string|null
     */
    #[Ignore]
    public function getProfileImage(?int $width = null, ?int $height = null): ?string
    {
        return $this->getAvatar();
    }
}