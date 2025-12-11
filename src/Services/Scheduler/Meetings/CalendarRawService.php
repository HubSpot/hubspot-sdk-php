<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Scheduler\Meetings;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\Core\Contracts\BaseResponse;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\Core\Util;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\Calendar\CalendarCreateParams;
use HubspotSDK\Scheduler\Meetings\ExternalCalenderMeetingEventResponse;
use HubspotSDK\ServiceContracts\Scheduler\Meetings\CalendarRawContract;

final class CalendarRawService implements CalendarRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * @param array{
     *   organizerUserID: string,
     *   associations: list<array{
     *     to: array<mixed>|PublicObjectID, types: list<array<mixed>|AssociationSpec>
     *   }>,
     *   emailReminderSchedule: array{
     *     reminders: list<array{numberOfTimeUnits: int, timeUnit: string}>,
     *     shouldIncludeInviteDescription: bool,
     *   },
     *   properties: array{
     *     hsMeetingEndTime: string|\DateTimeInterface,
     *     hsMeetingOutcome: string,
     *     hsMeetingStartTime: string|\DateTimeInterface,
     *     hsMeetingTitle: string,
     *     hsTimestamp: string|\DateTimeInterface,
     *     hubspotOwnerID: string,
     *     hsActivityType?: string,
     *     hsAttachmentIDs?: list<string>,
     *     hsAttendeeOwnerIDs?: list<string>,
     *     hsInternalMeetingNotes?: string,
     *     hsMeetingBody?: string,
     *     hsMeetingLocation?: string,
     *     hsMeetingLocationType?: string,
     *   },
     *   timezone: string,
     * }|CalendarCreateParams $params
     *
     * @return BaseResponse<ExternalCalenderMeetingEventResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CalendarCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = CalendarCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $query_params = array_flip(['organizerUserId']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'scheduler/v3/meetings/calendar',
            query: Util::array_transform_keys(
                array_diff_key($parsed, $query_params),
                ['organizerUserID' => 'organizerUserId'],
            ),
            body: (object) array_diff_key($parsed, $query_params),
            options: $options,
            convert: ExternalCalenderMeetingEventResponse::class,
        );
    }
}
