<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\Calling;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\Calling\Settings\SettingCreateParams;
use HubspotSDK\Crm\Extensions\Calling\Settings\SettingUpdateParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\Webhooks\SettingsResponse;

interface SettingsContract
{
    /**
     * @api
     *
     * @param array<mixed>|SettingCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        int $appID,
        array|SettingCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SettingsResponse;

    /**
     * @api
     *
     * @param array<mixed>|SettingUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        array|SettingUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SettingsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): SettingsResponse;
}
