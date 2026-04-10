<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\BusinessUnits;

use HubSpotSDK\BusinessUnits\CollectionResponsePublicBusinessUnitNoPaging;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\BusinessUnits\BusinessUnitEntriesContract;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class BusinessUnitEntriesService implements BusinessUnitEntriesContract
{
    /**
     * @api
     */
    public BusinessUnitEntriesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BusinessUnitEntriesRawService($client);
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
