<?php

namespace Tests\Services\Crm\Objects\Courses;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\BatchResponseSimplePublicUpsertObject;
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

        $result = $this->client->crm->objects->courses->batch->create(
            inputs: [
                [
                    'associations' => [
                        [
                            'to' => ['id' => '37295'],
                            'types' => [
                                [
                                    'associationCategory' => 'HUBSPOT_DEFINED',
                                    'associationTypeID' => 0,
                                ],
                            ],
                        ],
                    ],
                    'properties' => ['foo' => 'string'],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSimplePublicObject::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->courses->batch->create(
            inputs: [
                [
                    'associations' => [
                        [
                            'to' => ['id' => '37295'],
                            'types' => [
                                [
                                    'associationCategory' => 'HUBSPOT_DEFINED',
                                    'associationTypeID' => 0,
                                ],
                            ],
                        ],
                    ],
                    'properties' => ['foo' => 'string'],
                    'objectWriteTraceID' => 'objectWriteTraceId',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSimplePublicObject::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->courses->batch->update(
            inputs: [['id' => 'id', 'properties' => ['foo' => 'string']]]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSimplePublicObject::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->courses->batch->update(
            inputs: [
                [
                    'id' => 'id',
                    'properties' => ['foo' => 'string'],
                    'idProperty' => 'my_unique_property_name',
                    'objectWriteTraceID' => 'objectWriteTraceId',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSimplePublicObject::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->courses->batch->delete(
            inputs: [['id' => 'id']]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->courses->batch->delete(
            inputs: [['id' => 'id']]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->courses->batch->get(
            inputs: [['id' => 'id']],
            properties: ['string'],
            propertiesWithHistory: ['string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSimplePublicObject::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->courses->batch->get(
            inputs: [['id' => 'id']],
            properties: ['string'],
            propertiesWithHistory: ['string'],
            archived: true,
            idProperty: 'idProperty',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSimplePublicObject::class, $result);
    }

    #[Test]
    public function testUpsert(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->courses->batch->upsert(
            inputs: [['id' => 'id', 'properties' => ['foo' => 'string']]]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponseSimplePublicUpsertObject::class,
            $result
        );
    }

    #[Test]
    public function testUpsertWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->courses->batch->upsert(
            inputs: [
                [
                    'id' => 'id',
                    'properties' => ['foo' => 'string'],
                    'idProperty' => 'idProperty',
                    'objectWriteTraceID' => 'objectWriteTraceId',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponseSimplePublicUpsertObject::class,
            $result
        );
    }
}
