<?php

declare(strict_types=1);

namespace HubspotSDK\Services\CRM\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\CRM\Objects\DealSplits\BatchResponseDealToDealSplits;
use HubspotSDK\CRM\Objects\DealSplits\DealSplitBatchReadParams;
use HubspotSDK\CRM\Objects\DealSplits\DealSplitBatchUpsertParams;
use HubspotSDK\CRM\Objects\DealSplits\PublicDealSplitsCreateRequest;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\CRM\Objects\DealSplitsContract;

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
     * @param list<PublicObjectID> $inputs
     *
     * @throws APIException
     */
    public function batchRead(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseDealToDealSplits {
        $params = ['inputs' => $inputs];

        return $this->batchReadRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchReadRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseDealToDealSplits {
        [$parsed, $options] = DealSplitBatchReadParams::parseRequest(
            $params,
            $requestOptions
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
     * @param list<PublicDealSplitsCreateRequest> $inputs
     *
     * @throws APIException
     */
    public function batchUpsert(
        $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponseDealToDealSplits {
        $params = ['inputs' => $inputs];

        return $this->batchUpsertRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function batchUpsertRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BatchResponseDealToDealSplits {
        [$parsed, $options] = DealSplitBatchUpsertParams::parseRequest(
            $params,
            $requestOptions
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
