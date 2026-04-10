<?php

namespace Tests\Services\Conversations;

use HubSpotSDK\Client;
use HubSpotSDK\Conversations\VisitorIdentification\IdentificationTokenResponse;
use HubSpotSDK\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class VisitorIdentificationTest extends TestCase
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
    public function testGenerateToken(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->conversations
            ->visitorIdentification
            ->generateToken(email: 'email')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IdentificationTokenResponse::class, $result);
    }

    #[Test]
    public function testGenerateTokenWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->conversations
            ->visitorIdentification
            ->generateToken(
                email: 'email',
                firstName: 'firstName',
                lastName: 'lastName'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IdentificationTokenResponse::class, $result);
    }
}
