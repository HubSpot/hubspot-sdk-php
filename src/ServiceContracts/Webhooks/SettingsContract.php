<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Webhooks;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Webhooks\SettingsResponse;
use HubspotSDK\Webhooks\ThrottlingSettings;

interface SettingsContract
{
    /**
     * @api
     *
     * @param string $targetURL a publicly available URL for HubSpot to call where event payloads will be delivered
     * @param ThrottlingSettings $throttling configuration details for webhook throttling
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        $targetURL,
        $throttling,
        ?RequestOptions $requestOptions = null,
    ): SettingsResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        int $appID,
        array $params,
        ?RequestOptions $requestOptions = null
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
