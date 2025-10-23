<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts;

use HubspotSDK\BusinessUnits\CollectionResponsePublicBusinessUnitNoPaging;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface BusinessUnitsContract
{
    /**
     * @api
     *
     * @param list<string> $name The names of Business Units to retrieve. If empty or not provided, then all associated Business Units will be returned.
     * @param list<string> $properties The names of properties to optionally include in the response body. The only valid value is `logoMetadata`.
     *
     * @throws APIException
     */
    public function getByUserID(
        string $userID,
        $name = omit,
        $properties = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicBusinessUnitNoPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getByUserIDRaw(
        string $userID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponsePublicBusinessUnitNoPaging;
}
