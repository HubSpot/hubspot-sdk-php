<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Meta\Origins;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Meta\Origins\CollectionResponseIPRangeNoPaging;
use HubSpotSDK\Meta\Origins\IPRanges\IPRangeListParams;
use HubSpotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface IPRangesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|IPRangeListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CollectionResponseIPRangeNoPaging>
     *
     * @throws APIException
     */
    public function list(
        array|IPRangeListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|IPRangeListSimpleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function listSimple(
        array|IPRangeListSimpleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
