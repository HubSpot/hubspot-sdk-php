<?php

namespace Tests\Services\Cms;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\AuditLogs\PublicAuditLog;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AuditLogsTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->cms->auditLogs->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(PublicAuditLog::class, $item);
        }
    }

    #[Test]
    public function testExport(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->auditLogs->export(
            email: 'email',
            format: 'CSV',
            portalID: 0,
            recipientUserIDs: [0],
            shouldMarkExportFileAsSensitive: true,
            type: 'type',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testExportWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->auditLogs->export(
            email: 'email',
            format: 'CSV',
            portalID: 0,
            recipientUserIDs: [0],
            shouldMarkExportFileAsSensitive: true,
            type: 'type',
            filters: ['objectType' => ['string']],
            partition: 0,
            userID: 0,
            userTimeZone: 'userTimeZone',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
