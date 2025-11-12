<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\ContactReference;
use HubspotSDK\Marketing\Campaigns\MetricsCounters;
use HubspotSDK\Marketing\Campaigns\Reports\ReportGetAttributionMetricsParams;
use HubspotSDK\Marketing\Campaigns\Reports\ReportGetRevenueAttributionParams;
use HubspotSDK\Marketing\Campaigns\Reports\ReportListContactIDsByTypeParams;
use HubspotSDK\Marketing\Campaigns\RevenueAttributionAggregate;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ReportsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ReportGetAttributionMetricsParams $params
     *
     * @throws APIException
     */
    public function getAttributionMetrics(
        string $campaignGuid,
        array|ReportGetAttributionMetricsParams $params,
        ?RequestOptions $requestOptions = null,
    ): MetricsCounters;

    /**
     * @api
     *
     * @param array<mixed>|ReportGetRevenueAttributionParams $params
     *
     * @throws APIException
     */
    public function getRevenueAttribution(
        string $campaignGuid,
        array|ReportGetRevenueAttributionParams $params,
        ?RequestOptions $requestOptions = null,
    ): RevenueAttributionAggregate;

    /**
     * @api
     *
     * @param array<mixed>|ReportListContactIDsByTypeParams $params
     *
     * @return Page<ContactReference>
     *
     * @throws APIException
     */
    public function listContactIDsByType(
        string $contactType,
        array|ReportListContactIDsByTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;
}
