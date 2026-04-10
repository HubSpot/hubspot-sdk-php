<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\CommunicationPreferences\Statuses;

use HubSpotSDK\CommunicationPreferences\BatchResponsePublicBulkOptOutFromAllResponse;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicStatus;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicStatusBulkResponse;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicWideStatusBulkResponse;
use HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchGetUnsubscribeAllStatusesParams;
use HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchReadParams;
use HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchUnsubscribeAllParams;
use HubSpotSDK\CommunicationPreferences\Statuses\Batch\BatchUpdateStatusesParams;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
