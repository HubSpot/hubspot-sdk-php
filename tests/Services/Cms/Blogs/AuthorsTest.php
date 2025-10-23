<?php

namespace Tests\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Authors\BlogAuthor;
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
            accessToken: 'pat-na1-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->delete('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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
            primaryID: 'primaryId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->createBatch(
            [
                BlogAuthor::with(
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
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->createBatch(
            [
                BlogAuthor::with(
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
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateLanguageVariation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->createLanguageVariation(
            id: 'id',
            blogAuthor: BlogAuthor::with(
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
            ),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateLanguageVariationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->createLanguageVariation(
            id: 'id',
            blogAuthor: BlogAuthor::with(
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
            ),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->deleteBatch(['string']);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->deleteBatch(['string']);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDetachFromLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->detachFromLangGroup('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDetachFromLangGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->detachFromLangGroup('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->get('objectId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->getBatch(inputs: ['string']);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->getBatch(inputs: ['string']);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetNewLangPrimary(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->setNewLangPrimary('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetNewLangPrimaryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->setNewLangPrimary('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->updateBatch(
            inputs: [(object) []]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->updateBatch(
            inputs: [(object) []]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
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

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
