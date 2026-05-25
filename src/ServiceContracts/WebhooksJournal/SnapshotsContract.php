<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\WebhooksJournal;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\CrmObjectSnapshotBatchResponse;
use HubSpotSDK\CrmObjectSnapshotRequest;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type CrmObjectSnapshotRequestShape from \HubSpotSDK\CrmObjectSnapshotRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface SnapshotsContract
{
    /**
     * @api
     *
     * @param list<CrmObjectSnapshotRequest|CrmObjectSnapshotRequestShape> $snapshotRequests An array of CrmObjectSnapshotRequest objects, each representing a request to create a snapshot for a specific CRM object. This property is required.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $snapshotRequests,
        RequestOptions|array|null $requestOptions = null
    ): CrmObjectSnapshotBatchResponse;
}
