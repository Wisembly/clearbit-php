<?php

namespace Clearbit;

use Guzzle\Service\Command\ResponseClassInterface,
    Guzzle\Service\Command\OperationCommand;

use Symfony\Component\PropertyAccess\PropertyAccess;

abstract class AbstractModel implements ResponseClassInterface
{
    private $data;
    private $accessor;

    public static function fromCommand(OperationCommand $command)
    {
        $response = $command->getResponse();

        return new static($response->json());
    }

    public function __construct(array $data)
    {
        $this->data = $data;
        $this->accessor = PropertyAccess::createPropertyAccessor();
    }

    public function get($key)
    {
        // I transform toto.titi to [toto][titi] to be array access compatible
        $key = implode(null, array_map(function ($key) { return '['.$key.']'; }, explode('.', $key)));

        return $this->accessor->getValue($this->data, $key);
    }

    public function toArray()
    {
        return $this->data;
    }
}

