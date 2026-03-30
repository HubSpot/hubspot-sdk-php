<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\FeatureFlags;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\FeatureFlags\Batch\BatchDeleteParams;
use HubspotSDK\Crm\FeatureFlags\Batch\BatchUpsertParams;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BatchRawContract
{
    /**
     * @api
     *
     * @param string $flagName Path param
     * @param array<string,mixed>|BatchDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalFlagStateBatchResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $flagName,
        array|BatchDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $flagName Path param
     * @param array<string,mixed>|BatchUpsertParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalFlagStateBatchResponse>
     *
     * @throws APIException
     */
    public function upsert(
        string $flagName,
        array|BatchUpsertParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
