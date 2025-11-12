<?php

namespace Tests\Services\Marketing\Subscriptions\V4;

use HubspotSDK\Client;
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

        $result = $this->client->marketing->subscriptions->v4->statuses->update(
            'subscriberIdString',
            [
                'channel' => 'EMAIL',
                'statusState' => 'SUBSCRIBED',
                'subscriptionId' => 0,
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->v4->statuses->update(
            'subscriberIdString',
            [
                'channel' => 'EMAIL',
                'statusState' => 'SUBSCRIBED',
                'subscriptionId' => 0,
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->v4->statuses->batchGet([
            'channel' => 'EMAIL', 'inputs' => ['string'],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->v4->statuses->batchGet([
            'channel' => 'EMAIL', 'inputs' => ['string'],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchGetUnsubscribeAllStatus(): void
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
            ->batchGetUnsubscribeAllStatus([
                'channel' => 'EMAIL', 'inputs' => ['string'],
            ])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchGetUnsubscribeAllStatusWithOptionalParams(): void
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
            ->batchGetUnsubscribeAllStatus([
                'channel' => 'EMAIL', 'inputs' => ['string'],
            ])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchUnsubscribeAll(): void
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
            ->batchUnsubscribeAll(['channel' => 'EMAIL', 'inputs' => ['string']])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchUnsubscribeAllWithOptionalParams(): void
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
            ->batchUnsubscribeAll(['channel' => 'EMAIL', 'inputs' => ['string']])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchUpdate(): void
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
            ->batchUpdate([
                'inputs' => [
                    [
                        'channel' => 'EMAIL',
                        'statusState' => 'SUBSCRIBED',
                        'subscriberIdString' => 'subscriberIdString',
                        'subscriptionId' => 0,
                    ],
                ],
            ])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchUpdateWithOptionalParams(): void
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
            ->batchUpdate([
                'inputs' => [
                    [
                        'channel' => 'EMAIL',
                        'statusState' => 'SUBSCRIBED',
                        'subscriberIdString' => 'subscriberIdString',
                        'subscriptionId' => 0,
                        'legalBasis' => 'LEGITIMATE_INTEREST_PQL',
                        'legalBasisExplanation' => 'legalBasisExplanation',
                    ],
                ],
            ])
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->v4->statuses->get(
            'subscriberIdString',
            ['channel' => 'EMAIL']
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
            ['channel' => 'EMAIL']
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
            ->getUnsubscribeAllStatus('subscriberIdString', ['channel' => 'EMAIL'])
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
            ->getUnsubscribeAllStatus('subscriberIdString', ['channel' => 'EMAIL'])
        ;

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
            ->unsubscribeAll('subscriberIdString', ['channel' => 'EMAIL'])
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
            ->unsubscribeAll('subscriberIdString', ['channel' => 'EMAIL']);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
