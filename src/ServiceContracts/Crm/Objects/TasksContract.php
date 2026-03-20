<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Objects;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface TasksContract
{
    /**
     * @api
     *
     * @param string $objectID Unique Task Id
     * @param string $objectType object type
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $objectID,
        string $objectType,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
