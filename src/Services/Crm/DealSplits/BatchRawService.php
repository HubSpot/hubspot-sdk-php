<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\DealSplits;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\DealSplits\Batch\BatchReadParams;
use HubspotSDK\Crm\DealSplits\Batch\BatchUpsertParams;
use HubspotSDK\Crm\DealSplits\BatchResponseDealToDealSplits;
use HubspotSDK\Crm\DealSplits\PublicDealSplitsCreateRequest;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\DealSplits\BatchRawContract;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 * @phpstan-import-type PublicDealSplitsCreateRequestShape from \HubspotSDK\Crm\DealSplits\PublicDealSplitsCreateRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
