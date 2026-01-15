<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts;

use HubspotSDK\BusinessUnits\CollectionResponsePublicBusinessUnitNoPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface BusinessUnitsContract
{
    /**
     * @api
     *
     * @param string $userID identifier of user to retrieve
     * @param list<string> $name The names of Business Units to retrieve. If empty or not provided, then all associated Business Units will be returned.
     * @param list<string> $properties The names of properties to optionally include in the response body. The only valid value is `logoMetadata`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getByUserID(
        string $userID,
        ?array $name = null,
        ?array $properties = null,
        RequestOptions|array|null $requestOptions = null,
    ): CollectionResponsePublicBusinessUnitNoPaging;
}
