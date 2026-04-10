<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts;

use HubSpotSDK\Account\CollectionResponseAPIUsageNoPaging;
use HubSpotSDK\Account\PortalInformationResponse;
use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface AccountRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortalInformationResponse>
     *
     * @throws APIException
     */
    public function get(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseAPIUsageNoPaging>
     *
     * @throws APIException
     */
    public function getDailyPrivateAppsUsage(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
