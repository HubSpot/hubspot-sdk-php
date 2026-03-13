<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Campaigns\ContactReference;
use HubspotSDK\Marketing\Campaigns\MetricsCounters;
use HubspotSDK\Marketing\Campaigns\RevenueAttributionAggregate;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\ReportsContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class ReportsService implements ReportsContract
{
    /**
     * @api
     */
    public ReportsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ReportsRawService($client);
    }

    /**
     * @api
     *
     * This endpoint retrieves key attribution metrics for a specified campaign, such as sessions, new contacts, and influenced contacts.
     *
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param string $endDate End date for the report data, formatted as YYYY-MM-DD.
     * Default value: Current date
     * @param string $startDate The start date for the report data, formatted as YYYY-MM-DD.
     * Default value: 2006-01-01
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getAttributionMetrics(
        string $campaignGuid,
        ?string $endDate = null,
        ?string $startDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): MetricsCounters {
        $params = Util::removeNulls(
            ['endDate' => $endDate, 'startDate' => $startDate]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getAttributionMetrics($campaignGuid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch revenue attribution report data for a specified campaign
     *
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param string $attributionModel Allowed values: LINEAR, FIRST_INTERACTION, LAST_INTERACTION, FULL_PATH, U_SHAPED, W_SHAPED, TIME_DECAY, J_SHAPED, INVERSE_J_SHAPED
     * Default value: LINEAR
     * @param string $endDate End date for the report data, formatted as YYYY-MM-DD.
     * Default value: Current date
     * @param string $startDate The start date for the report data, formatted as YYYY-MM-DD.
     * Default value: 2006-01-01
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
    ): RevenueAttributionAggregate {
        $params = Util::removeNulls(
            [
                'attributionModel' => $attributionModel,
                'endDate' => $endDate,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getRevenueAttribution($campaignGuid, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Fetch the list of contact IDs for the specified campaign and contact type
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
    ): Page {
        $params = Util::removeNulls(
            [
                'campaignGuid' => $campaignGuid,
                'after' => $after,
                'endDate' => $endDate,
                'limit' => $limit,
                'startDate' => $startDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listContactIDsByType($contactType, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
