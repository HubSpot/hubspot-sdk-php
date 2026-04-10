<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\BusinessUnits;

use HubSpotSDK\BusinessUnits\BusinessUnitEntries\BusinessUnitEntryGetByUserIDParams;
use HubSpotSDK\BusinessUnits\CollectionResponsePublicBusinessUnitNoPaging;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BusinessUnitEntriesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BusinessUnitEntryGetByUserIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicBusinessUnitNoPaging>
     *
     * @throws APIException
     */
    public function getByUserID(
        string $userID,
        array|BusinessUnitEntryGetByUserIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
