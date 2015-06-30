<?php

if (!($loader = include __DIR__ . '/../vendor/autoload.php')) {
        die(<<<EOT
You need to install the project dependencies using Composer:
$ curl -s https://getcomposer.org/installer | php
$ php composer.phar install --dev
$ ./bin/phpunit
EOT
            );
}

$loader->add('Clearbit\Tests', __DIR__);

// Service Builder for tests
Guzzle\Tests\GuzzleTestCase::setServiceBuilder(
    Guzzle\Service\Builder\ServiceBuilder::factory(
        [
            'clearbit' =>  [
                'class' => 'Clearbit\Client',
                'params' => [
                    'api_token' => $_SERVER['API_TOKEN']
                ]
            ]
        ]
    )
);
