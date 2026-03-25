<?php

namespace Tests\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Events\MarketingEventDefaultResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class EventsTest extends TestCase
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
    public function testCancelByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->events->cancelByExternalEventID(
            'externalEventId',
            externalAccountID: 'externalAccountId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MarketingEventDefaultResponse::class, $result);
    }

    #[Test]
    public function testCancelByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->marketing->events->events->cancelByExternalEventID(
            'externalEventId',
            externalAccountID: 'externalAccountId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MarketingEventDefaultResponse::class, $result);
    }

    #[Test]
    public function testCompleteByExternalEventID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->events
            ->completeByExternalEventID(
                'externalEventId',
                externalAccountID: 'externalAccountId',
                endDateTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                startDateTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MarketingEventDefaultResponse::class, $result);
    }

    #[Test]
    public function testCompleteByExternalEventIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->events
            ->completeByExternalEventID(
                'externalEventId',
                externalAccountID: 'externalAccountId',
                endDateTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                startDateTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MarketingEventDefaultResponse::class, $result);
    }
}
