<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\ContactReference;
use HubspotSDK\Marketing\Campaigns\MetricsCounters;
use HubspotSDK\Marketing\Campaigns\RevenueAttributionAggregate;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ReportsContract
{
    /**
     * @api
     *
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param string $endDate End date for the report data, formatted as YYYY-MM-DD.
     * Default value: Current date
     * @param string $startDate The start date for the report data, formatted as YYYY-MM-DD.
     * Default value: 2006-01-01
     *
     * @throws APIException
     */
    public function getAttributionMetrics(
        string $campaignGuid,
        ?string $endDate = null,
        ?string $startDate = null,
        ?RequestOptions $requestOptions = null,
    ): MetricsCounters;

    /**
     * @api
     *
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param string $attributionModel Allowed values: LINEAR, FIRST_INTERACTION, LAST_INTERACTION, FULL_PATH, U_SHAPED, W_SHAPED, TIME_DECAY, J_SHAPED, INVERSE_J_SHAPED
     * Default value: LINEAR
     * @param string $endDate End date for the report data, formatted as YYYY-MM-DD.
     * Default value: Current date
     * @param string $startDate The start date for the report data, formatted as YYYY-MM-DD.
     * Default value: 2006-01-01
     *
     * @throws APIException
     */
    public function getRevenueAttribution(
        string $campaignGuid,
        ?string $attributionModel = null,
        ?string $endDate = null,
        ?string $startDate = null,
        ?RequestOptions $requestOptions = null,
    ): RevenueAttributionAggregate;

    /**
     * @api
     *
     * @param string $contactType Path param: The type of metric to filter the influenced contacts. Allowed values: contactFirstTouch, contactLastTouch, influencedContacts
     * @param string $campaignGuid path param: Unique identifier for the campaign, formatted as a UUID
     * @param string $after Query param: A cursor for pagination. If provided, the results will start after the given cursor.
     * Example: NTI1Cg%3D%3D
     * @param string $endDate Query param: End date for the report data, formatted as YYYY-MM-DD.
     * Default value: Current date
     * @param int $limit Query param: Limit for the number of contacts to fetch
     * Default: 100
     * @param string $startDate Query param: The start date for the report data, formatted as YYYY-MM-DD.
     * Default value: 2006-01-01
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
        ?RequestOptions $requestOptions = null,
    ): Page;
}
