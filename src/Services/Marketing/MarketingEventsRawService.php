<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\MarketingEvents\BatchResponseMarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\MarketingEvents\BatchResponseMarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\MarketingEvents\CollectionResponseSearchPublicResponseWrapperNoPaging;
use HubspotSDK\Marketing\MarketingEvents\CollectionResponseWithTotalMarketingEventIdentifiersResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventCreateParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventCreateRequestParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventDefaultResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventDeleteBatchByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventDeleteBatchParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventDeleteByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventExternalUniqueIdentifier;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventGetByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventListParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicObjectIDDeleteRequest;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicReadResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicReadResponseV2;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicUpdateRequestFullV2;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventSearchByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpdateBatchParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpdateByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpdateParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpsertBatchParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpsertByExternalEventIDParams;
use HubspotSDK\Page;
use HubspotSDK\PropertyValue;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\MarketingEventsRawContract;

/**
 * @phpstan-import-type MarketingEventPublicObjectIDDeleteRequestShape from \HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicObjectIDDeleteRequest
 * @phpstan-import-type MarketingEventExternalUniqueIdentifierShape from \HubspotSDK\Marketing\MarketingEvents\MarketingEventExternalUniqueIdentifier
 * @phpstan-import-type MarketingEventPublicUpdateRequestFullV2Shape from \HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicUpdateRequestFullV2
 * @phpstan-import-type MarketingEventCreateRequestParamsShape from \HubspotSDK\Marketing\MarketingEvents\MarketingEventCreateRequestParams
 * @phpstan-import-type PropertyValueShape from \HubspotSDK\PropertyValue
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class MarketingEventsRawService implements MarketingEventsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new marketing event in HubSpot
     *
     * @param array{
     *   customProperties: list<PropertyValue|PropertyValueShape>,
     *   eventName: string,
     *   eventOrganizer: string,
     *   externalAccountID: string,
     *   externalEventID: string,
     *   endDateTime?: \DateTimeInterface,
     *   eventCancelled?: bool,
     *   eventCompleted?: bool,
     *   eventDescription?: string,
     *   eventType?: string,
     *   eventURL?: string,
     *   startDateTime?: \DateTimeInterface,
     * }|MarketingEventCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventDefaultResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MarketingEventCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MarketingEventCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/marketing-events/2026-03/events',
            body: (object) $parsed,
            options: $options,
            convert: MarketingEventDefaultResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates the details of an existing Marketing Event identified by its objectId, if it exists.
     *
     * @param string $objectID the internal id of the marketing event in HubSpot
     * @param array{
     *   customProperties: list<PropertyValue|PropertyValueShape>,
     *   endDateTime?: \DateTimeInterface,
     *   eventCancelled?: bool,
     *   eventDescription?: string,
     *   eventName?: string,
     *   eventOrganizer?: string,
     *   eventType?: string,
     *   eventURL?: string,
     *   startDateTime?: \DateTimeInterface,
     * }|MarketingEventUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventPublicDefaultResponseV2>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|MarketingEventUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MarketingEventUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['marketing/marketing-events/2026-03/%1$s', $objectID],
            body: (object) $parsed,
            options: $options,
            convert: MarketingEventPublicDefaultResponseV2::class,
        );
    }

    /**
     * @api
     *
     * @param array{after?: string, limit?: int}|MarketingEventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<MarketingEventPublicReadResponseV2>>
     *
     * @throws APIException
     */
    public function list(
        array|MarketingEventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MarketingEventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'marketing/marketing-events/2026-03',
            query: $parsed,
            options: $options,
            convert: MarketingEventPublicReadResponseV2::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Deletes the existing Marketing Event with the specified objectId, if it exists.
     *
     * @param string $objectID the internal id of the marketing event in HubSpot
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['marketing/marketing-events/2026-03/%1$s', $objectID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Deletes multiple Marketing Events from the portal based on their objectId, if they exist.
     *
     * Responses:
     * 204: Returned if all specified Marketing Events were successfully deleted.
     * 207: Returned if some objectIds did not correspond to any existing Marketing Events.
     *
     * @param array{
     *   inputs: list<MarketingEventPublicObjectIDDeleteRequest|MarketingEventPublicObjectIDDeleteRequestShape>,
     * }|MarketingEventDeleteBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|MarketingEventDeleteBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MarketingEventDeleteBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/marketing-events/2026-03/batch/archive',
            headers: ['Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Deletes multiple Marketing Events based on externalAccountId, externalEventId, and appId.
     *
     * Only Marketing Events created by the same apps will be deleted; events from other apps cannot be removed by this endpoint.
     *
     * @param array{
     *   inputs: list<MarketingEventExternalUniqueIdentifier|MarketingEventExternalUniqueIdentifierShape>,
     * }|MarketingEventDeleteBatchByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function deleteBatchByExternalEventID(
        array|MarketingEventDeleteBatchByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MarketingEventDeleteBatchByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/marketing-events/2026-03/events/delete',
            headers: ['Accept' => '*/*'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Deletes the existing Marketing Event with the specified externalAccountId, externalEventId, if it exists.
     *
     * Only Marketing Events created by the same app can be deleted.
     *
     * @param array{
     *   externalAccountID: string
     * }|MarketingEventDeleteByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByExternalEventID(
        string $externalEventID,
        array|MarketingEventDeleteByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MarketingEventDeleteByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'marketing/marketing-events/2026-03/events/%1$s', $externalEventID,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['externalAccountID' => 'externalAccountId']
            ),
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Returns the details of a Marketing Event with the specified objectId, if it exists.
     *
     * @param string $objectID the internal id of the marketing event in HubSpot
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventPublicReadResponseV2>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/marketing-events/2026-03/%1$s', $objectID],
            options: $requestOptions,
            convert: MarketingEventPublicReadResponseV2::class,
        );
    }

    /**
     * @api
     *
     * Returns the details of a Marketing Event with the specified externalAccountId, externalEventId, if it exists.
     *
     * Only Marketing Events created by the same app making the request can be retrieved.
     *
     * @param array{
     *   externalAccountID: string
     * }|MarketingEventGetByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventPublicReadResponse>
     *
     * @throws APIException
     */
    public function getByExternalEventID(
        string $externalEventID,
        array|MarketingEventGetByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MarketingEventGetByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/marketing-events/2026-03/events/%1$s', $externalEventID,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['externalAccountID' => 'externalAccountId']
            ),
            options: $options,
            convert: MarketingEventPublicReadResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves Marketing Events where the externalEventId matches the value provided in the request, limited to events created by the app making the request.
     *
     * Marketing Events created by other apps will not be included in the results.
     *
     * @param array{q: string}|MarketingEventSearchByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseSearchPublicResponseWrapperNoPaging>
     *
     * @throws APIException
     */
    public function searchByExternalEventID(
        array|MarketingEventSearchByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MarketingEventSearchByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'marketing/marketing-events/2026-03/events/search',
            query: $parsed,
            options: $options,
            convert: CollectionResponseSearchPublicResponseWrapperNoPaging::class,
        );
    }

    /**
     * @api
     *
     * This endpoint searches the portal for all Marketing Events whose externalEventId matches the value provided in the request.
     *
     * It retrieves the objectId and additional event details for each matching Marketing Event.
     *
     * Since multiple Marketing Events can have the same externalEventId, the endpoint returns all matching results.
     *
     * Note: Marketing Events become searchable by externalEventId a few minutes after creation.
     *
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalMarketingEventIdentifiersResponse,>
     *
     * @throws APIException
     */
    public function searchIdentifiersByExternalEventID(
        string $externalEventID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/marketing-events/2026-03/%1$s/identifiers', $externalEventID,
            ],
            options: $requestOptions,
            convert: CollectionResponseWithTotalMarketingEventIdentifiersResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates multiple Marketing Events on the portal based on their objectId, if they exist.
     *
     * @param array{
     *   inputs: list<MarketingEventPublicUpdateRequestFullV2|MarketingEventPublicUpdateRequestFullV2Shape>,
     * }|MarketingEventUpdateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseMarketingEventPublicDefaultResponseV2>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|MarketingEventUpdateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MarketingEventUpdateBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/marketing-events/2026-03/batch/update',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseMarketingEventPublicDefaultResponseV2::class,
        );
    }

    /**
     * @api
     *
     * Updates the details of an existing Marketing Event identified by its externalAccountId, externalEventId if it exists.
     *
     * Only Marketing Events created by the same app can be updated.
     *
     * @param string $externalEventID Path param
     * @param array{
     *   externalAccountID: string,
     *   customProperties: list<PropertyValue|PropertyValueShape>,
     *   endDateTime?: \DateTimeInterface,
     *   eventCancelled?: bool,
     *   eventCompleted?: bool,
     *   eventDescription?: string,
     *   eventName?: string,
     *   eventOrganizer?: string,
     *   eventType?: string,
     *   eventURL?: string,
     *   startDateTime?: \DateTimeInterface,
     * }|MarketingEventUpdateByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventPublicDefaultResponse>
     *
     * @throws APIException
     */
    public function updateByExternalEventID(
        string $externalEventID,
        array|MarketingEventUpdateByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MarketingEventUpdateByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['externalAccountID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: [
                'marketing/marketing-events/2026-03/events/%1$s', $externalEventID,
            ],
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['externalAccountID' => 'externalAccountId'],
            ),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: MarketingEventPublicDefaultResponse::class,
        );
    }

    /**
     * @api
     *
     * Upserts multiple Marketing Events. If a Marketing Event with the specified ID already exists, it will be updated; otherwise, a new event will be created.
     *
     * Only Marketing Events originally created by the same app can be updated.
     *
     * @param array{
     *   inputs: list<MarketingEventCreateRequestParams|MarketingEventCreateRequestParamsShape>,
     * }|MarketingEventUpsertBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseMarketingEventPublicDefaultResponse>
     *
     * @throws APIException
     */
    public function upsertBatch(
        array|MarketingEventUpsertBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MarketingEventUpsertBatchParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'marketing/marketing-events/2026-03/events/upsert',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseMarketingEventPublicDefaultResponse::class,
        );
    }

    /**
     * @api
     *
     * Upserts a marketing event If there is an existing marketing event with the specified ID, it will be updated; otherwise a new event will be created.
     *
     * @param array{
     *   customProperties: list<PropertyValue|PropertyValueShape>,
     *   eventName: string,
     *   eventOrganizer: string,
     *   externalAccountID: string,
     *   externalEventID: string,
     *   endDateTime?: \DateTimeInterface,
     *   eventCancelled?: bool,
     *   eventCompleted?: bool,
     *   eventDescription?: string,
     *   eventType?: string,
     *   eventURL?: string,
     *   startDateTime?: \DateTimeInterface,
     * }|MarketingEventUpsertByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventPublicDefaultResponse>
     *
     * @throws APIException
     */
    public function upsertByExternalEventID(
        string $externalEventID_,
        array|MarketingEventUpsertByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MarketingEventUpsertByExternalEventIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'marketing/marketing-events/2026-03/events/%1$s', $externalEventID_,
            ],
            body: (object) $parsed,
            options: $options,
            convert: MarketingEventPublicDefaultResponse::class,
        );
    }
}
