<?php

namespace Tests\Services\Cms;

use HubSpotSDK\ActionResponse;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\TaskLocator;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SourceCodeTest extends TestCase
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
    public function testExtractAsync(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->sourceCode->extractAsync(path: 'path');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TaskLocator::class, $result);
    }

    #[Test]
    public function testExtractAsyncWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->sourceCode->extractAsync(path: 'path');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TaskLocator::class, $result);
    }

    #[Test]
    public function testGetExtractionStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->sourceCode->getExtractionStatus(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionResponse::class, $result);
    }
}
