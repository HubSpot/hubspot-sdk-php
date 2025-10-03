<?php

namespace Tests\Services\Cms;

use HubspotSDK\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class URLRedirectsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(accessToken: 'pat-123123', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->urlRedirects->create(
            destination: 'destination',
            redirectStyle: 0,
            routePrefix: 'routePrefix'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->urlRedirects->create(
            destination: 'destination',
            redirectStyle: 0,
            routePrefix: 'routePrefix'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->urlRedirects->update(
            'urlRedirectId',
            id: 'id',
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
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->urlRedirects->update(
            'urlRedirectId',
            id: 'id',
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
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->urlRedirects->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->urlRedirects->delete('urlRedirectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRead(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->urlRedirects->read('urlRedirectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
