<?php

namespace Tests\Services\Scheduler\Meetings;

use HubspotSDK\Client;
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
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
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

        $result = $this->client->scheduler->meetings->calendar->create([
            'organizerUserId' => 'organizerUserId',
            'associations' => [
                [
                    'to' => ['id' => '37295'],
                    'types' => [
                        [
                            'associationCategory' => 'HUBSPOT_DEFINED',
                            'associationTypeId' => 0,
                        ],
                    ],
                ],
            ],
            'emailReminderSchedule' => [
                'reminders' => [['numberOfTimeUnits' => 0, 'timeUnit' => 'timeUnit']],
                'shouldIncludeInviteDescription' => true,
            ],
            'properties' => [
                'hs_meeting_end_time' => '2019-12-27T18:11:19.117Z',
                'hs_meeting_outcome' => 'hs_meeting_outcome',
                'hs_meeting_start_time' => '2019-12-27T18:11:19.117Z',
                'hs_meeting_title' => 'hs_meeting_title',
                'hs_timestamp' => '2019-12-27T18:11:19.117Z',
                'hubspot_owner_id' => 'hubspot_owner_id',
            ],
            'timezone' => 'timezone',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->scheduler->meetings->calendar->create([
            'organizerUserId' => 'organizerUserId',
            'associations' => [
                [
                    'to' => ['id' => '37295'],
                    'types' => [
                        [
                            'associationCategory' => 'HUBSPOT_DEFINED',
                            'associationTypeId' => 0,
                        ],
                    ],
                ],
            ],
            'emailReminderSchedule' => [
                'reminders' => [['numberOfTimeUnits' => 0, 'timeUnit' => 'timeUnit']],
                'shouldIncludeInviteDescription' => true,
            ],
            'properties' => [
                'hs_meeting_end_time' => '2019-12-27T18:11:19.117Z',
                'hs_meeting_outcome' => 'hs_meeting_outcome',
                'hs_meeting_start_time' => '2019-12-27T18:11:19.117Z',
                'hs_meeting_title' => 'hs_meeting_title',
                'hs_timestamp' => '2019-12-27T18:11:19.117Z',
                'hubspot_owner_id' => 'hubspot_owner_id',
                'hs_activity_type' => 'hs_activity_type',
                'hs_attachment_ids' => ['string'],
                'hs_attendee_owner_ids' => ['string'],
                'hs_internal_meeting_notes' => 'hs_internal_meeting_notes',
                'hs_meeting_body' => 'hs_meeting_body',
                'hs_meeting_location' => 'hs_meeting_location',
                'hs_meeting_location_type' => 'hs_meeting_location_type',
            ],
            'timezone' => 'timezone',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
