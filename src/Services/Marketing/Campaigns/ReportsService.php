<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Campaigns\ContactReference;
use HubspotSDK\Marketing\Campaigns\MetricsCounters;
use HubspotSDK\Marketing\Campaigns\Reports\ReportGetAttributionMetricsParams;
use HubspotSDK\Marketing\Campaigns\Reports\ReportGetRevenueAttributionParams;
use HubspotSDK\Marketing\Campaigns\Reports\ReportListContactIDsByTypeParams;
use HubspotSDK\Marketing\Campaigns\RevenueAttributionAggregate;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Campaigns\ReportsContract;

final class ReportsService implements ReportsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This endpoint retrieves key attribution metrics for a specified campaign, such as sessions, new contacts, and influenced contacts.
     *
     * @param array{
     *   endDate?: string, startDate?: string
     * }|ReportGetAttributionMetricsParams $params
     *
     * @throws APIException
     */
    public function getAttributionMetrics(
        string $campaignGuid,
        array|ReportGetAttributionMetricsParams $params,
        ?RequestOptions $requestOptions = null,
    ): MetricsCounters {
        [$parsed, $options] = ReportGetAttributionMetricsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/campaigns/%1$s/reports/metrics', $campaignGuid],
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
     * @param array{
     *   attributionModel?: string, endDate?: string, startDate?: string
     * }|ReportGetRevenueAttributionParams $params
     *
     * @throws APIException
     */
    public function getRevenueAttribution(
        string $campaignGuid,
        array|ReportGetRevenueAttributionParams $params,
        ?RequestOptions $requestOptions = null,
    ): RevenueAttributionAggregate {
        [$parsed, $options] = ReportGetRevenueAttributionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['marketing/v3/campaigns/%1$s/reports/revenue', $campaignGuid],
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
     * @param array{
     *   campaignGuid: string,
     *   after?: string,
     *   endDate?: string,
     *   limit?: int,
     *   startDate?: string,
     * }|ReportListContactIDsByTypeParams $params
     *
     * @return Page<ContactReference>
     *
     * @throws APIException
     */
    public function listContactIDsByType(
        string $contactType,
        array|ReportListContactIDsByTypeParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page {
        [$parsed, $options] = ReportListContactIDsByTypeParams::parseRequest(
            $params,
            $requestOptions,
        );
        $campaignGuid = $parsed['campaignGuid'];
        unset($parsed['campaignGuid']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'marketing/v3/campaigns/%1$s/reports/contacts/%2$s',
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
