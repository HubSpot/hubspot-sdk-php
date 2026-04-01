<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagDeleteParams;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagDeletePortalStateParams;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagGetParams;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagGetPortalStateParams;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagListPortalsParams;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagUpdateParams;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagUpdateParams\DefaultState;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagUpdateParams\OverrideState;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagUpdatePortalStateParams;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagUpdatePortalStateParams\FlagState;
use HubspotSDK\Crm\FeatureFlags\FlagResponse;
use HubspotSDK\Crm\FeatureFlags\FlagsForAppResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\FeatureFlagsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class FeatureFlagsRawService implements FeatureFlagsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Set a feature flag for an app. For example, update the `hs-hide-crm-cards` flag's `defaultState` to `ON` to hide classic CRM cards from new installs.
     *
     * @param string $flagName Path param
     * @param array{
     *   appID: int,
     *   defaultState: DefaultState|value-of<DefaultState>,
     *   overrideState?: OverrideState|value-of<OverrideState>,
     * }|FeatureFlagUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FlagResponse>
     *
     * @throws APIException
     */
    public function update(
        string $flagName,
        array|FeatureFlagUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FeatureFlagUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['feature-flags/2026-03/%1$s/flags/%2$s', $appID, $flagName],
            body: (object) array_diff_key($parsed, array_flip(['appID'])),
            options: $options,
            convert: FlagResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a feature flag in an app.  For example, delete the `hs-release-app-cards` flag after all accounts have been migrated.
     *
     * @param array{appID: int}|FeatureFlagDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FlagResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $flagName,
        array|FeatureFlagDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FeatureFlagDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['feature-flags/2026-03/%1$s/flags/%2$s', $appID, $flagName],
            options: $options,
            convert: FlagResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete an account-level flag state for a specific HubSpot account. No request body is included.
     *
     * @param array{
     *   appID: int, flagName: string
     * }|FeatureFlagDeletePortalStateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalFlagStateResponse>
     *
     * @throws APIException
     */
    public function deletePortalState(
        int $portalID,
        array|FeatureFlagDeletePortalStateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FeatureFlagDeletePortalStateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $flagName = $parsed['flagName'];
        unset($parsed['flagName']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'feature-flags/2026-03/%1$s/flags/%2$s/portals/%3$s',
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
     * Retrieve the current status of the app's feature flags. No request body is included.
     *
     * @param array{appID: int}|FeatureFlagGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FlagResponse>
     *
     * @throws APIException
     */
    public function get(
        string $flagName,
        array|FeatureFlagGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FeatureFlagGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['feature-flags/2026-03/%1$s/flags/%2$s', $appID, $flagName],
            options: $options,
            convert: FlagResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve the account-level flag state of a specific HubSpot account.
     *
     * @param array{
     *   appID: int, flagName: string
     * }|FeatureFlagGetPortalStateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalFlagStateResponse>
     *
     * @throws APIException
     */
    public function getPortalState(
        int $portalID,
        array|FeatureFlagGetPortalStateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FeatureFlagGetPortalStateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $flagName = $parsed['flagName'];
        unset($parsed['flagName']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'feature-flags/2026-03/%1$s/flags/%2$s/portals/%3$s',
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FlagsForAppResponse>
     *
     * @throws APIException
     */
    public function listAll(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['feature-flags/2026-03/%1$s/flags/all', $appID],
            options: $requestOptions,
            convert: FlagsForAppResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of HubSpot accounts with an account-level flag setting for the specified app. No request body is included.
     *
     * @param string $flagName Path param
     * @param array{
     *   appID: int, limit?: int, startPortalID?: int
     * }|FeatureFlagListPortalsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = FeatureFlagListPortalsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'feature-flags/2026-03/%1$s/flags/%2$s/portals', $appID, $flagName,
            ],
            query: Util::array_transform_keys(
                $parsed,
                ['startPortalID' => 'startPortalId']
            ),
            options: $options,
            convert: PortalFlagStateBatchResponse::class,
        );
    }

    /**
     * @api
     *
     * Specify an account-level flag state for a specific HubSpot account.
     *
     * @param int $portalID Path param
     * @param array{
     *   appID: int, flagName: string, flagState: FlagState|value-of<FlagState>
     * }|FeatureFlagUpdatePortalStateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalFlagStateResponse>
     *
     * @throws APIException
     */
    public function updatePortalState(
        int $portalID,
        array|FeatureFlagUpdatePortalStateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FeatureFlagUpdatePortalStateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);
        $flagName = $parsed['flagName'];
        unset($parsed['flagName']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: [
                'feature-flags/2026-03/%1$s/flags/%2$s/portals/%3$s',
                $appID,
                $flagName,
                $portalID,
            ],
            body: (object) array_diff_key($parsed, array_flip(['appID', 'flagName'])),
            options: $options,
            convert: PortalFlagStateResponse::class,
        );
    }
}
