<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagUpdateParams\DefaultState;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagUpdateParams\OverrideState;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagUpdatePortalStateParams\FlagState;
use HubspotSDK\Crm\FeatureFlags\FlagResponse;
use HubspotSDK\Crm\FeatureFlags\FlagsForAppResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\FeatureFlagsContract;
use HubspotSDK\Services\Crm\FeatureFlags\BatchService;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class FeatureFlagsService implements FeatureFlagsContract
{
    /**
     * @api
     */
    public FeatureFlagsRawService $raw;

    /**
     * @api
     */
    public BatchService $batch;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FeatureFlagsRawService($client);
        $this->batch = new BatchService($client);
    }

    /**
     * @api
     *
     * Set a feature flag for an app. For example, update the `hs-hide-crm-cards` flag's `defaultState` to `ON` to hide classic CRM cards from new installs.
     *
     * @param string $flagName Path param
     * @param int $appID Path param
     * @param DefaultState|value-of<DefaultState> $defaultState Body param: The state that the flag should have if there are no overrides for a particular portal
     * @param OverrideState|value-of<OverrideState> $overrideState Body param: A flag value that supercedes all other overrides, including portal-level values. Mostly used for things like emergency overrides
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $flagName,
        int $appID,
        DefaultState|string $defaultState,
        OverrideState|string|null $overrideState = null,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $flagName,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): FlagResponse {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($flagName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an account-level flag state for a specific HubSpot account. No request body is included.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deletePortalState(
        int $portalID,
        int $appID,
        string $flagName,
        RequestOptions|array|null $requestOptions = null,
    ): PortalFlagStateResponse {
        $params = Util::removeNulls(['appID' => $appID, 'flagName' => $flagName]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deletePortalState($portalID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the current status of the app's feature flags. No request body is included.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $flagName,
        int $appID,
        RequestOptions|array|null $requestOptions = null,
    ): FlagResponse {
        $params = Util::removeNulls(['appID' => $appID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($flagName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the account-level flag state of a specific HubSpot account.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getPortalState(
        int $portalID,
        int $appID,
        string $flagName,
        RequestOptions|array|null $requestOptions = null,
    ): PortalFlagStateResponse {
        $params = Util::removeNulls(['appID' => $appID, 'flagName' => $flagName]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getPortalState($portalID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listAll(
        int $appID,
        RequestOptions|array|null $requestOptions = null
    ): FlagsForAppResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listAll($appID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of HubSpot accounts with an account-level flag setting for the specified app. No request body is included.
     *
     * @param string $flagName Path param
     * @param int $appID Path param
     * @param int $limit query param: The maximum number of results to display per page
     * @param int $startPortalID Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listPortals(
        string $flagName,
        int $appID,
        ?int $limit = null,
        ?int $startPortalID = null,
        RequestOptions|array|null $requestOptions = null,
    ): PortalFlagStateBatchResponse {
        $params = Util::removeNulls(
            ['appID' => $appID, 'limit' => $limit, 'startPortalID' => $startPortalID]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listPortals($flagName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Specify an account-level flag state for a specific HubSpot account.
     *
     * @param int $portalID Path param
     * @param int $appID Path param
     * @param string $flagName Path param
     * @param FlagState|value-of<FlagState> $flagState Body param: The state that the given flag should be in for this portal
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updatePortalState(
        int $portalID,
        int $appID,
        string $flagName,
        FlagState|string $flagState,
        RequestOptions|array|null $requestOptions = null,
    ): PortalFlagStateResponse {
        $params = Util::removeNulls(
            ['appID' => $appID, 'flagName' => $flagName, 'flagState' => $flagState]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updatePortalState($portalID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
