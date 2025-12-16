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

interface StatisticsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|StatisticGetParams $params
     *
     * @return BaseResponse<AggregateEmailStatistics>
     *
     * @throws APIException
     */
    public function get(
        array|StatisticGetParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|StatisticGetHistogramParams $params
     *
     * @return BaseResponse<CollectionResponseWithTotalEmailStatisticIntervalNoPaging>
     *
     * @throws APIException
     */
    public function getHistogram(
        array|StatisticGetHistogramParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
