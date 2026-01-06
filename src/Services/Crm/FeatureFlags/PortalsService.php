<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\FeatureFlags;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\FeatureFlags\BatchPortalEntry\FlagState;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\FeatureFlags\PortalsContract;

final class PortalsService implements PortalsContract
{
    /**
     * @api
     */
    public PortalsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PortalsRawService($client);
    }

    /**
     * @api
     *
     * Specify an account-level flag state for a specific HubSpot account.
     *
     * @param int $portalID path param: The ID of the account that installed the app
     * @param int $appID path param: The ID of the app
     * @param string $flagName path param: The name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param 'ABSENT'|'OFF'|'ON'|\HubspotSDK\Crm\FeatureFlags\Portals\PortalUpdateParams\FlagState $flagState Body param:
     *
     * @throws APIException
     */
    public function update(
        int $portalID,
        int $appID,
        string $flagName,
        string|\HubspotSDK\Crm\FeatureFlags\Portals\PortalUpdateParams\FlagState $flagState,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateResponse {
        $params = [
            'appID' => $appID, 'flagName' => $flagName, 'flagState' => $flagState,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($portalID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an account-level flag state for a specific HubSpot account. No request body is included.
     *
     * @param int $portalID the ID of the account that installed the app
     * @param int $appID the ID of the app
     * @param string $flagName the name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     *
     * @throws APIException
     */
    public function delete(
        int $portalID,
        int $appID,
        string $flagName,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateResponse {
        $params = ['appID' => $appID, 'flagName' => $flagName];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($portalID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an account-level flag state for multiple HubSpot accounts at once. Use this endpoint to manage flag exposure for groups of HubSpot accounts.
     *
     * @param string $flagName path param: The name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param int $appID path param: The ID of the app
     * @param list<int> $portalIDs Body param:
     *
     * @throws APIException
     */
    public function batchDelete(
        string $flagName,
        int $appID,
        array $portalIDs,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateBatchResponse {
        $params = ['appID' => $appID, 'portalIDs' => $portalIDs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchDelete($flagName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Set the portal flag state for multiple HubSpot accounts at once. Use this endpoint to manage flag exposure for groups of HubSpot accounts.
     *
     * @param string $flagName path param: The name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     * @param int $appID path param: The ID of the app
     * @param list<array{
     *   flagState: 'ABSENT'|'OFF'|'ON'|FlagState, portalID: int
     * }> $portalStates Body param:
     *
     * @throws APIException
     */
    public function batchUpsert(
        string $flagName,
        int $appID,
        array $portalStates,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateBatchResponse {
        $params = ['appID' => $appID, 'portalStates' => $portalStates];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchUpsert($flagName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the account-level flag state of a specific HubSpot account.
     *
     * @param int $portalID the ID of the account that installed the app
     * @param int $appID the ID of the app
     * @param string $flagName the name of the flag, either `hs-release-app-cards` or `hs-hide-crm-cards`
     *
     * @throws APIException
     */
    public function get(
        int $portalID,
        int $appID,
        string $flagName,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateResponse {
        $params = ['appID' => $appID, 'flagName' => $flagName];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($portalID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
