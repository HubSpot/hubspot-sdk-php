<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Events\EventListParams;
use HubspotSDK\Events\ExternalUnifiedEvent;
use HubspotSDK\Events\VisibleExternalEventTypeNames;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\EventsContract;
use HubspotSDK\Services\Events\EventDefinitionsService;
use HubspotSDK\Services\Events\SendService;

final class EventsService implements EventsContract
{
    /**
     * @api
     */
    public EventDefinitionsService $eventDefinitions;

    /**
     * @api
     */
    public SendService $send;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->eventDefinitions = new EventDefinitionsService($client);
        $this->send = new SendService($client);
    }

    /**
     * @api
     *
     * Retrieve instances of event completion data. For example, retrieve all event completions associated with a specific contact.
     *
     * @param array{
     *   id?: list<string>,
     *   after?: string,
     *   before?: string,
     *   eventType?: string,
     *   limit?: int,
     *   objectID?: int,
     *   objectProperty?: array{propname?: mixed},
     *   objectType?: string,
     *   occurredAfter?: string|\DateTimeInterface,
     *   occurredBefore?: string|\DateTimeInterface,
     *   property?: array{propname?: mixed},
     *   sort?: list<string>,
     * }|EventListParams $params
     *
     * @return Page<ExternalUnifiedEvent>
     *
     * @throws APIException
     */
    public function list(
        array|EventListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = EventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<Page<ExternalUnifiedEvent>> */
        $response = $this->client->request(
            method: 'get',
            path: 'events/v3/events/',
            query: Util::array_transform_keys($parsed, ['objectID' => 'objectId']),
            options: $options,
            convert: ExternalUnifiedEvent::class,
            page: Page::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint returns a list of event type names which are visible to you. You may use these event type names to query the API for specific event instances of a desired type.
     *
     * Note: the `get_types` method is only supported in the Python SDK version `12.0.0-beta.1` or later.
     *
     * @throws APIException
     */
    public function listEventTypes(
        ?RequestOptions $requestOptions = null
    ): VisibleExternalEventTypeNames {
        /** @var BaseResponse<VisibleExternalEventTypeNames> */
        $response = $this->client->request(
            method: 'get',
            path: 'events/v3/events/event-types',
            options: $requestOptions,
            convert: VisibleExternalEventTypeNames::class,
        );

        return $response->parse();
    }
}
