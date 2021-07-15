<?php


namespace Bytes\DiscordResponseBundle\Routing;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ImageBuilderInterface;
use Exception;
use function Symfony\Component\String\u;

/**
 * Class DiscordImageUrlBuilder
 * @package Bytes\DiscordResponseBundle\Routing
 *
 * @link https://discord.com/developers/docs/reference#image-formatting
 */
class DiscordImageUrlBuilder
{
    /**
     * @param ImageBuilderInterface|string $user
     * @param string|null $avatar
     * @param string $extension = ['jpg', 'webp', 'gif', 'png'][$any]
     * @return string|null
     */
    public static function getAvatarUrl(ImageBuilderInterface|string $user, ?string $avatar = null, string $extension = 'png'): ?string
    {
        if($user instanceof ImageBuilderInterface)
        {
            $parts = $user->getImageBuilderParts();
            if(!isset($parts['userId']) || !isset($parts['userAvatar']))
            {
                return null;
            }
            $user = $parts['userId'];
            $avatar = $parts['userAvatar'];
        }
        if (empty($user) || empty($avatar)) {
            return null;
        }

        $extension = self::getExtension($extension, $avatar);

        return static::buildUrl(['avatars', $user, $avatar . '.' . $extension]);
    }

    /**
     * @param string $extension
     * @param string $icon
     * @return string
     */
    private static function getExtension(string $extension, string $icon): string
    {
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

        return $extension;
    }

    /**
     * Create the fully resolvable Url for the guild's icon
     * @param ImageBuilderInterface|string $guildId
     * @param string|null $icon
     * @param string $extension = ['jpg', 'webp', 'gif', 'png'][$any]
     * @return string|null
     */
    public static function getIconUrl(ImageBuilderInterface|string $guildId, ?string $icon = null, string $extension = 'png'): ?string
    {
        if($guildId instanceof ImageBuilderInterface)
        {
            $parts = $guildId->getImageBuilderParts();
            if(!isset($parts['guildId']) || !isset($parts['guildIcon']))
            {
                return null;
            }
            $guildId = $parts['guildId'];
            $icon = $parts['guildIcon'];
        }
        if (empty($guildId) || empty($icon)) {
            return null;
        }

        $extension = self::getExtension($extension, $icon);

        return static::buildUrl(['icons', $guildId,$icon . '.' . $extension]);
    }

    /**
     * @param string[] $parts
     * @return string
     */
    private static function buildUrl(array $parts): string
    {
        return 'https://cdn.discordapp.com/' . implode('/', $parts);
    }

    /**
     * @param ImageBuilderInterface|string $user
     * @return string|null
     * @throws Exception
     */
    public static function getDefaultAvatarUrl(ImageBuilderInterface|string $user): ?string
    {
        if($user instanceof ImageBuilderInterface)
        {
            $parts = $user->getImageBuilderParts();
            if(isset($parts['userDiscriminator']))
            {
                $user = $parts['userDiscriminator'];
            } elseif (isset($parts['guildId']))
            {
                $user = $parts['guildId'];
            } else {
                $user = random_int(6, 10);
            }
        }
        return static::buildUrl(['embed', 'avatars', ($user % 5) . '.png']);
    }
}