# clearbit-php

PHP SDK for Clearbit API (http://clearbit.com).

This SDK is NOT official, heavily inspired by [docker-php](https://github.com/docker-php/docker-php).

We developed and maintain this library for our own usage and released it open source (see LICENCE.md) if it could help.

Clearbit and its API belongs to Clearbit.

## Install

This client use [httplug](http://httplug.io/) for http client. Please
[select](http://docs.php-http.org/en/latest/httplug/users.html) a client for
your application and [select](http://docs.php-http.org/en/latest/message/message-factory.html) a MessageFactory.

Example with guzzle6 as client and guzzlehttp as message factory:

```
"wisembly/clearbit-php": "^2.0",
"php-http/guzzle6-adapter": "^1.0",
"guzzlehttp/psr7": "^1.2"
```

## Basic usage


```php
<?php

require_once 'vendor/autoload.php';

use Clearbit\Clearbit;

$clearbit = Clearbit::create($token);
$combined = $clearbit->getCombined('foo@bar.com');

var_dump($combined->getPerson());
var_dump($combined->getCompany());
```

## Testing

Run `bin/phpunit`


## Resources

Resources this API supports:

| Uri                                                                               | Methods   | Comments          |
| ---------------------------------------------------------------------             | --------- | ---------         |
| https://person.clearbit.com/v2/combined/find?email=:email                              | GET       |                   |
## Developer

This client is build using [jane-openapi](https://github.com/jolicode/jane-openapi).
To generate the classes:

```
./vendor/bin/jane-openapi generate combined-swagger.json Clearbit\\Generated generated
```

## Licence

See LICENCE file.
