<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\TokenTrait;

/**
 * Class OAuthWebhookResponse
 * @package Bytes\DiscordResponseBundle\Objects
 */
class OAuthWebhookResponse implements ErrorInterface
{
    use TokenTrait, ErrorTrait;



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