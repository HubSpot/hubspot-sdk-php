<?php

namespace Tests\Services\Scheduler\Meetings;

use HubspotSDK\Client;
use HubspotSDK\Scheduler\Meetings\ExternalBookingFormField;
use HubspotSDK\Scheduler\Meetings\ExternalLegalConsentResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class MeetingsLinksTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->scheduler->meetings->meetingsLinks->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBook(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->scheduler->meetings->meetingsLinks->book(
            duration: 0,
            email: 'email',
            firstName: 'firstName',
            formFields: [
                ExternalBookingFormField::with(name: 'name', value: 'value'),
            ],
            lastName: 'lastName',
            legalConsentResponses: [
                ExternalLegalConsentResponse::with(
                    communicationTypeID: 'communicationTypeId',
                    consented: true
                ),
            ],
            likelyAvailableUserIDs: ['string'],
            slug: 'slug',
            startTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBookWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->scheduler->meetings->meetingsLinks->book(
            duration: 0,
            email: 'email',
            firstName: 'firstName',
            formFields: [
                ExternalBookingFormField::with(name: 'name', value: 'value'),
            ],
            lastName: 'lastName',
            legalConsentResponses: [
                ExternalLegalConsentResponse::with(
                    communicationTypeID: 'communicationTypeId',
                    consented: true
                ),
            ],
            likelyAvailableUserIDs: ['string'],
            slug: 'slug',
            startTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetInitialBookingInfo(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->scheduler
            ->meetings
            ->meetingsLinks
            ->getInitialBookingInfo('slug')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetNextAvailability(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->scheduler
            ->meetings
            ->meetingsLinks
            ->getNextAvailability('slug')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
