<?php

namespace Clearbit;

use Guzzle\Service\Command\ResponseClassInterface,
    Guzzle\Service\Command\OperationCommand;

use Symfony\Component\PropertyAccess\PropertyAccess;

abstract class Combined implements ResponseClassInterface
{
    public static function fromCommand(OperationCommand $command)
    {
        $response = $command->getResponse();
        $json = $response->json();

        return [
            "person" => isset($json["person"]) ? new Person($json["person"]) : null,
            "company" => isset($json["company"]) ? new Company($json["company"]) : null
        ];
    }
}
