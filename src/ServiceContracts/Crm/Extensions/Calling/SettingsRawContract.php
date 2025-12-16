<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\Calling;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\Settings\SettingCreateParams;
use HubspotSDK\Crm\Extensions\Calling\Settings\SettingUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\Webhooks\SettingsResponse;

interface SettingsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SettingCreateParams $params
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|SettingCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
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
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<SettingsResponse>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
