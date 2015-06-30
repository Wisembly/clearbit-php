<?php

namespace Clearbit;

use InvalidArgumentException;

use Guzzle\Service\Client as GuzzleClient,
    Guzzle\Common\Event,
    Guzzle\Common\Collection,
    Guzzle\Http\Message\Request,
    Guzzle\Service\Description\ServiceDescription;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

use Clearbit\Exception\BadResponseException,
    Clearbit\Exception\AsyncLookingException,
    Clearbit\Exception\NotFoundException;

class Client extends GuzzleClient implements EventSubscriberInterface
{
    /** @var string */
    const DEFAULT_CONTENT_TYPE = 'application/json';

    /** @var string */
    const DEFAULT_ACCEPT_HEADER = 'application/json';

    /** @var string */
    const USER_AGENT = 'clearbit-php/0.0.1';

    public static function factory($config = array())
    {
        $config = Collection::fromConfig(
            $config,
            self::getDefaultConfig(),
            ['api_token', 'service_description']
        );

        $client = new self($config->get('base_url'), $config);

        $client->setDescription(
            $client->getServiceDescriptionFromFile(
                $config->get('service_description')
            )
        );

        $client->setDefaultOption('auth', [
            $config->get('api_token'),
            null,
            'basic'
        ]);

        $client->addSubscriber($client);
        $client->setErrorHandler();

        return $client;
    }

    public static function getSubscribedEvents()
    {
        return ['request.success' => ['checkAsyncLooking', 125]];
    }

    /**
     * Clearbit returns a 202 in case of need to asynchronously lookup the person
     *
     * @throw AsyncLookingException if status code is 202
     */
    public function checkAsyncLooking(Event $event)
    {
        if (202 === $event['response']->getStatusCode()) {
            throw new AsyncLookingException();
        }
    }

    private function getServiceDescriptionFromFile($description_file)
    {
        if (!file_exists($description_file) || !is_readable($description_file)) {
            throw new InvalidArgumentException(sprintf(
                'Unable to read API definition schema %s',
                $description_file
            ));
        }
        return ServiceDescription::factory($description_file);
    }

    /**
     * Overrides the error handling in Guzzle so that when errors are encountered we throw
     * Clearbit errors, not Guzzle ones.
     *
     */
    private function setErrorHandler()
    {
        $this->getEventDispatcher()->addListener(
            'request.error',
            function (Event $event) {
                // Stop other events from firing when you override 401 responses
                $event->stopPropagation();

                if ($event['response']->getStatusCode() === 404) {
                    $e = NotFoundException::factory($event['request'], $event['response']);
                } else {
                    $e = BadResponseException::factory($event['request'], $event['response']);
                }


                $event['request']->setState(Request::STATE_ERROR, array('exception' => $e) + $event->toArray());
                throw $e;
            }
        );
    }

    public static function getDefaultConfig()
    {
        return [
            'base_url'            => 'https://person.clearbit.com',
            'service_description' => __DIR__ . '/Service/config/clearbit.json',
            'application_name'    => 'clearbit-php',
            'use_compression'     => false,
            'headers' => [
                'Content-Type'  => self::DEFAULT_CONTENT_TYPE,
                'Accept'        => self::DEFAULT_ACCEPT_HEADER,
                'User-Agent'    => self::USER_AGENT
            ]
        ];
    }
}
