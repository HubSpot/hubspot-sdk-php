<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Account;

use HubspotSDK\Account\CollectionResponseAPIUsage;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface UsageRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<CollectionResponseAPIUsage>
     *
     * @throws APIException
     */
    public function getDailyPrivateAppsUsage(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
