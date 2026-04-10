<?php

namespace Tests\Services\Files;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Files\File;
use HubSpotSDK\Files\FileActionResponse;
use HubSpotSDK\Files\FileStat;
use HubSpotSDK\Files\Folder;
use HubSpotSDK\Files\ImportFromURLTaskLocator;
use HubSpotSDK\Files\SignedURL;
use HubSpotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FileAssetsTest extends TestCase
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

        $result = $this->client->files->fileAssets->create(name: 'name');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Folder::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->fileAssets->create(
            name: 'name',
            parentFolderID: 'parentFolderId',
            parentPath: 'parentPath'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Folder::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->fileAssets->update(
            '321669910225',
            clearExpires: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(File::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->fileAssets->update(
            '321669910225',
            clearExpires: true,
            access: 'HIDDEN_INDEXABLE',
            expiresAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            isUsableInContent: true,
            name: 'name',
            parentFolderID: 'parentFolderId',
            parentFolderPath: 'parentFolderPath',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(File::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->fileAssets->delete('321669910225');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGdprDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->fileAssets->gdprDelete('321669910225');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->fileAssets->get('321669910225');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(File::class, $result);
    }

    #[Test]
    public function testGetByPath(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->fileAssets->getByPath('path');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FileStat::class, $result);
    }

    #[Test]
    public function testGetImportTaskStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->fileAssets->getImportTaskStatus('taskId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FileActionResponse::class, $result);
    }

    #[Test]
    public function testGetSignedURL(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->fileAssets->getSignedURL('321669910225');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SignedURL::class, $result);
    }

    #[Test]
    public function testImportFromURLAsync(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->fileAssets->importFromURLAsync(
            access: 'HIDDEN_INDEXABLE',
            duplicateValidationScope: 'ENTIRE_PORTAL',
            duplicateValidationStrategy: 'NONE',
            overwrite: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ImportFromURLTaskLocator::class, $result);
    }

    #[Test]
    public function testImportFromURLAsyncWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->fileAssets->importFromURLAsync(
            access: 'HIDDEN_INDEXABLE',
            duplicateValidationScope: 'ENTIRE_PORTAL',
            duplicateValidationStrategy: 'NONE',
            overwrite: true,
            expiresAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            folderID: 'folderId',
            folderPath: 'folderPath',
            name: 'name',
            ttl: 'ttl',
            url: 'url',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ImportFromURLTaskLocator::class, $result);
    }

    #[Test]
    public function testReplace(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->fileAssets->replace('321669910225');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(File::class, $result);
    }

    #[Test]
    public function testSearch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->files->fileAssets->search();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(File::class, $item);
        }
    }

    #[Test]
    public function testUpload(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->fileAssets->upload();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(File::class, $result);
    }
}
