<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Scheduler\Meetings;

use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\CollectionResponseWithTotalExternalLinkMetadataForwardPaging;
use HubspotSDK\Scheduler\Meetings\ExternalBookingInfo;
use HubspotSDK\Scheduler\Meetings\ExternalLegalConsentResponse;
use HubspotSDK\Scheduler\Meetings\ExternalLinkAvailabilityAndBusyTimes;
use HubspotSDK\Scheduler\Meetings\ExternalMeetingBookingResponse;
use HubspotSDK\Scheduler\Meetings\MeetingsLinks\MeetingsLinkBookParams;
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
