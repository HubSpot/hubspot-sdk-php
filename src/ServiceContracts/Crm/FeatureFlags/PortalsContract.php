<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\FeatureFlags;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\FeatureFlags\BatchPortalEntry\FlagState;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateResponse;
use HubspotSDK\RequestOptions;

interface PortalsContract
{
    /**
     * @api
     *
     * @param int $portalID path param: The ID of the account that installed the app
     * @param int $appID path param: The ID of the app
     * @param string $flagName path param: The name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param 'ABSENT'|'OFF'|'ON'|\HubspotSDK\Crm\FeatureFlags\Portals\PortalUpdateParams\FlagState $flagState Body param:
     *
     * @throws APIException
     */
    public function update(
        int $portalID,
        int $appID,
        string $flagName,
        string|\HubspotSDK\Crm\FeatureFlags\Portals\PortalUpdateParams\FlagState $flagState,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateResponse;

    /**
     * @api
     *
     * @param int $portalID the ID of the account that installed the app
     * @param int $appID the ID of the app
     * @param string $flagName the name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     *
     * @throws APIException
     */
    public function delete(
        int $portalID,
        int $appID,
        string $flagName,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateResponse;

    /**
     * @api
     *
     * @param string $flagName path param: The name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param int $appID path param: The ID of the app
     * @param list<int> $portalIDs Body param:
     *
     * @throws APIException
     */
    public function batchDelete(
        string $flagName,
        int $appID,
        array $portalIDs,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateBatchResponse;

    /**
     * @api
     *
     * @param string $flagName path param: The name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param int $appID path param: The ID of the app
     * @param list<array{
     *   flagState: 'ABSENT'|'OFF'|'ON'|FlagState, portalID: int
     * }> $portalStates Body param:
     *
     * @throws APIException
     */
    public function batchUpsert(
        string $flagName,
        int $appID,
        array $portalStates,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateBatchResponse;

    /**
     * @api
     *
     * @param int $portalID the ID of the account that installed the app
     * @param int $appID the ID of the app
     * @param string $flagName the name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     *
     * @throws APIException
     */
    public function get(
        int $portalID,
        int $appID,
        string $flagName,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateResponse;
}
