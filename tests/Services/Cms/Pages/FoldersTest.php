<?php

namespace Tests\Services\Cms\Pages;

use HubspotSDK\Client;
use HubspotSDK\Cms\Pages\BatchResponseContentFolder;
use HubspotSDK\Cms\Pages\ContentFolder;
use HubspotSDK\Cms\Pages\ContentFolderVersion;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FoldersTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx',
            baseUrl: $testUrl,
        );

        $this->client = $client;
    }

    #[Test]
    public function testCreateFolder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->folders->createFolder(
            id: 'id',
            category: 0,
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            deletedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            name: 'name',
            parentFolderID: 0,
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }

    #[Test]
    public function testCreateFolderWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->folders->createFolder(
            id: 'id',
            category: 0,
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            deletedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            name: 'name',
            parentFolderID: 0,
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }

    #[Test]
    public function testDeleteFolder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->folders->deleteFolder('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGetFolder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->folders->getFolder('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }

    #[Test]
    public function testGetFolderRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->folders->getFolderRevision(
            'revisionId',
            objectID: 'objectId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolderVersion::class, $result);
    }

    #[Test]
    public function testGetFolderRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->folders->getFolderRevision(
            'revisionId',
            objectID: 'objectId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolderVersion::class, $result);
    }

    #[Test]
    public function testGetFoldersBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->folders->getFoldersBatch(
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseContentFolder::class, $result);
    }

    #[Test]
    public function testGetFoldersBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->folders->getFoldersBatch(
            inputs: ['string'],
            archived: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseContentFolder::class, $result);
    }

    #[Test]
    public function testListFolderRevisions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->cms->pages->folders->listFolderRevisions('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ContentFolderVersion::class, $item);
        }
    }

    #[Test]
    public function testListFolders(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->cms->pages->folders->listFolders();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ContentFolder::class, $item);
        }
    }

    #[Test]
    public function testRestoreFolderRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->folders->restoreFolderRevision(
            'revisionId',
            objectID: 'objectId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }

    #[Test]
    public function testRestoreFolderRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->folders->restoreFolderRevision(
            'revisionId',
            objectID: 'objectId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }

    #[Test]
    public function testUpdateFolder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->folders->updateFolder(
            'objectId',
            id: 'id',
            category: 0,
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            deletedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            name: 'name',
            parentFolderID: 0,
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }

    #[Test]
    public function testUpdateFolderWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->folders->updateFolder(
            'objectId',
            id: 'id',
            category: 0,
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            deletedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            name: 'name',
            parentFolderID: 0,
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            archived: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }
}
