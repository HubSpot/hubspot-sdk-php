<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Marketing\Emails;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Marketing\Emails\AggregateEmailStatistics;
use HubspotSDK\Marketing\Emails\CollectionResponseWithTotalEmailStatisticIntervalNoPaging;
use HubspotSDK\Marketing\Emails\Statistics\StatisticGetHistogramParams;
use HubspotSDK\Marketing\Emails\Statistics\StatisticGetParams;
use HubspotSDK\RequestOptions;

interface StatisticsContract
{
    /**
     * @api
     *
     * @param array<mixed>|StatisticGetParams $params
     *
     * @throws APIException
     */
    public function get(
        array|StatisticGetParams $params,
        ?RequestOptions $requestOptions = null
    ): AggregateEmailStatistics;

    /**
     * @api
     *
     * @param array<mixed>|StatisticGetHistogramParams $params
     *
     * @throws APIException
     */
    public function getHistogram(
        array|StatisticGetHistogramParams $params,
        ?RequestOptions $requestOptions = null,
    ): CollectionResponseWithTotalEmailStatisticIntervalNoPaging;
}
