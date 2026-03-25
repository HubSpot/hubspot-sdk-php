<?php

namespace Tests\Services\Cms\Blogs\Settings;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Settings\Blog;
use HubspotSDK\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class MultiLanguageTest extends TestCase
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
    public function testAttachToLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->blogs
            ->settings
            ->multiLanguage
            ->attachToLangGroup(id: 'id', language: 'aa', primaryID: 'primaryId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testAttachToLangGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->blogs
            ->settings
            ->multiLanguage
            ->attachToLangGroup(
                id: 'id',
                language: 'aa',
                primaryID: 'primaryId',
                primaryLanguage: 'aa'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testCreateLanguageVariation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->blogs
            ->settings
            ->multiLanguage
            ->createLanguageVariation(id: 'id')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Blog::class, $result);
    }

    #[Test]
    public function testCreateLanguageVariationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->blogs
            ->settings
            ->multiLanguage
            ->createLanguageVariation(
                id: 'id',
                language: 'language',
                primaryLanguage: 'primaryLanguage',
                slug: 'slug',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Blog::class, $result);
    }

    #[Test]
    public function testDetachFromLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->blogs
            ->settings
            ->multiLanguage
            ->detachFromLangGroup(id: 'id')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testDetachFromLangGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->blogs
            ->settings
            ->multiLanguage
            ->detachFromLangGroup(id: 'id')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testSetNewLangPrimary(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->blogs
            ->settings
            ->multiLanguage
            ->setNewLangPrimary(id: 'id')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSetNewLangPrimaryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->blogs
            ->settings
            ->multiLanguage
            ->setNewLangPrimary(id: 'id')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateLanguages(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->blogs
            ->settings
            ->multiLanguage
            ->updateLanguages(languages: ['foo' => 'aa'], primaryID: 'primaryId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testUpdateLanguagesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->cms
            ->blogs
            ->settings
            ->multiLanguage
            ->updateLanguages(languages: ['foo' => 'aa'], primaryID: 'primaryId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }
}
