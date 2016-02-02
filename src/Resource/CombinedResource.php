<?php

namespace Clearbit\Resource;

use Joli\Jane\OpenApi\Client\QueryParam;

use Clearbit\Exception;
use Clearbit\Generated\Resource\CombinedResource as Resource;

class CombinedResource extends Resource
{
    /**
     * Retrieves a person and company by email address.
     *
     * @param array  $parameters {
     *     @var string $email the person's email address
     * }
     * @param string $fetch      Fetch mode (object or response)
     * @param array  $options
     *
     * @return \Psr\Http\Message\ResponseInterface|\Clearbit\Generated\Model\Combined
     */
    public function getCombined(
        $parameters = [],
        $fetch = self::FETCH_OBJECT,
        $options = []
    ) {
        $queryParam = new QueryParam();
        $queryParam->setRequired('email');

        $options = array_merge([
            'scheme' => 'https',
            'host' => 'person.clearbit.com',
            'path' => '/v2/combined/find'
        ], $options);

        $url = sprintf(
            '%s://%s%s?%s',
            $options['scheme'],
            $options['host'],
            $options['path'],
            $queryParam->buildQueryString($parameters)
        );

        $headers = array_merge(
            ['Host' => $options['host']],
            $queryParam->buildHeaders($parameters)
        );
        $body = $queryParam->buildFormDataString($parameters);

        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);

        $statusCode = $response->getStatusCode();

        switch (true) {
            case 202 == $statusCode:
                throw new Exception\AsyncLookingException;
            case 404 == $statusCode:
                throw new Exception\NotFoundException;
            case 200 != $statusCode:
                throw new Exception\BadResponseException($response);
        }

        if (self::FETCH_OBJECT == $fetch) {
            return $this->serializer->deserialize(
                $response->getBody()->getContents(),
                'Clearbit\\Generated\\Model\\Combined',
                'json'
            );
        }
        return $response;
    }
}
