<?php

namespace Clearbit\Tests;

use Prophecy\Argument;

use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\ResponseInterface;
use Http\Client\HttpClient;

use Http\Client\Plugin\PluginClient;
use Http\Client\Plugin\AuthenticationPlugin;
use Http\Client\Curl\Client as CurlHttpClient;
use Http\Adapter\Guzzle6\Client as GuzzleHttpClient;

use Http\Message\Authentication\Bearer;
use Http\Message\MessageFactory;

use Clearbit\Generated\Model;
use Clearbit\Clearbit;

class ClearbitTest extends \PHPUnit_Framework_TestCase
{
    /** @expectedException Clearbit\Exception\NotFoundException */
    public function testGetCombinedWith404()
    {
        $response = $this->prophesize(ResponseInterface::class);
        $response->getStatusCode()->willReturn(404);

        $client = $this->prophesize(HttpClient::class);
        $client->sendRequest(Argument::any())->shouldBeCalled()->willReturn($response->reveal());

        $clearbit = new Clearbit($client->reveal(), new MessageFactory\GuzzleMessageFactory);
        $combined = $clearbit->getCombined('foo@bar.baz');
    }

    /** @expectedException Clearbit\Exception\AsyncLookingException */
    public function testGetCombinedWith202()
    {
        $response = $this->prophesize(ResponseInterface::class);
        $response->getStatusCode()->willReturn(202);

        $client = $this->prophesize(HttpClient::class);
        $client->sendRequest(Argument::any())->shouldBeCalled()->willReturn($response->reveal());

        $clearbit = new Clearbit($client->reveal(), new MessageFactory\GuzzleMessageFactory);
        $combined = $clearbit->getCombined('foo@bar.baz');
    }

    /** @expectedException Clearbit\Exception\BadResponseException */
    public function testGetCombinedWith500()
    {
        $response = $this->prophesize(ResponseInterface::class);
        $response->getStatusCode()->willReturn(500);
        $response->getReasonPhrase()->shouldBeCalled();

        $client = $this->prophesize(HttpClient::class);
        $client->sendRequest(Argument::any())->shouldBeCalled()->willReturn($response->reveal());

        $clearbit = new Clearbit($client->reveal(), new MessageFactory\GuzzleMessageFactory);
        $combined = $clearbit->getCombined('foo@bar.baz');
    }

    public function testGetCombinedShouldBeValid()
    {
        $body = $this->prophesize(StreamInterface::class);
        $body->getContents()->willReturn(self::COMBINED_JSON);

        $response = $this->prophesize(ResponseInterface::class);
        $response->getBody()->willReturn($body->reveal());
        $response->getStatusCode()->willReturn(200);

        $client = $this->prophesize(HttpClient::class);
        $client->sendRequest(Argument::any())->shouldBeCalled()->willReturn($response->reveal());

        $clearbit = new Clearbit($client->reveal(), new MessageFactory\GuzzleMessageFactory);
        $combined = $clearbit->getCombined('foo@bar.baz');

        $this->assertInstanceof(Model\Combined::class, $combined);
        $this->assertEquals("d54c54ad-40be-4305-8a34-0ab44710b90d", $combined->getPerson()->getId());
        $this->assertEquals("Alex MacCaw", $combined->getPerson()->getName()->fullName);

        $this->assertEquals("Uber", $combined->getCompany()->getName());
    }

    public function testGetCombinedWithourPersonShouldBeValid()
    {
        $body = $this->prophesize(StreamInterface::class);
        $body->getContents()->willReturn(self::COMBINED_WITHOUT_PERSON_JSON);

        $response = $this->prophesize(ResponseInterface::class);
        $response->getBody()->willReturn($body->reveal());
        $response->getStatusCode()->willReturn(200);

        $client = $this->prophesize(HttpClient::class);
        $client->sendRequest(Argument::any())->shouldBeCalled()->willReturn($response->reveal());

        $clearbit = new Clearbit($client->reveal(), new MessageFactory\GuzzleMessageFactory);
        $combined = $clearbit->getCombined('foo@bar.baz');

        $this->assertInstanceof(Model\Combined::class, $combined);
        $this->assertNull($combined->getPerson());

        $this->assertEquals("Uber", $combined->getCompany()->getName());
    }

