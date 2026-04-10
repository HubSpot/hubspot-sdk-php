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
     * @param list<string> $properties
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
     * @param list<string> $properties
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
