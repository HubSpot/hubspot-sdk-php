<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Objects\DealSplits\BatchResponseDealToDealSplits;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\DealSplitsContract;

final class DealSplitsService implements DealSplitsContract
{
    /**
     * @api
     */
    public DealSplitsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DealSplitsRawService($client);
    }

    /**
     * @api
     *
     * Read a batch of deal split objects by their associated deal object internal ID
     *
     * @param list<array{id: string}|PublicObjectID> $inputs
     *
     * @throws APIException
     */
    public function batchRead(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseDealToDealSplits {
        $params = ['inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchRead(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create or replace deal splits for deals with the provided IDs. Deal split percentages for each deal must sum up to 1.0 (100%) and may have up to 8 decimal places
     *
     * @param list<array{
     *   id: int, splits: list<array{ownerID: int, percentage: float}>
     * }> $inputs
     *
     * @throws APIException
     */
    public function batchUpsert(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseDealToDealSplits {
        $params = ['inputs' => $inputs];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->batchUpsert(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
