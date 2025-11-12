<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\FeatureFlags;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateResponse;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalBatchDeleteParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalBatchUpsertParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalDeleteParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalGetParams;
use HubspotSDK\Crm\FeatureFlags\Portals\PortalUpdateParams;
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
     * @param array{
     *   appId: int, flagName: string, flagState: "OFF"|"ON"|"ABSENT"
     * }|PortalUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        int $portalID,
        array|PortalUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateResponse {
        [$parsed, $options] = PortalUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);
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
            body: (object) array_diff_key($parsed, array_flip(['appId', 'flagName'])),
            options: $options,
            convert: PortalFlagStateResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete an account-level flag state for a specific HubSpot account. No request body is included.
     *
     * @param array{appId: int, flagName: string}|PortalDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        int $portalID,
        array|PortalDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateResponse {
        [$parsed, $options] = PortalDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);
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
     * @param array{appId: int, portalIds: list<int>}|PortalBatchDeleteParams $params
     *
     * @throws APIException
     */
    public function batchDelete(
        string $flagName,
        array|PortalBatchDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateBatchResponse {
        [$parsed, $options] = PortalBatchDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'feature-flags/v3/%1$s/flags/%2$s/portals/batch/delete',
                $appID,
                $flagName,
            ],
            body: (object) array_diff_key($parsed, ['appId']),
            options: $options,
            convert: PortalFlagStateBatchResponse::class,
        );
    }

    /**
     * @api
     *
     * Set the portal flag state for multiple HubSpot accounts at once. Use this endpoint to manage flag exposure for groups of HubSpot accounts.
     *
     * @param array{
     *   appId: int,
     *   portalStates: list<array{flagState: "OFF"|"ON"|"ABSENT", portalId: int}>,
     * }|PortalBatchUpsertParams $params
     *
     * @throws APIException
     */
    public function batchUpsert(
        string $flagName,
        array|PortalBatchUpsertParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateBatchResponse {
        [$parsed, $options] = PortalBatchUpsertParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: [
                'feature-flags/v3/%1$s/flags/%2$s/portals/batch/upsert',
                $appID,
                $flagName,
            ],
            body: (object) array_diff_key($parsed, ['appId']),
            options: $options,
            convert: PortalFlagStateBatchResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the account-level flag state of a specific HubSpot account.
     *
     * @param array{appId: int, flagName: string}|PortalGetParams $params
     *
     * @throws APIException
     */
    public function get(
        int $portalID,
        array|PortalGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateResponse {
        [$parsed, $options] = PortalGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);
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
