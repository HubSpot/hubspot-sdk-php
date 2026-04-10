<?php

namespace Tests\Services\CommunicationPreferences\Statuses;

use HubSpotSDK\Client;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicBulkOptOutFromAllResponse;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicStatus;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicStatusBulkResponse;
use HubSpotSDK\CommunicationPreferences\BatchResponsePublicWideStatusBulkResponse;
use HubSpotSDK\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class BatchTest extends TestCase
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
    public function testGetUnsubscribeAllStatuses(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->communicationPreferences
            ->statuses
            ->batch
            ->getUnsubscribeAllStatuses(channel: 'EMAIL', inputs: ['string'])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicWideStatusBulkResponse::class,
            $result
        );
    }

    #[Test]
    public function testGetUnsubscribeAllStatusesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->communicationPreferences
            ->statuses
            ->batch
            ->getUnsubscribeAllStatuses(
                channel: 'EMAIL',
                inputs: ['string'],
                businessUnitID: 0
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicWideStatusBulkResponse::class,
            $result
        );
    }

    #[Test]
    public function testRead(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->communicationPreferences->statuses->batch->read(
            channel: 'EMAIL',
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicStatusBulkResponse::class,
            $result
        );
    }

    #[Test]
    public function testReadWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->communicationPreferences->statuses->batch->read(
            channel: 'EMAIL',
            inputs: ['string'],
            businessUnitID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicStatusBulkResponse::class,
            $result
        );
    }

    #[Test]
    public function testUnsubscribeAll(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->communicationPreferences
            ->statuses
            ->batch
            ->unsubscribeAll(channel: 'EMAIL', inputs: ['string'])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicBulkOptOutFromAllResponse::class,
            $result
        );
    }

    #[Test]
    public function testUnsubscribeAllWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->communicationPreferences
            ->statuses
            ->batch
            ->unsubscribeAll(
                channel: 'EMAIL',
                inputs: ['string'],
                businessUnitID: 0,
                verbose: true
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicBulkOptOutFromAllResponse::class,
            $result
        );
    }

    #[Test]
    public function testUpdateStatuses(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->communicationPreferences
            ->statuses
            ->batch
            ->updateStatuses(
                inputs: [
                    [
                        'channel' => 'EMAIL',
                        'statusState' => 'NOT_SPECIFIED',
                        'subscriberIDString' => 'subscriberIdString',
                        'subscriptionID' => 0,
                    ],
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePublicStatus::class, $result);
    }

    #[Test]
    public function testUpdateStatusesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->communicationPreferences
            ->statuses
            ->batch
            ->updateStatuses(
                inputs: [
                    [
                        'channel' => 'EMAIL',
                        'statusState' => 'NOT_SPECIFIED',
                        'subscriberIDString' => 'subscriberIdString',
                        'subscriptionID' => 0,
                        'legalBasis' => 'CONSENT_WITH_NOTICE',
                        'legalBasisExplanation' => 'legalBasisExplanation',
                    ],
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePublicStatus::class, $result);
    }
}
