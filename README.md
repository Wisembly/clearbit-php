# clearbit-php

PHP SDK for Clearbit API (http://clearbit.com).

This SDK is NOT official, heavily inspired by [sementria-php](https://github.com/Wisembly/sementria-php).

We developped and maintain this library for our own usage and released it open
source (see LICENCE.md) if it could help.
Clearbit and its API belongs to Clearbit.

## Basic usage

Remember to include the Composer autoloader in your application:

```php
<?php
require_once 'vendor/autoload.php';

$clearbit = Clearbit\Client::factory(['api_token' => 'my-api-token']);

$person = $clearbit->getPerson(['email' => 'foo@bar.com']); // returns a Clearbit/Person instance
var_dump($person->get('name.fullname'));

$company = $clearbit->getCompany(['domain' => 'bar.com'])); // returns a Clearbit/Company instance
var_dump($company->get('name'));

$combined = $clearbit->getPersonCombined(['email' => 'foo@bar.com']); // returns an array ['person' => Clearbit/Person, 'company' => Clearbit/Company]
var_dump($combined['person']->get('name.fullname'));
var_dump($combined['company']->get('name'));

$autocomplete = $clearbit->getAutocomplete(['name' => 'foo'])); // returns a Clearbit/Autocomplete instance
var_dump($autocomplete->get('0.domain'));

$logo = $clearbit->getLogo(['domain' => 'foo.com'])); // returns a Clearbit/Logo instance
var_dump($autocomplete->get('logo'));
```

## Testing

Run `bin/phpunit`


## Resources

Resources this API supports:

| Uri                                                                               | Methods   | Comments          |
| ---------------------------------------------------------------------             | --------- | ---------         |
| https://person.clearbit.com/v1/people/email/:email                                | GET       |                   |
| https://person.clearbit.com/v1/combined/email/:email                              | GET       |                   |
| https://person.clearbit.com/v1/people/:id/flag                                    | POST      | /!\ untested yet  |
| https://company.clearbit.com/v1/companies/domain/:domain                          | GET       |                   |
| https://company.clearbit.com/v1/companies/:id/flag                                | POST      | /!\ untested yet  |
| https://autocomplete.clearbit.com/v1/companies/suggest?query=:name                | GET       |                   |
| https://logo.clearbit.com/:domain?size=:size&format=:format&greyscale=:greyscale  | GET       |                   |

## Licence

See LICENCE file.
