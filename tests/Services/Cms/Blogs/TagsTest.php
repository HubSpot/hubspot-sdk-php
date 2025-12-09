<?php

namespace Tests\Services\Cms\Blogs;

use HubspotSDK\Client;
use HubspotSDK\Cms\Blogs\Tags\BatchResponseTag;
use HubspotSDK\Cms\Blogs\Tags\Tag;
use HubspotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TagsTest extends TestCase
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

        $result = $this->client->cms->blogs->tags->create(
            id: 'id',
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            deletedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            language: 'af',
            name: 'name',
            translatedFromID: 0,
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Tag::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->create(
            id: 'id',
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            deletedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            language: 'af',
            name: 'name',
            translatedFromID: 0,
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Tag::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->update(
            'objectId',
            id: 'id',
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            deletedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            language: 'af',
            name: 'name',
            translatedFromID: 0,
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Tag::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->update(
            'objectId',
            id: 'id',
            created: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            deletedAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            language: 'af',
            name: 'name',
            translatedFromID: 0,
            updated: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            archived: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Tag::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->delete('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testAttachToLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->attachToLangGroup(
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

        $result = $this->client->cms->blogs->tags->attachToLangGroup(
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

        $result = $this->client->cms->blogs->tags->createBatch(
            inputs: [
                [
                    'id' => 'id',
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'deletedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'language' => 'af',
                    'name' => 'name',
                    'translatedFromID' => 0,
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseTag::class, $result);
    }

    #[Test]
    public function testCreateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->createBatch(
            inputs: [
                [
                    'id' => 'id',
                    'created' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'deletedAt' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                    'language' => 'af',
                    'name' => 'name',
                    'translatedFromID' => 0,
                    'updated' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseTag::class, $result);
    }

    #[Test]
    public function testCreateLangVariation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->createLangVariation(
            id: 'id',
            name: 'name'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Tag::class, $result);
    }

    #[Test]
    public function testCreateLangVariationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->createLangVariation(
            id: 'id',
            name: 'name',
            language: 'language',
            primaryLanguage: 'primaryLanguage',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Tag::class, $result);
    }

    #[Test]
    public function testDeleteBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->deleteBatch(inputs: ['string']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->deleteBatch(inputs: ['string']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDetachFromLangGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->detachFromLangGroup(id: 'id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDetachFromLangGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->detachFromLangGroup(id: 'id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->get('objectId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Tag::class, $result);
    }

    #[Test]
    public function testGetBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->getBatch(inputs: ['string']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseTag::class, $result);
    }

    #[Test]
    public function testGetBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->getBatch(
            inputs: ['string'],
            archived: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseTag::class, $result);
    }

    #[Test]
    public function testSetLangPrimary(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->setLangPrimary(id: 'id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testSetLangPrimaryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->setLangPrimary(id: 'id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->updateBatch(inputs: [[]]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseTag::class, $result);
    }

    #[Test]
    public function testUpdateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->updateBatch(
            inputs: [[]],
            archived: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseTag::class, $result);
    }

    #[Test]
    public function testUpdateLangs(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->updateLangs(
            languages: ['foo' => 'string'],
            primaryID: 'primaryId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateLangsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->blogs->tags->updateLangs(
            languages: ['foo' => 'string'],
            primaryID: 'primaryId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
