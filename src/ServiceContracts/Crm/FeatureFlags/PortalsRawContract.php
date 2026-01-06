<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\FeatureFlags;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateResponse;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalBatchDeleteParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalBatchUpsertParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalDeleteParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalGetParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalUpdateParams;
use HubspotSDK\RequestOptions;

interface PortalsRawContract
{
    /**
     * @api
     *
     * @param int $portalID path param: The ID of the account that installed the app
     * @param array<mixed>|PortalUpdateParams $params
     *
     * @return BaseResponse<PortalFlagStateResponse>
     *
     * @throws APIException
     */
    public function update(
        int $portalID,
        array|PortalUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $portalID the ID of the account that installed the app
     * @param array<mixed>|PortalDeleteParams $params
     *
     * @return BaseResponse<PortalFlagStateResponse>
     *
     * @throws APIException
     */
    public function delete(
        int $portalID,
        array|PortalDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $flagName path param: The name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param array<mixed>|PortalBatchDeleteParams $params
     *
     * @return BaseResponse<PortalFlagStateBatchResponse>
     *
     * @throws APIException
     */
    public function batchDelete(
        string $flagName,
        array|PortalBatchDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $flagName path param: The name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param array<mixed>|PortalBatchUpsertParams $params
     *
     * @return BaseResponse<PortalFlagStateBatchResponse>
     *
     * @throws APIException
     */
    public function batchUpsert(
        string $flagName,
        array|PortalBatchUpsertParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $portalID the ID of the account that installed the app
     * @param array<mixed>|PortalGetParams $params
     *
     * @return BaseResponse<PortalFlagStateResponse>
     *
     * @throws APIException
     */
    public function get(
        int $portalID,
        array|PortalGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
