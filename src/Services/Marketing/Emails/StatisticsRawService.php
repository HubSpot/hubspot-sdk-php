<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Marketing\Emails;

use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Emails\AggregateEmailStatistics;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalEmailStatisticIntervalNoPaging;
use HubspotSDK\Marketing\Emails\Statistics\StatisticGetHistogramParams;
use HubspotSDK\Marketing\Emails\Statistics\StatisticGetHistogramParams\Interval;
use HubspotSDK\Marketing\Emails\Statistics\StatisticGetParams;
use HubspotSDK\RequestOptions;
use HubspotSDK\ServiceContracts\Marketing\Emails\StatisticsRawContract;

final class StatisticsRawService implements StatisticsRawContract
{
    // @phpstan-ignore-next-line
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
     *   emailIDs?: list<int>,
     *   endTimestamp?: string,
     *   property?: string,
     *   startTimestamp?: string,
     * }|StatisticGetParams $params
     *
     * @return BaseResponse<AggregateEmailStatistics>
     *
     * @throws APIException
     */
    public function get(
        array|StatisticGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = StatisticGetParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'marketing/v3/emails/statistics/list',
            query: Util::array_transform_keys($parsed, ['emailIDs' => 'emailIds']),
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
     *   emailIDs?: list<int>,
     *   endTimestamp?: string,
     *   interval?: 'DAY'|'HOUR'|'MINUTE'|'MONTH'|'QUARTER'|'QUARTER_HOUR'|'SECOND'|'WEEK'|'YEAR'|Interval,
     *   startTimestamp?: string,
     * }|StatisticGetHistogramParams $params
     *
     * @return BaseResponse<CollectionResponseWithTotalEmailStatisticIntervalNoPaging>
     *
     * @throws APIException
     */
    public function getHistogram(
        array|StatisticGetHistogramParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = StatisticGetHistogramParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'marketing/v3/emails/statistics/histogram',
            query: Util::array_transform_keys($parsed, ['emailIDs' => 'emailIds']),
            options: $options,
            convert: CollectionResponseWithTotalEmailStatisticIntervalNoPaging::class,
        );
    }
}
