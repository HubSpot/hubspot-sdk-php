<?php

namespace Tests\Services\Cms\Pages\LandingPages;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Pages\BatchResponseContentFolder;
use HubSpotSDK\Cms\Pages\ContentFolder;
use HubSpotSDK\Cms\Pages\ContentFolderVersion;
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
final class FoldersTest extends TestCase
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

        $result = $this->client->cms->pages->landingPages->folders->create(
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
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->folders->create(
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
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->folders->update(
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
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->folders->update(
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

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->cms->pages->landingPages->folders->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ContentFolder::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->folders->delete(
            'objectId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testBatchGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->folders->batchGet(
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseContentFolder::class, $result);
    }

    #[Test]
    public function testBatchGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->folders->batchGet(
            inputs: ['string'],
            archived: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseContentFolder::class, $result);
    }

    #[Test]
    public function testCreateFolders(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->folders->createFolders(
            inputs: [
                [
                    'id' => 'id',
                    'category' => 0,
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'deletedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'name' => 'name',
                    'parentFolderID' => 0,
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseContentFolder::class, $result);
    }

    #[Test]
    public function testCreateFoldersWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->folders->createFolders(
            inputs: [
                [
                    'id' => 'id',
                    'category' => 0,
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'deletedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'name' => 'name',
                    'parentFolderID' => 0,
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseContentFolder::class, $result);
    }

    #[Test]
    public function testDeleteFolders(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->folders->deleteFolders(
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteFoldersWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->folders->deleteFolders(
            inputs: ['string']
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

        $result = $this->client->cms->pages->landingPages->folders->get('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }

    #[Test]
    public function testGetRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->folders->getRevision(
            'revisionId',
            objectID: 'objectId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolderVersion::class, $result);
    }

    #[Test]
    public function testGetRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->folders->getRevision(
            'revisionId',
            objectID: 'objectId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolderVersion::class, $result);
    }

    #[Test]
    public function testListRevisions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->cms->pages->landingPages->folders->listRevisions(
            'objectId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ContentFolderVersion::class, $item);
        }
    }

    #[Test]
    public function testRestoreRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->folders->restoreRevision(
            'revisionId',
            objectID: 'objectId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }

    #[Test]
    public function testRestoreRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->folders->restoreRevision(
            'revisionId',
            objectID: 'objectId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ContentFolder::class, $result);
    }

    #[Test]
    public function testUpdateFolders(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->folders->updateFolders(
            inputs: [(object) []]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseContentFolder::class, $result);
    }

    #[Test]
    public function testUpdateFoldersWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->pages->landingPages->folders->updateFolders(
            inputs: [(object) []],
            archived: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseContentFolder::class, $result);
    }
}
