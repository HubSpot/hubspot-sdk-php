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
     * @param list<string> $id
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param ObjectProperty|ObjectPropertyShape $objectProperty
     * @param list<string> $properties
     * @param Property|PropertyShape $property
     * @param list<string> $sort
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
