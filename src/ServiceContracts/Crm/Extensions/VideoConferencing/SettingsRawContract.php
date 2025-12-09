<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\VideoConferencing;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\VideoConferencing\ExternalSettings;
use HubspotSDK\Crm\Extensions\VideoConferencing\Settings\SettingUpdateParams;
use HubspotSDK\RequestOptions;

interface SettingsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|SettingUpdateParams $params
     *
     * @return BaseResponse<ExternalSettings>
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
     * @return BaseResponse<ExternalSettings>
     *
     * @throws APIException
     */
    public function get(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
