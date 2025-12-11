<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaign;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaignWithAssets;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\BatchContract;

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
     * This endpoint creates a batch of campaigns. The maximum number of items in a batch request is 50.
     * The campaigns in the response are not guaranteed to be in the same order as they were provided in the request.
     *
     * @param list<array{properties: array<string,string>}> $inputs
     *
     * @throws APIException
     */
    public function create(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicCampaign {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint updates a batch of campaigns based on the provided input data.
     * The maximum number of items in a batch request is 50.
     * If an empty string ("") is passed for any property in the Batch Update, it will reset that property's value.
     *
     * @param list<array{id: string, properties: array<string,string>}> $inputs
     *
     * @throws APIException
     */
    public function update(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): BatchResponsePublicCampaign {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint deletes a batch of campaigns.
     * The maximum number of items in a batch request is 50.
     * The response will always be 204 No Content, regardless of whether the campaigns exist or not, whether they were successfully deleted or not, or if only some of the campaigns in the batch were deleted.
     *
     * @param list<array{id: string}> $inputs
     *
     * @throws APIException
     */
    public function delete(
        array $inputs,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['inputs' => $inputs]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint reads a batch of campaigns based on the provided input data and returns the campaigns along with their associated assets.
     * The maximum number of items in a batch request is 50.
     * The campaigns in the response are not guaranteed to be in the same order as they were provided in the request.
     * If duplicate campaign IDs are provided in the request, duplicates will be ignored. The response will include only unique IDs and will be returned without duplicates.
     *
     * @param list<array{id: string}> $inputs Body param:
     * @param string $endDate Query param: End date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period. If not provided, no asset metrics will be fetched.
     * @param list<string> $properties Query param: A comma-separated list of the properties to be returned in the response. If any of the specified properties has empty value on the requested object(s), they will be ignored and not returned in response. If this parameter is empty, the response will include an empty properties map.
     * @param string $startDate Query param: Start date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period. If not provided, no asset metrics will be fetched.
     *
     * @throws APIException
     */
    public function get(
        array $inputs,
        ?string $endDate = null,
        ?array $properties = null,
        ?string $startDate = null,
        ?RequestOptions $requestOptions = null,
    ): BatchResponsePublicCampaignWithAssets {
        $params = Util::removeNulls(
            [
                'inputs' => $inputs,
                'endDate' => $endDate,
                'properties' => $properties,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
