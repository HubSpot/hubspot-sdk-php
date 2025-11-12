<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\FeatureFlags;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateResponse;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalBatchDeleteParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalBatchUpsertParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalDeleteParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalGetParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalUpdateParams;
use HubspotSDK\RequestOptions;

interface PortalsContract
{
    /**
     * @api
     *
     * @param array<mixed>|PortalUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $portalID,
        array|PortalUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateResponse;

    /**
     * @api
     *
     * @param array<mixed>|PortalDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        int $portalID,
        array|PortalDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateResponse;

    /**
     * @api
     *
     * @param array<mixed>|PortalBatchDeleteParams $params
     *
     * @throws APIException
     */
    public function batchDelete(
        string $flagName,
        array|PortalBatchDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateBatchResponse;

    /**
     * @api
     *
     * @param array<mixed>|PortalBatchUpsertParams $params
     *
     * @throws APIException
     */
    public function batchUpsert(
        string $flagName,
        array|PortalBatchUpsertParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateBatchResponse;

    /**
     * @api
     *
     * @param array<mixed>|PortalGetParams $params
     *
     * @throws APIException
     */
    public function get(
        int $portalID,
        array|PortalGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateResponse;
}
