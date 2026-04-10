<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Events;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Events\Occurrences\ExternalUnifiedEvent;
use HubSpotSDK\Events\Occurrences\OccurrenceListParams\ObjectProperty;
use HubSpotSDK\Events\Occurrences\OccurrenceListParams\Property;
use HubSpotSDK\Events\Occurrences\VisibleExternalEventTypeNames;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type ObjectPropertyShape from \HubSpotSDK\Events\Occurrences\OccurrenceListParams\ObjectProperty
 * @phpstan-import-type PropertyShape from \HubSpotSDK\Events\Occurrences\OccurrenceListParams\Property
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
