<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm\Objects\FeedbackSubmissions;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Objects\BatchResponseSimplePublicObject;
use HubSpotSDK\Crm\Objects\FeedbackSubmissions\Batch\BatchGetParams;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface BatchRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|BatchGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<BatchResponseSimplePublicObject>
     *
     * @throws APIException
     */
    public function get(
        array|BatchGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
