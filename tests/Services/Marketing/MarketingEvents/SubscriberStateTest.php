<?php

namespace Tests\Services\Marketing\MarketingEvents;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SubscriberStateTest extends TestCase
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
    public function testRecordByEmail(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->subscriberState
            ->recordByEmail(
                'subscriberState',
                externalEventID: 'externalEventId',
                externalAccountID: 'externalAccountId',
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
        $this->assertIsString($result);
    }

    #[Test]
    public function testRecordByEmailWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->subscriberState
            ->recordByEmail(
                'subscriberState',
                externalEventID: 'externalEventId',
                externalAccountID: 'externalAccountId',
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
        $this->assertIsString($result);
    }

    #[Test]
    public function testRecordByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->subscriberState
            ->recordByID(
                'subscriberState',
                externalEventID: 'externalEventId',
                externalAccountID: 'externalAccountId',
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
        $this->assertIsString($result);
    }

    #[Test]
    public function testRecordByIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->marketingEvents
            ->subscriberState
            ->recordByID(
                'subscriberState',
                externalEventID: 'externalEventId',
                externalAccountID: 'externalAccountId',
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
        $this->assertIsString($result);
    }
}
