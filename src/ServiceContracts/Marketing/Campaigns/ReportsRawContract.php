<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\ContactReference;
use HubspotSDK\Marketing\Campaigns\MetricsCounters;
use HubspotSDK\Marketing\Campaigns\Reports\ReportGetAttributionMetricsParams;
use HubspotSDK\Marketing\Campaigns\Reports\ReportGetRevenueAttributionParams;
use HubspotSDK\Marketing\Campaigns\Reports\ReportListContactIDsByTypeParams;
use HubspotSDK\Marketing\Campaigns\RevenueAttributionAggregate;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface ReportsRawContract
{
    /**
     * @api
     *
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param array<string,mixed>|ReportGetAttributionMetricsParams $params
     *
     * @return BaseResponse<MetricsCounters>
     *
     * @throws APIException
     */
    public function getAttributionMetrics(
        string $campaignGuid,
        array|ReportGetAttributionMetricsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $campaignGuid unique identifier for the campaign, formatted as a UUID
     * @param array<string,mixed>|ReportGetRevenueAttributionParams $params
     *
     * @return BaseResponse<RevenueAttributionAggregate>
     *
     * @throws APIException
     */
    public function getRevenueAttribution(
        string $campaignGuid,
        array|ReportGetRevenueAttributionParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $contactType Path param: The type of metric to filter the influenced contacts. Allowed values: contactFirstTouch, contactLastTouch, influencedContacts
     * @param array<string,mixed>|ReportListContactIDsByTypeParams $params
     *
     * @return BaseResponse<Page<ContactReference>>
     *
     * @throws APIException
     */
    public function listContactIDsByType(
        string $contactType,
        array|ReportListContactIDsByTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
