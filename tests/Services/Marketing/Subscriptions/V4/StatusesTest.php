<?php

namespace Tests\Services\Marketing\Subscriptions\V4;

use HubspotSDK\Client;
use HubspotSDK\Marketing\Subscriptions\V4\PublicStatusRequest;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class StatusesTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            STAINLESS_FIXME_accessToken: 'pat-na1-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->v4->statuses->get(
            'subscriberIdString',
            channel: 'EMAIL'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->v4->statuses->get(
            'subscriberIdString',
            channel: 'EMAIL'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->v4->statuses->getBatch(
            channel: 'EMAIL',
            inputs: ['string']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->v4->statuses->getBatch(
            channel: 'EMAIL',
            inputs: ['string']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetUnsubscribeAllStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->subscriptions
            ->v4
            ->statuses
            ->getUnsubscribeAllStatus('subscriberIdString', channel: 'EMAIL')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetUnsubscribeAllStatusWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->subscriptions
            ->v4
            ->statuses
            ->getUnsubscribeAllStatus('subscriberIdString', channel: 'EMAIL')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetUnsubscribeAllStatusBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->subscriptions
            ->v4
            ->statuses
            ->getUnsubscribeAllStatusBatch(channel: 'EMAIL', inputs: ['string'])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetUnsubscribeAllStatusBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->subscriptions
            ->v4
            ->statuses
            ->getUnsubscribeAllStatusBatch(channel: 'EMAIL', inputs: ['string'])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->v4->statuses->set(
            'subscriberIdString',
            channel: 'EMAIL',
            statusState: 'SUBSCRIBED',
            subscriptionID: 0,
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->v4->statuses->set(
            'subscriberIdString',
            channel: 'EMAIL',
            statusState: 'SUBSCRIBED',
            subscriptionID: 0,
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUnsubscribeAll(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->subscriptions
            ->v4
            ->statuses
            ->unsubscribeAll('subscriberIdString', channel: 'EMAIL')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUnsubscribeAllWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->subscriptions
            ->v4
            ->statuses
            ->unsubscribeAll('subscriberIdString', channel: 'EMAIL')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUnsubscribeAllBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->subscriptions
            ->v4
            ->statuses
            ->unsubscribeAllBatch(channel: 'EMAIL', inputs: ['string'])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUnsubscribeAllBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->subscriptions
            ->v4
            ->statuses
            ->unsubscribeAllBatch(channel: 'EMAIL', inputs: ['string'])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->subscriptions
            ->v4
            ->statuses
            ->updateBatch(
                [
                    PublicStatusRequest::with(
                        channel: 'EMAIL',
                        statusState: 'SUBSCRIBED',
                        subscriberIDString: 'subscriberIdString',
                        subscriptionID: 0,
                    ),
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->marketing
            ->subscriptions
            ->v4
            ->statuses
            ->updateBatch(
                [
                    PublicStatusRequest::with(
                        channel: 'EMAIL',
                        statusState: 'SUBSCRIBED',
                        subscriberIDString: 'subscriberIdString',
                        subscriptionID: 0,
                    )
                        ->withLegalBasis('LEGITIMATE_INTEREST_PQL')
                        ->withLegalBasisExplanation('legalBasisExplanation'),
                ],
            );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
