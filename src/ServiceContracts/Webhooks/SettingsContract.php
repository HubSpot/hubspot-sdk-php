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
     * @param int $appID the ID of the app
     * @param string $targetURL a publicly available URL for HubSpot to call where event payloads will be delivered
     * @param array{
     *   maxConcurrentRequests: int
     * }|ThrottlingSettings $throttling Configuration details for webhook throttling
     *
     * @throws APIException
     */
    public function update(
        int $appID,
        string $targetURL,
        array|ThrottlingSettings $throttling,
        ?RequestOptions $requestOptions = null,
    ): SettingsResponse;

    /**
     * @api
     *
     * @param int $appID the ID of the app
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
     * @param int $appID the ID of the app
     *
     * @throws APIException
     */
    public function delete(
        int $appID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
