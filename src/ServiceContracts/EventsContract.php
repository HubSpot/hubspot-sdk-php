<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\EventListParams\ObjectProperty;
use HubspotSDK\Events\EventListParams\Property;
use HubspotSDK\Events\ExternalUnifiedEvent;
use HubspotSDK\Events\VisibleExternalEventTypeNames;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type ObjectPropertyShape from \HubspotSDK\Events\EventListParams\ObjectProperty
 * @phpstan-import-type PropertyShape from \HubspotSDK\Events\EventListParams\Property
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface EventsContract
{
    /**
     * @api
     *
     * @param list<string> $id ID of an event instance. IDs are 1:1 with event instances. If you provide this filter and additional filters, the other filters must match the values on the event instance to yield results.
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $eventType The event type name. You can retrieve available event types using the [event types endpoint](#get-%2Fevents%2Fv3%2Fevents%2Fevent-types).
     * @param int $limit the maximum number of results to display per page
     * @param int $objectID The ID of the CRM Object to filter event instances on. When including this parameter, you must also include the `objectType` parameter.
     * @param ObjectProperty|ObjectPropertyShape $objectProperty
     * @param string $objectType The type of CRM object to filter event instances on (e.g., `contact`). To retrieve event data for a specific CRM record, include the additional `objectId` query parameter (below).
     * @param \DateTimeInterface $occurredAfter filter for event data that occurred after a specific datetime
     * @param \DateTimeInterface $occurredBefore filter for event data that occurred before a specific datetime
     * @param Property|PropertyShape $property
     * @param list<string> $sort sort direction based on the timestamp of the event instance, `ASCENDING` or `DESCENDING`
     * @param RequestOpts|null $requestOptions
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
        ObjectProperty|array|null $objectProperty = null,
        ?string $objectType = null,
        ?\DateTimeInterface $occurredAfter = null,
        ?\DateTimeInterface $occurredBefore = null,
        Property|array|null $property = null,
        ?array $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listEventTypes(
        RequestOptions|array|null $requestOptions = null
    ): VisibleExternalEventTypeNames;
}
