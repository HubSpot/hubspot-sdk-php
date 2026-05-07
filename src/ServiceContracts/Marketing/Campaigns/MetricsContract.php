<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing\Campaigns;

use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\Campaigns\ContactReference;
use HubSpotSDK\Marketing\Campaigns\MetricsCounters;
use HubSpotSDK\Marketing\Campaigns\RevenueAttributionAggregate;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface MetricsContract
{
    /**
     * @api
     *
     * @param string $campaignGuid The unique identifier of the campaign
     * @param string $endDate The end date for fetching attribution data, in YYYY-MM-DD format.
     * Optional. Example: 2000-01-27
     * @param string $startDate The start date for fetching attribution data, in YYYY-MM-DD format.
     * Optional. Example: 2000-01-20
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAttributionMetrics(
        string $campaignGuid,
        ?string $endDate = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): MetricsCounters;

    /**
     * @api
     *
     * @param string $campaignGuid The unique identifier of the campaign
     * @param string $attributionModel The revenue attribution model used to calculate deal revenue credit. Defaults to LINEAR if not specified. Enum values: LINEAR,            FIRST_INTERACTION, LAST_INTERACTION, FULL_PATH, U_SHAPED, W_SHAPED,          TIME_DECAY, J_SHAPED, INVERSE_J_SHAPED
     * @param string $endDate End date to fetch attribution data, YYYY-MM-DD
     * @param string $startDate Start date to fetch attribution data, YYYY-MM-DD
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getRevenueAttribution(
        string $campaignGuid,
        ?string $attributionModel = null,
        ?string $endDate = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): RevenueAttributionAggregate;

    /**
     * @api
     *
     * @param string $contactType Path param: The type of contact to filter the list
     * @param string $campaignGuid Path param: The unique identifier of the campaign
     * @param string $after Query param: The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param string $endDate Query param: The end date for fetching contact data, in YYYY-MM-DD format.
     * Optional. Example: 2000-01-27
     * @param int $limit query param: The maximum number of results to display per page
     * @param string $startDate Query param: The start date for fetching contact data, in YYYY-MM-DD format.
     * Optional. Example: 2000-01-20
     * @param RequestOpts|null $requestOptions
     *
     * @return Page<ContactReference>
     *
     * @throws APIException
     */
    public function listContactIDsByType(
        string $contactType,
        string $campaignGuid,
        ?string $after = null,
        ?string $endDate = null,
        ?int $limit = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): Page;
}
