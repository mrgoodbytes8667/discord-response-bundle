<?php


namespace Bytes\DiscordResponseBundle\Objects;


use App\Entity\Discord as DiscordEntity;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ChannelIdInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ChannelIdTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Illuminate\Support\Str;

/**
 * Class Webhook
 * @package Bytes\DiscordResponseBundle\Objects
 */
class Webhook implements ErrorInterface, ChannelIdInterface
{
    use ErrorTrait, ChannelIdTrait;

    /**
     *
     */
    const DISCORD_WEBHOOK_EXECUTE_URL = 'https://discord.com/api/webhooks';

    /**
     *
     */
    const DISCORD_WEBHOOK_GET_URL = 'https://discord.com/api/v6/webhooks';

    /**
     * @var int|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $avatar;

    /**
     * @var string|null
     */
    private $guildID;

    /**
     * @var string|null
     */
    private $token;

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param int|null $type
     * @return Webhook
     */
    public function setType(?int $type): Webhook
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return Webhook
     */
    public function setId(?string $id): Webhook
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Webhook
     */
    public function setName(?string $name): Webhook
    {
        $this->name = $name;
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
     * @return Webhook
     */
    public function setAvatar(?string $avatar): Webhook
    {
        $this->avatar = $avatar;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGuildID(): ?string
    {
        return $this->guildID;
    }

    /**
     * @param string|null $guildID
     * @return Webhook
     */
    public function setGuildID(?string $guildID): Webhook
    {
        $this->guildID = $guildID;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string|null $token
     * @return Webhook
     */
    public function setToken(?string $token): Webhook
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @param DiscordEntity $entity
     *
     * @return DiscordEntity
     */
    public function updateEntity(DiscordEntity $entity)
    {
        $entity->setWebhookType($this->getType());
        $entity->setWebhookIDAndToken($this->getId(), $this->getToken());
        $entity->setWebhookUsername($this->getName());
        $entity->setWebhookChannelID($this->getChannelID());
        $entity->setWebhookGuildID($this->getGuildID());

        return $entity;
    }

    /**
     * @param string $url
     * @return static
     */
    public static function createFromURL(string $url): self
    {
        $return = new static();
        $return->setId(static::getIDFromURL($url));
        $return->setToken(static::getTokenFromURL($url));
        return $return;
    }

    /**
     * @param string $url
     * @return string
     */
    public static function getIDFromURL(string $url)
    {
        static::isValidURL($url);
        return Str::of($url)->substr(strlen(static::DISCORD_WEBHOOK_EXECUTE_URL) + 1)->explode('/')[0];

    }

    /**
     * @param string $url
     * @return string
     */
    public static function getTokenFromURL(string $url)
    {
        static::isValidURL($url);
        return Str::of($url)->substr(strlen(static::DISCORD_WEBHOOK_EXECUTE_URL) + 1)->explode('/')[1];

    }

    /**
     * @param string $url
     * @return bool
     */
    public static function isValidURL(string $url)
    {
        if(!Str::startsWith($url, static::DISCORD_WEBHOOK_EXECUTE_URL))
        {
            throw new \InvalidArgumentException('Supplied URL is not a valid Discord Webhook URL');
        }

        return true;
    }

    /**
     * @param string $id
     * @param string $token
     * @param string|null $base
     *
     * @return string
     */
    public static function getDiscordWebhookURLFromIDAndToken(string $id, string $token, string $base = null)
    {
        return implode('/', [$base ?? static::DISCORD_WEBHOOK_EXECUTE_URL, $id, $token]);
    }
}