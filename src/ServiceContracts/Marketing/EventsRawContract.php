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

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface EventsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EventCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventDefaultResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EventCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID The internal ID of the marketing event in HubSpot
     * @param array<string,mixed>|EventUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<MarketingEventPublicReadResponseV2>>
     *
     * @throws APIException
     */
    public function list(
        array|EventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID The internal ID of the marketing event in HubSpot
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID The id of the marketing event in the external event application
     * @param array<string,mixed>|EventCancelByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventDefaultResponse>
     *
     * @throws APIException
     */
    public function cancelByExternalEventID(
        string $externalEventID,
        array|EventCancelByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID path param: The id of the marketing event in the external event application
     * @param array<string,mixed>|EventCompleteByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventDefaultResponse>
     *
     * @throws APIException
     */
    public function completeByExternalEventID(
        string $externalEventID,
        array|EventCompleteByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EventDeleteBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|EventDeleteBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EventDeleteBatchByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function deleteBatchByExternalEventID(
        array|EventDeleteBatchByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID The id of the marketing event in the external event application
     * @param array<string,mixed>|EventDeleteByExternalEventIDParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID The internal ID of the marketing event in HubSpot
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventPublicReadResponseV2>
     *
     * @throws APIException
     */
    public function get(
        string $objectID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID The id of the marketing event in the external event application
     * @param array<string,mixed>|EventGetByExternalEventIDParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EventSearchByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseSearchPublicResponseWrapperNoPaging>
     *
     * @throws APIException
     */
    public function searchByExternalEventID(
        array|EventSearchByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID the id of the marketing event in the external event application
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalMarketingEventIdentifiersResponseNoPaging,>
     *
     * @throws APIException
     */
    public function searchIdentifiersByExternalEventID(
        string $externalEventID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EventUpdateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseMarketingEventPublicDefaultResponseV2>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|EventUpdateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID Path param: The id of the marketing event in the external event application
     * @param array<string,mixed>|EventUpdateByExternalEventIDParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EventUpsertBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseMarketingEventPublicDefaultResponse>
     *
     * @throws APIException
     */
    public function upsertBatch(
        array|EventUpsertBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID_ The id of the marketing event in the external event application
     * @param array<string,mixed>|EventUpsertByExternalEventIDParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberState Path param: The new subscriber state for the HubSpot contacts and the specified marketing event. For example: 'register', 'attend' or 'cancel'.
     * @param array<string,mixed>|EventUpsertSubscriberStateByEmailParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberState Path param: The new subscriber state for the HubSpot contacts and the specified marketing event. For example: 'register', 'attend' or 'cancel'.
     * @param array<string,mixed>|EventUpsertSubscriberStateByIDParams $params
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
    ): BaseResponse;
}
