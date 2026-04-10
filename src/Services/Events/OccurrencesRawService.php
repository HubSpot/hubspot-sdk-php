<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Events;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Events\Occurrences\ExternalUnifiedEvent;
use HubSpotSDK\Events\Occurrences\OccurrenceListParams;
use HubSpotSDK\Events\Occurrences\OccurrenceListParams\ObjectProperty;
use HubSpotSDK\Events\Occurrences\OccurrenceListParams\Property;
use HubSpotSDK\Events\Occurrences\VisibleExternalEventTypeNames;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Events\OccurrencesRawContract;

/**
 * @phpstan-import-type ObjectPropertyShape from \HubSpotSDK\Events\Occurrences\OccurrenceListParams\ObjectProperty
 * @phpstan-import-type PropertyShape from \HubSpotSDK\Events\Occurrences\OccurrenceListParams\Property
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class OccurrencesRawService implements OccurrencesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve event occurrences for the specified time frame. This endpoint allows filtering by various parameters such as object type, event type, and occurrence time. It supports pagination and sorting of results.
     *
     * @param array{
     *   id?: list<string>,
     *   after?: string,
     *   before?: string,
     *   eventType?: string,
     *   limit?: int,
     *   objectID?: int,
     *   objectProperty?: ObjectProperty|ObjectPropertyShape,
     *   objectType?: string,
     *   occurredAfter?: \DateTimeInterface,
     *   occurredBefore?: \DateTimeInterface,
     *   properties?: list<string>,
     *   property?: Property|PropertyShape,
     *   sort?: list<string>,
     * }|OccurrenceListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ExternalUnifiedEvent>>
     *
     * @throws APIException
     */
    public function list(
        array|OccurrenceListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OccurrenceListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'events/event-occurrences/2026-03',
            query: Util::array_transform_keys($parsed, ['objectID' => 'objectId']),
            options: $options,
            convert: ExternalUnifiedEvent::class,
            page: Page::class,
        );
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
     * @return BaseResponse<VisibleExternalEventTypeNames>
     *
     * @throws APIException
     */
    public function listEventTypes(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'events/event-occurrences/2026-03/event-types',
            options: $requestOptions,
            convert: VisibleExternalEventTypeNames::class,
        );
    }
}
