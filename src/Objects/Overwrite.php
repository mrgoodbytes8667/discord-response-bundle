<?php


namespace Bytes\DiscordResponseBundle\Objects;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ErrorInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\IdInterface;
use Bytes\DiscordResponseBundle\Objects\Traits\ErrorTrait;
use Bytes\DiscordResponseBundle\Objects\Traits\IDTrait;

/**
 * Class Overwrite
 * @package Bytes\DiscordResponseBundle\Objects
 *
 * @link https://discord.com/developers/docs/resources/channel#overwrite-object
 *
 * @property string $id Role or User ID
 *
 * @version v0.7.3 As of 2021-03-24 Discord Documentation
 */
class Overwrite implements ErrorInterface, IdInterface
{
    use IDTrait, ErrorTrait;

    /**
     * v6: either "role" or "member"
     * v8: either 0 (role) or 1 (member)
     * @var string|int|null
     */
    private $type;

    /**
     * v6: permission bit set (int)
     * v8: permission bit set (string)
     * @var string|int|null
     */
    private $allow;

    /**
     * v6: permission bit set (int)
     * v8: permission bit set (string)
     * @var string|int|null
     */
    private $deny;

    /**
     * v6: permission bit set
     * @var string|null
     * @deprecated v0.7.3 Only applicable for v6 and will be removed
     */
    private $allowNew;

    /**
     * v6: permission bit set
     * @var string|null
     * @deprecated v0.7.3 Only applicable for v6 and will be removed
     */
    private $denyNew;

    /**
     * @return int|string|null
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int|string|null $type
     * @return $this
     */
    public function setType($type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return int|string|null
     */
    public function getAllow()
    {
        return $this->allow;
    }

    /**
     * @param int|string|null $allow
     * @return $this
     */
    public function setAllow($allow): self
    {
        $this->allow = $allow;
        return $this;
    }

    /**
     * @return int|string|null
     */
    public function getDeny()
    {
        return $this->deny;
    }

    /**
     * @param int|string|null $deny
     * @return $this
     */
    public function setDeny($deny): self
    {
        $this->deny = $deny;
        return $this;
    }

    /**
     * @return string|null
     * @deprecated v0.7.3 Only applicable for v6 and will be removed
     */
    public function getAllowNew(): ?string
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.7.3', 'The "%s()" method has been deprecated by Discord and is not present in v8.', __METHOD__);
        return $this->allowNew;
    }

    /**
     * @param string|null $allowNew
     * @return $this
     * @deprecated v0.7.3 Only applicable for v6 and will be removed
     */
    public function setAllowNew(?string $allowNew): self
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.7.3', 'The "%s()" method has been deprecated by Discord and is not present in v8.', __METHOD__);
        $this->allowNew = $allowNew;
        return $this;
    }

    /**
     * @return string|null
     * @deprecated v0.7.3 Only applicable for v6 and will be removed
     */
    public function getDenyNew(): ?string
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.7.3', 'The "%s()" method has been deprecated by Discord and is not present in v8.', __METHOD__);
        return $this->denyNew;
    }

    /**
     * @param string|null $denyNew
     * @return $this
     * @deprecated v0.7.3 Only applicable for v6 and will be removed
     */
    public function setDenyNew(?string $denyNew): self
    {
        trigger_deprecation('mrgoodbytes8667/discord-response-bundle', '0.7.3', 'The "%s()" method has been deprecated by Discord and is not present in v8.', __METHOD__);
        $this->denyNew = $denyNew;
        return $this;
    }


}