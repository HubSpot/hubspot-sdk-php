<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Emails;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Emails\AggregateEmailStatistics;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalEmailStatisticIntervalNoPaging;
use HubspotSDK\Marketing\Emails\Statistics\StatisticGetHistogramParams;
use HubspotSDK\Marketing\Emails\Statistics\StatisticGetParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Emails\StatisticsContract;

final class StatisticsService implements StatisticsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Use this endpoint to get aggregated statistics of emails sent in a specified time span. It also returns the list of emails that were sent during the time span.
     *
     * @param array{
     *   emailIds?: list<int>,
     *   endTimestamp?: string,
     *   property?: string,
     *   startTimestamp?: string,
     * }|StatisticGetParams $params
     *
     * @throws APIException
     */
    public function get(
        array|StatisticGetParams $params,
        ?RequestOptions $requestOptions = null
    ): AggregateEmailStatistics {
        [$parsed, $options] = StatisticGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'marketing/v3/emails/statistics/list',
            query: $parsed,
            options: $options,
            convert: AggregateEmailStatistics::class,
        );
    }

    /**
     * @api
     *
     * Get aggregated statistics in intervals for a specified time span. Each interval contains aggregated statistics of the emails that were sent in that time.
     *
     * @param array{
     *   emailIds?: list<int>,
     *   endTimestamp?: string,
     *   interval?: 'DAY'|'HOUR'|'MINUTE'|'MONTH'|'QUARTER'|'QUARTER_HOUR'|'SECOND'|'WEEK'|'YEAR',
     *   startTimestamp?: string,
     * }|StatisticGetHistogramParams $params
     *
     * @throws APIException
     */
    public function getHistogram(
        array|StatisticGetHistogramParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalEmailStatisticIntervalNoPaging {
        [$parsed, $options] = StatisticGetHistogramParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'marketing/v3/emails/statistics/histogram',
            query: $parsed,
            options: $options,
            convert: CollectionResponseWithTotalEmailStatisticIntervalNoPaging::class,
        );
    }
}
