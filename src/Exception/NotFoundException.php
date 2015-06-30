<?php

namespace Clearbit\Exception;

use Guzzle\Http\Message\Response,
    Guzzle\Http\Message\RequestInterface;

class NotFoundException extends BadResponseException
{
    public static function factory(RequestInterface $request, Response $response)
    {
        $e = new self('Not Found');
        $e->setResponse($response);
        $e->setRequest($request);

        return $e;
    }
}
