<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing\Campaigns;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\Campaigns\BatchResponsePublicCampaign;
use HubSpotSDK\Marketing\Campaigns\BatchResponsePublicCampaignWithAssets;
use HubSpotSDK\Marketing\Campaigns\PublicCampaignBatchUpdateItem;
use HubSpotSDK\Marketing\Campaigns\PublicCampaignDeleteInput;
use HubSpotSDK\Marketing\Campaigns\PublicCampaignInput;
use HubSpotSDK\Marketing\Campaigns\PublicCampaignReadInput;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type PublicCampaignInputShape from \HubSpotSDK\Marketing\Campaigns\PublicCampaignInput
 * @phpstan-import-type PublicCampaignBatchUpdateItemShape from \HubSpotSDK\Marketing\Campaigns\PublicCampaignBatchUpdateItem
 * @phpstan-import-type PublicCampaignDeleteInputShape from \HubSpotSDK\Marketing\Campaigns\PublicCampaignDeleteInput
 * @phpstan-import-type PublicCampaignReadInputShape from \HubSpotSDK\Marketing\Campaigns\PublicCampaignReadInput
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BatchContract
{
    /**
     * @api
     *
     * @param list<PublicCampaignInput|PublicCampaignInputShape> $inputs An array of PublicCampaignInput objects, each representing the properties of a campaign to be created in the batch. This property is required.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponsePublicCampaign;

    /**
     * @api
     *
     * @param list<PublicCampaignBatchUpdateItem|PublicCampaignBatchUpdateItemShape> $inputs an array of PublicCampaignBatchUpdateItem objects, each containing the ID and properties to update for a specific campaign
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): BatchResponsePublicCampaign;

    /**
     * @api
     *
     * @param list<PublicCampaignDeleteInput|PublicCampaignDeleteInputShape> $inputs An array of PublicCampaignDeleteInput objects, each specifying a campaign to be deleted. Each object must include the campaign's unique identifier.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        array $inputs,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param list<PublicCampaignReadInput|PublicCampaignReadInputShape> $inputs Body param: An array of PublicCampaignReadInput objects, each containing the ID of a campaign to be read. This property is required.
     * @param string $endDate Query param: End date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period.  If not provided, no asset metrics will be fetched.
     * Example: 2024-01-27
     * @param list<string> $properties Query param: A comma-separated list of the properties to be returned in the response. If any of the specified properties has empty value on the requested object(s), they will be ignored and not returned in response. If this parameter is empty, the response will include an empty properties map.
     * Example: hs_name, hs_campaign_status, hs_notes
     * @param string $startDate Query param: Start date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period.  If not provided, no asset metrics will be fetched.
     * Example: 2023-01-20
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
    ): BatchResponsePublicCampaignWithAssets;
}
