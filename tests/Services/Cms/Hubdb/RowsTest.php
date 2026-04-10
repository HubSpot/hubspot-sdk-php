<?php

namespace Tests\Services\Cms\Hubdb;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Hubdb\BatchResponseHubDBTableRowV3;
use HubSpotSDK\Cms\Hubdb\HubDBTableRowV3;
use HubSpotSDK\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class RowsTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->create(
            'tableIdOrName',
            childTableID: 0,
            displayIndex: 0,
            values: ['foo' => (object) []],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->create(
            'tableIdOrName',
            childTableID: 0,
            displayIndex: 0,
            values: ['foo' => (object) []],
            name: 'name',
            path: 'path',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->list('tableIdOrName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNotNull($result);
    }

    #[Test]
    public function testCloneBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->cloneBatch(
            'tableIdOrName',
            inputs: [['id' => 'id']]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseHubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testCloneBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->cloneBatch(
            'tableIdOrName',
            inputs: [['id' => 'id', 'name' => 'name']]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseHubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testCloneDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->cloneDraft(
            '321669910225',
            tableIDOrName: 'tableIdOrName'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testCloneDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->cloneDraft(
            '321669910225',
            tableIDOrName: 'tableIdOrName',
            name: 'name'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testCreateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->createBatch(
            'tableIdOrName',
            inputs: [
                [
                    'childTableID' => 0,
                    'displayIndex' => 0,
                    'values' => ['foo' => (object) []],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseHubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testCreateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->createBatch(
            'tableIdOrName',
            inputs: [
                [
                    'childTableID' => 0,
                    'displayIndex' => 0,
                    'values' => ['foo' => (object) []],
                    'name' => 'name',
                    'path' => 'path',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseHubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testDeleteDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->deleteDraft(
            '321669910225',
            tableIDOrName: 'tableIdOrName'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->deleteDraft(
            '321669910225',
            tableIDOrName: 'tableIdOrName'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->get(
            '321669910225',
            tableIDOrName: 'tableIdOrName'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->get(
            '321669910225',
            tableIDOrName: 'tableIdOrName',
            archived: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testGetBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->getBatch(
            'tableIdOrName',
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseHubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testGetBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->getBatch(
            'tableIdOrName',
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseHubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testGetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->getDraft(
            '321669910225',
            tableIDOrName: 'tableIdOrName'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testGetDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->getDraft(
            '321669910225',
            tableIDOrName: 'tableIdOrName',
            archived: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testGetDraftBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->getDraftBatch(
            'tableIdOrName',
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseHubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testGetDraftBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->getDraftBatch(
            'tableIdOrName',
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseHubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testPurgeBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->purgeBatch(
            'tableIdOrName',
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testPurgeBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->purgeBatch(
            'tableIdOrName',
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testReplaceBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->replaceBatch(
            'tableIdOrName',
            inputs: [
                [
                    'childTableID' => 0,
                    'displayIndex' => 0,
                    'values' => ['foo' => (object) []],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseHubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testReplaceBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->replaceBatch(
            'tableIdOrName',
            inputs: [
                [
                    'childTableID' => 0,
                    'displayIndex' => 0,
                    'values' => ['foo' => (object) []],
                    'id' => 'id',
                    'name' => 'name',
                    'path' => 'path',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseHubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testReplaceDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->replaceDraft(
            '321669910225',
            tableIDOrName: 'tableIdOrName',
            childTableID: 0,
            displayIndex: 0,
            values: ['foo' => (object) []],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testReplaceDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->replaceDraft(
            '321669910225',
            tableIDOrName: 'tableIdOrName',
            childTableID: 0,
            displayIndex: 0,
            values: ['foo' => (object) []],
            name: 'name',
            path: 'path',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testUpdateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->updateBatch(
            'tableIdOrName',
            inputs: [
                [
                    'childTableID' => 0,
                    'displayIndex' => 0,
                    'values' => ['foo' => (object) []],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseHubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testUpdateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->updateBatch(
            'tableIdOrName',
            inputs: [
                [
                    'childTableID' => 0,
                    'displayIndex' => 0,
                    'values' => ['foo' => (object) []],
                    'id' => 'id',
                    'name' => 'name',
                    'path' => 'path',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseHubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testUpdateDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->updateDraft(
            '321669910225',
            tableIDOrName: 'tableIdOrName',
            childTableID: 0,
            displayIndex: 0,
            values: ['foo' => (object) []],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testUpdateDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->updateDraft(
            '321669910225',
            tableIDOrName: 'tableIdOrName',
            childTableID: 0,
            displayIndex: 0,
            values: ['foo' => (object) []],
            name: 'name',
            path: 'path',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }
}
