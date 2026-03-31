<?php

namespace Tests\Services\Files;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Files\Folder;
use HubspotSDK\Files\FolderActionResponse;
use HubspotSDK\Files\FolderUpdateTaskLocator;
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
        $client = new Client(accessToken: 'My Access Token', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testDeleteByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->folders->deleteByID('321669910225');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteByPath(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->folders->deleteByPath('folderPath');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGetByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->folders->getByID('321669910225');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Folder::class, $result);
    }

    #[Test]
    public function testGetByPath(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->folders->getByPath('folderPath');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Folder::class, $result);
    }

    #[Test]
    public function testGetUpdateAsyncStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->folders->getUpdateAsyncStatus('taskId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FolderActionResponse::class, $result);
    }

    #[Test]
    public function testSearch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->files->folders->search();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(Folder::class, $item);
        }
    }

    #[Test]
    public function testUpdateAsyncByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->folders->updateAsyncByID(id: 'id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FolderUpdateTaskLocator::class, $result);
    }

    #[Test]
    public function testUpdateAsyncByIDWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->folders->updateAsyncByID(
            id: 'id',
            name: 'name',
            parentFolderID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FolderUpdateTaskLocator::class, $result);
    }

    #[Test]
    public function testUpdateByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->folders->updateByID('321669910225');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Folder::class, $result);
    }
}
