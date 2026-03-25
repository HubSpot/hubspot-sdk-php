<?php

namespace Tests\Services\Marketing\Campaigns;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Campaigns\ContactReference;
use HubspotSDK\Marketing\Campaigns\MetricsCounters;
use HubspotSDK\Marketing\Campaigns\RevenueAttributionAggregate;
use HubspotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class MetricsTest extends TestCase
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
    public function testGetAttributionMetrics(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->campaigns
            ->metrics
            ->getAttributionMetrics('campaignGuid')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MetricsCounters::class, $result);
    }

    #[Test]
    public function testGetRevenueAttribution(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->campaigns
            ->metrics
            ->getRevenueAttribution('campaignGuid')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RevenueAttributionAggregate::class, $result);
    }

    #[Test]
    public function testListContactIDsByType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->marketing->campaigns->metrics->listContactIDsByType(
            'contactType',
            campaignGuid: 'campaignGuid'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ContactReference::class, $item);
        }
    }

    #[Test]
    public function testListContactIDsByTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->marketing->campaigns->metrics->listContactIDsByType(
            'contactType',
            campaignGuid: 'campaignGuid',
            after: 'after',
            endDate: 'endDate',
            limit: 0,
            startDate: 'startDate',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ContactReference::class, $item);
        }
    }
}
