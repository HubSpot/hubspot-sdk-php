<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts;

use HubspotSDK\BusinessUnits\BusinessUnitGetByUserIDParams;
use HubspotSDK\BusinessUnits\CollectionResponsePublicBusinessUnitNoPaging;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface BusinessUnitsRawContract
{
    /**
     * @api
     *
     * @param string $userID identifier of user to retrieve
     * @param array<string,mixed>|BusinessUnitGetByUserIDParams $params
     *
     * @return BaseResponse<CollectionResponsePublicBusinessUnitNoPaging>
     *
     * @throws APIException
     */
    public function getByUserID(
        string $userID,
        array|BusinessUnitGetByUserIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
