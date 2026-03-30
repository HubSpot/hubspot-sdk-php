<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\ObjectSchemas;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\ObjectSchemas\Batch\BatchGetParams;
use HubspotSDK\Crm\ObjectSchemas\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BatchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BatchGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseObjectSchemaNoPaging>
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
