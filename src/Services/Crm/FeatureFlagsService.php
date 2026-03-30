<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\FeatureFlags\FeatureFlagUpdateParams\FlagState;
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
    public function update(
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
        $response = $this->raw->update($portalID, params: $params, requestOptions: $requestOptions);

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
    public function delete(
        int $portalID,
        int $appID,
        string $flagName,
        RequestOptions|array|null $requestOptions = null,
    ): PortalFlagStateResponse {
        $params = Util::removeNulls(['appID' => $appID, 'flagName' => $flagName]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($portalID, params: $params, requestOptions: $requestOptions);

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
    public function get(
        int $portalID,
        int $appID,
        string $flagName,
        RequestOptions|array|null $requestOptions = null,
    ): PortalFlagStateResponse {
        $params = Util::removeNulls(['appID' => $appID, 'flagName' => $flagName]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($portalID, params: $params, requestOptions: $requestOptions);

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
}
