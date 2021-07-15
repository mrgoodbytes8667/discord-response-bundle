<?php


namespace Bytes\DiscordResponseBundle\Routing;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ImageBuilderInterface;
use Bytes\DiscordResponseBundle\Objects\User;
use function Symfony\Component\String\u;

/**
 * Class DiscordImageUrlBuilder
 * @package Bytes\DiscordResponseBundle\Routing
 *
 * @link https://discord.com/developers/docs/reference#image-formatting
 *
 * @todo Refactor on issue #15
 */
class DiscordImageUrlBuilder
{
    /**
     * @param User $user
     * @param string $extension
     * @return string|null
     */
    public static function getAvatarUrl(ImageBuilderInterface $user, string $extension = 'png'): ?string
    {
        $parts = $user->getImageBuilderParts();
        $icon = $parts['userAvatar'];
        $url = u(implode('/', [
            'https://cdn.discordapp.com/avatars',
            $parts['userId'],
            $parts['userAvatar']
        ]));

        $extension = self::getExtension($extension, $icon);

        return $url->append('.')->append($extension);
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
     * @param string $extension
     * @return string|null
     */
    public static function getIconUrl(ImageBuilderInterface|string $guildId, ?string $icon = null, string $extension = 'png'): ?string
    {
        if($guildId instanceof ImageBuilderInterface)
        {
            $parts = $guildId->getImageBuilderParts();
            $guildId = $parts['guildId'];
            $icon = $parts['guildIcon'];
        }
        if (empty($guildId) || empty($icon)) {
            return null;
        }

        $extension = self::getExtension($extension, $icon);

        return implode('/', [
            'https://cdn.discordapp.com/icons',
            $guildId,
            $icon . '.' . $extension
        ]);
    }

    /**
     * @param User|string $user
     * @return string
     */
    public static function getDefaultAvatarUrl(User|string $user): string
    {
        return u('https://cdn.discordapp.com/embed/avatars/')
            ->append(($user instanceof User ? $user->getDiscriminator() : $user) % 5)
            ->append('.png');
    }
}