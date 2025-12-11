<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Emails;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Emails\AggregateEmailStatistics;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalEmailStatisticIntervalNoPaging;
use HubspotSDK\Marketing\Emails\Statistics\StatisticGetHistogramParams\Interval;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Emails\StatisticsContract;

final class StatisticsService implements StatisticsContract
{
    /**
     * @api
     */
    public StatisticsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new StatisticsRawService($client);
    }

    /**
     * @api
     *
     * Use this endpoint to get aggregated statistics of emails sent in a specified time span. It also returns the list of emails that were sent during the time span.
     *
     * @param list<int> $emailIDs Filter by email IDs. Only include statistics of emails with these IDs.
     * @param string $endTimestamp the end timestamp of the time span, in ISO8601 representation
     * @param string $property Specifies which email properties should be returned. All properties will be returned by default.
     * @param string $startTimestamp the start timestamp of the time span, in ISO8601 representation
     *
     * @throws APIException
     */
    public function get(
        ?array $emailIDs = null,
        ?string $endTimestamp = null,
        ?string $property = null,
        ?string $startTimestamp = null,
        ?RequestOptions $requestOptions = null,
    ): AggregateEmailStatistics {
        $params = Util::removeNulls(
            [
                'emailIDs' => $emailIDs,
                'endTimestamp' => $endTimestamp,
                'property' => $property,
                'startTimestamp' => $startTimestamp,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get aggregated statistics in intervals for a specified time span. Each interval contains aggregated statistics of the emails that were sent in that time.
     *
     * @param list<int> $emailIDs Filter by email IDs. Only include statistics of emails with these IDs.
     * @param string $endTimestamp the end timestamp of the time span, in ISO8601 representation
     * @param 'DAY'|'HOUR'|'MINUTE'|'MONTH'|'QUARTER'|'QUARTER_HOUR'|'SECOND'|'WEEK'|'YEAR'|Interval $interval the interval to aggregate statistics for
     * @param string $startTimestamp the start timestamp of the time span, in ISO8601 representation
     *
     * @throws APIException
     */
    public function getHistogram(
        ?array $emailIDs = null,
        ?string $endTimestamp = null,
        string|Interval|null $interval = null,
        ?string $startTimestamp = null,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalEmailStatisticIntervalNoPaging {
        $params = Util::removeNulls(
            [
                'emailIDs' => $emailIDs,
                'endTimestamp' => $endTimestamp,
                'interval' => $interval,
                'startTimestamp' => $startTimestamp,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getHistogram(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
