<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\FeatureFlags;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\FeatureFlags\Apps\AppDeleteParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppGetParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppListPortalsParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams\DefaultState;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams\OverrideState;
use HubspotSDK\Crm\FeatureFlags\FlagResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\FeatureFlags\AppsRawContract;

final class AppsRawService implements AppsRawContract
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
     * @param string $flagName path param: The name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param array{
     *   appID: int,
     *   defaultState: 'ABSENT'|'OFF'|'ON'|DefaultState,
     *   overrideState?: 'ABSENT'|'OFF'|'ON'|OverrideState,
     * }|AppUpdateParams $params
     *
     * @return BaseResponse<FlagResponse>
     *
     * @throws APIException
     */
    public function update(
        string $flagName,
        array|AppUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AppUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['feature-flags/v3/%1$s/flags/%2$s', $appID, $flagName],
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
     * @param string $flagName the name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param array{appID: int}|AppDeleteParams $params
     *
     * @return BaseResponse<FlagResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $flagName,
        array|AppDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AppDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

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
     * @param string $flagName the name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param array{appID: int}|AppGetParams $params
     *
     * @return BaseResponse<FlagResponse>
     *
     * @throws APIException
     */
    public function get(
        string $flagName,
        array|AppGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AppGetParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

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
     * @param string $flagName path param: The name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param array{
     *   appID: int, limit?: int, startPortalID?: int
     * }|AppListPortalsParams $params
     *
     * @return BaseResponse<PortalFlagStateBatchResponse>
     *
     * @throws APIException
     */
    public function listPortals(
        string $flagName,
        array|AppListPortalsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AppListPortalsParams::parseRequest(
            $params,
            $requestOptions,
        );
        $appID = $parsed['appID'];
        unset($parsed['appID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['feature-flags/v3/%1$s/flags/%2$s/portals', $appID, $flagName],
            query: Util::array_transform_keys(
                $parsed,
                ['startPortalID' => 'startPortalId']
            ),
            options: $options,
            convert: PortalFlagStateBatchResponse::class,
        );
    }
}
