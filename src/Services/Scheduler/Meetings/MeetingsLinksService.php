<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Scheduler\Meetings;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\CollectionResponseWithTotalExternalLinkMetadataForwardPaging;
use HubspotSDK\Scheduler\Meetings\ExternalBookingFormField;
use HubspotSDK\Scheduler\Meetings\ExternalBookingInfo;
use HubspotSDK\Scheduler\Meetings\ExternalLegalConsentResponse;
use HubspotSDK\Scheduler\Meetings\ExternalLinkAvailabilityAndBusyTimes;
use HubspotSDK\Scheduler\Meetings\ExternalMeetingBookingResponse;
use HubspotSDK\Scheduler\Meetings\MeetingsLinks\MeetingsLinkBookParams;
use HubspotSDK\ServiceContracts\Scheduler\Meetings\MeetingsLinksContract;

use const HubspotSDK\Core\OMIT as omit;

final class MeetingsLinksService implements MeetingsLinksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a paged list meeting scheduling pages
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): CollectionResponseWithTotalExternalLinkMetadataForwardPaging {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'scheduler/v3/meetings/meeting-links',
            options: $requestOptions,
            convert: CollectionResponseWithTotalExternalLinkMetadataForwardPaging::class,
        );
    }

    /**
     * @api
     *
     * Book a meeting for a specified meeting page.
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
    ): ExternalMeetingBookingResponse {
        $params = [
            'duration' => $duration,
            'email' => $email,
            'firstName' => $firstName,
            'formFields' => $formFields,
            'lastName' => $lastName,
            'legalConsentResponses' => $legalConsentResponses,
            'likelyAvailableUserIDs' => $likelyAvailableUserIDs,
            'slug' => $slug,
            'startTime' => $startTime,
            'locale' => $locale,
            'timezone' => $timezone,
        ];

        return $this->bookRaw($params, $requestOptions);
    }

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
    ): ExternalMeetingBookingResponse {
        [$parsed, $options] = MeetingsLinkBookParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'scheduler/v3/meetings/meeting-links/book',
            body: (object) $parsed,
            options: $options,
            convert: ExternalMeetingBookingResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the next availability times for a meeting page.
     *
     * @throws APIException
     */
    public function getAvailabilityBySlug(
        string $slug,
        ?RequestOptions $requestOptions = null
    ): ExternalLinkAvailabilityAndBusyTimes {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'scheduler/v3/meetings/meeting-links/book/availability-page/%1$s', $slug,
            ],
            options: $requestOptions,
            convert: ExternalLinkAvailabilityAndBusyTimes::class,
        );
    }

    /**
     * @api
     *
     * Get details about the initial information necessary for a meeting scheduler.
     *
     * @throws APIException
     */
    public function getBookingInfoBySlug(
        string $slug,
        ?RequestOptions $requestOptions = null
    ): ExternalBookingInfo {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['scheduler/v3/meetings/meeting-links/book/%1$s', $slug],
            options: $requestOptions,
            convert: ExternalBookingInfo::class,
        );
    }
}
