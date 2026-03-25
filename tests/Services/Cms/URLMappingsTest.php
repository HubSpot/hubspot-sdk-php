<?php

namespace Tests\Services\Cms;

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
final class URLMappingsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->urlMappings->create(
            id: 'id',
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            destination: 'destination',
            isMatchFullURL: true,
            isMatchQueryString: true,
            isOnlyAfterNotFound: true,
            isPattern: true,
            isProtocolAgnostic: true,
            isTrailingSlashOptional: true,
            precedence: 0,
            redirectStyle: 0,
            routePrefix: 'routePrefix',
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
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
            id: 'id',
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            destination: 'destination',
            isMatchFullURL: true,
            isMatchQueryString: true,
            isOnlyAfterNotFound: true,
            isPattern: true,
            isProtocolAgnostic: true,
            isTrailingSlashOptional: true,
            precedence: 0,
            redirectStyle: 0,
            routePrefix: 'routePrefix',
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
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
