<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\AppEventResolutionResponse;
use HubspotSDK\Crm\Timeline\TimelineCreateEventParams;
use HubspotSDK\Crm\Timeline\TimelineCreateProjectTypeParams;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
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
