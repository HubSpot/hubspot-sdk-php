<?php

declare(strict_types=1);

namespace HubspotSDK\Services\BusinessUnits;

use HubspotSDK\BusinessUnits\BusinessUnitEntries\BusinessUnitEntryGetByUserIDParams;
use HubspotSDK\BusinessUnits\CollectionResponsePublicBusinessUnitNoPaging;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\BusinessUnits\BusinessUnitEntriesRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class BusinessUnitEntriesRawService implements BusinessUnitEntriesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve the brands that a specific user can access.
     *
     * @param array{
     *   name?: list<string>, properties?: list<string>
     * }|BusinessUnitEntryGetByUserIDParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponsePublicBusinessUnitNoPaging>
     *
     * @throws APIException
     */
    public function getByUserID(
        string $userID,
        array|BusinessUnitEntryGetByUserIDParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BusinessUnitEntryGetByUserIDParams::parseRequest(
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
