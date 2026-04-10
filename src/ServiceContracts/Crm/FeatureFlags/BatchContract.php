<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\FeatureFlags;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\FeatureFlags\BatchPortalEntry;
use HubSpotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type BatchPortalEntryShape from \HubSpotSDK\Crm\FeatureFlags\BatchPortalEntry
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BatchContract
{
    /**
     * @api
     *
     * @param string $flagName Path param
     * @param int $appID Path param
     * @param list<int> $portalIDs Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $flagName,
        int $appID,
        array $portalIDs,
        RequestOptions|array|null $requestOptions = null,
    ): PortalFlagStateBatchResponse;

    /**
     * @api
     *
     * @param string $flagName Path param
     * @param int $appID Path param
     * @param list<BatchPortalEntry|BatchPortalEntryShape> $portalStates Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upsert(
        string $flagName,
        int $appID,
        array $portalStates,
        RequestOptions|array|null $requestOptions = null,
    ): PortalFlagStateBatchResponse;
}
