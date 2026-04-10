<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\DealSplits;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\DealSplits\Batch\BatchReadParams;
use HubSpotSDK\Crm\DealSplits\Batch\BatchUpsertParams;
use HubSpotSDK\Crm\DealSplits\BatchResponseDealToDealSplits;
use HubSpotSDK\Crm\DealSplits\PublicDealSplitsCreateRequest;
use HubSpotSDK\PublicObjectID;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\DealSplits\BatchRawContract;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubSpotSDK\PublicObjectID
 * @phpstan-import-type PublicDealSplitsCreateRequestShape from \HubSpotSDK\Crm\DealSplits\PublicDealSplitsCreateRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
final class BatchRawService implements BatchRawContract
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
     * }|BatchReadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseDealToDealSplits>
     *
     * @throws APIException
     */
    public function read(
        array|BatchReadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchReadParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'deal-splits/2026-03/batch/read',
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
     * }|BatchUpsertParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseDealToDealSplits>
     *
     * @throws APIException
     */
    public function upsert(
        array|BatchUpsertParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BatchUpsertParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'deal-splits/2026-03/batch/upsert',
            body: (object) $parsed,
            options: $options,
            convert: BatchResponseDealToDealSplits::class,
        );
    }
}
