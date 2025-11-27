<?php

namespace Tests\Services\Conversations;

use HubspotSDK\Client;
use HubspotSDK\Conversations\VisitorIdentification\IdentificationTokenResponse;
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

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testGenerateToken(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->conversations
            ->visitorIdentification
            ->generateToken(['email' => 'visitor-email@example.com'])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IdentificationTokenResponse::class, $result);
    }

    #[Test]
    public function testGenerateTokenWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->conversations
            ->visitorIdentification
            ->generateToken([
                'email' => 'visitor-email@example.com',
                'firstName' => 'Gob',
                'lastName' => 'Bluth',
            ])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IdentificationTokenResponse::class, $result);
    }
}
