<?php


namespace Bytes\DiscordResponseBundle\Exceptions;


use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Throwable;

/**
 * Class DiscordClientException
 * @package Bytes\DiscordResponseBundle\Exceptions
 *
 * @codeCoverageIgnore
 */
class DiscordClientException extends \RuntimeException implements ClientExceptionInterface
{
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * DiscordClientException constructor.
     * @param ResponseInterface $response
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(ResponseInterface $response, $message = "", $code = 0, Throwable $previous = null)
    {
        $this->response = $response;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}