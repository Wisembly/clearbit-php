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
