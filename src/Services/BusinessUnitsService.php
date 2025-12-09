<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\BusinessUnits\CollectionResponsePublicBusinessUnitNoPaging;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\BusinessUnitsContract;

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
     * Get Business Units identified by `userId`. The `userId` refers to the user’s ID.
     *
     * @param string $userID identifier of user to retrieve
     * @param list<string> $name The names of Business Units to retrieve. If empty or not provided, then all associated Business Units will be returned.
     * @param list<string> $properties The names of properties to optionally include in the response body. The only valid value is `logoMetadata`.
     *
     * @throws APIException
     */
    public function getByUserID(
        string $userID,
        ?array $name = null,
        ?array $properties = null,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicBusinessUnitNoPaging {
        $params = ['name' => $name, 'properties' => $properties];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getByUserID($userID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
