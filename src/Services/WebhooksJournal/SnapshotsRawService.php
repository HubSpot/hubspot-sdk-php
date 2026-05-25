<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\WebhooksJournal;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\CrmObjectSnapshotBatchResponse;
use HubSpotSDK\CrmObjectSnapshotRequest;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\WebhooksJournal\SnapshotsRawContract;
use HubSpotSDK\WebhooksJournal\Snapshots\SnapshotCreateParams;

/**
 * @phpstan-import-type CrmObjectSnapshotRequestShape from \HubSpotSDK\CrmObjectSnapshotRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class SnapshotsRawService implements SnapshotsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a batch of CRM object snapshots in HubSpot. This endpoint is used to capture the current state of specified CRM objects for later reference or analysis. It requires a JSON payload containing the details of the CRM objects to snapshot. This operation is exempt from daily and ten-secondly rate limits.
     *
     * @param array{
     *   snapshotRequests: list<CrmObjectSnapshotRequest|CrmObjectSnapshotRequestShape>
     * }|SnapshotCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CrmObjectSnapshotBatchResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SnapshotCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SnapshotCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'webhooks-journal/snapshots/2026-03/crm',
            body: (object) $parsed,
            options: $options,
            convert: CrmObjectSnapshotBatchResponse::class,
        );
    }
}
