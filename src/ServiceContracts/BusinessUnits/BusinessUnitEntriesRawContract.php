<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\BusinessUnits;

use HubspotSDK\BusinessUnits\BusinessUnitEntries\BusinessUnitEntryGetByUserIDParams;
use HubspotSDK\BusinessUnits\CollectionResponsePublicBusinessUnitNoPaging;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
