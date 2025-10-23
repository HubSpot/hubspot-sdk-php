<?php

namespace Tests\Services\Cms\Hubdb\Rows;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\HubDBTableRowBatchCloneRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3BatchUpdateRequest;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3Request;
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
            accessToken: 'pat-na1-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
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
            [HubDBTableRowBatchCloneRequest::with(id: 'id')]
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
            [HubDBTableRowBatchCloneRequest::with(id: 'id')->withName('name')],
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
            [HubDBTableRowV3Request::with(values: ['foo' => (object) []])],
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
                HubDBTableRowV3Request::with(values: ['foo' => (object) []])
                    ->withChildTableID(0)
                    ->withDisplayIndex(0)
                    ->withName('name')
                    ->withPath('path'),
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
            ['string']
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
            ['string']
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
            ['string']
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
            ['string']
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
            ['string']
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
            ['string']
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
                HubDBTableRowV3BatchUpdateRequest::with(
                    id: 'id',
                    values: ['foo' => (object) []]
                ),
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

    #[Test]
    public function testUpdateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->updateBatch(
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
    public function testUpdateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->batch->updateBatch(
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
