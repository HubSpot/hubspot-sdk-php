<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
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
use HubspotSDK\ServiceContracts\Marketing\Campaigns\MetricsRawContract;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
final class MetricsRawService implements MetricsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This endpoint retrieves key attribution metrics for a specified campaign, such as sessions, new contacts, and influenced contacts.
     *
     * @param string $campaignGuid The unique identifier of the campaign
     * @param array{
     *   endDate?: string, startDate?: string
     * }|MetricGetAttributionMetricsParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MetricGetAttributionMetricsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/campaigns/2026-03/%1$s/reports/metrics', $campaignGuid],
            query: $parsed,
            options: $options,
            convert: MetricsCounters::class,
        );
    }

    /**
     * @api
     *
     * Fetch revenue attribution report data for a specified campaign
     *
     * @param string $campaignGuid The unique identifier of the campaign
     * @param array{
     *   attributionModel?: string, endDate?: string, startDate?: string
     * }|MetricGetRevenueAttributionParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MetricGetRevenueAttributionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['marketing/campaigns/2026-03/%1$s/reports/revenue', $campaignGuid],
            query: $parsed,
            options: $options,
            convert: RevenueAttributionAggregate::class,
        );
    }

    /**
     * @api
     *
     * Fetch the list of contact IDs for the specified campaign and contact type
     *
     * @param string $contactType Path param: The type of contact to filter the list
     * @param array{
     *   campaignGuid: string,
     *   after?: string,
     *   endDate?: string,
     *   limit?: int,
     *   startDate?: string,
     * }|MetricListContactIDsByTypeParams $params
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
    ): BaseResponse {
        [$parsed, $options] = MetricListContactIDsByTypeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/campaigns/2026-03/%1$s/reports/contacts/%2$s',
                $campaignGuid,
                $contactType,
            ],
            query: $parsed,
            options: $options,
            convert: ContactReference::class,
            page: Page::class,
        );
    }
}
