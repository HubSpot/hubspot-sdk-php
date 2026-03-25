<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\BusinessUnits;

use HubspotSDK\BusinessUnits\BusinessUnits\BusinessUnitGetByUserIDParams;
use HubspotSDK\BusinessUnits\CollectionResponsePublicBusinessUnitNoPaging;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BusinessUnitsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BusinessUnitGetByUserIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicBusinessUnitNoPaging>
     *
     * @throws APIException
     */
    public function getByUserID(
        string $userID,
        array|BusinessUnitGetByUserIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
