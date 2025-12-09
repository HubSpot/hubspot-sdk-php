<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Contracts\BaseResponse;
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

interface EventsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|EventCreateParams $params
     *
     * @return BaseResponse<MarketingEventDefaultResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EventCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID The internal ID of the marketing event in HubSpot
     * @param array<mixed>|EventUpdateParams $params
     *
     * @return BaseResponse<MarketingEventPublicDefaultResponseV2>
     *
     * @throws APIException
     */
    public function update(
        string $objectID,
        array|EventUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventListParams $params
     *
     * @return BaseResponse<Page<MarketingEventPublicReadResponseV2>>
     *
     * @throws APIException
     */
    public function list(
        array|EventListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID The internal ID of the marketing event in HubSpot
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID The id of the marketing event in the external event application
     * @param array<mixed>|EventCancelByExternalEventIDParams $params
     *
     * @return BaseResponse<MarketingEventDefaultResponse>
     *
     * @throws APIException
     */
    public function cancelByExternalEventID(
        string $externalEventID,
        array|EventCancelByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID path param: The id of the marketing event in the external event application
     * @param array<mixed>|EventCompleteByExternalEventIDParams $params
     *
     * @return BaseResponse<MarketingEventDefaultResponse>
     *
     * @throws APIException
     */
    public function completeByExternalEventID(
        string $externalEventID,
        array|EventCompleteByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventDeleteBatchParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|EventDeleteBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventDeleteBatchByExternalEventIDParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function deleteBatchByExternalEventID(
        array|EventDeleteBatchByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID The id of the marketing event in the external event application
     * @param array<mixed>|EventDeleteByExternalEventIDParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteByExternalEventID(
        string $externalEventID,
        array|EventDeleteByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID The internal ID of the marketing event in HubSpot
     *
     * @return BaseResponse<MarketingEventPublicReadResponseV2>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID The id of the marketing event in the external event application
     * @param array<mixed>|EventGetByExternalEventIDParams $params
     *
     * @return BaseResponse<MarketingEventPublicReadResponse>
     *
     * @throws APIException
     */
    public function getByExternalEventID(
        string $externalEventID,
        array|EventGetByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventSearchByExternalEventIDParams $params
     *
     * @return BaseResponse<CollectionResponseSearchPublicResponseWrapperNoPaging>
     *
     * @throws APIException
     */
    public function searchByExternalEventID(
        array|EventSearchByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID the id of the marketing event in the external event application
     *
     * @return BaseResponse<CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPaging,>
     *
     * @throws APIException
     */
    public function searchIdentifiersByExternalEventID(
        string $externalEventID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventUpdateBatchParams $params
     *
     * @return BaseResponse<BatchResponseMarketingEventPublicDefaultResponseV2>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|EventUpdateBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID Path param: The id of the marketing event in the external event application
     * @param array<mixed>|EventUpdateByExternalEventIDParams $params
     *
     * @return BaseResponse<MarketingEventPublicDefaultResponse>
     *
     * @throws APIException
     */
    public function updateByExternalEventID(
        string $externalEventID,
        array|EventUpdateByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventUpsertBatchParams $params
     *
     * @return BaseResponse<BatchResponseMarketingEventPublicDefaultResponse>
     *
     * @throws APIException
     */
    public function upsertBatch(
        array|EventUpsertBatchParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID The id of the marketing event in the external event application
     * @param array<mixed>|EventUpsertByExternalEventIDParams $params
     *
     * @return BaseResponse<MarketingEventPublicDefaultResponse>
     *
     * @throws APIException
     */
    public function upsertByExternalEventID(
        string $externalEventID,
        array|EventUpsertByExternalEventIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberState Path param: The new subscriber state for the HubSpot contacts and the specified marketing event. For example: 'register', 'attend' or 'cancel'.
     * @param array<mixed>|EventUpsertSubscriberStateByEmailParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function upsertSubscriberStateByEmail(
        string $subscriberState,
        array|EventUpsertSubscriberStateByEmailParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberState Path param: The new subscriber state for the HubSpot contacts and the specified marketing event. For example: 'register', 'attend' or 'cancel'.
     * @param array<mixed>|EventUpsertSubscriberStateByIDParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function upsertSubscriberStateByID(
        string $subscriberState,
        array|EventUpsertSubscriberStateByIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
