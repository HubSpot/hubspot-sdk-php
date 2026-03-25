<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Events;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Events\EventDetailSettings;
use HubspotSDK\Marketing\Events\Settings\SettingCreateOrUpdateParams;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface SettingsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SettingCreateOrUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventDetailSettings>
     *
     * @throws APIException
     */
    public function createOrUpdate(
        int $appID,
        array|SettingCreateOrUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventDetailSettings>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
