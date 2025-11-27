<?php

namespace Tests\Services\Crm\FeatureFlags;

use HubspotSDK\Client;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateBatchResponse;
use HubspotSDK\Crm\FeatureFlags\PortalFlagStateResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PortalsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->featureFlags->portals->update(
            0,
            ['appId' => 0, 'flagName' => 'flagName', 'flagState' => 'ABSENT']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortalFlagStateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->featureFlags->portals->update(
            0,
            ['appId' => 0, 'flagName' => 'flagName', 'flagState' => 'ABSENT']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortalFlagStateResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->featureFlags->portals->delete(
            0,
            ['appId' => 0, 'flagName' => 'flagName']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortalFlagStateResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->featureFlags->portals->delete(
            0,
            ['appId' => 0, 'flagName' => 'flagName']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortalFlagStateResponse::class, $result);
    }

    #[Test]
    public function testBatchDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->featureFlags->portals->batchDelete(
            'flagName',
            ['appId' => 0, 'portalIds' => [0]]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortalFlagStateBatchResponse::class, $result);
    }

    #[Test]
    public function testBatchDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->featureFlags->portals->batchDelete(
            'flagName',
            ['appId' => 0, 'portalIds' => [0]]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortalFlagStateBatchResponse::class, $result);
    }

    #[Test]
    public function testBatchUpsert(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->featureFlags->portals->batchUpsert(
            'flagName',
            [
                'appId' => 0,
                'portalStates' => [['flagState' => 'ABSENT', 'portalId' => 0]],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortalFlagStateBatchResponse::class, $result);
    }

    #[Test]
    public function testBatchUpsertWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->featureFlags->portals->batchUpsert(
            'flagName',
            [
                'appId' => 0,
                'portalStates' => [['flagState' => 'ABSENT', 'portalId' => 0]],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortalFlagStateBatchResponse::class, $result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->featureFlags->portals->get(
            0,
            ['appId' => 0, 'flagName' => 'flagName']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortalFlagStateResponse::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->featureFlags->portals->get(
            0,
            ['appId' => 0, 'flagName' => 'flagName']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortalFlagStateResponse::class, $result);
    }
}
