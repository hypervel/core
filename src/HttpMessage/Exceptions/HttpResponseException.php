<?php

declare(strict_types=1);

namespace SwooleTW\Hyperf\HttpMessage\Exceptions;

use Psr\Http\Message\ResponseInterface;
use RuntimeException;

class HttpResponseException extends RuntimeException
{
    public function __construct(protected ResponseInterface $response)
    {
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
