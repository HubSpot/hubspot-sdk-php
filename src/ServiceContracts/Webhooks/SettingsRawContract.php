<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Webhooks;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Webhooks\Settings\SettingUpdateParams;
use HubspotSDK\Webhooks\SettingsResponse;

interface SettingsRawContract
{
    /**
     * @api
     *
     * @param int $appID the ID of the app
     * @param array<string,mixed>|SettingUpdateParams $params
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        array|SettingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID the ID of the app
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID the ID of the app
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
