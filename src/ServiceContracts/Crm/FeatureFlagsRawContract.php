<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\FeatureFlags\FeatureFlagDeleteParams;
use HubSpotSDK\Crm\FeatureFlags\FeatureFlagDeletePortalStateParams;
use HubSpotSDK\Crm\FeatureFlags\FeatureFlagGetParams;
use HubSpotSDK\Crm\FeatureFlags\FeatureFlagGetPortalStateParams;
use HubSpotSDK\Crm\FeatureFlags\FeatureFlagListPortalsParams;
use HubSpotSDK\Crm\FeatureFlags\FeatureFlagUpdateParams;
use HubSpotSDK\Crm\FeatureFlags\FeatureFlagUpdatePortalStateParams;
use HubSpotSDK\Crm\FeatureFlags\FlagResponse;
use HubSpotSDK\Crm\FeatureFlags\FlagsForAppResponse;
use HubSpotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubSpotSDK\Crm\FeatureFlags\PortalFlagStateResponse;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface FeatureFlagsRawContract
{
    /**
     * @api
     *
     * @param string $flagName Path param
     * @param array<string,mixed>|FeatureFlagUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FlagResponse>
     *
     * @throws APIException
     */
    public function update(
        string $flagName,
        array|FeatureFlagUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FeatureFlagDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FlagResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $flagName,
        array|FeatureFlagDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FeatureFlagDeletePortalStateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalFlagStateResponse>
     *
     * @throws APIException
     */
    public function deletePortalState(
        int $portalID,
        array|FeatureFlagDeletePortalStateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FeatureFlagGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FlagResponse>
     *
     * @throws APIException
     */
    public function get(
        string $flagName,
        array|FeatureFlagGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FeatureFlagGetPortalStateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalFlagStateResponse>
     *
     * @throws APIException
     */
    public function getPortalState(
        int $portalID,
        array|FeatureFlagGetPortalStateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FlagsForAppResponse>
     *
     * @throws APIException
     */
    public function listAll(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $flagName Path param
     * @param array<string,mixed>|FeatureFlagListPortalsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalFlagStateBatchResponse>
     *
     * @throws APIException
     */
    public function listPortals(
        string $flagName,
        array|FeatureFlagListPortalsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $portalID Path param
     * @param array<string,mixed>|FeatureFlagUpdatePortalStateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalFlagStateResponse>
     *
     * @throws APIException
     */
    public function updatePortalState(
        int $portalID,
        array|FeatureFlagUpdatePortalStateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
