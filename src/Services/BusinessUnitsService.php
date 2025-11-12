<?php

declare(strict_types=1);

namespace HubspotSDK\Services;

use HubspotSDK\BusinessUnits\BusinessUnitGetByUserIDParams;
use HubspotSDK\BusinessUnits\CollectionResponsePublicBusinessUnitNoPaging;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\BusinessUnitsContract;

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
     * @param array{
     *   name?: list<string>, properties?: list<string>
     * }|BusinessUnitGetByUserIDParams $params
     *
     * @throws APIException
     */
    public function getByUserID(
        string $userID,
        array|BusinessUnitGetByUserIDParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponsePublicBusinessUnitNoPaging {
        [$parsed, $options] = BusinessUnitGetByUserIDParams::parseRequest(
            $params,
            $requestOptions,
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
