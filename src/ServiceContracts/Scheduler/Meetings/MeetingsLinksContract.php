<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Scheduler\Meetings;

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

interface MeetingsLinksContract
{
    /**
     * @api
     *
     * @param array<mixed>|MeetingsLinkListParams $params
     *
     * @return Page<ExternalLinkMetadata>
     *
     * @throws APIException
     */
    public function list(
        array|MeetingsLinkListParams $params,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param array<mixed>|MeetingsLinkBookParams $params
     *
     * @throws APIException
     */
    public function book(
        array|MeetingsLinkBookParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalMeetingBookingResponse;

    /**
     * @api
     *
     * @param array<mixed>|MeetingsLinkGetAvailabilityBySlugParams $params
     *
     * @throws APIException
     */
    public function getAvailabilityBySlug(
        string $slug,
        array|MeetingsLinkGetAvailabilityBySlugParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalLinkAvailabilityAndBusyTimes;

    /**
     * @api
     *
     * @param array<mixed>|MeetingsLinkGetBookingInfoBySlugParams $params
     *
     * @throws APIException
     */
    public function getBookingInfoBySlug(
        string $slug,
        array|MeetingsLinkGetBookingInfoBySlugParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalBookingInfo;
}
