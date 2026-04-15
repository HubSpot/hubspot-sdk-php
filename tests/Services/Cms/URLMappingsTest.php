<?php

namespace Tests\Services\Cms;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class URLMappingsTest extends TestCase
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

        $result = $this->client->cms->urlMappings->create(
            id: 0,
            cdnPurgeEmbargoTime: 0,
            contentGroupID: 0,
            cosObjectType: 'ACCESS_GROUP_MEMBERSHIP',
            created: 0,
            createdByID: 0,
            deletedAt: 0,
            destination: 'destination',
            internallyCreated: true,
            isActive: true,
            isMatchFullURL: true,
            isMatchQueryString: true,
            isOnlyAfterNotFound: true,
            isPattern: true,
            isProtocolAgnostic: true,
            isRegex: true,
            isTrailingSlashOptional: true,
            label: 'label',
            lastUsedAt: 0,
            name: 'name',
            note: 'note',
            portalID: 0,
            precedence: 0,
            redirectStyle: 0,
            routePrefix: 'routePrefix',
            updated: 0,
            updatedByID: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->urlMappings->create(
            id: 0,
            cdnPurgeEmbargoTime: 0,
            contentGroupID: 0,
            cosObjectType: 'ACCESS_GROUP_MEMBERSHIP',
            created: 0,
            createdByID: 0,
            deletedAt: 0,
            destination: 'destination',
            internallyCreated: true,
            isActive: true,
            isMatchFullURL: true,
            isMatchQueryString: true,
            isOnlyAfterNotFound: true,
            isPattern: true,
            isProtocolAgnostic: true,
            isRegex: true,
            isTrailingSlashOptional: true,
            label: 'label',
            lastUsedAt: 0,
            name: 'name',
            note: 'note',
            portalID: 0,
            precedence: 0,
            redirectStyle: 0,
            routePrefix: 'routePrefix',
            updated: 0,
            updatedByID: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->urlMappings->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->urlMappings->delete(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->urlMappings->get(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }
}
