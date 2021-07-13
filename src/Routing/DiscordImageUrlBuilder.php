<?php


namespace Bytes\DiscordResponseBundle\Routing;


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
     * @return string|null
     */
    public static function getAvatarUrl(User $user): ?string
    {
        $url = u(implode('/', [
            'https://cdn.discordapp.com/avatars',
            $user->getId(),
            $user->getAvatar()
        ]));

        if(u($user->getAvatar())->startsWith('a_')) {
            $url .= '.gif';
        } else {
            $url .= '.png';
        }

        return $url;
    }

    /**
     * Create the fully resolvable Url for the guild's icon
     * @param string $guildId
     * @param string $icon
     * @param string $extension
     * @return string|null
     */
    public static function getIconUrl(string $guildId, string $icon, string $extension = 'png'): ?string
    {
        if (empty($guildId) || empty($icon)) {
            return null;
        }
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