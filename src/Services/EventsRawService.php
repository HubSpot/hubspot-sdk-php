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
use HubspotSDK\ServiceContracts\EventsRawContract;

final class EventsRawService implements EventsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     *   objectProperty?: array{_propname?: mixed},
     *   objectType?: string,
     *   occurredAfter?: string|\DateTimeInterface,
     *   occurredBefore?: string|\DateTimeInterface,
     *   property?: array{_propname?: mixed},
     *   sort?: list<string>,
     * }|EventListParams $params
     *
     * @return BaseResponse<Page<ExternalUnifiedEvent>>
     *
     * @throws APIException
     */
    public function list(
        array|EventListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = EventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'events/v3/events/',
            query: Util::array_transform_keys($parsed, ['objectID' => 'objectId']),
            options: $options,
            convert: ExternalUnifiedEvent::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * This endpoint returns a list of event type names which are visible to you. You may use these event type names to query the API for specific event instances of a desired type.
     *
     * Note: the `get_types` method is only supported in the Python SDK version `12.0.0-beta.1` or later.
     *
     * @return BaseResponse<VisibleExternalEventTypeNames>
     *
     * @throws APIException
     */
    public function listEventTypes(
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'events/v3/events/event-types',
            options: $requestOptions,
            convert: VisibleExternalEventTypeNames::class,
        );
    }
}
