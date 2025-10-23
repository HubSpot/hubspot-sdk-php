<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Account;

use HubspotSDK\Account\CollectionResponseAPIUsage;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface UsageContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function getDailyPrivateAppsUsage(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseAPIUsage;
}
