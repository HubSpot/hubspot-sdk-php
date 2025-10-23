<?php

namespace Tests\Services\Marketing\MarketingEvents;

use HubspotSDK\Client;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventEmailSubscriber;
use HubspotSDK\Marketing\MarketingEvents\MarketingEventSubscriber;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AttendanceTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testCreateByContactID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->attendance
            ->createByContactID(
                'subscriberState',
                externalEventID: 'externalEventId',
                inputs: [MarketingEventSubscriber::with(interactionDateTime: 0)],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateByContactIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->attendance
            ->createByContactID(
                'subscriberState',
                externalEventID: 'externalEventId',
                inputs: [
                    MarketingEventSubscriber::with(interactionDateTime: 0)
                        ->withProperties(['foo' => 'string'])
                        ->withVid(0),
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateByEmail(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->attendance
            ->createByEmail(
                'subscriberState',
                externalEventID: 'externalEventId',
                inputs: [
                    MarketingEventEmailSubscriber::with(
                        email: 'email',
                        interactionDateTime: 0
                    ),
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateByEmailWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->attendance
            ->createByEmail(
                'subscriberState',
                externalEventID: 'externalEventId',
                inputs: [
                    MarketingEventEmailSubscriber::with(
                        email: 'email',
                        interactionDateTime: 0
                    )
                        ->withContactProperties(['foo' => 'string'])
                        ->withProperties(['foo' => 'string']),
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
