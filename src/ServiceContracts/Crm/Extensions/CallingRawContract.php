<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Extensions;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Extensions\Calling\CallingCreateChannelConnectionSettingsParams;
use HubSpotSDK\Crm\Extensions\Calling\CallingCreateInboundCallParams;
use HubSpotSDK\Crm\Extensions\Calling\CallingCreateRecordingReadyParams;
use HubSpotSDK\Crm\Extensions\Calling\CallingCreateRecordingSettingsParams;
use HubSpotSDK\Crm\Extensions\Calling\CallingCreateSettingsParams;
use HubSpotSDK\Crm\Extensions\Calling\CallingUpdateChannelConnectionSettingsParams;
use HubSpotSDK\Crm\Extensions\Calling\CallingUpdateRecordingSettingsParams;
use HubSpotSDK\Crm\Extensions\Calling\CallingUpdateSettingsParams;
use HubSpotSDK\Crm\Extensions\Calling\ChannelConnectionSettingsResponse;
use HubSpotSDK\Crm\Extensions\Calling\CompletedThirdPartyCallResponse;
use HubSpotSDK\Crm\Extensions\Calling\RecordingSettingsResponse;
use HubSpotSDK\Crm\Extensions\Calling\SettingsResponse;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface CallingRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CallingCreateChannelConnectionSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChannelConnectionSettingsResponse>
     *
     * @throws APIException
     */
    public function createChannelConnectionSettings(
        int $appID,
        array|CallingCreateChannelConnectionSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param array<string,mixed>|CallingCreateRecordingReadyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createRecordingReady(
        array|CallingCreateRecordingReadyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CallingCreateRecordingSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingSettingsResponse>
     *
     * @throws APIException
     */
    public function createRecordingSettings(
        int $appID,
        array|CallingCreateRecordingSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CallingCreateSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function createSettings(
        int $appID,
        array|CallingCreateSettingsParams $params,
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
    public function deleteChannelConnectionSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
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
    public function deleteSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChannelConnectionSettingsResponse>
     *
     * @throws APIException
     */
    public function getChannelConnectionSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
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
    public function getRecordingSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function getSettings(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CallingUpdateChannelConnectionSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ChannelConnectionSettingsResponse>
     *
     * @throws APIException
     */
    public function updateChannelConnectionSettings(
        int $appID,
        array|CallingUpdateChannelConnectionSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CallingUpdateRecordingSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RecordingSettingsResponse>
     *
     * @throws APIException
     */
    public function updateRecordingSettings(
        int $appID,
        array|CallingUpdateRecordingSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CallingUpdateSettingsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function updateSettings(
        int $appID,
        array|CallingUpdateSettingsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
