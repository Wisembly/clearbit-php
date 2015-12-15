<?php

namespace Clearbit\Tests;

use Guzzle\Tests\GuzzleTestCase,
    Guzzle\Http\Message\Response,
    Guzzle\Plugin\Mock\MockPlugin;

use Clearbit\Client;

class ClientTest extends GuzzleTestCase
{

    /** @expectedException Guzzle\Common\Exception\InvalidArgumentException */
    public function testFactoryWithoutApiTokenShouldFail()
    {
        $client = Client::factory([]);
        $this->assertInstanceOf('Clearbit\Client', $client);
    }

    public function testFactoryWithApiTokenShouldPass()
    {
        $client = Client::factory(['api_token' => 'foo']);

        $this->assertInstanceOf('Clearbit\Client', $client);
        $this->assertEquals('foo', $client->getConfig('api_token'));
        $this->assertEquals(['foo', null, 'basic'], $client->getDefaultOption('auth'));
        $this->assertInstanceOf('Guzzle\Service\Description\ServiceDescriptionInterface', $client->getDescription());
    }

    public function testGetPersonShouldFindAPerson()
    {
        $mock = new MockPlugin();
        $mock->addResponse(new Response(200, [], self::PERSON));

        $client = Client::factory(['api_token' => 'foo']);
        $client->addSubscriber($mock);
        $result = $client->getPerson(['email' => 'foo@bar']);

        $this->assertInstanceOf('Clearbit\Person', $result);
        $this->assertEquals('d54c54ad-40be-4305-8a34-0ab44710b90d', $result->get('id'));
        $this->assertFalse($result->get('fuzzy'));
        $this->assertEquals('SF', $result->get('geo.city'));
        $this->assertEquals(json_decode(self::PERSON, true), $result->toArray());
    }

    /** @expectedException Clearbit\Exception\NotFoundException */
    public function testGetPersonOnUnexistentPersonShouldReturnNotFoundException()
    {
        $mock = new MockPlugin();
        $mock->addResponse(new Response(404));

        $client = Client::factory(['api_token' => 'foo']);
        $client->addSubscriber($mock);
        $client->getPerson(['email' => 'foo@bar']);
    }

    /** @expectedException Clearbit\Exception\AsyncLookingException */
    public function testGetPersonAsyncShouldReturnAsyncLookingException()
    {
        $mock = new MockPlugin();
        $mock->addResponse(new Response(202));

        $client = Client::factory(['api_token' => 'foo']);
        $client->addSubscriber($mock);
        $client->getPerson(['email' => 'foo@bar']);
    }

    public function testGetPersonInRealLife()
    {
        if (!isset($_SERVER['API_TOKEN'])) {
            $this->markTestSkipped('API_TOKEN is not available');
        }

        $client = $this->getServiceBuilder()->get('clearbit');
        $result = $client->getPerson(['email' => 'alex@alexmaccaw.com']);

        $this->assertInstanceOf('Clearbit\Person', $result);
        $this->assertEquals('d54c54ad-40be-4305-8a34-0ab44710b90d', $result->get('id'));
        $this->assertFalse($result->get('fuzzy'));
    }

    public function testGetPersonCombinedShouldFindAPersonAndACompany()
    {
        $mock = new MockPlugin();
        $mock->addResponse(new Response(200, [], sprintf(
            '{"person": %s, "company": %s}',
            self::PERSON,
            self::COMPANY
        )));

        $client = Client::factory(['api_token' => 'foo']);
        $client->addSubscriber($mock);
        $result = $client->getPersonCombined(['email' => 'alex@alexmaccaw.com']);

        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('person', $result);
        $this->assertInstanceOf('Clearbit\Person', $result['person']);
        $this->assertArrayHasKey('company', $result);
        $this->assertInstanceOf('Clearbit\Company', $result['company']);
    }

    public function testGetPersonCombinedOnUnexistentPersonShouldReturnArrayWithNullValues()
    {
        $mock = new MockPlugin();
        $mock->addResponse(new Response(200, [], '{"person":null,"company":null}'));

        $client = Client::factory(['api_token' => 'foo']);
        $client->addSubscriber($mock);
        $result = $client->getPersonCombined(['email' => 'foo@bar']);

        $this->assertInternalType('array', $result);
        $this->assertArrayHasKey('person', $result);
        $this->assertNull($result['person']);
        $this->assertArrayHasKey('company', $result);
        $this->assertNull($result['company']);
    }

    /** @expectedException Clearbit\Exception\AsyncLookingException */
    public function testGetPersonCombinedAsyncShouldReturnAsyncLookingException()
    {
        $mock = new MockPlugin();
        $mock->addResponse(new Response(202));

        $client = Client::factory(['api_token' => 'foo']);
        $client->addSubscriber($mock);
        $client->getPersonCombined(['email' => 'foo@bar']);
    }

