<?php

namespace Tests\Services\WebhooksJournal;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\WebhooksJournal\CollectionResponseSubscriptionResponseNoPaging;
use HubSpotSDK\WebhooksJournal\SubscriptionResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SubscriptionsTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooksJournal->subscriptions->create(
            actions: ['CREATE'],
            objectIDs: [0],
            objectTypeID: 'objectTypeId',
            portalID: 0,
            properties: ['string'],
            subscriptionType: 'GDPR_PRIVACY_DELETION',
            associatedObjectTypeIDs: ['string'],
            eventTypeID: 'eventTypeId',
            listIDs: [0],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooksJournal->subscriptions->create(
            actions: ['CREATE'],
            objectIDs: [0],
            objectTypeID: 'objectTypeId',
            portalID: 0,
            properties: ['string'],
            subscriptionType: 'GDPR_PRIVACY_DELETION',
            associatedObjectTypeIDs: ['string'],
            eventTypeID: 'eventTypeId',
            listIDs: [0],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooksJournal->subscriptions->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseSubscriptionResponseNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooksJournal->subscriptions->delete(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteForPortal(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooksJournal->subscriptions->deleteForPortal(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooksJournal->subscriptions->get(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionResponse::class, $result);
    }
}
