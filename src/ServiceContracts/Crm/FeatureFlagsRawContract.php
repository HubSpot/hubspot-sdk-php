<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagDeleteParams;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagGetParams;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagListPortalsParams;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagUpdateParams;
use HubspotSDK\Crm\FeatureFlags\FlagsForAppResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface FeatureFlagsRawContract
{
    /**
     * @api
     *
     * @param int $portalID Path param
     * @param array<string,mixed>|FeatureFlagUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalFlagStateResponse>
     *
     * @throws APIException
     */
    public function update(
        int $portalID,
        array|FeatureFlagUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FeatureFlagDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalFlagStateResponse>
     *
     * @throws APIException
     */
    public function delete(
        int $portalID,
        array|FeatureFlagDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|FeatureFlagGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalFlagStateResponse>
     *
     * @throws APIException
     */
    public function get(
        int $portalID,
        array|FeatureFlagGetParams $params,
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
}
