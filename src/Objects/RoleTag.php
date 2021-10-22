<?php

namespace Bytes\DiscordResponseBundle\Objects;

/**
 * @link https://discord.com/developers/docs/topics/permissions#role-object-role-tags-structure
 *
 * @version v0.12.2 As of 2021-10-22 Discord Documentation
 */
class RoleTag
{
    /**
     * the id of the bot this role belongs to
     * @var string|null
     */
    private $bot_id;

    /**
     * the id of the integration this role belongs to
     * @var string|null
     */
    private $integration_id;

    /**
     * whether this is the guild's premium subscriber role
     */
    private $premium_subscriber;

    /**
     * @return string|null
     */
    public function getBotId(): ?string
    {
        return $this->bot_id;
    }

    /**
     * @param string|null $bot_id
     * @return $this
     */
    public function setBotId(?string $bot_id): self
    {
        $this->bot_id = $bot_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getIntegrationId(): ?string
    {
        return $this->integration_id;
    }

    /**
     * @param string|null $integration_id
     * @return $this
     */
    public function setIntegrationId(?string $integration_id): self
    {
        $this->integration_id = $integration_id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPremiumSubscriber()
    {
        return $this->premium_subscriber;
    }

    /**
     * @param $premium_subscriber
     * @return $this
     */
    public function setPremiumSubscriber($premium_subscriber): self
    {
        $this->premium_subscriber = $premium_subscriber;
        return $this;
    }
}