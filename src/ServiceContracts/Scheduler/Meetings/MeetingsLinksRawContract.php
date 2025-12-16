<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Scheduler\Meetings;

use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\ExternalBookingInfo;
use HubspotSDK\Scheduler\Meetings\ExternalLinkAvailabilityAndBusyTimes;
use HubspotSDK\Scheduler\Meetings\ExternalLinkMetadata;
use HubspotSDK\Scheduler\Meetings\ExternalMeetingBookingResponse;
use HubspotSDK\Scheduler\Meetings\MeetingsLinks\MeetingsLinkBookParams;
use HubspotSDK\Scheduler\Meetings\MeetingsLinks\MeetingsLinkGetAvailabilityBySlugParams;
use HubspotSDK\Scheduler\Meetings\MeetingsLinks\MeetingsLinkGetBookingInfoBySlugParams;
use HubspotSDK\Scheduler\Meetings\MeetingsLinks\MeetingsLinkListParams;

interface MeetingsLinksRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MeetingsLinkListParams $params
     *
     * @return BaseResponse<Page<ExternalLinkMetadata>>
     *
     * @throws APIException
     */
    public function list(
        array|MeetingsLinkListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MeetingsLinkBookParams $params
     *
     * @return BaseResponse<ExternalMeetingBookingResponse>
     *
     * @throws APIException
     */
    public function book(
        array|MeetingsLinkBookParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $slug the path for the meeting page that you want the available times for
     * @param array<string,mixed>|MeetingsLinkGetAvailabilityBySlugParams $params
     *
     * @return BaseResponse<ExternalLinkAvailabilityAndBusyTimes>
     *
     * @throws APIException
     */
    public function getAvailabilityBySlug(
        string $slug,
        array|MeetingsLinkGetAvailabilityBySlugParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $slug the path to the scheduling page that you want the information for
     * @param array<string,mixed>|MeetingsLinkGetBookingInfoBySlugParams $params
     *
     * @return BaseResponse<ExternalBookingInfo>
     *
     * @throws APIException
     */
    public function getBookingInfoBySlug(
        string $slug,
        array|MeetingsLinkGetBookingInfoBySlugParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
