<?php

namespace Tests\Services\Auth;

use HubspotSDK\Auth\OAuth\AccessTokenInfoResponse;
use HubspotSDK\Auth\OAuth\RefreshTokenInfoResponse;
use HubspotSDK\Auth\OAuth\TokenResponseIf;
use HubspotSDK\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class OAuthTest extends TestCase
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
    public function testCreateAccessToken(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->auth->oauth->createAccessToken([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TokenResponseIf::class, $result);
    }

    #[Test]
    public function testDeleteRefreshToken(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->auth->oauth->deleteRefreshToken('token');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGetAccessToken(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->auth->oauth->getAccessToken('token');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AccessTokenInfoResponse::class, $result);
    }

    #[Test]
    public function testGetRefreshToken(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->auth->oauth->getRefreshToken('token');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RefreshTokenInfoResponse::class, $result);
    }
}
