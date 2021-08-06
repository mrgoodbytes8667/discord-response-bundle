<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\ResponseBundle\Token\AccessTokenTrait;

trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.10.0', 'Using "\Bytes\DiscordResponseBundle\Objects\OAuthWebhookResponse" is deprecated.');

/**
 * Class OAuthWebhookResponse
 * @package Bytes\DiscordResponseBundle\Objects
 *
 * @deprecated since 0.10.0
 */
class OAuthWebhookResponse implements ErrorInterface
{
    use AccessTokenTrait, ErrorTrait;

    /**
     * @var Webhook|null
     */
    private $webhook;

    /**
     * @return Webhook|null
     */
    public function getWebhook(): ?Webhook
    {
        return $this->webhook;
    }

    /**
     * @param Webhook|null $webhook
     * @return OAuthWebhookResponse
     */
    public function setWebhook(?Webhook $webhook): OAuthWebhookResponse
    {
        $this->webhook = $webhook;
        return $this;
    }
}