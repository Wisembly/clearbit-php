<?php

namespace Clearbit;

use Http\Message\MessageFactory;
use Http\Message\Authentication\Bearer;

use Http\Client\HttpClient;

use Http\Client\Common\PluginClient;
use Http\Client\Common\Plugin\AuthenticationPlugin;

use Http\Discovery\HttpClientDiscovery;
use Http\Discovery\MessageFactoryDiscovery;

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

    public static function create(
        $token,
        HttpClient $httpClient = null,
        MessageFactory $messageFactory = null,
        Serializer $serializer = null
    ) {
        $httpClient = new PluginClient(
            $httpClient ?: HttpClientDiscovery::find(),
            [new AuthenticationPlugin(new Bearer($token))]
        );
        return new self($httpClient, $messageFactory, $serializer);
    }

    public function __construct(
        HttpClient $httpClient,
        MessageFactory $messageFactory = null,
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
        $this->messageFactory = $messageFactory ?: MessageFactoryDiscovery::find();
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
