<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\EventDetailSettings;
use HubspotSDK\Marketing\Events\Settings\SettingCreateOrUpdateParams;
use HubspotSDK\RequestOptions;

interface SettingsRawContract
{
    /**
     * @api
     *
     * @param int $appID the id of the application to update the settings for
     * @param array<string,mixed>|SettingCreateOrUpdateParams $params
     *
     * @return BaseResponse<EventDetailSettings>
     *
     * @throws APIException
     */
    public function createOrUpdate(
        int $appID,
        array|SettingCreateOrUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $appID the id of the application to retrieve the settings for
     *
     * @return BaseResponse<EventDetailSettings>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
