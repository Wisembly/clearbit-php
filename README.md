# clearbit-php

PHP SDK for Clearbit API (http://clearbit.com).

This SDK is NOT official, heavily inspired by [docker-php](https://github.com/docker-php/docker-php).

We developped and maintain this library for our own usage and released it open
source (see LICENCE.md) if it could help.
Clearbit and its API belongs to Clearbit.

## Basic usage

Remember to include the Composer autoloader in your application:

This client use [httplug](http://httplug.io/) fot http client. Please
[select](http://docs.php-http.org/en/latest/httplug/users.html) a client for
your application.

```php
<?php

require_once 'vendor/autoload.php';

use Http\Client\Plugin\PluginClient;
use Http\Client\Plugin\AuthenticationPlugin;
use Http\Client\Curl\Client as CurlHttpClient;

use Http\Message\Authentication\Bearer;
use Http\Message\StreamFactory\GuzzleStreamFactory;
use Http\Message\MessageFactory\GuzzleMessageFactory;

use Clearbit\Clearbit;

$socketClient = new CurlHttpClient(new GuzzleMessageFactory, new GuzzleStreamFactory);
$authenticationPlugin = new AuthenticationPlugin(new Bearer($_SERVER['API_TOKEN']));

$client = new PluginClient($socketClient, [$authenticationPlugin]);

$clearbit = new Clearbit($client);
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
## Developper

This client is build using [jane-openapi](https://github.com/jolicode/jane-openapi).
To generate the classes:

```
./vendor/bin/jane-openapi generate combined-swagger.json Clearbit\\Generated generated
```

## Licence

See LICENCE file.
