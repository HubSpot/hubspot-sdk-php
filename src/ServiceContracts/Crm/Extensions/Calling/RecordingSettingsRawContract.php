<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\Calling;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettings\RecordingSettingCreateParams;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettings\RecordingSettingMarkReadyParams;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettings\RecordingSettingUpdateParams;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettingsResponse;
use HubspotSDK\RequestOptions;

interface RecordingSettingsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|RecordingSettingCreateParams $params
     *
     * @return BaseResponse<RecordingSettingsResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|RecordingSettingCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RecordingSettingUpdateParams $params
     *
     * @return BaseResponse<RecordingSettingsResponse>
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        array|RecordingSettingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<RecordingSettingsResponse>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|RecordingSettingMarkReadyParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function markReady(
        array|RecordingSettingMarkReadyParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
