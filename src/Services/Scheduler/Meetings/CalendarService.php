<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Scheduler\Meetings;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\Calendar\CalendarCreateParams;
use HubspotSDK\Scheduler\Meetings\ExternalCalenderMeetingEventResponse;
use HubspotSDK\ServiceContracts\Scheduler\Meetings\CalendarContract;

final class CalendarService implements CalendarContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   associations: list<array{
     *     to: array<mixed>|PublicObjectID, types: list<array<mixed>|AssociationSpec>
     *   }>,
     *   emailReminderSchedule: array{
     *     reminders: list<array{numberOfTimeUnits: int, timeUnit: string}>,
     *     shouldIncludeInviteDescription: bool,
     *   },
     *   properties: array{
     *     hs_meeting_end_time: string|\DateTimeInterface,
     *     hs_meeting_outcome: string,
     *     hs_meeting_start_time: string|\DateTimeInterface,
     *     hs_meeting_title: string,
     *     hs_timestamp: string|\DateTimeInterface,
     *     hs_activity_type?: string,
     *     hs_attachment_ids?: list<string>,
     *     hs_attendee_owner_ids?: list<string>,
     *     hs_internal_meeting_notes?: string,
     *     hs_meeting_body?: string,
     *     hs_meeting_location?: string,
     *     hs_meeting_location_type?: string,
     *     hubspot_owner_id?: string,
     *   },
     *   timezone: string,
     * }|CalendarCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|CalendarCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): ExternalCalenderMeetingEventResponse {
        [$parsed, $options] = CalendarCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'scheduler/v3/meetings/calendar',
            body: (object) $parsed,
            options: $options,
            convert: ExternalCalenderMeetingEventResponse::class,
        );
    }
}
