<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\ContactReference;
use HubspotSDK\Marketing\Campaigns\MetricsCounters;
use HubspotSDK\Marketing\Campaigns\RevenueAttributionAggregate;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

interface ReportsContract
{
    /**
     * @api
     *
     * @param string $endDate End date for the report data, formatted as YYYY-MM-DD.
     * Default value: Current date
     * @param string $startDate The start date for the report data, formatted as YYYY-MM-DD.
     * Default value: 2006-01-01
     *
     * @throws APIException
     */
    public function getAttributionMetrics(
        string $campaignGuid,
        $endDate = omit,
        $startDate = omit,
        ?RequestOptions $requestOptions = null,
    ): MetricsCounters;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getAttributionMetricsRaw(
        string $campaignGuid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): MetricsCounters;

    /**
     * @api
     *
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
        $attributionModel = omit,
        $endDate = omit,
        $startDate = omit,
        ?RequestOptions $requestOptions = null,
    ): RevenueAttributionAggregate;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRevenueAttributionRaw(
        string $campaignGuid,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): RevenueAttributionAggregate;

    /**
     * @api
     *
     * @param string $campaignGuid
     * @param string $after A cursor for pagination. If provided, the results will start after the given cursor.
     * Example: NTI1Cg%3D%3D
     * @param string $endDate End date for the report data, formatted as YYYY-MM-DD.
     * Default value: Current date
     * @param int $limit Limit for the number of contacts to fetch
     * Default: 100
     * @param string $startDate The start date for the report data, formatted as YYYY-MM-DD.
     * Default value: 2006-01-01
     *
     * @return Page<ContactReference>
     *
     * @throws APIException
     */
    public function listContactIDsByType(
        string $contactType,
        $campaignGuid,
        $after = omit,
        $endDate = omit,
        $limit = omit,
        $startDate = omit,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return Page<ContactReference>
     *
     * @throws APIException
     */
    public function listContactIDsByTypeRaw(
        string $contactType,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): Page;
}
