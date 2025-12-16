<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\EventListParams;
use HubspotSDK\Events\ExternalUnifiedEvent;
use HubspotSDK\Events\VisibleExternalEventTypeNames;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface EventsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EventListParams $params
     *
     * @return BaseResponse<Page<ExternalUnifiedEvent>>
     *
     * @throws APIException
     */
    public function list(
        array|EventListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<VisibleExternalEventTypeNames>
     *
     * @throws APIException
     */
    public function listEventTypes(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
