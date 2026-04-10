<?php

declare(strict_types=1);

namespace HubSpotSDK\Services\Crm\DealSplits;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\DealSplits\BatchResponseDealToDealSplits;
use HubSpotSDK\Crm\DealSplits\PublicDealSplitsCreateRequest;
use HubSpotSDK\PublicObjectID;
use HubSpotSDK\RequestOptions;
use HubSpotSDK\ServiceContracts\Crm\DealSplits\BatchContract;

/**
 * @phpstan-import-type PublicObjectIDShape from \HubSpotSDK\PublicObjectID
 * @phpstan-import-type PublicDealSplitsCreateRequestShape from \HubSpotSDK\Crm\DealSplits\PublicDealSplitsCreateRequest
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
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
