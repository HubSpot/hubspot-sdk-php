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
    ): BatchResponsePublicCampaignWithAssets;
}
