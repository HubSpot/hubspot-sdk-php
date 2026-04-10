<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Events;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Events\Occurrences\ExternalUnifiedEvent;
use HubSpotSDK\Events\Occurrences\OccurrenceListParams\ObjectProperty;
use HubSpotSDK\Events\Occurrences\OccurrenceListParams\Property;
use HubSpotSDK\Events\Occurrences\VisibleExternalEventTypeNames;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Events\OccurrencesContract;

/**
 * @phpstan-import-type ObjectPropertyShape from \HubSpotSDK\Events\Occurrences\OccurrenceListParams\ObjectProperty
 * @phpstan-import-type PropertyShape from \HubSpotSDK\Events\Occurrences\OccurrenceListParams\Property
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class OccurrencesService implements OccurrencesContract
{
    /**
     * @api
     */
    public OccurrencesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OccurrencesRawService($client);
    }

    /**
     * @api
     *
     * Retrieve event occurrences for the specified time frame. This endpoint allows filtering by various parameters such as object type, event type, and occurrence time. It supports pagination and sorting of results.
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
                'properties' => $properties,
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
     * Retrieve a list of event type names. You may use these event types to query the API for event occurrences of a desired type.
     *
     * Note: the `get_types` method is only supported in the Python SDK version `12.0.0-beta.1` or later.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listEventTypes(
        RequestOptions|array|null $requestOptions = null
    ): VisibleExternalEventTypeNames {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listEventTypes(requestOptions: $requestOptions);

        return $response->parse();
    }
}
