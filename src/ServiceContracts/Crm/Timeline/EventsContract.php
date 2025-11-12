<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Timeline;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\EventDetail;
use HubspotSDK\Crm\Timeline\Events\EventBatchCreateParams;
use HubspotSDK\Crm\Timeline\Events\EventCreateParams;
use HubspotSDK\Crm\Timeline\Events\EventGetDetailParams;
use HubspotSDK\Crm\Timeline\Events\EventGetParams;
use HubspotSDK\Crm\Timeline\TimelineEventResponse;
use HubspotSDK\RequestOptions;

interface EventsContract
{
    /**
     * @api
     *
     * @param array<mixed>|EventCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|EventCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): TimelineEventResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventBatchCreateParams $params
     *
     * @throws APIException
     */
    public function batchCreate(
        array|EventBatchCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @api
     *
     * @param array<mixed>|EventGetParams $params
     *
     * @throws APIException
     */
    public function get(
        string $eventID,
        array|EventGetParams $params,
        ?RequestOptions $requestOptions = null,
    ): TimelineEventResponse;

    /**
     * @api
     *
     * @param array<mixed>|EventGetDetailParams $params
     *
     * @throws APIException
     */
    public function getDetail(
        string $eventID,
        array|EventGetDetailParams $params,
        ?RequestOptions $requestOptions = null,
    ): EventDetail;
}
