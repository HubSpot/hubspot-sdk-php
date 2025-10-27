<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\FeatureFlags;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\FeatureFlags\Apps\AppUpdateParams\DefaultState;
use HubspotSDK\CRM\FeatureFlags\Apps\AppUpdateParams\OverrideState;
use HubspotSDK\CRM\FeatureFlags\FlagResponse;
use HubspotSDK\CRM\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface AppsContract
{
    /**
     * @api
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
    ): FlagResponse;

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
    ): FlagResponse;

    /**
     * @api
     *
     * @param int $appID
     *
     * @throws APIException
     */
    public function delete(
        string $flagName,
        $appID,
        ?RequestOptions $requestOptions = null
    ): FlagResponse;

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
    ): FlagResponse;

    /**
     * @api
     *
     * @param int $appID
     *
     * @throws APIException
     */
    public function get(
        string $flagName,
        $appID,
        ?RequestOptions $requestOptions = null
    ): FlagResponse;

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
    ): FlagResponse;

    /**
     * @api
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
    ): PortalFlagStateBatchResponse;

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
    ): PortalFlagStateBatchResponse;
}
