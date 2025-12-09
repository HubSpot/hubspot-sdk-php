<?php

namespace Tests\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Authors\BatchResponseBlogAuthor;
use HubspotSDK\Cms\Blogs\Authors\BlogAuthor;
use HubspotSDK\Page;
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
            language: 'af',
            linkedin: 'linkedin',
            name: 'name',
            slug: 'slug',
            translatedFromID: 0,
            twitter: 'twitter',
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            website: 'website',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogAuthor::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
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
            language: 'af',
            linkedin: 'linkedin',
            name: 'name',
            slug: 'slug',
            translatedFromID: 0,
            twitter: 'twitter',
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            website: 'website',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogAuthor::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
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
            language: 'af',
            linkedin: 'linkedin',
            name: 'name',
            slug: 'slug',
            translatedFromID: 0,
            twitter: 'twitter',
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            website: 'website',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogAuthor::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
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
            language: 'af',
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
        $this->assertInstanceOf(BlogAuthor::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->delete('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testAttachToLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->attachToLangGroup(
            id: 'id',
            language: 'language',
            primaryID: 'primaryId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testAttachToLangGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->attachToLangGroup(
            id: 'id',
            language: 'language',
            primaryID: 'primaryId',
            primaryLanguage: 'primaryLanguage',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->createBatch(
            inputs: [
                [
                    'id' => 'id',
                    'avatar' => 'avatar',
                    'bio' => 'bio',
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'deletedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'displayName' => 'displayName',
                    'email' => 'email',
                    'facebook' => 'facebook',
                    'fullName' => 'fullName',
                    'language' => 'af',
                    'linkedin' => 'linkedin',
                    'name' => 'name',
                    'slug' => 'slug',
                    'translatedFromID' => 0,
                    'twitter' => 'twitter',
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'website' => 'website',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseBlogAuthor::class, $result);
    }

    #[Test]
    public function testCreateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->createBatch(
            inputs: [
                [
                    'id' => 'id',
                    'avatar' => 'avatar',
                    'bio' => 'bio',
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'deletedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'displayName' => 'displayName',
                    'email' => 'email',
                    'facebook' => 'facebook',
                    'fullName' => 'fullName',
                    'language' => 'af',
                    'linkedin' => 'linkedin',
                    'name' => 'name',
                    'slug' => 'slug',
                    'translatedFromID' => 0,
                    'twitter' => 'twitter',
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'website' => 'website',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseBlogAuthor::class, $result);
    }

    #[Test]
    public function testCreateLanguageVariation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
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
                'language' => 'af',
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
        $this->assertInstanceOf(BlogAuthor::class, $result);
    }

    #[Test]
    public function testCreateLanguageVariationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
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
                'language' => 'af',
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
        $this->assertInstanceOf(BlogAuthor::class, $result);
    }

    #[Test]
    public function testDeleteBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->deleteBatch(
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->deleteBatch(
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDetachFromLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->detachFromLangGroup(id: 'id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDetachFromLangGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->detachFromLangGroup(id: 'id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->get('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BlogAuthor::class, $result);
    }

    #[Test]
    public function testGetBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->getBatch(inputs: ['string']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseBlogAuthor::class, $result);
    }

    #[Test]
    public function testGetBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->getBatch(
            inputs: ['string'],
            archived: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseBlogAuthor::class, $result);
    }

    #[Test]
    public function testSetNewLangPrimary(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->setNewLangPrimary(id: 'id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSetNewLangPrimaryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->setNewLangPrimary(id: 'id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->updateBatch(inputs: [[]]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseBlogAuthor::class, $result);
    }

    #[Test]
    public function testUpdateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->updateBatch(
            inputs: [[]],
            archived: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseBlogAuthor::class, $result);
    }

    #[Test]
    public function testUpdateLanguages(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->updateLanguages(
            languages: ['foo' => 'string'],
            primaryID: 'primaryId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateLanguagesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->updateLanguages(
            languages: ['foo' => 'string'],
            primaryID: 'primaryId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
