<?php

namespace Tests\Services\Marketing\MarketingEvents;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\MarketingEvents\AttendanceCounters;
use HubspotSDK\Marketing\MarketingEvents\ParticipationBreakdown;
use HubspotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ParticipationsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(accessToken: 'My Access Token', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testGetByExternalAccountAndEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->participations
            ->getByExternalAccountAndEventID(
                'externalEventId',
                externalAccountID: 'externalAccountId'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AttendanceCounters::class, $result);
    }

    #[Test]
    public function testGetByExternalAccountAndEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->participations
            ->getByExternalAccountAndEventID(
                'externalEventId',
                externalAccountID: 'externalAccountId'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AttendanceCounters::class, $result);
    }

    #[Test]
    public function testGetByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->participations
            ->getByID(0)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AttendanceCounters::class, $result);
    }

    #[Test]
    public function testListBreakdownByContact(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this
            ->client
            ->marketing
            ->marketingEvents
            ->participations
            ->listBreakdownByContact('contactIdentifier')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ParticipationBreakdown::class, $item);
        }
    }

    #[Test]
    public function testListBreakdownByExternalAccountAndEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this
            ->client
            ->marketing
            ->marketingEvents
            ->participations
            ->listBreakdownByExternalAccountAndEventID(
                'externalEventId',
                externalAccountID: 'externalAccountId'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ParticipationBreakdown::class, $item);
        }
    }

    #[Test]
    public function testListBreakdownByExternalAccountAndEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this
            ->client
            ->marketing
            ->marketingEvents
            ->participations
            ->listBreakdownByExternalAccountAndEventID(
                'externalEventId',
                externalAccountID: 'externalAccountId',
                after: 'after',
                contactIdentifier: 'contactIdentifier',
                limit: 0,
                state: 'state',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ParticipationBreakdown::class, $item);
        }
    }

    #[Test]
    public function testListBreakdownByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this
            ->client
            ->marketing
            ->marketingEvents
            ->participations
            ->listBreakdownByID(0)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ParticipationBreakdown::class, $item);
        }
    }
}
