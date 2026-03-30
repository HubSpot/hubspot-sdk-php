<?php

namespace Tests\Services\Crm\FeatureFlags;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
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
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->featureFlags->batch->delete(
            'flagName',
            appID: 0,
            portalIDs: [0]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortalFlagStateBatchResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->featureFlags->batch->delete(
            'flagName',
            appID: 0,
            portalIDs: [0]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortalFlagStateBatchResponse::class, $result);
    }

    #[Test]
    public function testUpsert(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->featureFlags->batch->upsert(
            'flagName',
            appID: 0,
            portalStates: [['flagState' => 'ABSENT', 'portalID' => 0]],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortalFlagStateBatchResponse::class, $result);
    }

    #[Test]
    public function testUpsertWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->featureFlags->batch->upsert(
            'flagName',
            appID: 0,
            portalStates: [['flagState' => 'ABSENT', 'portalID' => 0]],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortalFlagStateBatchResponse::class, $result);
    }
}
