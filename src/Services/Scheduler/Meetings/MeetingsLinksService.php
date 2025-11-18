<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Scheduler\Meetings;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Page;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\ExternalBookingInfo;
use HubspotSDK\Scheduler\Meetings\ExternalLegalConsentResponse;
use HubspotSDK\Scheduler\Meetings\ExternalLinkAvailabilityAndBusyTimes;
use HubspotSDK\Scheduler\Meetings\ExternalLinkMetadata;
use HubspotSDK\Scheduler\Meetings\ExternalMeetingBookingResponse;
use HubspotSDK\Scheduler\Meetings\MeetingsLinks\MeetingsLinkBookParams;
use HubspotSDK\Scheduler\Meetings\MeetingsLinks\MeetingsLinkGetAvailabilityBySlugParams;
use HubspotSDK\Scheduler\Meetings\MeetingsLinks\MeetingsLinkGetBookingInfoBySlugParams;
use HubspotSDK\Scheduler\Meetings\MeetingsLinks\MeetingsLinkListParams;
use HubspotSDK\ServiceContracts\Scheduler\Meetings\MeetingsLinksContract;

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
     * @param array{
     *   after?: string,
     *   limit?: int,
     *   name?: string,
     *   organizerUserId?: string,
     *   type?: string,
     * }|MeetingsLinkListParams $params
     *
     * @return Page<ExternalLinkMetadata>
     *
     * @throws APIException
     */
    public function list(
        array|MeetingsLinkListParams $params,
        ?RequestOptions $requestOptions = null
    ): Page {
        [$parsed, $options] = MeetingsLinkListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'scheduler/v3/meetings/meeting-links',
            query: $parsed,
            options: $options,
            convert: ExternalLinkMetadata::class,
            page: Page::class,
        );
    }

    /**
     * @api
     *
     * Book a meeting for a specified meeting page.
     *
     * @param array{
     *   duration: int,
     *   email: string,
     *   firstName: string,
     *   formFields: list<array{name: string, value: string}>,
     *   lastName: string,
     *   legalConsentResponses: list<array{
     *     communicationTypeId: string, consented: bool
     *   }|ExternalLegalConsentResponse>,
     *   likelyAvailableUserIds: list<string>,
     *   slug: string,
     *   startTime: string|\DateTimeInterface,
     *   locale?: string,
     *   timezone?: string,
     * }|MeetingsLinkBookParams $params
     *
     * @throws APIException
     */
    public function book(
        array|MeetingsLinkBookParams $params,
        ?RequestOptions $requestOptions = null
    ): ExternalMeetingBookingResponse {
        [$parsed, $options] = MeetingsLinkBookParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   timezone: string, monthOffset?: int
     * }|MeetingsLinkGetAvailabilityBySlugParams $params
     *
     * @throws APIException
     */
    public function getAvailabilityBySlug(
        string $slug,
        array|MeetingsLinkGetAvailabilityBySlugParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalLinkAvailabilityAndBusyTimes {
        [$parsed, $options] = MeetingsLinkGetAvailabilityBySlugParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'scheduler/v3/meetings/meeting-links/book/availability-page/%1$s', $slug,
            ],
            query: $parsed,
            options: $options,
            convert: ExternalLinkAvailabilityAndBusyTimes::class,
        );
    }

    /**
     * @api
     *
     * Get details about the initial information necessary for a meeting scheduler.
     *
     * @param array{timezone: string}|MeetingsLinkGetBookingInfoBySlugParams $params
     *
     * @throws APIException
     */
    public function getBookingInfoBySlug(
        string $slug,
        array|MeetingsLinkGetBookingInfoBySlugParams $params,
        ?RequestOptions $requestOptions = null,
    ): ExternalBookingInfo {
        [$parsed, $options] = MeetingsLinkGetBookingInfoBySlugParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['scheduler/v3/meetings/meeting-links/book/%1$s', $slug],
            query: $parsed,
            options: $options,
            convert: ExternalBookingInfo::class,
        );
    }
}