    public function testGetCombinedIRL()
    {
        if (!isset($_SERVER['API_TOKEN'])) {
            $this->markTestSkipped('API_TOKEN is not available');
        }

        $socketClient = new GuzzleHttpClient();
        $authenticationPlugin = new AuthenticationPlugin(new Bearer($_SERVER['API_TOKEN']));

        $client = new PluginClient($socketClient, [$authenticationPlugin]);

        $clearbit = new Clearbit($client, new MessageFactory\GuzzleMessageFactory);
        $combined = $clearbit->getCombined('bill.gates@microsoft.com');

        $this->assertInstanceof(Model\Combined::class, $combined);
        $this->assertEquals("b96a0ecd-5d87-47dd-9e60-0694d4663f1a", $combined->getPerson()->getId());
        $this->assertEquals("Bill Gates", $combined->getPerson()->getName()->fullName);
        $this->assertEquals("Microsoft", $combined->getCompany()->getName());
    }

    const COMBINED_JSON = <<<EOF
{
  "person": {
      "id": "d54c54ad-40be-4305-8a34-0ab44710b90d",
      "name": {
        "fullName": "Alex MacCaw",
        "givenName": "Alex",
        "familyName": "MacCaw"
      },
      "email": "alex@alexmaccaw.com",
      "gender": "male",
      "location": "San Francisco, CA, US",
      "timeZone": "America/Los_Angeles",
      "utcOffset": -8,
      "geo": {
        "city": "San Francisco",
        "state": "California",
        "stateCode": "CA",
        "country": "United States",
        "countryCode": "US",
        "lat": 37.7749295,
        "lng": -122.4194155
      },
      "bio": "O'Reilly author, software engineer & traveller. Founder of https://clearbit.com",
      "site": "http://alexmaccaw.com",
      "avatar": "https://d1ts43dypk8bqh.cloudfront.net/v1/avatars/d54c54ad-40be-4305-8a34-0ab44710b90d",
      "employment": {
        "domain": "clearbit.com",
        "name": "Clearbit",
        "title": "Founder and CEO",
        "role": "ceo",
        "seniority": "executive"
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
  },
  "company": {
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
      "foundedDate": "2009-03-01",
      "location": "1455 Market Street, San Francisco, CA 94103, USA",
      "timeZone": "America/Los_Angeles",
      "utcOffset": -8,
      "geo": {
        "streetNumber": "1455",
        "streetName": "Market Street",
        "subPremise": null,
        "city": "San Francisco",
        "state": "California",
        "stateCode": "CA",
        "postalCode": "94103",
        "country": "United States",
        "countryCode": "US",
        "lat": 37.7752315,
        "lng": -122.4175567
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
      "type": "private",
      "tech": [
        "google_analytics",
        "double_click",
        "mixpanel",
        "optimizely",
        "typekit_by_adobe",
        "nginx",
        "google_apps"
      ]
  }
}
EOF;

    const COMBINED_WITHOUT_PERSON_JSON = <<<EOF
{
  "company": {
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
      "foundedDate": "2009-03-01",
      "location": "1455 Market Street, San Francisco, CA 94103, USA",
      "timeZone": "America/Los_Angeles",
      "utcOffset": -8,
      "geo": {
        "streetNumber": "1455",
        "streetName": "Market Street",
        "subPremise": null,
        "city": "San Francisco",
        "state": "California",
        "stateCode": "CA",
        "postalCode": "94103",
        "country": "United States",
        "countryCode": "US",
        "lat": 37.7752315,
        "lng": -122.4175567
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
      "type": "private",
      "tech": [
        "google_analytics",
        "double_click",
        "mixpanel",
        "optimizely",
        "typekit_by_adobe",
        "nginx",
        "google_apps"
      ]
  }
}
EOF;
}
