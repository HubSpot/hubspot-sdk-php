<?php

namespace Tests\Services\Marketing;

use HubspotSDK\Client;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatus;
use HubspotSDK\Marketing\Subscriptions\PublicSubscriptionStatusesResponse;
use HubspotSDK\Marketing\Subscriptions\SubscriptionDefinitionsResponse;
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

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubscriptionDefinitionsResponse::class, $result);
    }

    #[Test]
    public function testGetEmailStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->getEmailStatus(
            'emailAddress'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicSubscriptionStatusesResponse::class, $result);
    }

    #[Test]
    public function testSubscribe(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->subscribe(
            emailAddress: 'emailAddress',
            subscriptionID: 'subscriptionId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicSubscriptionStatus::class, $result);
    }

    #[Test]
    public function testSubscribeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->subscribe(
            emailAddress: 'emailAddress',
            subscriptionID: 'subscriptionId',
            legalBasis: 'CONSENT_WITH_NOTICE',
            legalBasisExplanation: 'legalBasisExplanation',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicSubscriptionStatus::class, $result);
    }

    #[Test]
    public function testUnsubscribe(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->unsubscribe(
            emailAddress: 'emailAddress',
            subscriptionID: 'subscriptionId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicSubscriptionStatus::class, $result);
    }

    #[Test]
    public function testUnsubscribeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->unsubscribe(
            emailAddress: 'emailAddress',
            subscriptionID: 'subscriptionId',
            legalBasis: 'CONSENT_WITH_NOTICE',
            legalBasisExplanation: 'legalBasisExplanation',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicSubscriptionStatus::class, $result);
    }
}
