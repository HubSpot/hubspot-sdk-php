<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\FeatureFlags;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\FeatureFlags\BatchPortalEntry;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateResponse;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalBatchDeleteParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalBatchUpsertParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalDeleteParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalGetParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalUpdateParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalUpdateParams\FlagState;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\FeatureFlags\PortalsContract;

final class PortalsService implements PortalsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Specify an account-level flag state for a specific HubSpot account.
     *
     * @param int $appID
     * @param string $flagName
     * @param FlagState|value-of<FlagState> $flagState
     *
     * @throws APIException
     */
    public function update(
        int $portalID,
        $appID,
        $flagName,
        $flagState,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateResponse {
        $params = [
            'appID' => $appID, 'flagName' => $flagName, 'flagState' => $flagState,
        ];

        return $this->updateRaw($portalID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        int $portalID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortalFlagStateResponse {
        [$parsed, $options] = PortalUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $flagName = $parsed['flagName'];
        unset($parsed['flagName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: [
                'feature-flags/v3/%1$s/flags/%2$s/portals/%3$s',
                $appID,
                $flagName,
                $portalID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID', 'flagName'])),
            options: $options,
            convert: PortalFlagStateResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete an account-level flag state for a specific HubSpot account. No request body is included.
     *
     * @param int $appID
     * @param string $flagName
     *
     * @throws APIException
     */
    public function delete(
        int $portalID,
        $appID,
        $flagName,
        ?RequestOptions $requestOptions = null
    ): PortalFlagStateResponse {
        $params = ['appID' => $appID, 'flagName' => $flagName];

        return $this->deleteRaw($portalID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        int $portalID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortalFlagStateResponse {
        [$parsed, $options] = PortalDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $flagName = $parsed['flagName'];
        unset($parsed['flagName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'feature-flags/v3/%1$s/flags/%2$s/portals/%3$s',
                $appID,
                $flagName,
                $portalID,
            ],
            options: $options,
            convert: PortalFlagStateResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete an account-level flag state for multiple HubSpot accounts at once. Use this endpoint to manage flag exposure for groups of HubSpot accounts.
     *
     * @param int $appID
     * @param list<int> $portalIDs
     *
     * @throws APIException
     */
    public function batchDelete(
        string $flagName,
        $appID,
        $portalIDs,
        ?RequestOptions $requestOptions = null
    ): PortalFlagStateBatchResponse {
        $params = ['appID' => $appID, 'portalIDs' => $portalIDs];

        return $this->batchDeleteRaw($flagName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchDeleteRaw(
        string $flagName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortalFlagStateBatchResponse {
        [$parsed, $options] = PortalBatchDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'feature-flags/v3/%1$s/flags/%2$s/portals/batch/delete',
                $appID,
                $flagName,
            ],
            body: (object) array_diff_key($parsed, ['appID']),
            options: $options,
            convert: PortalFlagStateBatchResponse::class,
        );
    }

    /**
     * @api
     *
     * Set the portal flag state for multiple HubSpot accounts at once. Use this endpoint to manage flag exposure for groups of HubSpot accounts.
     *
     * @param int $appID
     * @param list<BatchPortalEntry> $portalStates
     *
     * @throws APIException
     */
    public function batchUpsert(
        string $flagName,
        $appID,
        $portalStates,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateBatchResponse {
        $params = ['appID' => $appID, 'portalStates' => $portalStates];

        return $this->batchUpsertRaw($flagName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchUpsertRaw(
        string $flagName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortalFlagStateBatchResponse {
        [$parsed, $options] = PortalBatchUpsertParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'feature-flags/v3/%1$s/flags/%2$s/portals/batch/upsert',
                $appID,
                $flagName,
            ],
            body: (object) array_diff_key($parsed, ['appID']),
            options: $options,
            convert: PortalFlagStateBatchResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the account-level flag state of a specific HubSpot account.
     *
     * @param int $appID
     * @param string $flagName
     *
     * @throws APIException
     */
    public function get(
        int $portalID,
        $appID,
        $flagName,
        ?RequestOptions $requestOptions = null
    ): PortalFlagStateResponse {
        $params = ['appID' => $appID, 'flagName' => $flagName];

        return $this->getRaw($portalID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        int $portalID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortalFlagStateResponse {
        [$parsed, $options] = PortalGetParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $flagName = $parsed['flagName'];
        unset($parsed['flagName']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'feature-flags/v3/%1$s/flags/%2$s/portals/%3$s',
                $appID,
                $flagName,
                $portalID,
            ],
            options: $options,
            convert: PortalFlagStateResponse::class,
        );
    }
}
