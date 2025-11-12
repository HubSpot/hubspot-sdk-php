<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Scheduler\Meetings;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\CollectionResponseWithTotalExternalLinkMetadataForwardPaging;
use HubspotSDK\Scheduler\Meetings\ExternalBookingInfo;
use HubspotSDK\Scheduler\Meetings\ExternalLinkAvailabilityAndBusyTimes;
use HubspotSDK\Scheduler\Meetings\ExternalMeetingBookingResponse;
use HubspotSDK\Scheduler\Meetings\MeetingsLinks\MeetingsLinkBookParams;

interface MeetingsLinksContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalExternalLinkMetadataForwardPaging;

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
     * @throws APIException
     */
    public function getAvailabilityBySlug(
        string $slug,
        ?RequestOptions $requestOptions = null
    ): ExternalLinkAvailabilityAndBusyTimes;

    /**
     * @api
     *
     * @throws APIException
     */
    public function getBookingInfoBySlug(
        string $slug,
        ?RequestOptions $requestOptions = null
    ): ExternalBookingInfo;
}
