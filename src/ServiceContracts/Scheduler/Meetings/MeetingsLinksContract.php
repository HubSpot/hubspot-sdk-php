<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Scheduler\Meetings;

use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\CollectionResponseWithTotalExternalLinkMetadataForwardPaging;
use HubspotSDK\Scheduler\Meetings\ExternalBookingFormField;
use HubspotSDK\Scheduler\Meetings\ExternalBookingInfo;
use HubspotSDK\Scheduler\Meetings\ExternalLegalConsentResponse;
use HubspotSDK\Scheduler\Meetings\ExternalLinkAvailabilityAndBusyTimes;
use HubspotSDK\Scheduler\Meetings\ExternalMeetingBookingResponse;

use const HubspotSDK\Core\OMIT as omit;

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
     * @param int $duration
     * @param string $email
     * @param string $firstName
     * @param list<ExternalBookingFormField> $formFields
     * @param string $lastName
     * @param list<ExternalLegalConsentResponse> $legalConsentResponses
     * @param list<string> $likelyAvailableUserIDs
     * @param string $slug
     * @param \DateTimeInterface $startTime
     * @param string $locale
     * @param string $timezone
     *
     * @throws APIException
     */
    public function book(
        $duration,
        $email,
        $firstName,
        $formFields,
        $lastName,
        $legalConsentResponses,
        $likelyAvailableUserIDs,
        $slug,
        $startTime,
        $locale = omit,
        $timezone = omit,
        ?RequestOptions $requestOptions = null,
    ): ExternalMeetingBookingResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function bookRaw(
        array $params,
        ?RequestOptions $requestOptions = null
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
