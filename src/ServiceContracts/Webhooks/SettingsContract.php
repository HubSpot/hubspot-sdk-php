<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Webhooks;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Webhooks\Settings\SettingUpdateParams;
use HubspotSDK\Webhooks\SettingsResponse;

interface SettingsContract
{
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
    public function list(
        int $appID,
        ?RequestOptions $requestOptions = null
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
}
