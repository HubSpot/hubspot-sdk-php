<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\PublicCampaign;
use HubspotSDK\Marketing\Campaigns\PublicCampaignWithAssets;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface CampaignsContract
{
    /**
     * @api
     *
     * @param array<string,string> $properties
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
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param array<string,string> $properties
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
     * @param string $after A cursor for pagination. If provided, the results will start after the given cursor.
     * Example: NTI1Cg%3D%3D
     * @param int $limit The maximum number of results to return. Allowed values range from 1 to 100
     * Default: 50
     * @param string $name A filter to return campaigns whose names contain the specified substring. This allows partial matching of campaign names, returning all campaigns that include the given substring in their name. If this parameter is not provided, the search will return all campaigns
     * @param list<string> $properties A comma-separated list of the properties to be returned in the response. If any of the specified properties has empty value on the requested object(s), they will be ignored and not returned in response. If this parameter is empty, the response will include an empty properties map
     * @param string $sort The field by which to sort the results. Allowed values are hs_name, createdAt, updatedAt. An optional '-' before the property name can denote descending order
     * Default: hs_name
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
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
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
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param string $endDate  End date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period.
     * If not provided, no asset metrics will be fetched.
     * @param list<string> $properties A comma-separated list of the properties to be returned in the response. If any of the specified properties has empty value on the requested object, they will be ignored and not returned in response. If this parameter is empty, the response will include an empty properties map.
     * @param string $startDate Start date to fetch asset metrics, formatted as YYYY-MM-DD. This date is used to fetch the metrics associated with the assets for a specified period.
     * If not provided, no asset metrics will be fetched.
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
