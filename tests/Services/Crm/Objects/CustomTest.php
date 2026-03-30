<?php

namespace Tests\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\CollectionResponseWithTotalSimplePublicObject;
use HubspotSDK\Crm\Objects\BatchResponseSimplePublicObject;
use HubspotSDK\Crm\Objects\BatchResponseSimplePublicUpsertObject;
use HubspotSDK\Crm\Objects\SimplePublicObjectWithAssociations;
use HubspotSDK\Crm\SimplePublicObject;
use HubspotSDK\Page;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CustomTest extends TestCase
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->custom->create(
            'objectType',
            inputs: [
                [
                    'associations' => [
                        [
                            'to' => ['id' => 'id'],
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->custom->create(
            'objectType',
            inputs: [
                [
                    'associations' => [
                        [
                            'to' => ['id' => 'id'],
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->custom->update(
            'objectType',
            inputs: [['id' => 'id', 'properties' => ['foo' => 'string']]],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSimplePublicObject::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->custom->update(
            'objectType',
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->crm->objects->custom->list('objectType');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(SimplePublicObjectWithAssociations::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->custom->delete(
            'objectType',
            inputs: [['id' => '430001']]
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

        $result = $this->client->crm->objects->custom->delete(
            'objectType',
            inputs: [['id' => '430001']]
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

        $result = $this->client->crm->objects->custom->get(
            'objectType',
            inputs: [['id' => '430001']],
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->custom->get(
            'objectType',
            inputs: [['id' => '430001']],
            properties: ['string'],
            propertiesWithHistory: ['string'],
            archived: true,
            idProperty: 'idProperty',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseSimplePublicObject::class, $result);
    }

    #[Test]
    public function testMerge(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->custom->merge(
            'objectType',
            objectIDToMerge: 'objectIdToMerge',
            primaryObjectID: 'primaryObjectId',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SimplePublicObject::class, $result);
    }

    #[Test]
    public function testMergeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->custom->merge(
            'objectType',
            objectIDToMerge: 'objectIdToMerge',
            primaryObjectID: 'primaryObjectId',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SimplePublicObject::class, $result);
    }

    #[Test]
    public function testSearch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->custom->search(
            'objectType',
            after: 'after',
            filterGroups: [
                [
                    'filters' => [
                        ['operator' => 'BETWEEN', 'propertyName' => 'propertyName'],
                    ],
                ],
            ],
            limit: 0,
            properties: ['string'],
            sorts: ['string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseWithTotalSimplePublicObject::class,
            $result
        );
    }

    #[Test]
    public function testSearchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->custom->search(
            'objectType',
            after: 'after',
            filterGroups: [
                [
                    'filters' => [
                        [
                            'operator' => 'BETWEEN',
                            'propertyName' => 'propertyName',
                            'highValue' => 'highValue',
                            'value' => 'value',
                            'values' => ['string'],
                        ],
                    ],
                ],
            ],
            limit: 0,
            properties: ['string'],
            sorts: ['string'],
            query: 'query',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseWithTotalSimplePublicObject::class,
            $result
        );
    }

    #[Test]
    public function testUpsert(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->custom->upsert(
            'objectType',
            inputs: [['id' => 'id', 'properties' => ['foo' => 'string']]],
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objects->custom->upsert(
            'objectType',
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
