<?php

namespace Tests\Services\WebhooksJournal\Subscriptions;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\FilterCreateResponse;
use HubSpotSDK\FilterResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FiltersTest extends TestCase
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

        $result = $this->client->webhooksJournal->subscriptions->filters->create(
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
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooksJournal->subscriptions->filters->create(
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooksJournal->subscriptions->filters->list(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooksJournal->subscriptions->filters->delete(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooksJournal->subscriptions->filters->get(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FilterResponse::class, $result);
    }
}
