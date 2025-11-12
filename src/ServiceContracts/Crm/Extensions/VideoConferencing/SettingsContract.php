<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Extensions\VideoConferencing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Extensions\VideoConferencing\ExternalSettings;
use HubspotSDK\Crm\Extensions\VideoConferencing\Settings\SettingUpdateParams;
use HubspotSDK\RequestOptions;

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
    ): ExternalSettings;

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
    ): ExternalSettings;
}
