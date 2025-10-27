<?php

namespace Tests\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Marketing\MarketingEventEmailSubscriber;
use HubspotSDK\Marketing\MarketingEventSubscriber;
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
    public function testCreateByEventIDAndContactID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->attendance
            ->createByEventIDAndContactID(
                'subscriberState',
                objectID: 'objectId',
                inputs: [MarketingEventSubscriber::with(interactionDateTime: 0)],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateByEventIDAndContactIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->attendance
            ->createByEventIDAndContactID(
                'subscriberState',
                objectID: 'objectId',
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
    public function testCreateByEventIDAndEmail(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->attendance
            ->createByEventIDAndEmail(
                'subscriberState',
                objectID: 'objectId',
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
    public function testCreateByEventIDAndEmailWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->attendance
            ->createByEventIDAndEmail(
                'subscriberState',
                objectID: 'objectId',
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

    #[Test]
    public function testCreateByExternalEventIDAndContactID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->attendance
            ->createByExternalEventIDAndContactID(
                'subscriberState',
                externalEventID: 'externalEventId',
                inputs: [MarketingEventSubscriber::with(interactionDateTime: 0)],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateByExternalEventIDAndContactIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->attendance
            ->createByExternalEventIDAndContactID(
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
    public function testCreateByExternalEventIDAndEmail(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->attendance
            ->createByExternalEventIDAndEmail(
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
    public function testCreateByExternalEventIDAndEmailWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->events
            ->attendance
            ->createByExternalEventIDAndEmail(
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
