<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Subscriptions\V4;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Subscriptions\V4\ActionResponseWithResultsPublicStatus;
use HubspotSDK\Marketing\Subscriptions\V4\ActionResponseWithResultsPublicWideStatus;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicBulkOptOutFromAllResponse;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicStatus;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicStatusBulkResponse;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicWideStatusBulkResponse;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchGetUnsubscribeAllStatusParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchUnsubscribeAllParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusBatchUpdateParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusGetUnsubscribeAllStatusParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUnsubscribeAllParams;
use HubspotSDK\Marketing\Subscriptions\V4\Statuses\StatusUpdateParams;
use HubspotSDK\RequestOptions;

interface StatusesRawContract
{
    /**
     * @api
     *
     * @param string $subscriberIDString the contact's email address
     * @param array<mixed>|StatusUpdateParams $params
     *
     * @return BaseResponse<ActionResponseWithResultsPublicStatus>
     *
     * @throws APIException
     */
    public function update(
        string $subscriberIDString,
        array|StatusUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|StatusBatchGetParams $params
     *
     * @return BaseResponse<BatchResponsePublicStatusBulkResponse>
     *
     * @throws APIException
     */
    public function batchGet(
        array|StatusBatchGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|StatusBatchGetUnsubscribeAllStatusParams $params
     *
     * @return BaseResponse<BatchResponsePublicWideStatusBulkResponse>
     *
     * @throws APIException
     */
    public function batchGetUnsubscribeAllStatus(
        array|StatusBatchGetUnsubscribeAllStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|StatusBatchUnsubscribeAllParams $params
     *
     * @return BaseResponse<BatchResponsePublicBulkOptOutFromAllResponse>
     *
     * @throws APIException
     */
    public function batchUnsubscribeAll(
        array|StatusBatchUnsubscribeAllParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|StatusBatchUpdateParams $params
     *
     * @return BaseResponse<BatchResponsePublicStatus>
     *
     * @throws APIException
     */
    public function batchUpdate(
        array|StatusBatchUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberIDString the contact's email address
     * @param array<mixed>|StatusGetParams $params
     *
     * @return BaseResponse<ActionResponseWithResultsPublicStatus>
     *
     * @throws APIException
     */
    public function get(
        string $subscriberIDString,
        array|StatusGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberIDString the contact's email address
     * @param array<mixed>|StatusGetUnsubscribeAllStatusParams $params
     *
     * @return BaseResponse<ActionResponseWithResultsPublicWideStatus>
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatus(
        string $subscriberIDString,
        array|StatusGetUnsubscribeAllStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $subscriberIDString the contact's email address
     * @param array<mixed>|StatusUnsubscribeAllParams $params
     *
     * @return BaseResponse<ActionResponseWithResultsPublicStatus>
     *
     * @throws APIException
     */
    public function unsubscribeAll(
        string $subscriberIDString,
        array|StatusUnsubscribeAllParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
