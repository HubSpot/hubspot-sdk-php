<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Exports\ActionResponseWithSingleResultUri;
use HubspotSDK\Crm\Exports\PublicExportResponse;
use HubspotSDK\RequestOptions;
use HubspotSDK\TaskLocator;

interface ExportsRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<TaskLocator>
     *
     * @throws APIException
     */
    public function createAsync(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $exportID the unique ID of the export to retrieve
     *
     * @return BaseResponse<PublicExportResponse>
     *
     * @throws APIException
     */
    public function get(
        int $exportID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param int $taskID the unique ID of the export
     *
     * @return BaseResponse<ActionResponseWithSingleResultUri>
     *
     * @throws APIException
     */
    public function getStatus(
        int $taskID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
