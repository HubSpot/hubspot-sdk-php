<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM\FeatureFlags;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\FeatureFlags\BatchPortalEntry;
use HubspotSDK\CRM\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\CRM\FeatureFlags\PortalFlagStateResponse;
use HubspotSDK\CRM\FeatureFlags\Portals\PortalUpdateParams\FlagState;
use HubspotSDK\RequestOptions;

interface PortalsContract
{
    /**
     * @api
     *
     * @param int $appID
     * @param string $flagName
     * @param FlagState|value-of<FlagState> $flagState
     *
     * @throws APIException
     */
    public function update(
        int $portalID,
        $appID,
        $flagName,
        $flagState,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        int $portalID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortalFlagStateResponse;

    /**
     * @api
     *
     * @param int $appID
     * @param string $flagName
     *
     * @throws APIException
     */
    public function delete(
        int $portalID,
        $appID,
        $flagName,
        ?RequestOptions $requestOptions = null
    ): PortalFlagStateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        int $portalID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortalFlagStateResponse;

    /**
     * @api
     *
     * @param int $appID
     * @param list<int> $portalIDs
     *
     * @throws APIException
     */
    public function batchDelete(
        string $flagName,
        $appID,
        $portalIDs,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateBatchResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchDeleteRaw(
        string $flagName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortalFlagStateBatchResponse;

    /**
     * @api
     *
     * @param int $appID
     * @param list<BatchPortalEntry> $portalStates
     *
     * @throws APIException
     */
    public function batchUpsert(
        string $flagName,
        $appID,
        $portalStates,
        ?RequestOptions $requestOptions = null,
    ): PortalFlagStateBatchResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchUpsertRaw(
        string $flagName,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortalFlagStateBatchResponse;

    /**
     * @api
     *
     * @param int $appID
     * @param string $flagName
     *
     * @throws APIException
     */
    public function get(
        int $portalID,
        $appID,
        $flagName,
        ?RequestOptions $requestOptions = null
    ): PortalFlagStateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        int $portalID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PortalFlagStateResponse;
}
