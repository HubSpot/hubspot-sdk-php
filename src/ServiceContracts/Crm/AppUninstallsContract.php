<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface AppUninstallsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function uninstall(?RequestOptions $requestOptions = null): mixed;
}
