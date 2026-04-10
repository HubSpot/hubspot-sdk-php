<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\MarketingEvents\BatchResponseMarketingEventPublicDefaultResponse;
use HubSpotSDK\Marketing\MarketingEvents\BatchResponseMarketingEventPublicDefaultResponseV2;
use HubSpotSDK\Marketing\MarketingEvents\CollectionResponseSearchPublicResponseWrapperNoPaging;
use HubSpotSDK\Marketing\MarketingEvents\CollectionResponseWithTotalMarketingEventIdentifiersResponse;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventCreateParams;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventDefaultResponse;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventDeleteBatchByExternalEventIDParams;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventDeleteBatchParams;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventDeleteByExternalEventIDParams;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventGetByExternalEventIDParams;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventListParams;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventPublicDefaultResponse;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventPublicDefaultResponseV2;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventPublicReadResponse;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventPublicReadResponseV2;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventSearchByExternalEventIDParams;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventUpdateBatchParams;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventUpdateByExternalEventIDParams;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventUpdateParams;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventUpsertBatchParams;
use HubSpotSDK\Marketing\MarketingEvents\MarketingEventUpsertByExternalEventIDParams;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
