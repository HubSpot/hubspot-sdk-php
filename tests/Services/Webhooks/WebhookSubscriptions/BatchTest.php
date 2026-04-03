<?php

namespace Tests\Services\Webhooks\WebhookSubscriptions;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Webhooks\WebhookSubscriptions\BatchResponseJournalFetchResponse;
use HubspotSDK\Webhooks\WebhookSubscriptions\BatchResponseSubscriptionResponse;
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
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhookSubscriptions->batch->get(
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseJournalFetchResponse::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhookSubscriptions->batch->get(
            inputs: ['string'],
            installPortalID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseJournalFetchResponse::class, $result);
    }

    #[Test]
    public function testGetEarliest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhookSubscriptions->batch->getEarliest(
            1
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseJournalFetchResponse::class, $result);
    }

    #[Test]
    public function testGetLatest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhookSubscriptions->batch->getLatest(
            1
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseJournalFetchResponse::class, $result);
    }

    #[Test]
    public function testGetLocal(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhookSubscriptions->batch->getLocal(
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseJournalFetchResponse::class, $result);
    }

    #[Test]
    public function testGetLocalWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhookSubscriptions->batch->getLocal(
            inputs: ['string'],
            installPortalID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseJournalFetchResponse::class, $result);
    }

    #[Test]
    public function testGetLocalEarliest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->webhooks
            ->webhookSubscriptions
            ->batch
            ->getLocalEarliest(1)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseJournalFetchResponse::class, $result);
    }

    #[Test]
    public function testGetLocalLatest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->webhooks
            ->webhookSubscriptions
            ->batch
            ->getLocalLatest(1)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseJournalFetchResponse::class, $result);
    }

    #[Test]
    public function testGetLocalNext(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->webhooks
            ->webhookSubscriptions
            ->batch
            ->getLocalNext(1, offset: 'offset')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseJournalFetchResponse::class, $result);
    }

    #[Test]
    public function testGetLocalNextWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->webhooks
            ->webhookSubscriptions
            ->batch
            ->getLocalNext(1, offset: 'offset', installPortalID: 0)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseJournalFetchResponse::class, $result);
    }

    #[Test]
    public function testGetNext(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhookSubscriptions->batch->getNext(
            1,
            offset: 'offset'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseJournalFetchResponse::class, $result);
    }

    #[Test]
    public function testGetNextWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooks->webhookSubscriptions->batch->getNext(
            1,
            offset: 'offset',
            installPortalID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseJournalFetchResponse::class, $result);
    }

    #[Test]
    public function testUpdateSubscriptions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->webhooks
            ->webhookSubscriptions
            ->batch
            ->updateSubscriptions(0, inputs: [['id' => 0, 'active' => true]])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSubscriptionResponse::class, $result);
    }

    #[Test]
    public function testUpdateSubscriptionsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->webhooks
            ->webhookSubscriptions
            ->batch
            ->updateSubscriptions(0, inputs: [['id' => 0, 'active' => true]])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSubscriptionResponse::class, $result);
    }
}
