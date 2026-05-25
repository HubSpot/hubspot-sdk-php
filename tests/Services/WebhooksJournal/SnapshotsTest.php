<?php

namespace Tests\Services\WebhooksJournal;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\CrmObjectSnapshotBatchResponse;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SnapshotsTest extends TestCase
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

        $result = $this->client->webhooksJournal->snapshots->create(
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
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webhooksJournal->snapshots->create(
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
}
