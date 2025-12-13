<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
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
    public EventsRawService $raw;

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
        $this->raw = new EventsRawService($client);
        $this->eventDefinitions = new EventDefinitionsService($client);
        $this->send = new SendService($client);
    }

    /**
     * @api
     *
     * Retrieve instances of event completion data. For example, retrieve all event completions associated with a specific contact.
     *
     * @param list<string> $id ID of an event instance. IDs are 1:1 with event instances. If you provide this filter and additional filters, the other filters must match the values on the event instance to yield results.
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $eventType The event type name. You can retrieve available event types using the [event types endpoint](#get-%2Fevents%2Fv3%2Fevents%2Fevent-types).
     * @param int $limit the maximum number of results to display per page
     * @param int $objectID The ID of the CRM Object to filter event instances on. When including this parameter, you must also include the `objectType` parameter.
     * @param array{_propname?: mixed} $objectProperty
     * @param string $objectType The type of CRM object to filter event instances on (e.g., `contact`). To retrieve event data for a specific CRM record, include the additional `objectId` query parameter (below).
     * @param string|\DateTimeInterface $occurredAfter filter for event data that occurred after a specific datetime
     * @param string|\DateTimeInterface $occurredBefore filter for event data that occurred before a specific datetime
     * @param array{_propname?: mixed} $property
     * @param list<string> $sort sort direction based on the timestamp of the event instance, `ASCENDING` or `DESCENDING`
     *
     * @return Page<ExternalUnifiedEvent>
     *
     * @throws APIException
     */
    public function list(
        ?array $id = null,
        ?string $after = null,
        ?string $before = null,
        ?string $eventType = null,
        ?int $limit = null,
        ?int $objectID = null,
        ?array $objectProperty = null,
        ?string $objectType = null,
        string|\DateTimeInterface|null $occurredAfter = null,
        string|\DateTimeInterface|null $occurredBefore = null,
        ?array $property = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): Page {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'after' => $after,
                'before' => $before,
                'eventType' => $eventType,
                'limit' => $limit,
                'objectID' => $objectID,
                'objectProperty' => $objectProperty,
                'objectType' => $objectType,
                'occurredAfter' => $occurredAfter,
                'occurredBefore' => $occurredBefore,
                'property' => $property,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

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
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listEventTypes(requestOptions: $requestOptions);

        return $response->parse();
    }
}
