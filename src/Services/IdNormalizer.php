<?php


namespace Bytes\DiscordResponseBundle\Services;


use Bytes\DiscordResponseBundle\Objects\Interfaces\ApplicationCommandInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\ChannelIdInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\GuildIdInterface;
use Bytes\DiscordResponseBundle\Objects\Interfaces\MessageInterface;
use Bytes\DiscordResponseBundle\Objects\Message;
use Bytes\ResponseBundle\Objects\IdNormalizer as BaseIdNormalizer;
use InvalidArgumentException;
use function Symfony\Component\String\u;

/**
 * Class IdNormalizer
 * @package Bytes\DiscordResponseBundle\Services
 *
 * @method static string normalizeGuildIdArgument($object, string $message, bool $allowNull = false, bool $recursivelyNormalize = true) Return getGuildId() on an object that implements GuildIdInterface, getId() on object that implements IdInterface, or the string value if $object is a string.
 * @method static string normalizeChannelIdArgument($object, string $message, bool $allowNull = false, bool $recursivelyNormalize = true) Return getChannelId() on an object that implements ChannelIdInterface, getId() on object that implements IdInterface, or the string value if $object is a string.
 * @method static string normalizeCommandIdArgument($object, string $message, bool $allowNull = false, bool $recursivelyNormalize = true) Return getCommandId() on an object that implements ApplicationCommandInterface, getId() on object that implements IdInterface, or the string value if $object is a string.
 */
class IdNormalizer extends BaseIdNormalizer
{
    /**
     * is triggered when invoking inaccessible methods in an object context.
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @link https://php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.methods
     */
    public static function __callStatic($name, $arguments)
    {
        $name = u($name);
        if ($name->startsWith('normalize') && $name->endsWith('IdArgument') && $name != 'normalizeIdArgument'
            && (count($arguments) === 2 || count($arguments) === 3 || count($arguments) === 4) &&
            in_array($name->afterLast('normalize')->beforeLast('Argument')->camel()->toString(), ['guildId', 'channelId', 'commandId'])) {
            $object = array_shift($arguments);
            $message = array_shift($arguments);
            if (count($arguments) >= 1) {
                $allowNull = array_shift($arguments);
            } else {
                $allowNull = false;
            }
            
            if (count($arguments) >= 1) {
                $recursivelyNormalize = array_shift($arguments);
            } else {
                $recursivelyNormalize = true;
            }
            
            $to = $name->afterLast('normalize')->beforeLast('Argument')->camel()->toString();
            switch ($to) {
                case 'guildId':
                    $class = GuildIdInterface::class;
                    $method = 'getGuildId';
                    break;
                case 'channelId':
                    $class = ChannelIdInterface::class;
                    $method = 'getChannelId';
                    break;
                case 'commandId':
                    $class = ApplicationCommandInterface::class;
                    $method = 'getCommandId';
                    break;
            }

            if (is_null($object)) {
                if ($allowNull) {
                    return null;
                }
                
                throw new InvalidArgumentException($message);
            }
            
            if (is_int($object))
            {
                return (string)$object;
            }
            
            if (is_string($object)) {
                if (empty($object)) {
                    if ($allowNull) {
                        return null;
                    } else {
                        throw new InvalidArgumentException($message);
                    }
                }
                
                return $object;
            }
            
            if (is_subclass_of($object, $class) || (is_object($object) && method_exists($object, $method))) {
                $id = $object->$method();
                if (empty($id)) {
                    if ($recursivelyNormalize) {
                        return self::normalizeIdArgument($object, $message, $allowNull);
                    } else {
                        if ($allowNull) {
                            return null;
                        }
                        
                        throw new InvalidArgumentException($message);
                    }
                }
                
                return $id;
            }
            
            if ($recursivelyNormalize) {
                return self::normalizeIdArgument($object, $message, $allowNull);
            } else {
                return null;
            }
        }
    }

    /**
     * @param MessageInterface $message
     * @param string $channelIdMessage
     * @param string $messageIdMessage
     * @return array{channelId: string, messageId: string}
     */
    public static function normalizeMessageIntoIds(MessageInterface $message, string $channelIdMessage, string $messageIdMessage)
    {
        $channelId = $message->getChannelID();
        if (empty($channelId)) {
            throw new InvalidArgumentException($channelIdMessage);
        }
        
        $messageId = $message->getMessageId();
        if (empty($messageId)) {
            throw new InvalidArgumentException($messageIdMessage);
        }

        return [
            'channelId' => $channelId,
            'messageId' => $messageId,
        ];
    }
}