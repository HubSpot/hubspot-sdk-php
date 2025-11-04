<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Exports\ActionResponseWithSingleResultUri;
use HubspotSDK\Crm\Exports\PublicExportResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\TaskLocator;

interface ExportsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function createAsync(
        ?RequestOptions $requestOptions = null
    ): TaskLocator;

    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        int $exportID,
        ?RequestOptions $requestOptions = null
    ): PublicExportResponse;

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
