<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\FeatureFlags;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams\DefaultState;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams\OverrideState;
use HubspotSDK\Crm\FeatureFlags\FlagResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\RequestOptions;

interface AppsContract
{
    /**
     * @api
     *
     * @param string $flagName path param: The name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param int $appID path param: The ID of the app
     * @param 'ABSENT'|'OFF'|'ON'|DefaultState $defaultState Body param:
     * @param 'ABSENT'|'OFF'|'ON'|OverrideState $overrideState Body param:
     *
     * @throws APIException
     */
    public function update(
        string $flagName,
        int $appID,
        string|DefaultState $defaultState,
        string|OverrideState|null $overrideState = null,
        ?RequestOptions $requestOptions = null,
    ): FlagResponse;

    /**
     * @api
     *
     * @param string $flagName the name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param int $appID the ID of the app
     *
     * @throws APIException
     */
    public function delete(
        string $flagName,
        int $appID,
        ?RequestOptions $requestOptions = null
    ): FlagResponse;

    /**
     * @api
     *
     * @param string $flagName the name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param int $appID the ID of the app
     *
     * @throws APIException
     */
    public function get(
        string $flagName,
        int $appID,
        ?RequestOptions $requestOptions = null
    ): FlagResponse;

    /**
     * @api
     *
     * @param string $flagName path param: The name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param int $appID path param: The ID of the app
     * @param int $limit query param: The maximum number of results to return in a single request
     * @param int $startPortalID query param: The initial account ID for listing, enabling pagination
     *
     * @throws APIException
     */
    public function listPortals(
        string $flagName,
        int $appID,
        ?int $limit = null,
        ?int $startPortalID = null,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateBatchResponse;
}
