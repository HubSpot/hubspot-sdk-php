<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\FeatureFlags;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams\DefaultState;
use HubspotSDK\Crm\FeatureFlags\Apps\AppUpdateParams\OverrideState;
use HubspotSDK\Crm\FeatureFlags\FlagResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\FeatureFlags\AppsContract;

final class AppsService implements AppsContract
{
    /**
     * @api
     */
    public AppsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AppsRawService($client);
    }

    /**
     * @api
     *
     * Set a feature flag for an app. For example, update the `hs-hide-crm-cards` flag's `defaultState` to `ON` to hide classic CRM cards from new installs.
     *
     * @param string $flagName path param: The name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param int $appID path param: The ID of the app
     * @param 'ABSENT'|'OFF'|'ON'|DefaultState $defaultState Body param:
     * @param 'ABSENT'|'OFF'|'ON'|OverrideState $overrideState Body param:
     *
     * @throws APIException
     */
    public function update(
        string $flagName,
        int $appID,
        string|DefaultState $defaultState,
        string|OverrideState|null $overrideState = null,
        ?RequestOptions $requestOptions = null,
    ): FlagResponse {
        $params = Util::removeNulls(
            [
                'appID' => $appID,
                'defaultState' => $defaultState,
                'overrideState' => $overrideState,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($flagName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a feature flag in an app.  For example, delete the `hs-release-app-cards` flag after all accounts have been migrated.
     *
     * @param string $flagName the name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param int $appID the ID of the app
     *
     * @throws APIException
     */
    public function delete(
        string $flagName,
        int $appID,
        ?RequestOptions $requestOptions = null
    ): FlagResponse {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($flagName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the current status of the app's feature flags. No request body is included.
     *
     * @param string $flagName the name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param int $appID the ID of the app
     *
     * @throws APIException
     */
    public function get(
        string $flagName,
        int $appID,
        ?RequestOptions $requestOptions = null
    ): FlagResponse {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($flagName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of HubSpot accounts with an account-level flag setting for the specified app. No request body is included.
     *
     * @param string $flagName path param: The name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param int $appID path param: The ID of the app
     * @param int $limit query param: The maximum number of results to return in a single request
     * @param int $startPortalID query param: The initial account ID for listing, enabling pagination
     *
     * @throws APIException
     */
    public function listPortals(
        string $flagName,
        int $appID,
        ?int $limit = null,
        ?int $startPortalID = null,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateBatchResponse {
        $params = Util::removeNulls(
            ['appID' => $appID, 'limit' => $limit, 'startPortalID' => $startPortalID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listPortals($flagName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
