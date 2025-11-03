<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\FeatureFlags;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\FeatureFlags\Apps\AppDeleteParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppGetParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppListPortalsParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams\DefaultState;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams\OverrideState;
use HubspotSDK\Crm\FeatureFlags\FlagResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\FeatureFlags\AppsContract;

use const HubspotSDK\Core\OMIT as omit;

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
     * @param int $appID
     * @param DefaultState|value-of<DefaultState> $defaultState
     * @param OverrideState|value-of<OverrideState> $overrideState
     *
     * @throws APIException
     */
    public function update(
        string $flagName,
        $appID,
        $defaultState,
        $overrideState = omit,
        ?RequestOptions $requestOptions = null,
    ): FlagResponse {
        $params = [
            'appID' => $appID,
            'defaultState' => $defaultState,
            'overrideState' => $overrideState,
        ];

        return $this->updateRaw($flagName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $flagName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): FlagResponse {
        [$parsed, $options] = AppUpdateParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['feature-flags/v3/%1$s/flags/%2$s', $appID, $flagName],
            body: (object) array_diff_key($parsed, ['appID']),
            options: $options,
            convert: FlagResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a feature flag in an app.  For example, delete the `hs-release-app-cards` flag after all accounts have been migrated.
     *
     * @param int $appID
     *
     * @throws APIException
     */
    public function delete(
        string $flagName,
        $appID,
        ?RequestOptions $requestOptions = null
    ): FlagResponse {
        $params = ['appID' => $appID];

        return $this->deleteRaw($flagName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $flagName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): FlagResponse {
        [$parsed, $options] = AppDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
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
     * @param int $appID
     *
     * @throws APIException
     */
    public function get(
        string $flagName,
        $appID,
        ?RequestOptions $requestOptions = null
    ): FlagResponse {
        $params = ['appID' => $appID];

        return $this->getRaw($flagName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        string $flagName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): FlagResponse {
        [$parsed, $options] = AppGetParams::parseRequest($params, $requestOptions);
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
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
     * @param int $appID
     * @param int $limit the maximum number of results to return in a single request
     * @param int $startPortalID the initial account ID for listing, enabling pagination
     *
     * @throws APIException
     */
    public function listPortals(
        string $flagName,
        $appID,
        $limit = omit,
        $startPortalID = omit,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateBatchResponse {
        $params = [
            'appID' => $appID, 'limit' => $limit, 'startPortalID' => $startPortalID,
        ];

        return $this->listPortalsRaw($flagName, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listPortalsRaw(
        string $flagName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortalFlagStateBatchResponse {
        [$parsed, $options] = AppListPortalsParams::parseRequest(
            $params,
            $requestOptions
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['feature-flags/v3/%1$s/flags/%2$s/portals', $appID, $flagName],
            query: $parsed,
            options: $options,
            convert: PortalFlagStateBatchResponse::class,
        );
    }
}
