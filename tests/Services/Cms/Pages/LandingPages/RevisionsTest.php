<?php

namespace Tests\Services\Cms\Pages\LandingPages;

use HubSpotSDK\Client;
use HubSpotSDK\Cms\Pages\PagesPage;
use HubSpotSDK\Cms\Pages\PageVersion;
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
final class RevisionsTest extends TestCase
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
    public function testGetLandingPageRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->pages
            ->landingPages
            ->revisions
            ->getLandingPageRevision('revisionId', objectID: 'objectId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PageVersion::class, $result);
    }

    #[Test]
    public function testGetLandingPageRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->pages
            ->landingPages
            ->revisions
            ->getLandingPageRevision('revisionId', objectID: 'objectId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PageVersion::class, $result);
    }

    #[Test]
    public function testListLandingPageRevisions(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this
            ->client
            ->cms
            ->pages
            ->landingPages
            ->revisions
            ->listLandingPageRevisions('objectId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(PageVersion::class, $item);
        }
    }

    #[Test]
    public function testRestoreLandingPageRevision(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->pages
            ->landingPages
            ->revisions
            ->restoreLandingPageRevision('revisionId', objectID: 'objectId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PagesPage::class, $result);
    }

    #[Test]
    public function testRestoreLandingPageRevisionWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->pages
            ->landingPages
            ->revisions
            ->restoreLandingPageRevision('revisionId', objectID: 'objectId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PagesPage::class, $result);
    }

    #[Test]
    public function testRestoreLandingPageRevisionToDraft(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->pages
            ->landingPages
            ->revisions
            ->restoreLandingPageRevisionToDraft(0, objectID: 'objectId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PagesPage::class, $result);
    }

    #[Test]
    public function testRestoreLandingPageRevisionToDraftWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->pages
            ->landingPages
            ->revisions
            ->restoreLandingPageRevisionToDraft(0, objectID: 'objectId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PagesPage::class, $result);
    }
}
