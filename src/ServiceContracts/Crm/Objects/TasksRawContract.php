<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Objects\Tasks\TaskDeleteParams;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface TasksRawContract
{
    /**
     * @api
     *
     * @param string $objectID Unique Task Id
     * @param array<string,mixed>|TaskDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        array|TaskDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