    public function testFlagPersonShouldBeValid()
    {
        $this->markTestIncomplete();
    }

    public function testGetCompanyShouldFindACompany()
    {
        $mock = new MockPlugin();
        $mock->addResponse(new Response(200, [], self::COMPANY));

        $client = Client::factory(['api_token' => 'foo']);
        $client->addSubscriber($mock);
        $result = $client->getCompany(['domain' => 'foo.bar']);

        $this->assertInstanceOf('Clearbit\Company', $result);
        $this->assertEquals('027b0d40-016c-40ea-8925-a076fa640992', $result->get('id'));
        $this->assertEquals('Uber', $result->get('name'));
        $this->assertEquals(json_decode(self::COMPANY, true), $result->toArray());
    }

    /** @expectedException Clearbit\Exception\NotFoundException */
    public function testGetCompanyOnUnexistentCompanyShouldReturnNotFoundException()
    {
        $mock = new MockPlugin();
        $mock->addResponse(new Response(404));

        $client = Client::factory(['api_token' => 'foo']);
        $client->addSubscriber($mock);
        $client->getCompany(['domain' => 'foo.bar']);
    }

    /** @expectedException Clearbit\Exception\AsyncLookingException */
    public function testGetCompanyAsyncShouldReturnAsyncLookingException()
    {
        $mock = new MockPlugin();
        $mock->addResponse(new Response(202));

        $client = Client::factory(['api_token' => 'foo']);
        $client->addSubscriber($mock);
        $client->getCompany(['domain' => 'foo.bar']);
    }
    
    public function testGetCompanyInRealLife()
    {
        if (!isset($_SERVER['API_TOKEN'])) {
            $this->markTestSkipped('API_TOKEN is not available');
        }

        $client = $this->getServiceBuilder()->get('clearbit');
        $result = $client->getCompany(['domain' => 'uber.com']);

        $this->assertInstanceOf('Clearbit\Company', $result);
        $this->assertEquals('Uber', $result->get('name'));
    }
    
    public function testGetAutocompleteShouldFindACompany()
    {
        $mock = new MockPlugin();
        $mock->addResponse(new Response(200, [], self::AUTOCOMPLETE));

        $client = Client::factory(['api_token' => 'foo']);
        $client->addSubscriber($mock);
        $result = $client->getAutocomplete(['name' => 'jobbrander']);

        $this->assertInstanceOf('Clearbit\Autocomplete', $result);
        $this->assertEquals('jobbrander.com', $result->get('0.domain'));
        $this->assertEquals('JobBrander', $result->get('0.name'));
        $this->assertEquals(json_decode(self::AUTOCOMPLETE, true), $result->toArray());
    }

    /** @expectedException Clearbit\Exception\NotFoundException */
    public function testGetAutocompleteOnUnexistentCompanyShouldReturnNotFoundException()
    {
        $mock = new MockPlugin();
        $mock->addResponse(new Response(404));

        $client = Client::factory(['api_token' => 'foo']);
        $client->addSubscriber($mock);
        $client->getAutocomplete(['name' => '21fwfdsacdsfeq43r432f']);
    }
    
    public function testGetAutocompleteInRealLife()
    {
        $client = $this->getServiceBuilder()->get('clearbit');
        $result = $client->getAutocomplete(['name' => 'stripe']);

        $this->assertInstanceOf('Clearbit\Autocomplete', $result);
        $this->assertEquals('stripe.com', $result->get('0.domain'));
    }

    public function testFlagCompanyShouldBeValid()
    {
        $this->markTestIncomplete();
    }


