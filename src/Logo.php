<?php

namespace Clearbit;

use Guzzle\Service\Command\OperationCommand;

class Logo extends AbstractModel
{

    public static function fromCommand(OperationCommand $command)
    {
        $response = $command->getResponse();
        $info = $response->getInfo();
        
        if ($info['content_type'] === 'image/png' || $info['content_type'] === 'image/jpg') {
            return new static(['logo' => $info['url']]);
        }
        return false;
    }

}
