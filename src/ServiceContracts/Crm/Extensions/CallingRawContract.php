<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\CallingCreateInboundCallParams;
use HubspotSDK\Crm\Extensions\Calling\CallingCreateParams;
use HubspotSDK\Crm\Extensions\Calling\CallingMarkReadyParams;
use HubspotSDK\Crm\Extensions\Calling\CallingUpdateParams;
use HubspotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettingsResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface CallingRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CallingCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingSettingsResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|CallingCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CallingUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingSettingsResponse>
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        array|CallingUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CallingCreateInboundCallParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CompletedThirdPartyCallResponse>
     *
     * @throws APIException
     */
    public function createInboundCall(
        array|CallingCreateInboundCallParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingSettingsResponse>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CallingMarkReadyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function markReady(
        array|CallingMarkReadyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
