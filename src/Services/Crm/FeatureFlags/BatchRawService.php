<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\FeatureFlags;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\FeatureFlags\Batch\BatchDeleteParams;
use HubSpotSDK\Crm\FeatureFlags\Batch\BatchUpsertParams;
use HubSpotSDK\Crm\FeatureFlags\BatchPortalEntry;
use HubSpotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\FeatureFlags\BatchRawContract;

/**
 * @phpstan-import-type BatchPortalEntryShape from \HubSpotSDK\Crm\FeatureFlags\BatchPortalEntry
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class BatchRawService implements BatchRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Delete an account-level flag state for multiple HubSpot accounts at once. Use this endpoint to manage flag exposure for groups of HubSpot accounts.
     *
     * @param string $flagName Path param
     * @param array{appID: int, portalIDs: list<int>}|BatchDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalFlagStateBatchResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $flagName,
        array|BatchDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'feature-flags/2026-03/%1$s/flags/%2$s/portals/batch/delete',
                $appID,
                $flagName,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: PortalFlagStateBatchResponse::class,
        );
    }

    /**
     * @api
     *
     * Set the portal flag state for multiple HubSpot accounts at once. Use this endpoint to manage flag exposure for groups of HubSpot accounts.
     *
     * @param string $flagName Path param
     * @param array{
     *   appID: int, portalStates: list<BatchPortalEntry|BatchPortalEntryShape>
     * }|BatchUpsertParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalFlagStateBatchResponse>
     *
     * @throws APIException
     */
    public function upsert(
        string $flagName,
        array|BatchUpsertParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchUpsertParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: [
                'feature-flags/2026-03/%1$s/flags/%2$s/portals/batch/upsert',
                $appID,
                $flagName,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: PortalFlagStateBatchResponse::class,
        );
    }
}
