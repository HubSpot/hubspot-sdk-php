<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\BusinessUnits;

use HubSpotSDK\BusinessUnits\CollectionResponsePublicBusinessUnitNoPaging;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BusinessUnitEntriesContract
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
