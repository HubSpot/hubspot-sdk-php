<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Emails;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Emails\AggregateEmailStatistics;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalEmailStatisticIntervalNoPaging;
use HubspotSDK\Marketing\Emails\Statistics\StatisticGetHistogramParams\Interval;
use HubspotSDK\RequestOptions;

interface StatisticsContract
{
    /**
     * @api
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
    ): AggregateEmailStatistics;

    /**
     * @api
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
    ): CollectionResponseWithTotalEmailStatisticIntervalNoPaging;
}
