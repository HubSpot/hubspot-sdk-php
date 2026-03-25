<?php

namespace Tests\Services\Marketing\Events;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberEmailResponse;
use HubspotSDK\Marketing\Events\BatchResponseSubscriberVidResponse;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testCreateByEventIDAndContactID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
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
                    [
                        'interactionDateTime' => 0,
                        'properties' => ['foo' => 'string'],
                        'vid' => 0,
                    ],
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSubscriberVidResponse::class, $result);
    }

    #[Test]
    public function testCreateByEventIDAndContactIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
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
                    [
                        'interactionDateTime' => 0,
                        'properties' => ['foo' => 'string'],
                        'vid' => 0,
                    ],
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSubscriberVidResponse::class, $result);
    }

    #[Test]
    public function testCreateByEventIDAndEmail(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
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
                    [
                        'contactProperties' => ['foo' => 'string'],
                        'email' => 'email',
                        'interactionDateTime' => 0,
                        'properties' => ['foo' => 'string'],
                    ],
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponseSubscriberEmailResponse::class,
            $result
        );
    }

    #[Test]
    public function testCreateByEventIDAndEmailWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
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
                    [
                        'contactProperties' => ['foo' => 'string'],
                        'email' => 'email',
                        'interactionDateTime' => 0,
                        'properties' => ['foo' => 'string'],
                    ],
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponseSubscriberEmailResponse::class,
            $result
        );
    }

    #[Test]
    public function testCreateByExternalEventIDAndContactID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
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
                    [
                        'interactionDateTime' => 0,
                        'properties' => ['foo' => 'string'],
                        'vid' => 0,
                    ],
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSubscriberVidResponse::class, $result);
    }

    #[Test]
    public function testCreateByExternalEventIDAndContactIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
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
                    [
                        'interactionDateTime' => 0,
                        'properties' => ['foo' => 'string'],
                        'vid' => 0,
                    ],
                ],
                externalAccountID: 'externalAccountId',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSubscriberVidResponse::class, $result);
    }

    #[Test]
    public function testCreateByExternalEventIDAndEmail(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
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
                    [
                        'contactProperties' => ['foo' => 'string'],
                        'email' => 'email',
                        'interactionDateTime' => 0,
                        'properties' => ['foo' => 'string'],
                    ],
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponseSubscriberEmailResponse::class,
            $result
        );
    }

    #[Test]
    public function testCreateByExternalEventIDAndEmailWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
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
                    [
                        'contactProperties' => ['foo' => 'string'],
                        'email' => 'email',
                        'interactionDateTime' => 0,
                        'properties' => ['foo' => 'string'],
                    ],
                ],
                externalAccountID: 'externalAccountId',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponseSubscriberEmailResponse::class,
            $result
        );
    }
}
