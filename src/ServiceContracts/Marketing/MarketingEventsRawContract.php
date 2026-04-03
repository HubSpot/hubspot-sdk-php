<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\MarketingEvents\BatchResponseMarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\MarketingEvents\BatchResponseMarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\MarketingEvents\CollectionResponseSearchPublicResponseWrapperNoPaging;
use HubspotSDK\Marketing\MarketingEvents\CollectionResponseWithTotalMarketingEventIdentifiersResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventCreateParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventDefaultResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventDeleteBatchByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventDeleteBatchParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventDeleteByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventGetByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventListParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicDefaultResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicDefaultResponseV2;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicReadResponse;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventPublicReadResponseV2;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventSearchByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpdateBatchParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpdateByExternalEventIDParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpdateParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpsertBatchParams;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventUpsertByExternalEventIDParams;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface MarketingEventsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MarketingEventCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MarketingEventDefaultResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MarketingEventCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $objectID the internal id of the marketing event in HubSpot
     * @param array<string,mixed>|MarketingEventUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MarketingEventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<MarketingEventPublicReadResponseV2>>
     *
     * @throws APIException
     */
    public function list(
        array|MarketingEventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MarketingEventDeleteBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function deleteBatch(
        array|MarketingEventDeleteBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MarketingEventDeleteBatchByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function deleteBatchByExternalEventID(
        array|MarketingEventDeleteBatchByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MarketingEventDeleteByExternalEventIDParams $params
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
    ): BaseResponse;

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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MarketingEventGetByExternalEventIDParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MarketingEventSearchByExternalEventIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseSearchPublicResponseWrapperNoPaging>
     *
     * @throws APIException
     */
    public function searchByExternalEventID(
        array|MarketingEventSearchByExternalEventIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MarketingEventUpdateBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseMarketingEventPublicDefaultResponseV2>
     *
     * @throws APIException
     */
    public function updateBatch(
        array|MarketingEventUpdateBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $externalEventID Path param
     * @param array<string,mixed>|MarketingEventUpdateByExternalEventIDParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MarketingEventUpsertBatchParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseMarketingEventPublicDefaultResponse>
     *
     * @throws APIException
     */
    public function upsertBatch(
        array|MarketingEventUpsertBatchParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MarketingEventUpsertByExternalEventIDParams $params
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
    ): BaseResponse;
}
