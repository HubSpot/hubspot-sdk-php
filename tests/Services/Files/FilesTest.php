<?php

namespace Tests\Services\Files;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Files\File;
use HubspotSDK\Files\FileActionResponse;
use HubspotSDK\Files\ImportFromURLTaskLocator;
use HubspotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FilesTest extends TestCase
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
    public function testGetImportTaskStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->files->getImportTaskStatus('taskId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FileActionResponse::class, $result);
    }

    #[Test]
    public function testImportFromURLAsync(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->files->files->importFromURLAsync(
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

        $result = $this->client->files->files->importFromURLAsync(
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
    public function testSearch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->files->files->search();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(File::class, $item);
        }
    }
}
