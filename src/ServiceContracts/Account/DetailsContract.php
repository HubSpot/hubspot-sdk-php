<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Account;

use HubspotSDK\Account\PortalInformationResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface DetailsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function get(
        ?RequestOptions $requestOptions = null
    ): PortalInformationResponse;
}
