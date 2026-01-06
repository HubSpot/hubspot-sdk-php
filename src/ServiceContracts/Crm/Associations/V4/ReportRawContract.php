<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations\V4;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\V4\ReportCreationResponse;
use HubspotSDK\RequestOptions;

interface ReportRawContract
{
    /**
     * @api
     *
     * @param int $userID The user for the report
     *
     * @return BaseResponse<ReportCreationResponse>
     *
     * @throws APIException
     */
    public function requestHighUsageReport(
        int $userID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
