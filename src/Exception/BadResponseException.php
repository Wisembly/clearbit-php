<?php

namespace Clearbit\Exception;

use Guzzle\Http\Message\Response,
    Guzzle\Http\Message\RequestInterface,
    Guzzle\Http\Exception\BadResponseException as GuzzleBadResponseException;

class BadResponseException extends GuzzleBadResponseException implements ClearbitException
{
    public static function factory(RequestInterface $request, Response $response)
    {
        if ($response->isClientError()) {
            $label = 'Client error response';
            $class = __NAMESPACE__ . '\\ClientErrorResponseException';
        } elseif ($response->isServerError()) {
            $label = 'Server error response';
            $class = __NAMESPACE__ . '\\ServerErrorResponseException';
        } else {
            $label = 'Unsuccessful response';
            $class = __CLASS__;
        }

        $e = new self($message);
        $e->setResponse($response);
        $e->setRequest($request);

        return $e;
    }
}
