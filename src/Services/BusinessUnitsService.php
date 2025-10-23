<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\BusinessUnits\BusinessUnitGetByUserIDParams;
use HubspotSDK\BusinessUnits\CollectionResponsePublicBusinessUnitNoPaging;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\BusinessUnitsContract;

use const HubspotSDK\Core\OMIT as omit;

final class BusinessUnitsService implements BusinessUnitsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Business Units identified by `userId`. The `userId` refers to the user’s ID.
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
    ): CollectionResponsePublicBusinessUnitNoPaging {
        $params = ['name' => $name, 'properties' => $properties];

        return $this->getByUserIDRaw($userID, $params, $requestOptions);
    }

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
    ): CollectionResponsePublicBusinessUnitNoPaging {
        [$parsed, $options] = BusinessUnitGetByUserIDParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['business-units/v3/business-units/user/%1$s', $userID],
            query: $parsed,
            options: $options,
            convert: CollectionResponsePublicBusinessUnitNoPaging::class,
        );
    }
}
