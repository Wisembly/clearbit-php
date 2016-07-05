<?php

namespace Clearbit;

use Http\Message\MessageFactory;
use Http\Client\HttpClient;
use Joli\Jane\Encoder\RawEncoder;
use Symfony\Component\Serializer\Encoder\JsonDecode;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;

use Clearbit\Resource;
use Clearbit\Generated\Normalizer\NormalizerFactory;

class Clearbit
{
    private $httpClient;
    private $combinedResource;

    public function __construct(
        HttpClient $httpClient,
        MessageFactory $messageFactory,
        Serializer $serializer = null
    ) {
        $this->httpClient = $httpClient;

        if ($serializer === null) {
             $serializer = new Serializer(NormalizerFactory::create(), [
                 new JsonEncoder(new JsonEncode(), new JsonDecode()),
                 new RawEncoder()
             ]);
        }

        $this->serializer = $serializer;
        $this->messageFactory = $messageFactory;
    }

    public function getCombined($parameters, $fetch = Resource\CombinedResource::FETCH_OBJECT, $options = [])
    {
        if (null === $this->combinedResource) {
            $this->combinedResource = new Resource\CombinedResource(
                $this->httpClient,
                $this->messageFactory,
                $this->serializer
            );
        }

        if (!is_array($parameters)) {
            $parameters = ['email' => (string) $parameters];
        }

        return $this->combinedResource->getCombined(
            $parameters,
            $fetch,
            $options
        );
    }
}
