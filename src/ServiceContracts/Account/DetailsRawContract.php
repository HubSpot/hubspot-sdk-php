<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Account;

use HubspotSDK\Account\PortalInformationResponse;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface DetailsRawContract
{
    /**
     * @api
     *
     * @return BaseResponse<PortalInformationResponse>
     *
     * @throws APIException
     */
    public function get(?RequestOptions $requestOptions = null): BaseResponse;
}
