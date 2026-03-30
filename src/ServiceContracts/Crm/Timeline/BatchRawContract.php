<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Timeline;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\Batch\BatchCreateParams;
use HubspotSDK\Crm\Timeline\BatchResponseAppEventOccurrence;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BatchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseAppEventOccurrence>
     *
     * @throws APIException
     */
    public function create(
        array|BatchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
