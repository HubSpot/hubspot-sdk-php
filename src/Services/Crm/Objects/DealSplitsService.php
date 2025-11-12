<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Objects\DealSplits\BatchResponseDealToDealSplits;
use HubspotSDK\Crm\Objects\DealSplits\DealSplitBatchReadParams;
use HubspotSDK\Crm\Objects\DealSplits\DealSplitBatchUpsertParams;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\DealSplitsContract;

final class DealSplitsService implements DealSplitsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Read a batch of deal split objects by their associated deal object internal ID
     *
     * @param array{
     *   inputs: list<array{id: string}|PublicObjectID>
     * }|DealSplitBatchReadParams $params
     *
     * @throws APIException
     */
    public function batchRead(
        array|DealSplitBatchReadParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseDealToDealSplits {
        [$parsed, $options] = DealSplitBatchReadParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/deals/splits/batch/read',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseDealToDealSplits::class,
        );
    }

    /**
     * @api
     *
     * Create or replace deal splits for deals with the provided IDs. Deal split percentages for each deal must sum up to 1.0 (100%) and may have up to 8 decimal places
     *
     * @param array{
     *   inputs: list<array{id: int, splits: list<array<mixed>>}>
     * }|DealSplitBatchUpsertParams $params
     *
     * @throws APIException
     */
    public function batchUpsert(
        array|DealSplitBatchUpsertParams $params,
        ?RequestOptions $requestOptions = null,
    ): BatchResponseDealToDealSplits {
        [$parsed, $options] = DealSplitBatchUpsertParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/deals/splits/batch/upsert',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseDealToDealSplits::class,
        );
    }
}
