<?php

declare(strict_types=1);

namespace HubspotSDK\ServiceContracts\Scheduler\Meetings;

use HubspotSDK\AssociationSpec;
use HubspotSDK\AssociationSpec\AssociationCategory;
use HubspotSDK\Core\Exceptions\APIException;
use HubspotSDK\PublicObjectID;
use HubspotSDK\RequestOptions;
use HubspotSDK\Scheduler\Meetings\ExternalCalenderMeetingEventResponse;

interface CalendarContract
{
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
    ): ExternalCalenderMeetingEventResponse;
}
