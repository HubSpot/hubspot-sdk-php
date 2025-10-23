<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\CRM;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Exports\ActionResponseWithSingleResultUri;
use HubspotSDK\RequestOptions;
use HubspotSDK\TaskLocator;

interface ExportsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function create(
        ?RequestOptions $requestOptions = null
    ): TaskLocator;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getStatus(
        int $taskID,
        ?RequestOptions $requestOptions = null
    ): ActionResponseWithSingleResultUri;
}
