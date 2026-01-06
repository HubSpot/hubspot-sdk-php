<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Associations\V4;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Associations\V4\ReportCreationResponse;
use HubspotSDK\RequestOptions;

interface ReportContract
{
    /**
     * @api
     *
     * @param int $userID The user for the report
     *
     * @throws APIException
     */
    public function requestHighUsageReport(
        int $userID,
        ?RequestOptions $requestOptions = null
    ): ReportCreationResponse;
}
