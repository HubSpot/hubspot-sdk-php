<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Emails;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Emails\AggregateEmailStatistics;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalEmailStatisticIntervalNoPaging;
use HubspotSDK\Marketing\Emails\Statistics\StatisticGetHistogramParams\Interval;
use HubspotSDK\RequestOptions;

use const HubspotSDK\Core\OMIT as omit;

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
        $emailIDs = omit,
        $endTimestamp = omit,
        $property = omit,
        $startTimestamp = omit,
        ?RequestOptions $requestOptions = null,
    ): AggregateEmailStatistics;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AggregateEmailStatistics;

    /**
     * @api
     *
     * @param list<int> $emailIDs Filter by email IDs. Only include statistics of emails with these IDs.
     * @param string $endTimestamp the end timestamp of the time span, in ISO8601 representation
     * @param Interval|value-of<Interval> $interval the interval to aggregate statistics for
     * @param string $startTimestamp the start timestamp of the time span, in ISO8601 representation
     *
     * @throws APIException
     */
    public function getHistogram(
        $emailIDs = omit,
        $endTimestamp = omit,
        $interval = omit,
        $startTimestamp = omit,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalEmailStatisticIntervalNoPaging;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function getHistogramRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalEmailStatisticIntervalNoPaging;
}
