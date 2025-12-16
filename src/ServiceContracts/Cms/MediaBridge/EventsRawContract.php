<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Cms\MediaBridge;

use HubspotSDK\Cms\MediaBridge\AttentionSpanEvent;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateAttentionSpanEventParams;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedEventParams;
use HubspotSDK\Cms\MediaBridge\Events\EventCreateMediaPlayedPercentEventParams;
use HubspotSDK\Cms\MediaBridge\MediaPlayedEvent;
use HubspotSDK\Cms\MediaBridge\MediaPlayedPercentageEvent;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;

interface EventsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|EventCreateAttentionSpanEventParams $params
     *
     * @return BaseResponse<AttentionSpanEvent>
     *
     * @throws APIException
     */
    public function createAttentionSpanEvent(
        array|EventCreateAttentionSpanEventParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EventCreateMediaPlayedEventParams $params
     *
     * @return BaseResponse<MediaPlayedEvent>
     *
     * @throws APIException
     */
    public function createMediaPlayedEvent(
        array|EventCreateMediaPlayedEventParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|EventCreateMediaPlayedPercentEventParams $params
     *
     * @return BaseResponse<MediaPlayedPercentageEvent>
     *
     * @throws APIException
     */
    public function createMediaPlayedPercentEvent(
        array|EventCreateMediaPlayedPercentEventParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
