<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\FeatureFlags;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\FeatureFlags\Apps\AppDeleteParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppGetParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppListPortalsParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams;
use HubspotSDK\Crm\FeatureFlags\FlagResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\FeatureFlags\AppsContract;

final class AppsService implements AppsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Set a feature flag for an app. For example, update the `hs-hide-crm-cards` flag's `defaultState` to `ON` to hide classic CRM cards from new installs.
     *
     * @param array{
     *   appId: int,
     *   defaultState: 'ABSENT'|'OFF'|'ON',
     *   overrideState?: 'ABSENT'|'OFF'|'ON',
     * }|AppUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $flagName,
        array|AppUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): FlagResponse {
        [$parsed, $options] = AppUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['feature-flags/v3/%1$s/flags/%2$s', $appID, $flagName],
            body: (object) array_diff_key($parsed, ['appId']),
            options: $options,
            convert: FlagResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a feature flag in an app.  For example, delete the `hs-release-app-cards` flag after all accounts have been migrated.
     *
     * @param array{appId: int}|AppDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $flagName,
        array|AppDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): FlagResponse {
        [$parsed, $options] = AppDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['feature-flags/v3/%1$s/flags/%2$s', $appID, $flagName],
            options: $options,
            convert: FlagResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the current status of the app's feature flags. No request body is included.
     *
     * @param array{appId: int}|AppGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $flagName,
        array|AppGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): FlagResponse {
        [$parsed, $options] = AppGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['feature-flags/v3/%1$s/flags/%2$s', $appID, $flagName],
            options: $options,
            convert: FlagResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of HubSpot accounts with an account-level flag setting for the specified app. No request body is included.
     *
     * @param array{
     *   appId: int, limit?: int, startPortalId?: int
     * }|AppListPortalsParams $params
     *
     * @throws APIException
     */
    public function listPortals(
        string $flagName,
        array|AppListPortalsParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateBatchResponse {
        [$parsed, $options] = AppListPortalsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appId'];
        unset($parsed['appId']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['feature-flags/v3/%1$s/flags/%2$s/portals', $appID, $flagName],
            query: $parsed,
            options: $options,
            convert: PortalFlagStateBatchResponse::class,
        );
    }
}
