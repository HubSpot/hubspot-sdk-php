<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Exports\ActionResponseWithSingleResultUri;
use HubspotSDK\Crm\Exports\PublicExportResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\TaskLocator;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface ExportsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createAsync(
        RequestOptions|array|null $requestOptions = null
    ): TaskLocator;

    /**
     * @api
     *
     * @param int $exportID the unique ID of the export to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        int $exportID,
        RequestOptions|array|null $requestOptions = null
    ): PublicExportResponse;

    /**
     * @api
     *
     * @param int $taskID the unique ID of the export
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getStatus(
        int $taskID,
        RequestOptions|array|null $requestOptions = null
    ): ActionResponseWithSingleResultUri;
}
