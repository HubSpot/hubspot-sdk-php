<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Marketing\Campaigns;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Marketing\Campaigns\ContactReference;
use HubSpotSDK\Marketing\Campaigns\Metrics\MetricGetAttributionMetricsParams;
use HubSpotSDK\Marketing\Campaigns\Metrics\MetricGetRevenueAttributionParams;
use HubSpotSDK\Marketing\Campaigns\Metrics\MetricListContactIDsByTypeParams;
use HubSpotSDK\Marketing\Campaigns\MetricsCounters;
use HubSpotSDK\Marketing\Campaigns\RevenueAttributionAggregate;
use HubSpotSDK\Page;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface MetricsRawContract
{
    /**
     * @api
     *
     * @param string $campaignGuid The unique identifier of the campaign
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
     * @param string $campaignGuid The unique identifier of the campaign
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
     * @param string $contactType Path param: The type of contact to filter the list
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
