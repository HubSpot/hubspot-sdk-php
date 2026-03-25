<?php

namespace Tests\Services;

use HubspotSDK\AppWebhooks\BatchResponseSubscriptionResponse;
use HubspotSDK\AppWebhooks\SubscriptionListResponse;
use HubspotSDK\AppWebhooks\SubscriptionResponse;
use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Extensions\Calling\SettingsResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AppWebhooksTest extends TestCase
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
    public function testBatchUpdateSubscriptions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->appWebhooks->batchUpdateSubscriptions(
            0,
            inputs: [['id' => 0, 'active' => true]]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSubscriptionResponse::class, $result);
    }

    #[Test]
    public function testBatchUpdateSubscriptionsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->appWebhooks->batchUpdateSubscriptions(
            0,
            inputs: [['id' => 0, 'active' => true]]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSubscriptionResponse::class, $result);
    }

    #[Test]
    public function testCreateSubscription(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->appWebhooks->createSubscription(
            0,
            active: true,
            eventType: 'company.associationChange'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionResponse::class, $result);
    }

    #[Test]
    public function testCreateSubscriptionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->appWebhooks->createSubscription(
            0,
            active: true,
            eventType: 'company.associationChange',
            eventTypeName: 'eventTypeName',
            objectTypeID: 'objectTypeId',
            propertyName: 'propertyName',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionResponse::class, $result);
    }

    #[Test]
    public function testDeleteSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->appWebhooks->deleteSettings(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteSubscription(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->appWebhooks->deleteSubscription(0, appID: 0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteSubscriptionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->appWebhooks->deleteSubscription(0, appID: 0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGetSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->appWebhooks->getSettings(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SettingsResponse::class, $result);
    }

    #[Test]
    public function testGetSubscription(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->appWebhooks->getSubscription(0, appID: 0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionResponse::class, $result);
    }

    #[Test]
    public function testGetSubscriptionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->appWebhooks->getSubscription(0, appID: 0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionResponse::class, $result);
    }

    #[Test]
    public function testListSubscriptions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->appWebhooks->listSubscriptions(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionListResponse::class, $result);
    }

    #[Test]
    public function testUpdateSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->appWebhooks->updateSettings(
            0,
            targetURL: 'targetUrl',
            throttling: ['maxConcurrentRequests' => 0]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SettingsResponse::class, $result);
    }

    #[Test]
    public function testUpdateSettingsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->appWebhooks->updateSettings(
            0,
            targetURL: 'targetUrl',
            throttling: ['maxConcurrentRequests' => 0]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SettingsResponse::class, $result);
    }

    #[Test]
    public function testUpdateSubscription(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->appWebhooks->updateSubscription(0, appID: 0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionResponse::class, $result);
    }

    #[Test]
    public function testUpdateSubscriptionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->appWebhooks->updateSubscription(
            0,
            appID: 0,
            active: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionResponse::class, $result);
    }
}
