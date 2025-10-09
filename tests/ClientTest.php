<?php

namespace Tests;

use HubspotSDK\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
#[CoversNothing]
final class ClientTest extends TestCase
{
    #[Test]
    public function testMultipleAuthSchemesError(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('You provided multiple authentication methods (accessToken, developerAPIKey)');

        new Client(accessToken: 'token', developerAPIKey: 'key');
    }
}
