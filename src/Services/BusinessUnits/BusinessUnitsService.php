<?php

declare(strict_types=1);

namespace HubspotSDK\Services\BusinessUnits;

use HubspotSDK\BusinessUnits\CollectionResponsePublicBusinessUnitNoPaging;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\BusinessUnits\BusinessUnitsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class BusinessUnitsService implements BusinessUnitsContract
{
    /**
     * @api
     */
    public BusinessUnitsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BusinessUnitsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve the brands that a specific user can access.
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
    ): CollectionResponsePublicBusinessUnitNoPaging {
        $params = Util::removeNulls(['name' => $name, 'properties' => $properties]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByUserID($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
