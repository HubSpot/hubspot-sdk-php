<?php

namespace Tests\Services\Cms\Hubdb\Rows;

use HubspotSDK\Client;
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
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testCloneBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->cloneBatch(
            'tableIdOrName',
            ['inputs' => [['id' => 'id']]]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCloneBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->cloneBatch(
            'tableIdOrName',
            ['inputs' => [['id' => 'id', 'name' => 'name']]]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->createBatch(
            'tableIdOrName',
            [
                'inputs' => [
                    ['childTableId' => 0, 'displayIndex' => 0, 'values' => ['foo' => []]],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->createBatch(
            'tableIdOrName',
            [
                'inputs' => [
                    [
                        'childTableId' => 0,
                        'displayIndex' => 0,
                        'values' => ['foo' => []],
                        'name' => 'name',
                        'path' => 'path',
                    ],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->getBatch(
            'tableIdOrName',
            ['inputs' => ['string']]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->getBatch(
            'tableIdOrName',
            ['inputs' => ['string']]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetDraftBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->getDraftBatch(
            'tableIdOrName',
            ['inputs' => ['string']]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetDraftBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->getDraftBatch(
            'tableIdOrName',
            ['inputs' => ['string']]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testPurgeBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->purgeBatch(
            'tableIdOrName',
            ['inputs' => ['string']]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testPurgeBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->purgeBatch(
            'tableIdOrName',
            ['inputs' => ['string']]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testReplaceBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->replaceBatch(
            'tableIdOrName',
            [
                'inputs' => [
                    ['childTableId' => 0, 'displayIndex' => 0, 'values' => ['foo' => []]],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testReplaceBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->replaceBatch(
            'tableIdOrName',
            [
                'inputs' => [
                    [
                        'childTableId' => 0,
                        'displayIndex' => 0,
                        'values' => ['foo' => []],
                        'id' => 'id',
                        'name' => 'name',
                        'path' => 'path',
                    ],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->updateBatch(
            'tableIdOrName',
            [
                'inputs' => [
                    ['childTableId' => 0, 'displayIndex' => 0, 'values' => ['foo' => []]],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->updateBatch(
            'tableIdOrName',
            [
                'inputs' => [
                    [
                        'childTableId' => 0,
                        'displayIndex' => 0,
                        'values' => ['foo' => []],
                        'id' => 'id',
                        'name' => 'name',
                        'path' => 'path',
                    ],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
