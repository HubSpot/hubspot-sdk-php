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

use const HubspotSDK\Core\OMIT as omit;

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
    ): MetricsCounters {
        $params = ['endDate' => $endDate, 'startDate' => $startDate];

        return $this->getAttributionMetricsRaw(
            $campaignGuid,
            $params,
            $requestOptions
        );
    }

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
        ?RequestOptions $requestOptions = null
    ): MetricsCounters {
        [$parsed, $options] = ReportGetAttributionMetricsParams::parseRequest(
            $params,
            $requestOptions
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
    ): RevenueAttributionAggregate {
        $params = [
            'attributionModel' => $attributionModel,
            'endDate' => $endDate,
            'startDate' => $startDate,
        ];

        return $this->getRevenueAttributionRaw(
            $campaignGuid,
            $params,
            $requestOptions
        );
    }

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
        ?RequestOptions $requestOptions = null
    ): RevenueAttributionAggregate {
        [$parsed, $options] = ReportGetRevenueAttributionParams::parseRequest(
            $params,
            $requestOptions
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
    ): Page {
        $params = [
            'campaignGuid' => $campaignGuid,
            'after' => $after,
            'endDate' => $endDate,
            'limit' => $limit,
            'startDate' => $startDate,
        ];

        return $this->listContactIDsByTypeRaw(
            $contactType,
            $params,
            $requestOptions
        );
    }

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
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = ReportListContactIDsByTypeParams::parseRequest(
            $params,
            $requestOptions
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
