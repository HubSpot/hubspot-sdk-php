<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Objects\DealSplits\BatchResponseDealToDealSplits;
use HubspotSDK\Crm\Objects\DealSplits\DealSplitBatchReadParams;
use HubspotSDK\Crm\Objects\DealSplits\DealSplitBatchUpsertParams;
use HubspotSDK\Crm\Objects\DealSplits\PublicDealSplitsCreateRequest;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\Objects\DealSplitsRawContract;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 * @phpstan-import-type PublicDealSplitsCreateRequestShape from \HubspotSDK\Crm\Objects\DealSplits\PublicDealSplitsCreateRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class DealSplitsRawService implements DealSplitsRawContract
{
    // @phpstan-ignore-next-line
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
     *   inputs: list<PublicObjectID|PublicObjectIDShape>
     * }|DealSplitBatchReadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseDealToDealSplits>
     *
     * @throws APIException
     */
    public function batchRead(
        array|DealSplitBatchReadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DealSplitBatchReadParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *   inputs: list<PublicDealSplitsCreateRequest|PublicDealSplitsCreateRequestShape>
     * }|DealSplitBatchUpsertParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseDealToDealSplits>
     *
     * @throws APIException
     */
    public function batchUpsert(
        array|DealSplitBatchUpsertParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DealSplitBatchUpsertParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'crm/v3/objects/deals/splits/batch/upsert',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseDealToDealSplits::class,
        );
    }
}
