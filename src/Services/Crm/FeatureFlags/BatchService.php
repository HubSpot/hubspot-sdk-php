<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\FeatureFlags;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\FeatureFlags\BatchPortalEntry;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\FeatureFlags\BatchContract;

/**
 * @phpstan-import-type BatchPortalEntryShape from \HubspotSDK\Crm\FeatureFlags\BatchPortalEntry
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

    /**
     * @api
     *
     * Delete an account-level flag state for multiple HubSpot accounts at once. Use this endpoint to manage flag exposure for groups of HubSpot accounts.
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
    ): PortalFlagStateBatchResponse {
        $params = Util::removeNulls(['appID' => $appID, 'portalIDs' => $portalIDs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($flagName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set the portal flag state for multiple HubSpot accounts at once. Use this endpoint to manage flag exposure for groups of HubSpot accounts.
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
    ): PortalFlagStateBatchResponse {
        $params = Util::removeNulls(
            ['appID' => $appID, 'portalStates' => $portalStates]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upsert($flagName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
