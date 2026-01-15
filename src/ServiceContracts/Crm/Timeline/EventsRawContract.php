<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Crm\Timeline;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Crm\Timeline\EventDetail;
use HubspotSDK\Crm\Timeline\Events\EventBatchCreateParams;
use HubspotSDK\Crm\Timeline\Events\EventCreateParams;
use HubspotSDK\Crm\Timeline\Events\EventGetDetailParams;
use HubspotSDK\Crm\Timeline\Events\EventGetParams;
use HubspotSDK\Crm\Timeline\TimelineEventResponse;
use HubspotSDK\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \HubspotSDK\RequestOptions
 */
interface EventsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EventCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TimelineEventResponse>
     *
     * @throws APIException
     */
    public function create(
        array|EventCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EventBatchCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function batchCreate(
        array|EventBatchCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $eventID the event ID
     * @param array<string,mixed>|EventGetParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TimelineEventResponse>
     *
     * @throws APIException
     */
    public function get(
        string $eventID,
        array|EventGetParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $eventID the event ID
     * @param array<string,mixed>|EventGetDetailParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EventDetail>
     *
     * @throws APIException
     */
    public function getDetail(
        string $eventID,
        array|EventGetDetailParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
