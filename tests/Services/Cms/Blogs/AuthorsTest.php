<?php

namespace Tests\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AuthorsTest extends TestCase
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

        $result = $this->client->cms->blogs->authors->create(
            id: 'id',
            avatar: 'avatar',
            bio: 'bio',
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            deletedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            displayName: 'displayName',
            email: 'email',
            facebook: 'facebook',
            fullName: 'fullName',
            language: 'aa',
            linkedin: 'linkedin',
            name: 'name',
            slug: 'slug',
            translatedFromID: 0,
            twitter: 'twitter',
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            website: 'website',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->create(
            id: 'id',
            avatar: 'avatar',
            bio: 'bio',
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            deletedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            displayName: 'displayName',
            email: 'email',
            facebook: 'facebook',
            fullName: 'fullName',
            language: 'aa',
            linkedin: 'linkedin',
            name: 'name',
            slug: 'slug',
            translatedFromID: 0,
            twitter: 'twitter',
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            website: 'website',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->update(
            'objectId',
            id: 'id',
            avatar: 'avatar',
            bio: 'bio',
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            deletedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            displayName: 'displayName',
            email: 'email',
            facebook: 'facebook',
            fullName: 'fullName',
            language: 'aa',
            linkedin: 'linkedin',
            name: 'name',
            slug: 'slug',
            translatedFromID: 0,
            twitter: 'twitter',
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            website: 'website',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->update(
            'objectId',
            id: 'id',
            avatar: 'avatar',
            bio: 'bio',
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            deletedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            displayName: 'displayName',
            email: 'email',
            facebook: 'facebook',
            fullName: 'fullName',
            language: 'aa',
            linkedin: 'linkedin',
            name: 'name',
            slug: 'slug',
            translatedFromID: 0,
            twitter: 'twitter',
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            website: 'website',
            archived: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->delete('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testAttachToLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->attachToLangGroup(
            id: 'id',
            language: 'aa',
            primaryID: 'primaryId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testAttachToLangGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->attachToLangGroup(
            id: 'id',
            language: 'aa',
            primaryID: 'primaryId',
            primaryLanguage: 'aa'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testCreateLanguageVariation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->createLanguageVariation(
            id: 'id',
            blogAuthor: [
                'id' => 'id',
                'avatar' => 'avatar',
                'bio' => 'bio',
                'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'deletedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'displayName' => 'displayName',
                'email' => 'email',
                'facebook' => 'facebook',
                'fullName' => 'fullName',
                'language' => 'aa',
                'linkedin' => 'linkedin',
                'name' => 'name',
                'slug' => 'slug',
                'translatedFromID' => 0,
                'twitter' => 'twitter',
                'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'website' => 'website',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testCreateLanguageVariationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->createLanguageVariation(
            id: 'id',
            blogAuthor: [
                'id' => 'id',
                'avatar' => 'avatar',
                'bio' => 'bio',
                'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'deletedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'displayName' => 'displayName',
                'email' => 'email',
                'facebook' => 'facebook',
                'fullName' => 'fullName',
                'language' => 'aa',
                'linkedin' => 'linkedin',
                'name' => 'name',
                'slug' => 'slug',
                'translatedFromID' => 0,
                'twitter' => 'twitter',
                'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'website' => 'website',
            ],
            language: 'language',
            primaryLanguage: 'primaryLanguage',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testDetachFromLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->detachFromLangGroup(id: 'id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testDetachFromLangGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->detachFromLangGroup(id: 'id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->get('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testListByQuery(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->listByQuery();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testListPosts(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->listPosts();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testListPostsByQuery(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->listPostsByQuery();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testListTags(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->listTags();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testListTagsByQuery(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->listTagsByQuery();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testSetNewLangPrimary(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->setNewLangPrimary(id: 'id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSetNewLangPrimaryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->setNewLangPrimary(id: 'id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateLanguages(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->updateLanguages(
            languages: ['foo' => 'aa'],
            primaryID: 'primaryId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testUpdateLanguagesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->updateLanguages(
            languages: ['foo' => 'aa'],
            primaryID: 'primaryId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }
}
