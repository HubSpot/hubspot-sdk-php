<?php

namespace Tests\Services\Cms\Hubdb;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Hubdb\HubDBTableV3;
use HubSpotSDK\Cms\Hubdb\ImportResult;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TablesTest extends TestCase
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

        $result = $this->client->cms->hubdb->tables->create(
            allowChildTables: true,
            allowPublicAPIAccess: true,
            columns: [
                [
                    'id' => 0,
                    'label' => 'label',
                    'name' => 'name',
                    'options' => [
                        [
                            'id' => 'id',
                            'createdAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'label' => 'label',
                            'name' => 'name',
                            'order' => 0,
                            'type' => 'type',
                            'updatedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        ],
                    ],
                    'type' => 'BOOLEAN',
                ],
            ],
            dynamicMetaTags: ['foo' => 0],
            enableChildTablePages: true,
            label: 'label',
            name: 'name',
            useForPages: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableV3::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->create(
            allowChildTables: true,
            allowPublicAPIAccess: true,
            columns: [
                [
                    'id' => 0,
                    'label' => 'label',
                    'name' => 'name',
                    'options' => [
                        [
                            'id' => 'id',
                            'createdAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'label' => 'label',
                            'name' => 'name',
                            'order' => 0,
                            'type' => 'type',
                            'updatedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'createdBy' => [
                                'id' => 'id',
                                'email' => 'email',
                                'firstName' => 'firstName',
                                'lastName' => 'lastName',
                            ],
                            'createdByUserID' => 0,
                            'updatedBy' => [
                                'id' => 'id',
                                'email' => 'email',
                                'firstName' => 'firstName',
                                'lastName' => 'lastName',
                            ],
                            'updatedByUserID' => 0,
                        ],
                    ],
                    'type' => 'BOOLEAN',
                    'foreignColumnID' => 0,
                    'foreignTableID' => 0,
                    'maxNumberOfCharacters' => 0,
                    'maxNumberOfOptions' => 0,
                ],
            ],
            dynamicMetaTags: ['foo' => 0],
            enableChildTablePages: true,
            label: 'label',
            name: 'name',
            useForPages: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableV3::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->cms->hubdb->tables->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(HubDBTableV3::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->delete('tableIdOrName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCloneDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->cloneDraft(
            'tableIdOrName',
            copyRows: true,
            isHubSpotDefined: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableV3::class, $result);
    }

    #[Test]
    public function testCloneDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->cloneDraft(
            'tableIdOrName',
            copyRows: true,
            isHubSpotDefined: true,
            newLabel: 'newLabel',
            newName: 'newName',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableV3::class, $result);
    }

    #[Test]
    public function testDeleteVersion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->deleteVersion(
            0,
            tableIDOrName: 'tableIdOrName'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteVersionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->deleteVersion(
            0,
            tableIDOrName: 'tableIdOrName'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testExport(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->export('tableIdOrName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testExportDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->exportDraft('tableIdOrName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->get('tableIdOrName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableV3::class, $result);
    }

    #[Test]
    public function testGetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->getDraft('tableIdOrName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableV3::class, $result);
    }

    #[Test]
    public function testImportDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->importDraft('tableIdOrName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ImportResult::class, $result);
    }

    #[Test]
    public function testListDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->cms->hubdb->tables->listDraft();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(HubDBTableV3::class, $item);
        }
    }

    #[Test]
    public function testPublishDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->publishDraft('tableIdOrName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableV3::class, $result);
    }

    #[Test]
    public function testResetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->resetDraft('tableIdOrName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableV3::class, $result);
    }

    #[Test]
    public function testUnpublish(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->unpublish('tableIdOrName');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableV3::class, $result);
    }

    #[Test]
    public function testUpdateDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->updateDraft(
            'tableIdOrName',
            allowChildTables: true,
            allowPublicAPIAccess: true,
            columns: [
                [
                    'id' => 0,
                    'label' => 'label',
                    'name' => 'name',
                    'options' => [
                        [
                            'id' => 'id',
                            'createdAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'label' => 'label',
                            'name' => 'name',
                            'order' => 0,
                            'type' => 'type',
                            'updatedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                        ],
                    ],
                    'type' => 'BOOLEAN',
                ],
            ],
            dynamicMetaTags: ['foo' => 0],
            enableChildTablePages: true,
            label: 'label',
            name: 'name',
            useForPages: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableV3::class, $result);
    }

    #[Test]
    public function testUpdateDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->updateDraft(
            'tableIdOrName',
            allowChildTables: true,
            allowPublicAPIAccess: true,
            columns: [
                [
                    'id' => 0,
                    'label' => 'label',
                    'name' => 'name',
                    'options' => [
                        [
                            'id' => 'id',
                            'createdAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'label' => 'label',
                            'name' => 'name',
                            'order' => 0,
                            'type' => 'type',
                            'updatedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                            'createdBy' => [
                                'id' => 'id',
                                'email' => 'email',
                                'firstName' => 'firstName',
                                'lastName' => 'lastName',
                            ],
                            'createdByUserID' => 0,
                            'updatedBy' => [
                                'id' => 'id',
                                'email' => 'email',
                                'firstName' => 'firstName',
                                'lastName' => 'lastName',
                            ],
                            'updatedByUserID' => 0,
                        ],
                    ],
                    'type' => 'BOOLEAN',
                    'foreignColumnID' => 0,
                    'foreignTableID' => 0,
                    'maxNumberOfCharacters' => 0,
                    'maxNumberOfOptions' => 0,
                ],
            ],
            dynamicMetaTags: ['foo' => 0],
            enableChildTablePages: true,
            label: 'label',
            name: 'name',
            useForPages: true,
            archived: true,
            includeForeignIDs: true,
            isGetLocalizedSchema: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(HubDBTableV3::class, $result);
    }
}
