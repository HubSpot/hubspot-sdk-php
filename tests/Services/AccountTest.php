<?php

namespace Tests\Services;

use HubspotSDK\Account\CollectionResponseAPIUsageNoPaging;
use HubspotSDK\Account\PortalInformationResponse;
use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AccountTest extends TestCase
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

        $result = $this->client->account->get();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PortalInformationResponse::class, $result);
    }

    #[Test]
    public function testGetDailyPrivateAppsUsage(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->account->getDailyPrivateAppsUsage();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CollectionResponseAPIUsageNoPaging::class, $result);
    }
}
