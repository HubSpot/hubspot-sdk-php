<?php

namespace Tests\Services\Scheduler\Meetings;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use HubSpotSDK\Scheduler\Meetings\ExternalBookingInfo;
use HubSpotSDK\Scheduler\Meetings\ExternalLinkAvailabilityAndBusyTimes;
use HubSpotSDK\Scheduler\Meetings\ExternalLinkMetadata;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class BasicTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->scheduler->meetings->basic->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ExternalLinkMetadata::class, $item);
        }
    }

    #[Test]
    public function testGetAvailabilityBySlug(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->scheduler->meetings->basic->getAvailabilityBySlug(
            'slug',
            timezone: 'timezone'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalLinkAvailabilityAndBusyTimes::class,
            $result
        );
    }

    #[Test]
    public function testGetAvailabilityBySlugWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->scheduler->meetings->basic->getAvailabilityBySlug(
            'slug',
            timezone: 'timezone',
            monthOffset: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalLinkAvailabilityAndBusyTimes::class,
            $result
        );
    }

    #[Test]
    public function testGetBookingInfoBySlug(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->scheduler->meetings->basic->getBookingInfoBySlug(
            'slug',
            timezone: 'timezone'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalBookingInfo::class, $result);
    }

    #[Test]
    public function testGetBookingInfoBySlugWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->scheduler->meetings->basic->getBookingInfoBySlug(
            'slug',
            timezone: 'timezone'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalBookingInfo::class, $result);
    }
}
