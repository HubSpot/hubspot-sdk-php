<?php

namespace Tests\Services\Automation\Actions;

use HubspotSDK\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class RevisionsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->revisions->list(
            'definitionId',
            appID: 0
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->revisions->list(
            'definitionId',
            appID: 0
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRead(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->revisions->read(
            'revisionId',
            appID: 0,
            definitionID: 'definitionId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testReadWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->revisions->read(
            'revisionId',
            appID: 0,
            definitionID: 'definitionId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
