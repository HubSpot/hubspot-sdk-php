<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Events;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\Occurrences\ExternalUnifiedEvent;
use HubspotSDK\Events\Occurrences\OccurrenceListParams\ObjectProperty;
use HubspotSDK\Events\Occurrences\OccurrenceListParams\Property;
use HubspotSDK\Events\Occurrences\VisibleExternalEventTypeNames;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type ObjectPropertyShape from \HubspotSDK\Events\Occurrences\OccurrenceListParams\ObjectProperty
 * @phpstan-import-type PropertyShape from \HubspotSDK\Events\Occurrences\OccurrenceListParams\Property
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface OccurrencesContract
{
    /**
     * @api
     *
     * @param list<string> $id an array of event IDs to filter by
     * @param string $after A cursor token for pagination. Use the value from the previous response's paging.next.after field.
     * @param string $before a cursor token to retrieve results before a specific point
     * @param string $eventType the type of event to filter by
     * @param int $limit the maximum number of results to display per page
     * @param int $objectID the unique identifier of the object associated with the events
     * @param ObjectProperty|ObjectPropertyShape $objectProperty
     * @param string $objectType the type of object associated with the events
     * @param \DateTimeInterface $occurredAfter filter events that occurred after this date-time
     * @param \DateTimeInterface $occurredBefore filter events that occurred before this date-time
     * @param list<string> $properties an array of property names to include in the response
     * @param Property|PropertyShape $property
     * @param list<string> $sort an array of fields to sort the results by
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
        ?array $properties = null,
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
