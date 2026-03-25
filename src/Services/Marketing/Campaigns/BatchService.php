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
     * Create a batch of campaigns with specified properties. This endpoint allows for the creation of multiple campaigns in a single request. Note that the 'hs_goal' property is deprecated and will be ignored if provided.
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
     * Update a batch of marketing campaigns with specified properties. This endpoint allows you to modify multiple campaigns in one request. Note that the 'hs_goal' property is deprecated and will be ignored if provided.
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
     * Archive a batch of marketing campaigns in your HubSpot account. This operation permanently removes the specified campaigns, making them inaccessible. It is useful for cleaning up outdated or unnecessary campaigns in bulk.
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
     * Retrieve a batch of campaigns with specified properties and date range. This endpoint allows you to filter campaigns by start and end dates and specify which properties to include in the response.
     *
     * @param list<PublicCampaignReadInput|PublicCampaignReadInputShape> $inputs Body param: An array of PublicCampaignReadInput objects, each containing the ID of a campaign to be read. This property is required.
     * @param string $endDate query param: The end date for filtering campaigns, in YYYY-MM-DD format
     * @param list<string> $properties query param: A comma-separated list of property names to include in the response
     * @param string $startDate query param: The start date for filtering campaigns, in YYYY-MM-DD format
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
