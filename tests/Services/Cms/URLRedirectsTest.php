<?php

namespace Tests\Services\Cms;

use HubspotSDK\Client;
use HubspotSDK\Cms\URLRedirects\URLMapping;
use HubspotSDK\Page;
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
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->urlRedirects->create([
            'destination' => 'destination',
            'redirectStyle' => 0,
            'routePrefix' => 'routePrefix',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(URLMapping::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->urlRedirects->create([
            'destination' => 'destination',
            'redirectStyle' => 0,
            'routePrefix' => 'routePrefix',
            'isMatchFullURL' => true,
            'isMatchQueryString' => true,
            'isOnlyAfterNotFound' => true,
            'isPattern' => true,
            'isProtocolAgnostic' => true,
            'isTrailingSlashOptional' => true,
            'precedence' => 0,
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(URLMapping::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->urlRedirects->update(
            'urlRedirectId',
            [
                'id' => 'id',
                'destination' => 'destination',
                'isMatchFullURL' => true,
                'isMatchQueryString' => true,
                'isOnlyAfterNotFound' => true,
                'isPattern' => true,
                'isProtocolAgnostic' => true,
                'isTrailingSlashOptional' => true,
                'precedence' => 0,
                'redirectStyle' => 0,
                'routePrefix' => 'routePrefix',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(URLMapping::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->urlRedirects->update(
            'urlRedirectId',
            [
                'id' => 'id',
                'destination' => 'destination',
                'isMatchFullURL' => true,
                'isMatchQueryString' => true,
                'isOnlyAfterNotFound' => true,
                'isPattern' => true,
                'isProtocolAgnostic' => true,
                'isTrailingSlashOptional' => true,
                'precedence' => 0,
                'redirectStyle' => 0,
                'routePrefix' => 'routePrefix',
                'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(URLMapping::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->urlRedirects->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->urlRedirects->delete('urlRedirectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->urlRedirects->get('urlRedirectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(URLMapping::class, $result);
    }
}
