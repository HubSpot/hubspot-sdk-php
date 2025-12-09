<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Scheduler\Meetings;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\ExternalBookingInfo;
use HubspotSDK\Scheduler\Meetings\ExternalLegalConsentResponse;
use HubspotSDK\Scheduler\Meetings\ExternalLinkAvailabilityAndBusyTimes;
use HubspotSDK\Scheduler\Meetings\ExternalLinkMetadata;
use HubspotSDK\Scheduler\Meetings\ExternalMeetingBookingResponse;

interface MeetingsLinksContract
{
    /**
     * @api
     *
     * @param string $after The paging cursor token of the last successfully read resource will be returned as the `paging.next.after` JSON property of a paged response containing more results.
     * @param int $limit the maximum number of results to display per page
     * @param string $name retrieve scheduling pages with a specified name
     * @param string $organizerUserID filter the response to scheduling pages created by the specified user
     * @param string $type filter the response to the specific type of meeting
     *
     * @return Page<ExternalLinkMetadata>
     *
     * @throws APIException
     */
    public function list(
        ?string $after = null,
        ?int $limit = null,
        ?string $name = null,
        ?string $organizerUserID = null,
        ?string $type = null,
        ?RequestOptions $requestOptions = null,
    ): Page;

    /**
     * @api
     *
     * @param list<array{name: string, value: string}> $formFields
     * @param list<array{
     *   communicationTypeID: string, consented: bool
     * }|ExternalLegalConsentResponse> $legalConsentResponses
     * @param list<string> $likelyAvailableUserIDs
     *
     * @throws APIException
     */
    public function book(
        int $duration,
        string $email,
        string $firstName,
        array $formFields,
        string $lastName,
        array $legalConsentResponses,
        array $likelyAvailableUserIDs,
        string $slug,
        string|\DateTimeInterface $startTime,
        ?string $locale = null,
        ?string $timezone = null,
        ?RequestOptions $requestOptions = null,
    ): ExternalMeetingBookingResponse;

    /**
     * @api
     *
     * @param string $slug the path for the meeting page that you want the available times for
     * @param string $timezone return times in response based on specified time zone
     * @param int $monthOffset get times for a different month
     *
     * @throws APIException
     */
    public function getAvailabilityBySlug(
        string $slug,
        string $timezone,
        ?int $monthOffset = null,
        ?RequestOptions $requestOptions = null,
    ): ExternalLinkAvailabilityAndBusyTimes;

    /**
     * @api
     *
     * @param string $slug the path to the scheduling page that you want the information for
     * @param string $timezone return times in response based on specified time zone
     *
     * @throws APIException
     */
    public function getBookingInfoBySlug(
        string $slug,
        string $timezone,
        ?RequestOptions $requestOptions = null
    ): ExternalBookingInfo;
}
