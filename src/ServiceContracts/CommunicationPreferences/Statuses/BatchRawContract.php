<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CommunicationPreferences\Statuses;

use HubspotSDK\CommunicationPreferences\BatchResponsePublicBulkOptOutFromAllResponse;
use HubspotSDK\CommunicationPreferences\BatchResponsePublicStatus;
use HubspotSDK\CommunicationPreferences\BatchResponsePublicStatusBulkResponse;
use HubspotSDK\CommunicationPreferences\BatchResponsePublicWideStatusBulkResponse;
use HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchGetUnsubscribeAllStatusesParams;
use HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams;
use HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchUnsubscribeAllParams;
use HubspotSDK\CommunicationPreferences\Statuses\Batch\BatchUpdateStatusesParams;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BatchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BatchGetUnsubscribeAllStatusesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicWideStatusBulkResponse>
     *
     * @throws APIException
     */
    public function getUnsubscribeAllStatuses(
        array|BatchGetUnsubscribeAllStatusesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchReadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicStatusBulkResponse>
     *
     * @throws APIException
     */
    public function read(
        array|BatchReadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchUnsubscribeAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicBulkOptOutFromAllResponse>
     *
     * @throws APIException
     */
    public function unsubscribeAll(
        array|BatchUnsubscribeAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|BatchUpdateStatusesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponsePublicStatus>
     *
     * @throws APIException
     */
    public function updateStatuses(
        array|BatchUpdateStatusesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
