<?php

declare(strict_types=1);

namespace HubspotSDK\Services\BusinessUnits;

use HubspotSDK\BusinessUnits\BusinessUnits\BusinessUnitGetByUserIDParams;
use HubspotSDK\BusinessUnits\CollectionResponsePublicBusinessUnitNoPaging;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\BusinessUnits\BusinessUnitsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class BusinessUnitsRawService implements BusinessUnitsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   name?: list<string>, properties?: list<string>
     * }|BusinessUnitGetByUserIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicBusinessUnitNoPaging>
     *
     * @throws APIException
     */
    public function getByUserID(
        string $userID,
        array|BusinessUnitGetByUserIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BusinessUnitGetByUserIDParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['business-units/public/2026-03/business-units/user/%1$s', $userID],
            query: $parsed,
            options: $options,
            convert: CollectionResponsePublicBusinessUnitNoPaging::class,
        );
    }
}
