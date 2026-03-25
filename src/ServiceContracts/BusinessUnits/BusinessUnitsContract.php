<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\BusinessUnits;

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
     * @param list<string> $name
     * @param list<string> $properties
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
