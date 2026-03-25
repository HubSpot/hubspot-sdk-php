<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Meta\Origins;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Meta\Origins\CollectionResponseIPRangeNoPaging;
use HubspotSDK\Meta\Origins\IPRanges\IPRangeListParams;
use HubspotSDK\Meta\Origins\IPRanges\IPRangeListSimpleParams;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
