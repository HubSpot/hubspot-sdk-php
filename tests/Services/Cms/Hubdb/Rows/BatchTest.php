<?php

namespace Tests\Services\Cms\Hubdb\Rows;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class BatchTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            STAINLESS_FIXME_accessToken: 'pat-123123',
            baseUrl: $testUrl
        );

        $this->client = $client;
    }

    #[Test]
    public function testReplace(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->replace(
            'tableIdOrName',
            [
                HubDBTableRowV3BatchUpdateRequest::with(
                    id: 'id',
                    values: ['foo' => (object) []]
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testReplaceWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->replace(
            'tableIdOrName',
            [
                HubDBTableRowV3BatchUpdateRequest::with(
                    id: 'id',
                    values: ['foo' => (object) []]
                )
                    ->withChildTableID(0)
                    ->withDisplayIndex(0)
                    ->withName('name')
                    ->withPath('path'),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
