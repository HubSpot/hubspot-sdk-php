<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Emails;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Emails\AggregateEmailStatistics;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalEmailStatisticIntervalNoPaging;
use HubspotSDK\Marketing\Emails\Statistics\StatisticGetHistogramParams;
use HubspotSDK\Marketing\Emails\Statistics\StatisticGetParams;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface StatisticsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|StatisticGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AggregateEmailStatistics>
     *
     * @throws APIException
     */
    public function get(
        array|StatisticGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|StatisticGetHistogramParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseWithTotalEmailStatisticIntervalNoPaging>
     *
     * @throws APIException
     */
    public function getHistogram(
        array|StatisticGetHistogramParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
