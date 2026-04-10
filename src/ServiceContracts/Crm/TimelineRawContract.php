<?php

declare(strict_types=1);

namespace HubSpotSDK\ServiceContracts\Crm;

use HubSpotSDK\Core\Contracts\BaseResponse;
use HubSpotSDK\Core\Exceptions\APIException;
use HubSpotSDK\Crm\Timeline\AppEventResolutionResponse;
use HubSpotSDK\Crm\Timeline\TimelineCreateEventParams;
use HubSpotSDK\Crm\Timeline\TimelineCreateProjectTypeParams;
use HubSpotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubSpotSDK\RequestOptions
 */
interface TimelineRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TimelineCreateEventParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createEvent(
        array|TimelineCreateEventParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TimelineCreateProjectTypeParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AppEventResolutionResponse>
     *
     * @throws APIException
     */
    public function createProjectType(
        array|TimelineCreateProjectTypeParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
