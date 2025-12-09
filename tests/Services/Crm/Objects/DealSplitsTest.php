<?php

namespace Tests\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Crm\Objects\DealSplits\BatchResponseDealToDealSplits;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class DealSplitsTest extends TestCase
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
    public function testBatchRead(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->dealSplits->batchRead(
            inputs: [['id' => '37295']]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseDealToDealSplits::class, $result);
    }

    #[Test]
    public function testBatchReadWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->dealSplits->batchRead(
            inputs: [['id' => '37295']]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseDealToDealSplits::class, $result);
    }

    #[Test]
    public function testBatchUpsert(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->dealSplits->batchUpsert(
            inputs: [['id' => 0, 'splits' => [['ownerID' => 0, 'percentage' => 0]]]]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseDealToDealSplits::class, $result);
    }

    #[Test]
    public function testBatchUpsertWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->dealSplits->batchUpsert(
            inputs: [['id' => 0, 'splits' => [['ownerID' => 0, 'percentage' => 0]]]]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseDealToDealSplits::class, $result);
    }
}
