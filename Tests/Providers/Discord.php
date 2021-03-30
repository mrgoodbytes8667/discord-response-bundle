<?php


namespace Bytes\DiscordResponseBundle\Tests\Providers;


use Faker\Generator;
use Faker\Provider\Base;
use Faker\Provider\Internet;

/**
 * Class Discord
 * @package Bytes\DiscordResponseBundle\Tests\Providers
 *
 * @property Generator|Internet $generator
 */
class Discord extends Base
{
    /**
     * @param bool $isGif
     * @return string
     */
    public function iconHash(bool $isGif = false)
    {
        $output = '';
        foreach (range(1, 6) as $index) {
            $output .= str_pad(dechex(self::numberBetween(1, 16777215)), 6, '0', STR_PAD_LEFT);
        }
        return ($isGif ? 'a_' : '') . substr($output, 0, 32);
    }

    /**
     * @return string
     */
    public function guildId()
    {
        return self::snowflake(7);
    }

    /**
     * @param int|null $prepend
     * @return string
     */
    public function snowflake(?int $prepend = null)
    {
        $output = '';
        if (!is_null($prepend)) {
            $output = (string)$prepend;
        }
        foreach (range(1, 3) as $index) {
            $output .= (string)$this->generator->numberBetween(100000, 999999);
        }
        return substr($output, 0, 18);
    }

    /**
     * @return string
     */
    public function roleId()
    {
        return self::snowflake(8);
    }

    /**
     * @return string
     */
    public function userId()
    {
        return self::snowflake(2);
    }

    /**
     * @return string
     */
    public function channelId()
    {
        return self::snowflake(2);
    }

    /**
     * @return string
     */
    public function messageId()
    {
        return self::snowflake(8);
    }

    /**
     * @return string
     */
    public function guildName()
    {
        return $this->generator->text(100);
    }

    /**
     * @return bool
     */
    public function owner()
    {
        return $this->generator->boolean();
    }

    /**
     * @param int $maxFeatures
     * @return string[]
     */
    public function features(int $maxFeatures = 3)
    {
        return $this->generator->words($maxFeatures);
    }

    /**
     * [username]#[discriminator]
     * @return string
     */
    public function userNameDiscriminator()
    {
        return $this->generator->userName() . '#' . self::discriminator();
    }

    /**
     * Zero-padded four digit number
     * @return string
     */
    public function discriminator()
    {
        return str_pad($this->generator->numberBetween(0, 9999), 4, '0', STR_PAD_LEFT);
    }

    /**
     * @return string
     */
    public function refreshToken()
    {
        return self::accessToken();
    }

    /**
     * @return string
     */
    public function accessToken()
    {
        $output = '';
        foreach (range(1, 30) as $i) {
            $output .= $this->generator->randomElement(self::getAlphanumerics());
        }
        return $output;
    }

    /**
     * @return string[]
     */
    public static function getAlphanumerics()
    {
        return str_split('123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz');
    }

    /**
     * @return string
     */
    public function tokenType()
    {
        return $this->generator->randomElement(['Bot', 'Bearer']);
    }
}