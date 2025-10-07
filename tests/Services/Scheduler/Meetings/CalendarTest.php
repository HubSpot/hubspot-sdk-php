<?php

namespace Tests\Services\Scheduler\Meetings;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use HubspotSDK\PublicObjectID;
use HubspotSDK\Scheduler\Meetings\ExternalAssociationCreateRequest;
use HubspotSDK\Scheduler\Meetings\ExternalCalendarMeetingEventCreateProperties;
use HubspotSDK\Scheduler\Meetings\ExternalEmailReminderSchedule;
use HubspotSDK\Scheduler\Meetings\ExternalReminder;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CalendarTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            STAINLESS_FIXME_accessToken: 'pat-na1-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->scheduler->meetings->calendar->create(
            associations: [
                ExternalAssociationCreateRequest::with(
                    to: PublicObjectID::with(id: 'id'),
                    types: [
                        AssociationSpec::with(
                            associationCategory: 'HUBSPOT_DEFINED',
                            associationTypeID: 0
                        ),
                    ],
                ),
            ],
            emailReminderSchedule: ExternalEmailReminderSchedule::with(
                reminders: [
                    ExternalReminder::with(numberOfTimeUnits: 0, timeUnit: 'timeUnit'),
                ],
                shouldIncludeInviteDescription: true,
            ),
            properties: ExternalCalendarMeetingEventCreateProperties::with(
                hsMeetingEndTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                hsMeetingOutcome: 'hs_meeting_outcome',
                hsMeetingStartTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                hsMeetingTitle: 'hs_meeting_title',
                hsTimestamp: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            ),
            timezone: 'timezone',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->scheduler->meetings->calendar->create(
            associations: [
                ExternalAssociationCreateRequest::with(
                    to: PublicObjectID::with(id: 'id'),
                    types: [
                        AssociationSpec::with(
                            associationCategory: 'HUBSPOT_DEFINED',
                            associationTypeID: 0
                        ),
                    ],
                ),
            ],
            emailReminderSchedule: ExternalEmailReminderSchedule::with(
                reminders: [
                    ExternalReminder::with(numberOfTimeUnits: 0, timeUnit: 'timeUnit'),
                ],
                shouldIncludeInviteDescription: true,
            ),
            properties: ExternalCalendarMeetingEventCreateProperties::with(
                hsMeetingEndTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                hsMeetingOutcome: 'hs_meeting_outcome',
                hsMeetingStartTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                hsMeetingTitle: 'hs_meeting_title',
                hsTimestamp: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            )
                ->withHsActivityType('hs_activity_type')
                ->withHsAttachmentIDs(['string'])
                ->withHsAttendeeOwnerIDs(['string'])
                ->withHsInternalMeetingNotes('hs_internal_meeting_notes')
                ->withHsMeetingBody('hs_meeting_body')
                ->withHsMeetingLocation('hs_meeting_location')
                ->withHsMeetingLocationType('hs_meeting_location_type')
                ->withHubspotOwnerID('hubspot_owner_id'),
            timezone: 'timezone',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
