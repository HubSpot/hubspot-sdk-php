<?php

namespace Tests\Services\Scheduler\Meetings;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Scheduler\Meetings\ExternalCalenderMeetingEventResponse;
use HubspotSDK\Scheduler\Meetings\ExternalMeetingBookingResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AdvancedTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->scheduler->meetings->advanced->create(
            organizerUserID: 'organizerUserId',
            associations: [
                [
                    'to' => ['id' => 'id'],
                    'types' => [
                        [
                            'associationCategory' => 'HUBSPOT_DEFINED',
                            'associationTypeID' => 0,
                        ],
                    ],
                ],
            ],
            emailReminderSchedule: [
                'reminders' => [['numberOfTimeUnits' => 0, 'timeUnit' => 'DAYS']],
                'shouldIncludeInviteDescription' => true,
            ],
            properties: [
                'hsMeetingEndTime' => new \DateTimeImmutable(
                    '2019-12-27T18:11:19.117Z'
                ),
                'hsMeetingOutcome' => 'hs_meeting_outcome',
                'hsMeetingStartTime' => new \DateTimeImmutable(
                    '2019-12-27T18:11:19.117Z'
                ),
                'hsMeetingTitle' => 'hs_meeting_title',
                'hsTimestamp' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'hubspotOwnerID' => 'hubspot_owner_id',
            ],
            timezone: 'timezone',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalCalenderMeetingEventResponse::class,
            $result
        );
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->scheduler->meetings->advanced->create(
            organizerUserID: 'organizerUserId',
            associations: [
                [
                    'to' => ['id' => 'id'],
                    'types' => [
                        [
                            'associationCategory' => 'HUBSPOT_DEFINED',
                            'associationTypeID' => 0,
                        ],
                    ],
                ],
            ],
            emailReminderSchedule: [
                'reminders' => [['numberOfTimeUnits' => 0, 'timeUnit' => 'DAYS']],
                'shouldIncludeInviteDescription' => true,
            ],
            properties: [
                'hsMeetingEndTime' => new \DateTimeImmutable(
                    '2019-12-27T18:11:19.117Z'
                ),
                'hsMeetingOutcome' => 'hs_meeting_outcome',
                'hsMeetingStartTime' => new \DateTimeImmutable(
                    '2019-12-27T18:11:19.117Z'
                ),
                'hsMeetingTitle' => 'hs_meeting_title',
                'hsTimestamp' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'hubspotOwnerID' => 'hubspot_owner_id',
                'hsActivityType' => 'hs_activity_type',
                'hsAttachmentIDs' => ['string'],
                'hsAttendeeOwnerIDs' => ['string'],
                'hsInternalMeetingNotes' => 'hs_internal_meeting_notes',
                'hsMeetingBody' => 'hs_meeting_body',
                'hsMeetingLocation' => 'hs_meeting_location',
                'hsMeetingLocationType' => 'ADDRESS',
            ],
            timezone: 'timezone',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalCalenderMeetingEventResponse::class,
            $result
        );
    }

    #[Test]
    public function testBook(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->scheduler->meetings->advanced->book(
            duration: 0,
            email: 'email',
            firstName: 'firstName',
            formFields: [['name' => 'name', 'value' => 'value']],
            lastName: 'lastName',
            legalConsentResponses: [
                ['communicationTypeID' => 'communicationTypeId', 'consented' => true],
            ],
            likelyAvailableUserIDs: ['string'],
            slug: 'slug',
            startTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalMeetingBookingResponse::class, $result);
    }

    #[Test]
    public function testBookWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->scheduler->meetings->advanced->book(
            duration: 0,
            email: 'email',
            firstName: 'firstName',
            formFields: [['name' => 'name', 'value' => 'value']],
            lastName: 'lastName',
            legalConsentResponses: [
                ['communicationTypeID' => 'communicationTypeId', 'consented' => true],
            ],
            likelyAvailableUserIDs: ['string'],
            slug: 'slug',
            startTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            locale: 'locale',
            timezone: 'timezone',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalMeetingBookingResponse::class, $result);
    }
}
