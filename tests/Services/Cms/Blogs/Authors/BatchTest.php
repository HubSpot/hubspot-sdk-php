<?php

namespace Tests\Services\Cms\Blogs\Authors;

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
final class BatchTest extends TestCase
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

        $result = $this->client->cms->blogs->authors->batch->create(
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
                    'language' => 'aa',
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
        $this->assertIsString($result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->batch->create(
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
                    'language' => 'aa',
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
        $this->assertIsString($result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->batch->update(
            inputs: [(object) []]
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

        $result = $this->client->cms->blogs->authors->batch->update(
            inputs: [(object) []],
            archived: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->batch->delete(
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->batch->delete(
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

        $result = $this->client->cms->blogs->authors->batch->get(
            inputs: ['string']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->blogs->authors->batch->get(
            inputs: ['string'],
            archived: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }
}
