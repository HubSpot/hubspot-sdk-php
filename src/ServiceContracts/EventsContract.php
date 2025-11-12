<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Events\EventListParams;
use HubspotSDK\Events\ExternalUnifiedEvent;
use HubspotSDK\Events\VisibleExternalEventTypeNames;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;

interface EventsContract
{
    /**
     * @api
     *
     * @param array<mixed>|EventListParams $params
     *
     * @return Page<ExternalUnifiedEvent>
     *
     * @throws APIException
     */
    public function list(
        array|EventListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page;

    /**
     * @api
     *
     * @throws APIException
     */
    public function listEventTypes(
        ?RequestOptions $requestOptions = null
    ): VisibleExternalEventTypeNames;
}
