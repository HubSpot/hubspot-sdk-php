<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\WebhooksJournal;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\CrmObjectSnapshotBatchResponse;
use HubSpotSDK\CrmObjectSnapshotRequest;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\WebhooksJournal\SnapshotsContract;

/**
 * @phpstan-import-type CrmObjectSnapshotRequestShape from \HubSpotSDK\CrmObjectSnapshotRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class SnapshotsService implements SnapshotsContract
{
    /**
     * @api
     */
    public SnapshotsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SnapshotsRawService($client);
    }

    /**
     * @api
     *
     * Create a batch of CRM object snapshots in HubSpot. This endpoint is used to capture the current state of specified CRM objects for later reference or analysis. It requires a JSON payload containing the details of the CRM objects to snapshot. This operation is exempt from daily and ten-secondly rate limits.
     *
     * @param list<CrmObjectSnapshotRequest|CrmObjectSnapshotRequestShape> $snapshotRequests An array of CrmObjectSnapshotRequest objects, each representing a request to create a snapshot for a specific CRM object. This property is required.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $snapshotRequests,
        RequestOptions|array|null $requestOptions = null
    ): CrmObjectSnapshotBatchResponse {
        $params = Util::removeNulls(['snapshotRequests' => $snapshotRequests]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
