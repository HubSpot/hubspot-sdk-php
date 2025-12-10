<?php

namespace Tests\Services\Cms\Hubdb;

use HubspotSDK\Client;
use HubspotSDK\Cms\Hubdb\HubDBTableRowV3;
use HubspotSDK\Page;
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

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->create(
            'tableIdOrName',
            childTableID: 0,
            displayIndex: 0,
            values: ['foo' => []]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->create(
            'tableIdOrName',
            childTableID: 0,
            displayIndex: 0,
            values: ['foo' => []],
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
            $this->markTestSkipped('Prism tests are disabled');
        }

        $page = $this->client->cms->hubdb->rows->list('tableIdOrName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertTrue($item);
        }
    }

    #[Test]
    public function testCloneDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
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
            $this->markTestSkipped('Prism tests are disabled');
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
    public function testDeleteDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
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
            $this->markTestSkipped('Prism tests are disabled');
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
            $this->markTestSkipped('Prism tests are disabled');
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
            $this->markTestSkipped('Prism tests are disabled');
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
    public function testGetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
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
            $this->markTestSkipped('Prism tests are disabled');
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
    public function testListDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $page = $this->client->cms->hubdb->rows->listDraft('tableIdOrName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertTrue($item);
        }
    }

    #[Test]
    public function testReplaceDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->replaceDraft(
            '321669910225',
            tableIDOrName: 'tableIdOrName',
            childTableID: 0,
            displayIndex: 0,
            values: ['foo' => []],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testReplaceDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->replaceDraft(
            '321669910225',
            tableIDOrName: 'tableIdOrName',
            childTableID: 0,
            displayIndex: 0,
            values: ['foo' => []],
            name: 'name',
            path: 'path',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testUpdateDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->updateDraft(
            '321669910225',
            tableIDOrName: 'tableIdOrName',
            childTableID: 0,
            displayIndex: 0,
            values: ['foo' => []],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }

    #[Test]
    public function testUpdateDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->rows->updateDraft(
            '321669910225',
            tableIDOrName: 'tableIdOrName',
            childTableID: 0,
            displayIndex: 0,
            values: ['foo' => []],
            name: 'name',
            path: 'path',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableRowV3::class, $result);
    }
}
