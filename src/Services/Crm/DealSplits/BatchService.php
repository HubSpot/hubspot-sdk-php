<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Crm\DealSplits;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\DealSplits\BatchResponseDealToDealSplits;
use HubspotSDK\Crm\DealSplits\PublicDealSplitsCreateRequest;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Crm\DealSplits\BatchContract;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubspotSDK\PublicObjectID
 * @phpstan-import-type PublicDealSplitsCreateRequestShape from \HubspotSDK\Crm\DealSplits\PublicDealSplitsCreateRequest
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class BatchService implements BatchContract
{
    /**
     * @api
     */
    public BatchRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BatchRawService($client);
    }

    /**
     * @api
     *
     * Read a batch of deal split objects by their associated deal object internal ID
     *
     * @param list<PublicObjectID|PublicObjectIDShape> $inputs An array of deal split inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function read(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseDealToDealSplits {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->read(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create or replace deal splits for deals with the provided IDs. Deal split percentages for each deal must sum up to 1.0 (100%) and may have up to 8 decimal places
     *
     * @param list<PublicDealSplitsCreateRequest|PublicDealSplitsCreateRequestShape> $inputs An array of deal split inputs
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upsert(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponseDealToDealSplits {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upsert(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
