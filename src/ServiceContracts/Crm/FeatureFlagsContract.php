<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\FeatureFlags\FeatureFlagUpdateParams\DefaultState;
use HubSpotSDK\Crm\FeatureFlags\FeatureFlagUpdateParams\OverrideState;
use HubSpotSDK\Crm\FeatureFlags\FeatureFlagUpdatePortalStateParams\FlagState;
use HubSpotSDK\Crm\FeatureFlags\FlagResponse;
use HubSpotSDK\Crm\FeatureFlags\FlagsForAppResponse;
use HubSpotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubSpotSDK\Crm\FeatureFlags\PortalFlagStateResponse;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface FeatureFlagsContract
{
    /**
     * @api
     *
     * @param string $flagName Path param
     * @param int $appID Path param
     * @param DefaultState|value-of<DefaultState> $defaultState Body param: The state that the flag should have if there are no overrides for a particular portal
     * @param OverrideState|value-of<OverrideState> $overrideState Body param: A flag value that supercedes all other overrides, including portal-level values. Mostly used for things like emergency overrides
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $flagName,
        int $appID,
        DefaultState|string $defaultState,
        OverrideState|string|null $overrideState = null,
        RequestOptions|array|null $requestOptions = null,
    ): FlagResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $flagName,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): FlagResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deletePortalState(
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
        string $flagName,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): FlagResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getPortalState(
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
    public function updatePortalState(
        int $portalID,
        int $appID,
        string $flagName,
        FlagState|string $flagState,
        RequestOptions|array|null $requestOptions = null,
    ): PortalFlagStateResponse;
}
