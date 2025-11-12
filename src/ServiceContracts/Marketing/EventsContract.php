<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\Events\BatchResponseMarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\Events\CollectionResponseSearchPublicResponseWrapperNoPaging;
use HubspotSDK\Marketing\Events\CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPaging;
use HubspotSDK\Marketing\Events\EventCancelByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventCompleteByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventCreateParams;
use HubspotSDK\Marketing\Events\EventDeleteBatchByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventDeleteBatchParams;
use HubspotSDK\Marketing\Events\EventDeleteByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventGetByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventListParams;
use HubspotSDK\Marketing\Events\EventSearchByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventUpdateBatchParams;
use HubspotSDK\Marketing\Events\EventUpdateByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventUpdateParams;
use HubspotSDK\Marketing\Events\EventUpsertBatchParams;
use HubspotSDK\Marketing\Events\EventUpsertByExternalEventIDParams;
use HubspotSDK\Marketing\Events\EventUpsertSubscriberStateByEmailParams;
use HubspotSDK\Marketing\Events\EventUpsertSubscriberStateByIDParams;
use HubspotSDK\Marketing\Events\MarketingEventDefaultResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\Events\MarketingEventPublicReadResponse;
use HubspotSDK\Marketing\Events\MarketingEventPublicReadResponseV2;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface EventsContract
{
    /**
     * @api
     *
     * @param array<mixed>|EventCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|EventCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): MarketingEventDefaultResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|EventUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicDefaultResponseV2;

    /**
     * @api
     *
     * @param array<mixed>|EventListParams $params
     *
     * @return Page<MarketingEventPublicReadResponseV2>
     *
     * @throws APIException
     */
    public function list(
        array|EventListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|EventCancelByExternalEventIDParams $params
     *
     * @throws APIException
     */
    public function cancelByExternalEventID(
        string $externalEventID,
        array|EventCancelByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventDefaultResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventCompleteByExternalEventIDParams $params
     *
     * @throws APIException
     */
    public function completeByExternalEventID(
        string $externalEventID,
        array|EventCompleteByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventDefaultResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventDeleteBatchParams $params
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|EventDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|EventDeleteBatchByExternalEventIDParams $params
     *
     * @throws APIException
     */
    public function deleteBatchByExternalEventID(
        array|EventDeleteBatchByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param array<mixed>|EventDeleteByExternalEventIDParams $params
     *
     * @throws APIException
     */
    public function deleteByExternalEventID(
        string $externalEventID,
        array|EventDeleteByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): MarketingEventPublicReadResponseV2;

    /**
     * @api
     *
     * @param array<mixed>|EventGetByExternalEventIDParams $params
     *
     * @throws APIException
     */
    public function getByExternalEventID(
        string $externalEventID,
        array|EventGetByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicReadResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventSearchByExternalEventIDParams $params
     *
     * @throws APIException
     */
    public function searchByExternalEventID(
        array|EventSearchByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseSearchPublicResponseWrapperNoPaging;

    /**
     * @api
     *
     * @throws APIException
     */
    public function searchIdentifiersByExternalEventID(
        string $externalEventID,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPaging;

    /**
     * @api
     *
     * @param array<mixed>|EventUpdateBatchParams $params
     *
     * @throws APIException
     */
    public function updateBatch(
        array|EventUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseMarketingEventPublicDefaultResponseV2;

    /**
     * @api
     *
     * @param array<mixed>|EventUpdateByExternalEventIDParams $params
     *
     * @throws APIException
     */
    public function updateByExternalEventID(
        string $externalEventID,
        array|EventUpdateByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicDefaultResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventUpsertBatchParams $params
     *
     * @throws APIException
     */
    public function upsertBatch(
        array|EventUpsertBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseMarketingEventPublicDefaultResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventUpsertByExternalEventIDParams $params
     *
     * @throws APIException
     */
    public function upsertByExternalEventID(
        string $externalEventID,
        array|EventUpsertByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): MarketingEventPublicDefaultResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventUpsertSubscriberStateByEmailParams $params
     *
     * @throws APIException
     */
    public function upsertSubscriberStateByEmail(
        string $subscriberState,
        array|EventUpsertSubscriberStateByEmailParams $params,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param array<mixed>|EventUpsertSubscriberStateByIDParams $params
     *
     * @throws APIException
     */
    public function upsertSubscriberStateByID(
        string $subscriberState,
        array|EventUpsertSubscriberStateByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): string;
}
