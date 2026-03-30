<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaign;
use HubspotSDK\Marketing\Campaigns\BatchResponsePublicCampaignWithAssets;
use HubspotSDK\Marketing\Campaigns\PublicCampaignBatchUpdateItem;
use HubspotSDK\Marketing\Campaigns\PublicCampaignDeleteInput;
use HubspotSDK\Marketing\Campaigns\PublicCampaignInput;
use HubspotSDK\Marketing\Campaigns\PublicCampaignReadInput;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\BatchContract;

/**
 * @phpstan-import-type PublicCampaignInputShape from \HubspotSDK\Marketing\Campaigns\PublicCampaignInput
 * @phpstan-import-type PublicCampaignBatchUpdateItemShape from \HubspotSDK\Marketing\Campaigns\PublicCampaignBatchUpdateItem
 * @phpstan-import-type PublicCampaignDeleteInputShape from \HubspotSDK\Marketing\Campaigns\PublicCampaignDeleteInput
 * @phpstan-import-type PublicCampaignReadInputShape from \HubspotSDK\Marketing\Campaigns\PublicCampaignReadInput
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
     * This endpoint creates a batch of campaigns. The maximum number of items in a batch request is 50.
     * The campaigns in the response are not guaranteed to be in the same order as they were provided in the request.
     *
     * @param list<PublicCampaignInput|PublicCampaignInputShape> $inputs An array of PublicCampaignInput objects, each representing the properties of a campaign to be created in the batch. This property is required.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
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
     * @param list<PublicCampaignBatchUpdateItem|PublicCampaignBatchUpdateItemShape> $inputs an array of PublicCampaignBatchUpdateItem objects, each containing the ID and properties to update for a specific campaign
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
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
     * @param list<PublicCampaignDeleteInput|PublicCampaignDeleteInputShape> $inputs An array of PublicCampaignDeleteInput objects, each specifying a campaign to be deleted. Each object must include the campaign's unique identifier.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
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
     * @param list<PublicCampaignReadInput|PublicCampaignReadInputShape> $inputs Body param: An array of PublicCampaignReadInput objects, each containing the ID of a campaign to be read. This property is required.
     * @param string $endDate Query param
     * @param list<string> $properties Query param
     * @param string $startDate Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        array $inputs,
        ?string $endDate = null,
        ?array $properties = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
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