    const PERSON = <<<EOF
{
  "id": "d54c54ad-40be-4305-8a34-0ab44710b90d",
  "name": {
    "fullName": "Alex MacCaw",
    "givenName": "Alex",
    "familyName": "MacCaw"
  },
  "email": "alex@alexmaccaw.com",
  "gender": "male",
  "location": "San Francisco, CA, USA",
  "geo": {
    "city": "SF",
    "state": "CA",
    "country": "US",
    "lat": 37.7749295,
    "lng": -122.4194155
  },
  "bio": "O'Reilly author, software engineer & traveller. Founder of https://clearbit.com",
  "site": "http://alexmaccaw.com",
  "avatar": "https://d1ts43dypk8bqh.cloudfront.net/v1/avatars/d54c54ad-40be-4305-8a34-0ab44710b90d",
  "employment": {
    "name": "Clearbit",
    "title": "CEO",
    "domain": null
  },
  "facebook": {
    "handle": "amaccaw"
  },
  "github": {
    "handle": "maccman",
    "avatar": "https://avatars.githubusercontent.com/u/2142?v=2",
    "company": "Clearbit",
    "blog": "http://alexmaccaw.com",
    "followers": 2932,
    "following": 94
  },
  "twitter": {
    "handle": "maccaw",
    "id": "2006261",
    "bio": "O'Reilly author, software engineer & traveller. Founder of https://clearbit.com",
    "followers": 15248,
    "following": 1711,
    "location": "San Francisco",
    "site": "http://alexmaccaw.com",
    "avatar": "https://pbs.twimg.com/profile_images/1826201101/297606_10150904890650705_570400704_21211347_1883468370_n.jpeg"
  },
  "linkedin": {
    "handle": "pub/alex-maccaw/78/929/ab5"
  },
  "googleplus": {
    "handle": null
  },
  "angellist": {
    "handle": "maccaw",
    "bio": "O'Reilly author, engineer & traveller. Mostly harmless.",
    "blog": "http://blog.alexmaccaw.com",
    "site": "http://alexmaccaw.com",
    "followers": 532,
    "avatar": "https://d1qb2nb5cznatu.cloudfront.net/users/403357-medium_jpg?1405661263"
  },
  "foursquare": {
    "handle": null
  },
  "aboutme": {
    "handle": "maccaw",
    "bio": "Software engineer & traveller. Walker, skier, reader, tennis player, breather, ginger beer drinker, scooterer & generally enjoying things :)",
    "avatar": "http://o.aolcdn.com/dims-global/dims/ABOUTME/5/803/408/80/http://d3mod6n032mdiz.cloudfront.net/thumb2/m/a/c/maccaw/maccaw-840x560.jpg"
  },
  "gravatar": {
    "handle": "maccman",
    "urls": [
      {
        "value": "http://alexmaccaw.com",
        "title": "Personal Website"
      }
    ],
    "avatar": "http://2.gravatar.com/avatar/994909da96d3afaf4daaf54973914b64",
    "avatars": [
      {
        "url": "http://2.gravatar.com/avatar/994909da96d3afaf4daaf54973914b64",
        "type": "thumbnail"
      }
    ]
  },
  "fuzzy": false
}
EOF;

    const COMPANY = <<<EOF
{
  "id": "027b0d40-016c-40ea-8925-a076fa640992",
  "name": "Uber",
  "legalName": "Uber, Inc.",
  "domain": "uber.com",
  "domainAliases": [],
  "url": "http://uber.com",
  "site": {
    "url": "http://uber.com",
    "title": null,
    "h1": null,
    "metaDescription": null,
    "metaAuthor": null
  },
  "tags": [
    "Transportation",
    "Design",
    "SEO",
    "Automotive",
    "Real Time",
    "Limousines",
    "Public Transportation",
    "Transport"
  ],
  "description": "Uber is a mobile app connecting passengers with drivers for hire.",
  "location": "1455 Market Street, San Francisco, CA 94103, USA",
  "geo": {
    "streetNumber": "1455",
    "streetName": "Market Street",
    "subPremise": null,
    "city": "San Francisco",
    "state": "California",
    "country": "United States",
    "postalCode": "94103",
    "lat": 37.7757102,
    "lng": -122.4181719
  },
  "metrics": {
    "raised": 1502450000,
    "employees": 1000,
    "googleRank": 7,
    "alexaUsRank": 2467,
    "alexaGlobalRank": 2319,
    "marketCap": null
  },
  "logo": "https://dqus23xyrtg1i.cloudfront.net/v1/logos/027b0d40-016c-40ea-8925-a076fa640992",
  "facebook": {
    "handle": "uber.IND"
  },
  "linkedin": {
    "handle": "company/uber.com"
  },
  "twitter": {
    "handle": "uber",
    "id": 19103481,
    "bio": "Everyone's Private Driver. Question, concern or praise? Tweet at your local community manager here: https://t.co/EUiTjLk0xj",
    "followers": 176582,
    "following": 330,
    "location": "Global",
    "site": "http://t.co/PtMbwFTeQA",
    "avatar": "https://pbs.twimg.com/profile_images/378800000762572812/91ea09a6535666e18ca3c56f731f67ef_normal.jpeg"
  },
  "angellist": {
    "id": 19163,
    "handle": "uber",
    "description": "Request a car from any mobile phone via text message, iPhone and Android apps. Within minutes, a professional driver in a sleek black car will arrive curbside. Automatically charged to your credit card on file, tip included.",
    "followers": 2650,
    "blogUrl": "http://blog.uber.com/"
  },
  "crunchbase": {
    "handle": "uber"
  },
  "phone": "+1 877-223-8023",
  "emailProvider": false,
  "type": "private"
}
EOF;
    
    const AUTOCOMPLETE = <<<EOF
[
  {
    "domain": "jobbrander.com",
    "logo": "https://logo.clearbit.com/jobbrander.com",
    "name": "JobBrander"
  }
]
EOF;

}
