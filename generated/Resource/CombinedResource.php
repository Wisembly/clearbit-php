<?php

namespace Clearbit\Generated\Resource;

use Joli\Jane\OpenApi\Client\QueryParam;
use Joli\Jane\OpenApi\Client\Resource;
class CombinedResource extends Resource
{
    /**
     * Retrieves a person and company by email address.
     *
     * @param array  $parameters {
     *     @var string $email the person's email address
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\Clearbit\Generated\Model\Combined
     */
    public function getCombined($parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setRequired('email');
        $url = '/v2/combined/find';
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'person.clearbit.com'), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'Clearbit\\Generated\\Model\\Combined', 'json');
            }
        }
        return $response;
    }
}