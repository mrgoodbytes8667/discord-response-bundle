<?php


namespace Bytes\DiscordResponseBundle\Objects\Message;

use Illuminate\Support\Arr;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;


/**
 * Class AllowedMentions
 * @package Bytes\DiscordResponseBundle\Objects\Message
 *
 * Arrays must be initialized to null or the PropertyAccessor component will fail to serialize.
 * The property "AllowedMentions::$roles" is not readable because it is typed "array". You should initialize it or
 * declare a default value instead.
 */
class AllowedMentions
{
    /**
     * @var string[]|null
     * @Assert\Unique()
     */
    private ?array $parse = null;

    /**
     * @var string[]|null
     */
    private ?array $roles = null;

    /**
     * @var array|null
     */
    private ?array $users = null;

    /**
     * @return string[]|null
     */
    public function getParse(): ?array
    {
        return $this->parse;
    }

    /**
     * @param string[]|null $parse
     * @return $this
     */
    public function setParse(?array $parse): self
    {
        $this->parse = $parse;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    /**
     * @param mixed|null $roles
     * @return $this
     */
    public function setRoles($roles): self
    {
        $this->roles = Arr::wrap($roles);
        return $this;
    }

    /**
     * @return array|null
     */
    public function getUsers(): ?array
    {
        return $this->users;
    }

    /**
     * @param array|null $users
     * @return $this
     */
    public function setUsers(?array $users): self
    {
        $this->users = $users;
        return $this;
    }

    /**
     * @param mixed|null $roles
     * @param array|null $parse
     * @return static
     */
    public static function create($roles = null, ?array $parse = null)
    {
        $hasRoles = !empty($roles);
        $hasParse = !empty($parse);

        $allowedMentions = new static();
        if (!$hasRoles && !$hasParse) {
            $allowedMentions->setParse([]);
        } else {
            if ($hasParse) {
                $allowedMentions->setParse($parse);
            }
            if ($hasRoles) {
                $allowedMentions->setRoles($roles);
            }
        }
        return $allowedMentions;
    }

    /**
     * @param mixed $roles
     * @return static
     */
    public static function createForRoles($roles)
    {
        return static::create(Arr::wrap($roles));
    }

    /**
     * @return static
     */
    public static function createForEveryone()
    {
        return static::create(null, ['everyone']);
    }

    /**
     * @Assert\Callback
     *
     * @param ExecutionContextInterface $context
     * @param mixed|null $payload Ignored
     */
    public function validate(ExecutionContextInterface $context, $payload)
    {
        $parses = $this->getParse();
        foreach ($parses as $parse)
        {
            switch ($parse)
            {
                case 'everyone':
                    break;
                case 'roles':
                    if(!empty($this->getRoles()))
                    {
                        $context->buildViolation("Parse cannot contain 'roles' when the roles field is populated.")
                            ->atPath('parse')
                            ->addViolation()
                        ;
                    }
                    break;
                case 'users':
                    if(!empty($this->getUsers()))
                    {
                        $context->buildViolation("Parse cannot contain 'users' when the users field is populated.")
                            ->atPath('parse')
                            ->addViolation()
                        ;
                    }
                    break;
                default:
                    $context->buildViolation("Parse can only contain 'everyone', 'roles', and 'users'.")
                        ->atPath('parse')
                        ->addViolation()
                    ;
            }
        }
    }
}