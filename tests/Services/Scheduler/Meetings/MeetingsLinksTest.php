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
final class MeetingsLinksTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->scheduler->meetings->meetingsLinks->list([]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBook(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->scheduler->meetings->meetingsLinks->book([
            'duration' => 0,
            'email' => 'email',
            'firstName' => 'firstName',
            'formFields' => [['name' => 'name', 'value' => 'value']],
            'lastName' => 'lastName',
            'legalConsentResponses' => [
                ['communicationTypeId' => 'communicationTypeId', 'consented' => true],
            ],
            'likelyAvailableUserIds' => ['string'],
            'slug' => 'slug',
            'startTime' => '2019-12-27T18:11:19.117Z',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBookWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->scheduler->meetings->meetingsLinks->book([
            'duration' => 0,
            'email' => 'email',
            'firstName' => 'firstName',
            'formFields' => [['name' => 'name', 'value' => 'value']],
            'lastName' => 'lastName',
            'legalConsentResponses' => [
                ['communicationTypeId' => 'communicationTypeId', 'consented' => true],
            ],
            'likelyAvailableUserIds' => ['string'],
            'slug' => 'slug',
            'startTime' => '2019-12-27T18:11:19.117Z',
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetAvailabilityBySlug(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->scheduler
            ->meetings
            ->meetingsLinks
            ->getAvailabilityBySlug('slug', ['timezone' => 'timezone'])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetAvailabilityBySlugWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->scheduler
            ->meetings
            ->meetingsLinks
            ->getAvailabilityBySlug('slug', ['timezone' => 'timezone'])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetBookingInfoBySlug(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->scheduler
            ->meetings
            ->meetingsLinks
            ->getBookingInfoBySlug('slug', ['timezone' => 'timezone'])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetBookingInfoBySlugWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->scheduler
            ->meetings
            ->meetingsLinks
            ->getBookingInfoBySlug('slug', ['timezone' => 'timezone'])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
