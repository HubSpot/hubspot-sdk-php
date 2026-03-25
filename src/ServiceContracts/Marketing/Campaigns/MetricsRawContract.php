<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Campaigns;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\ContactReference;
use HubspotSDK\Marketing\Campaigns\Metrics\MetricGetAttributionMetricsParams;
use HubspotSDK\Marketing\Campaigns\Metrics\MetricGetRevenueAttributionParams;
use HubspotSDK\Marketing\Campaigns\Metrics\MetricListContactIDsByTypeParams;
use HubspotSDK\Marketing\Campaigns\MetricsCounters;
use HubspotSDK\Marketing\Campaigns\RevenueAttributionAggregate;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface MetricsRawContract
{
    /**
     * @api
     *
     * @param string $campaignGuid the unique identifier of the campaign for which metrics are being fetched
     * @param array<string,mixed>|MetricGetAttributionMetricsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MetricsCounters>
     *
     * @throws APIException
     */
    public function getAttributionMetrics(
        string $campaignGuid,
        array|MetricGetAttributionMetricsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $campaignGuid the unique identifier of the campaign
     * @param array<string,mixed>|MetricGetRevenueAttributionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<RevenueAttributionAggregate>
     *
     * @throws APIException
     */
    public function getRevenueAttribution(
        string $campaignGuid,
        array|MetricGetRevenueAttributionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $contactType path param: The type of contact to filter the list
     * @param array<string,mixed>|MetricListContactIDsByTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<Page<ContactReference>>
     *
     * @throws APIException
     */
    public function listContactIDsByType(
        string $contactType,
        array|MetricListContactIDsByTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
