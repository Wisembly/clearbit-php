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

    public function __construct(HttpClient $httpClient, Serializer $serializer = null, MessageFactory $messageFactory = null)
    {
        $this->httpClient = $httpClient;

        if ($serializer === null) {
             $serializer = new Serializer(NormalizerFactory::create(), [
                 new JsonEncoder(new JsonEncode(), new JsonDecode()),
                 new RawEncoder()
             ]);
        }

        if ($messageFactory === null) {
            $messageFactory = new MessageFactory\GuzzleMessageFactory();
        }

        $this->serializer = $serializer;
        $this->messageFactory = $messageFactory;
    }

    public function getCombined($email)
    {
        if (null === $this->combinedResource) {
            $this->combinedResource = new Resource\CombinedResource(
                $this->httpClient,
                $this->messageFactory,
                $this->serializer
            );
        }

        return $this->combinedResource->getCombined(['email' => $email]);
    }
}
