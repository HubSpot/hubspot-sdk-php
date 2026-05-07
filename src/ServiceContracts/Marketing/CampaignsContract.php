<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\Campaigns\PublicCampaign;
use HubSpotSDK\Marketing\Campaigns\PublicCampaignWithAssets;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface CampaignsContract
{
    /**
     * @api
     *
     * @param array<string,string> $properties A collection of key-value pairs representing the properties of the campaign. Each key is a property name, and the corresponding value is the property's value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $properties,
        RequestOptions|array|null $requestOptions = null
    ): PublicCampaign;

    /**
     * @api
     *
     * @param string $campaignGuid The UUID of the campaign, required
     * Example: 9dbec438-53e2-4b28-8c0f-38f56574a6e8
     * @param array<string,string> $properties A collection of key-value pairs representing the properties of the campaign. Each key is a property name, and the corresponding value is the property's value.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $campaignGuid,
        array $properties,
        RequestOptions|array|null $requestOptions = null,
    ): PublicCampaign;

    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param string $name Filter campaigns by name. Optional.
     * @param list<string> $properties A comma-separated list of properties to include in the response.
     *   Unrecognized properties are ignored. Optional. Example:
     *   hs_name, hs_budget,hs_notes
     * @param string $sort The property to sort results by. Optional.
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<PublicCampaign>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?int $limit = null,
        ?string $name = null,
        ?array $properties = null,
        ?string $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param string $campaignGuid The UUID of the campaign, required
     * Example: 9dbec438-53e2-4b28-8c0f-38f56574a6e8
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $campaignGuid,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $campaignGuid The UUID of the campaign, required
     * Example: 9dbec438-53e2-4b28-8c0f-38f56574a6e8
     * @param string $endDate The end date for fetching asset metrics, in YYYY-MM-DD format.
     * Optional. Example: 2000-01-27
     * @param list<string> $properties A comma-separated list of properties to include in the response.
     *   Unrecognized properties are ignored. Optional. Example: hs_name,hs_budget, hs_notes
     * @param string $startDate The start date for fetching asset metrics, in YYYY-MM-DD format.
     * Optional. Example: 2000-01-20
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $campaignGuid,
        ?string $endDate = null,
        ?array $properties = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): PublicCampaignWithAssets;
}
