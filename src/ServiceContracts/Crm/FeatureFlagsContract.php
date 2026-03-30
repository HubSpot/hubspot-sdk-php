<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagUpdateParams\FlagState;
use HubspotSDK\Crm\FeatureFlags\FlagsForAppResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface FeatureFlagsContract
{
    /**
     * @api
     *
     * @param int $portalID Path param
     * @param int $appID Path param
     * @param string $flagName Path param
     * @param FlagState|value-of<FlagState> $flagState Body param: The state that the given flag should be in for this portal
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        int $portalID,
        int $appID,
        string $flagName,
        FlagState|string $flagState,
        RequestOptions|array|null $requestOptions = null,
    ): PortalFlagStateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        int $portalID,
        int $appID,
        string $flagName,
        RequestOptions|array|null $requestOptions = null,
    ): PortalFlagStateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $portalID,
        int $appID,
        string $flagName,
        RequestOptions|array|null $requestOptions = null,
    ): PortalFlagStateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listAll(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): FlagsForAppResponse;

    /**
     * @api
     *
     * @param string $flagName Path param
     * @param int $appID Path param
     * @param int $limit query param: The maximum number of results to display per page
     * @param int $startPortalID Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listPortals(
        string $flagName,
        int $appID,
        ?int $limit = null,
        ?int $startPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): PortalFlagStateBatchResponse;
}
