<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\Events\CollectionResponseSearchPublicResponseWrapperNoPaging;
use HubspotSDK\Marketing\Events\CollectionResponseWithTotalMarketingEventIdentifiersResponse;
use HubspotSDK\Marketing\Events\EventCreateParams;
use HubspotSDK\Marketing\Events\EventDeleteBatchByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventDeleteBatchParams;
use HubspotSDK\Marketing\Events\EventDeleteByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventGetByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventSearchByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventUpdateBatchParams;
use HubspotSDK\Marketing\Events\EventUpdateByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventUpdateParams;
use HubspotSDK\Marketing\Events\EventUpsertBatchParams;
use HubspotSDK\Marketing\Events\EventUpsertByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventUpsertSubscriberStateByEmailParams;
use HubspotSDK\Marketing\Events\EventUpsertSubscriberStateByIDParams;
use HubspotSDK\Marketing\Events\MarketingEventCreateRequestParams;
use HubspotSDK\Marketing\Events\MarketingEventDefaultResponse;
use HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber;
use HubspotSDK\Marketing\Events\MarketingEventExternalUniqueIdentifier;
use HubspotSDK\Marketing\Events\MarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\Events\MarketingEventPublicObjectIDDeleteRequest;
use HubspotSDK\Marketing\Events\MarketingEventPublicReadResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicReadResponseV2;
use HubspotSDK\Marketing\Events\MarketingEventPublicUpdateRequestFullV2;
use HubspotSDK\Marketing\Events\MarketingEventSubscriber;
use HubspotSDK\PropertyValue;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\EventsRawContract;

/**
 * @phpstan-import-type MarketingEventPublicObjectIDDeleteRequestShape from \HubspotSDK\Marketing\Events\MarketingEventPublicObjectIDDeleteRequest
 * @phpstan-import-type MarketingEventExternalUniqueIdentifierShape from \HubspotSDK\Marketing\Events\MarketingEventExternalUniqueIdentifier
 * @phpstan-import-type MarketingEventPublicUpdateRequestFullV2Shape from \HubspotSDK\Marketing\Events\MarketingEventPublicUpdateRequestFullV2
 * @phpstan-import-type MarketingEventCreateRequestParamsShape from \HubspotSDK\Marketing\Events\MarketingEventCreateRequestParams
 * @phpstan-import-type MarketingEventEmailSubscriberShape from \HubspotSDK\Marketing\Events\MarketingEventEmailSubscriber
 * @phpstan-import-type MarketingEventSubscriberShape from \HubspotSDK\Marketing\Events\MarketingEventSubscriber
 * @phpstan-import-type PropertyValueShape from \HubspotSDK\PropertyValue
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
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
     * }|EventCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventDefaultResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EventCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventCreateParams::parseRequest(
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
     * }|EventUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventPublicDefaultResponseV2>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|EventUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventUpdateParams::parseRequest(
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
     * @param array{
     *   inputs: list<MarketingEventPublicObjectIDDeleteRequest|MarketingEventPublicObjectIDDeleteRequestShape>,
     * }|EventDeleteBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|EventDeleteBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventDeleteBatchParams::parseRequest(
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
     * @param array{
     *   inputs: list<MarketingEventExternalUniqueIdentifier|MarketingEventExternalUniqueIdentifierShape>,
     * }|EventDeleteBatchByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function deleteBatchByExternalEventID(
        array|EventDeleteBatchByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventDeleteBatchByExternalEventIDParams::parseRequest(
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
     * @param array{
     *   externalAccountID: string
     * }|EventDeleteByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByExternalEventID(
        string $externalEventID,
        array|EventDeleteByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventDeleteByExternalEventIDParams::parseRequest(
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
     * @param array{externalAccountID: string}|EventGetByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventPublicReadResponse>
     *
     * @throws APIException
     */
    public function getByExternalEventID(
        string $externalEventID,
        array|EventGetByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventGetByExternalEventIDParams::parseRequest(
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
     * @param array{q: string}|EventSearchByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseSearchPublicResponseWrapperNoPaging>
     *
     * @throws APIException
     */
    public function searchByExternalEventID(
        array|EventSearchByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventSearchByExternalEventIDParams::parseRequest(
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
     * @param array{
     *   inputs: list<MarketingEventPublicUpdateRequestFullV2|MarketingEventPublicUpdateRequestFullV2Shape>,
     * }|EventUpdateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseMarketingEventPublicDefaultResponseV2>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|EventUpdateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventUpdateBatchParams::parseRequest(
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
     * }|EventUpdateByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventPublicDefaultResponse>
     *
     * @throws APIException
     */
    public function updateByExternalEventID(
        string $externalEventID,
        array|EventUpdateByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventUpdateByExternalEventIDParams::parseRequest(
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
     * @param array{
     *   inputs: list<MarketingEventCreateRequestParams|MarketingEventCreateRequestParamsShape>,
     * }|EventUpsertBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseMarketingEventPublicDefaultResponse>
     *
     * @throws APIException
     */
    public function upsertBatch(
        array|EventUpsertBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventUpsertBatchParams::parseRequest(
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
     * }|EventUpsertByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventPublicDefaultResponse>
     *
     * @throws APIException
     */
    public function upsertByExternalEventID(
        string $externalEventID_,
        array|EventUpsertByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventUpsertByExternalEventIDParams::parseRequest(
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

    /**
     * @api
     *
     * @param string $subscriberState Path param
     * @param array{
     *   externalEventID: string,
     *   externalAccountID: string,
     *   inputs: list<MarketingEventEmailSubscriber|MarketingEventEmailSubscriberShape>,
     * }|EventUpsertSubscriberStateByEmailParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function upsertSubscriberStateByEmail(
        string $subscriberState,
        array|EventUpsertSubscriberStateByEmailParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventUpsertSubscriberStateByEmailParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalEventID = $parsed['externalEventID'];
        unset($parsed['externalEventID']);
        $query_params = array_flip(['externalAccountID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/marketing-events/2026-03/events/%1$s/%2$s/email-upsert',
                $externalEventID,
                $subscriberState,
            ],
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['externalAccountID' => 'externalAccountId'],
            ),
            headers: ['Accept' => '*/*'],
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                array_flip(['externalEventID'])
            ),
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * @param string $subscriberState Path param
     * @param array{
     *   externalEventID: string,
     *   externalAccountID: string,
     *   inputs: list<MarketingEventSubscriber|MarketingEventSubscriberShape>,
     * }|EventUpsertSubscriberStateByIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function upsertSubscriberStateByID(
        string $subscriberState,
        array|EventUpsertSubscriberStateByIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EventUpsertSubscriberStateByIDParams::parseRequest(
            $params,
            $requestOptions,
        );
        $externalEventID = $parsed['externalEventID'];
        unset($parsed['externalEventID']);
        $query_params = array_flip(['externalAccountID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'marketing/marketing-events/2026-03/events/%1$s/%2$s/upsert',
                $externalEventID,
                $subscriberState,
            ],
            query: Util::array_transform_keys(
                array_intersect_key($parsed, $query_params),
                ['externalAccountID' => 'externalAccountId'],
            ),
            headers: ['Accept' => '*/*'],
            body: (object) array_diff_key(
                array_diff_key($parsed, $query_params),
                array_flip(['externalEventID'])
            ),
            options: $options,
            convert: 'string',
        );
    }
}
