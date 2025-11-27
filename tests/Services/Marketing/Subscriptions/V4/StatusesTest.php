<?php

namespace Tests\Services\Marketing\Subscriptions\V4;

use HubspotSDK\Client;
use HubspotSDK\Marketing\Subscriptions\V4\ActionResponseWithResultsPublicStatus;
use HubspotSDK\Marketing\Subscriptions\V4\ActionResponseWithResultsPublicWideStatus;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicBulkOptOutFromAllResponse;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicStatus;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicStatusBulkResponse;
use HubspotSDK\Marketing\Subscriptions\V4\BatchResponsePublicWideStatusBulkResponse;
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
                'statusState' => 'NOT_SPECIFIED',
                'subscriptionId' => 0,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionResponseWithResultsPublicStatus::class,
            $result
        );
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
                'statusState' => 'NOT_SPECIFIED',
                'subscriptionId' => 0,
                'legalBasis' => 'CONSENT_WITH_NOTICE',
                'legalBasisExplanation' => 'legalBasisExplanation',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionResponseWithResultsPublicStatus::class,
            $result
        );
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicStatusBulkResponse::class,
            $result
        );
    }

    #[Test]
    public function testBatchGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->v4->statuses->batchGet([
            'channel' => 'EMAIL', 'inputs' => ['string'], 'businessUnitId' => 0,
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicStatusBulkResponse::class,
            $result
        );
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicWideStatusBulkResponse::class,
            $result
        );
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
                'channel' => 'EMAIL', 'inputs' => ['string'], 'businessUnitId' => 0,
            ])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicWideStatusBulkResponse::class,
            $result
        );
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicBulkOptOutFromAllResponse::class,
            $result
        );
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
            ->batchUnsubscribeAll([
                'channel' => 'EMAIL',
                'inputs' => ['string'],
                'businessUnitId' => 0,
                'verbose' => true,
            ])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicBulkOptOutFromAllResponse::class,
            $result
        );
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
                        'statusState' => 'NOT_SPECIFIED',
                        'subscriberIdString' => 'subscriberIdString',
                        'subscriptionId' => 0,
                    ],
                ],
            ])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePublicStatus::class, $result);
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
                        'statusState' => 'NOT_SPECIFIED',
                        'subscriberIdString' => 'subscriberIdString',
                        'subscriptionId' => 0,
                        'legalBasis' => 'CONSENT_WITH_NOTICE',
                        'legalBasisExplanation' => 'legalBasisExplanation',
                    ],
                ],
            ])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponsePublicStatus::class, $result);
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionResponseWithResultsPublicStatus::class,
            $result
        );
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->marketing->subscriptions->v4->statuses->get(
            'subscriberIdString',
            ['channel' => 'EMAIL', 'businessUnitId' => 0]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionResponseWithResultsPublicStatus::class,
            $result
        );
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionResponseWithResultsPublicWideStatus::class,
            $result
        );
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
            ->getUnsubscribeAllStatus(
                'subscriberIdString',
                ['channel' => 'EMAIL', 'businessUnitId' => 0, 'verbose' => true],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionResponseWithResultsPublicWideStatus::class,
            $result
        );
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionResponseWithResultsPublicStatus::class,
            $result
        );
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
            ->unsubscribeAll(
                'subscriberIdString',
                ['channel' => 'EMAIL', 'businessUnitId' => 0, 'verbose' => true],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ActionResponseWithResultsPublicStatus::class,
            $result
        );
    }
}
