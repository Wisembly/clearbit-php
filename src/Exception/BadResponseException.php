<?php

namespace Clearbit\Exception;

use Exception;
use Psr\Http\Message\ResponseInterface;

class BadResponseException extends Exception implements ClearbitException
{
    public function __construct(ResponseInterface $response)
    {
        parent::__construct($response->getReasonPhrase());
    }
}
