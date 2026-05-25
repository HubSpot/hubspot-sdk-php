<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\WebhooksJournal;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\CrmObjectSnapshotBatchResponse;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\WebhooksJournal\Snapshots\SnapshotCreateParams;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface SnapshotsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SnapshotCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CrmObjectSnapshotBatchResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SnapshotCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
