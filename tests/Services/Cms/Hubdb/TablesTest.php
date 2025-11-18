<?php

namespace Tests\Services\Cms\Hubdb;

use HubspotSDK\Client;
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

        $result = $this->client->cms->hubdb->tables->create([
            'allowChildTables' => true,
            'allowPublicApiAccess' => true,
            'columns' => [
                [
                    'id' => 0,
                    'label' => 'label',
                    'name' => 'name',
                    'options' => [
                        ['hidden' => false, 'label' => 'Option A', 'value' => 'A'],
                    ],
                    'type' => 'NULL',
                ],
            ],
            'dynamicMetaTags' => ['foo' => 0],
            'enableChildTablePages' => true,
            'label' => 'label',
            'name' => 'name',
            'useForPages' => true,
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->create([
            'allowChildTables' => true,
            'allowPublicApiAccess' => true,
            'columns' => [
                [
                    'id' => 0,
                    'label' => 'label',
                    'name' => 'name',
                    'options' => [
                        [
                            'hidden' => false,
                            'label' => 'Option A',
                            'value' => 'A',
                            'description' => 'Choice number one',
                            'displayOrder' => 1,
                        ],
                    ],
                    'type' => 'NULL',
                    'foreignColumnId' => 0,
                    'foreignTableId' => 0,
                    'maxNumberOfCharacters' => 0,
                    'maxNumberOfOptions' => 0,
                ],
            ],
            'dynamicMetaTags' => ['foo' => 0],
            'enableChildTablePages' => true,
            'label' => 'label',
            'name' => 'name',
            'useForPages' => true,
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->list([]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->delete('tableIdOrName');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCloneDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->cloneDraft(
            'tableIdOrName',
            ['copyRows' => true, 'isHubspotDefined' => true]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCloneDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->cloneDraft(
            'tableIdOrName',
            ['copyRows' => true, 'isHubspotDefined' => true]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteVersion(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->deleteVersion(
            0,
            ['tableIdOrName' => 'tableIdOrName']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteVersionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->deleteVersion(
            0,
            ['tableIdOrName' => 'tableIdOrName']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testExport(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->export('tableIdOrName', []);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testExportDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->exportDraft(
            'tableIdOrName',
            []
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->get('tableIdOrName', []);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->getDraft('tableIdOrName', []);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testImportDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->importDraft(
            'tableIdOrName',
            []
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->listDraft([]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testPublishDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->publishDraft(
            'tableIdOrName',
            []
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testResetDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->resetDraft(
            'tableIdOrName',
            []
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUnpublish(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->unpublish('tableIdOrName', []);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->updateDraft(
            'tableIdOrName',
            [
                'allowChildTables' => true,
                'allowPublicApiAccess' => true,
                'columns' => [
                    [
                        'id' => 0,
                        'label' => 'label',
                        'name' => 'name',
                        'options' => [
                            ['hidden' => false, 'label' => 'Option A', 'value' => 'A'],
                        ],
                        'type' => 'NULL',
                    ],
                ],
                'dynamicMetaTags' => ['foo' => 0],
                'enableChildTablePages' => true,
                'label' => 'label',
                'name' => 'name',
                'useForPages' => true,
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->hubdb->tables->updateDraft(
            'tableIdOrName',
            [
                'allowChildTables' => true,
                'allowPublicApiAccess' => true,
                'columns' => [
                    [
                        'id' => 0,
                        'label' => 'label',
                        'name' => 'name',
                        'options' => [
                            [
                                'hidden' => false,
                                'label' => 'Option A',
                                'value' => 'A',
                                'description' => 'Choice number one',
                                'displayOrder' => 1,
                            ],
                        ],
                        'type' => 'NULL',
                        'foreignColumnId' => 0,
                        'foreignTableId' => 0,
                        'maxNumberOfCharacters' => 0,
                        'maxNumberOfOptions' => 0,
                    ],
                ],
                'dynamicMetaTags' => ['foo' => 0],
                'enableChildTablePages' => true,
                'label' => 'label',
                'name' => 'name',
                'useForPages' => true,
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
