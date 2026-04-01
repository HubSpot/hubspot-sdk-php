<?php

namespace Tests\Services\Webhooks;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Webhooks\Webhooks\CollectionResponseSubscriptionResponseNoPaging;
use HubspotSDK\Webhooks\Webhooks\CrmObjectSnapshotBatchResponse;
use HubspotSDK\Webhooks\Webhooks\FilterCreateResponse;
use HubspotSDK\Webhooks\Webhooks\FilterResponse;
use HubspotSDK\Webhooks\Webhooks\SettingsResponse;
use HubspotSDK\Webhooks\Webhooks\SnapshotStatusResponse;
use HubspotSDK\Webhooks\Webhooks\SubscriptionListResponse;
use HubspotSDK\Webhooks\Webhooks\SubscriptionResponse;
use HubspotSDK\Webhooks\Webhooks\SubscriptionResponse1;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class WebhooksTest extends TestCase
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
    public function testCreateCrmSnapshot(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->createCrmSnapshot(
            snapshotRequests: [
                [
                    'objectID' => 0,
                    'objectTypeID' => 'objectTypeId',
                    'portalID' => 0,
                    'properties' => ['string'],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CrmObjectSnapshotBatchResponse::class, $result);
    }

    #[Test]
    public function testCreateCrmSnapshotWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->createCrmSnapshot(
            snapshotRequests: [
                [
                    'objectID' => 0,
                    'objectTypeID' => 'objectTypeId',
                    'portalID' => 0,
                    'properties' => ['string'],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CrmObjectSnapshotBatchResponse::class, $result);
    }

    #[Test]
    public function testCreateJournalSubscription(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->createJournalSubscription();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionResponse1::class, $result);
    }

    #[Test]
    public function testCreateSubscription(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->createSubscription(
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

        $result = $this->client->webhooks->webhooks->createSubscription(
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
    public function testCreateSubscriptionFilter(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->createSubscriptionFilter(
            filter: [
                'conditions' => [
                    [
                        'filterType' => 'CRM_OBJECT_PROPERTY',
                        'operator' => 'CONTAINS',
                        'property' => 'property',
                    ],
                ],
            ],
            subscriptionID: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FilterCreateResponse::class, $result);
    }

    #[Test]
    public function testCreateSubscriptionFilterWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->createSubscriptionFilter(
            filter: [
                'conditions' => [
                    [
                        'filterType' => 'CRM_OBJECT_PROPERTY',
                        'operator' => 'CONTAINS',
                        'property' => 'property',
                        'value' => 'value',
                        'values' => ['string'],
                    ],
                ],
            ],
            subscriptionID: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FilterCreateResponse::class, $result);
    }

    #[Test]
    public function testDeleteJournalSubscription(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->deleteJournalSubscription(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeletePortalSubscriptions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->deletePortalSubscriptions(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->deleteSettings(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteSubscription(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->deleteSubscription(
            0,
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteSubscriptionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->deleteSubscription(
            0,
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteSubscriptionFilter(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->deleteSubscriptionFilter(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGetJournalEarliest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->getJournalEarliest();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testGetJournalLatest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->getJournalLatest();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testGetJournalNextByOffset(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->getJournalNextByOffset(
            'offset'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testGetJournalStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->getJournalStatus(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SnapshotStatusResponse::class, $result);
    }

    #[Test]
    public function testGetLocalJournalEarliest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->getLocalJournalEarliest();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testGetLocalJournalLatest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->getLocalJournalLatest();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testGetLocalJournalNextByOffset(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->getLocalJournalNextByOffset(
            'offset'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testGetLocalJournalStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->getLocalJournalStatus(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SnapshotStatusResponse::class, $result);
    }

    #[Test]
    public function testGetSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->getSettings(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SettingsResponse::class, $result);
    }

    #[Test]
    public function testGetSubscription(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->getSubscription(0, appID: 0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionResponse::class, $result);
    }

    #[Test]
    public function testGetSubscriptionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->getSubscription(0, appID: 0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionResponse::class, $result);
    }

    #[Test]
    public function testGetSubscriptionFilter(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->getSubscriptionFilter(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FilterResponse::class, $result);
    }

    #[Test]
    public function testGetSubscriptionFilterForSubscription(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->webhooks
            ->webhooks
            ->getSubscriptionFilterForSubscription(0)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testListJournalSubscriptions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->listJournalSubscriptions();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseSubscriptionResponseNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testListSubscriptions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->listSubscriptions(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionListResponse::class, $result);
    }

    #[Test]
    public function testUpdateSettings(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->updateSettings(
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

        $result = $this->client->webhooks->webhooks->updateSettings(
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

        $result = $this->client->webhooks->webhooks->updateSubscription(
            0,
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionResponse::class, $result);
    }

    #[Test]
    public function testUpdateSubscriptionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhooks->updateSubscription(
            0,
            appID: 0,
            active: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionResponse::class, $result);
    }
}
