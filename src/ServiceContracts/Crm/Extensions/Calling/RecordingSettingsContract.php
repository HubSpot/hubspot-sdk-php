<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\Calling;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettings\RecordingSettingCreateParams;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettings\RecordingSettingMarkReadyParams;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettings\RecordingSettingUpdateParams;
use HubspotSDK\Crm\Extensions\Calling\RecordingSettingsResponse;
use HubspotSDK\RequestOptions;

interface RecordingSettingsContract
{
    /**
     * @api
     *
     * @param array<mixed>|RecordingSettingCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|RecordingSettingCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @param array<mixed>|RecordingSettingUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        array|RecordingSettingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): RecordingSettingsResponse;

    /**
     * @api
     *
     * @param array<mixed>|RecordingSettingMarkReadyParams $params
     *
     * @throws APIException
     */
    public function markReady(
        array|RecordingSettingMarkReadyParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
