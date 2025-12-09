<?php

declare(strict_types=1);

namespace HubspotSDK\Services\Scheduler\Meetings;

use HubspotSDK\AssociationSpec;
use HubspotSDK\AssociationSpec\AssociationCategory;
use HubspotSDK\Client;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\ExternalCalenderMeetingEventResponse;
use HubspotSDK\ServiceContracts\Scheduler\Meetings\CalendarContract;

final class CalendarService implements CalendarContract
{
    /**
     * @api
     */
    public CalendarRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CalendarRawService($client);
    }

    /**
     * @api
     *
     * @param string $organizerUserID Query param:
     * @param list<array{
     *   to: array{id: string}|PublicObjectID,
     *   types: list<array{
     *     associationCategory: 'HUBSPOT_DEFINED'|'INTEGRATOR_DEFINED'|'USER_DEFINED'|AssociationCategory,
     *     associationTypeID: int,
     *   }|AssociationSpec>,
     * }> $associations Body param:
     * @param array{
     *   reminders: list<array{numberOfTimeUnits: int, timeUnit: string}>,
     *   shouldIncludeInviteDescription: bool,
     * } $emailReminderSchedule Body param:
     * @param array{
     *   hsMeetingEndTime: string|\DateTimeInterface,
     *   hsMeetingOutcome: string,
     *   hsMeetingStartTime: string|\DateTimeInterface,
     *   hsMeetingTitle: string,
     *   hsTimestamp: string|\DateTimeInterface,
     *   hubspotOwnerID: string,
     *   hsActivityType?: string,
     *   hsAttachmentIDs?: list<string>,
     *   hsAttendeeOwnerIDs?: list<string>,
     *   hsInternalMeetingNotes?: string,
     *   hsMeetingBody?: string,
     *   hsMeetingLocation?: string,
     *   hsMeetingLocationType?: string,
     * } $properties Body param:
     * @param string $timezone Body param:
     *
     * @throws APIException
     */
    public function create(
        string $organizerUserID,
        array $associations,
        array $emailReminderSchedule,
        array $properties,
        string $timezone,
        ?RequestOptions $requestOptions = null,
    ): ExternalCalenderMeetingEventResponse {
        $params = [
            'organizerUserID' => $organizerUserID,
            'associations' => $associations,
            'emailReminderSchedule' => $emailReminderSchedule,
            'properties' => $properties,
            'timezone' => $timezone,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
