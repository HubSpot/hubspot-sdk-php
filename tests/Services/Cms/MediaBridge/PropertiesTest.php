<?php

namespace Tests\Services\Cms\MediaBridge;

use HubspotSDK\BatchResponseProperty;
use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\CollectionResponsePropertyNoPaging;
use HubspotSDK\Core\Util;
use HubspotSDK\Property;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PropertiesTest extends TestCase
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

        $result = $this->client->cms->mediaBridge->properties->create(
            'objectType',
            appID: 0,
            fieldType: 'booleancheckbox',
            groupName: 'groupName',
            label: 'label',
            name: 'name',
            type: 'bool',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Property::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->create(
            'objectType',
            appID: 0,
            fieldType: 'booleancheckbox',
            groupName: 'groupName',
            label: 'label',
            name: 'name',
            type: 'bool',
            calculationFormula: 'calculationFormula',
            dataSensitivity: 'highly_sensitive',
            description: 'description',
            displayOrder: 0,
            externalOptions: true,
            formField: true,
            hasUniqueValue: true,
            hidden: true,
            options: [
                [
                    'displayOrder' => 0,
                    'hidden' => true,
                    'label' => 'label',
                    'value' => 'value',
                    'description' => 'description',
                ],
            ],
            referencedObjectType: 'referencedObjectType',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Property::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->update(
            'propertyName',
            appID: 0,
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Property::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->update(
            'propertyName',
            appID: 0,
            objectType: 'objectType',
            calculationFormula: 'calculationFormula',
            description: 'description',
            displayOrder: 0,
            fieldType: 'booleancheckbox',
            formField: true,
            groupName: 'groupName',
            hasUniqueValue: true,
            hidden: true,
            label: 'label',
            options: [
                [
                    'displayOrder' => 0,
                    'hidden' => true,
                    'label' => 'label',
                    'value' => 'value',
                    'description' => 'description',
                ],
            ],
            type: 'bool',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Property::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->list(
            'objectType',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CollectionResponsePropertyNoPaging::class, $result);
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->list(
            'objectType',
            appID: 0,
            archived: true,
            properties: 'properties'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CollectionResponsePropertyNoPaging::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->delete(
            'propertyName',
            appID: 0,
            objectType: 'objectType'
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

        $result = $this->client->cms->mediaBridge->properties->delete(
            'propertyName',
            appID: 0,
            objectType: 'objectType'
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

        $result = $this->client->cms->mediaBridge->properties->createBatch(
            'objectType',
            appID: 0,
            inputs: [
                [
                    'fieldType' => 'booleancheckbox',
                    'groupName' => 'groupName',
                    'label' => 'label',
                    'name' => 'name',
                    'type' => 'bool',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseProperty::class, $result);
    }

    #[Test]
    public function testCreateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->createBatch(
            'objectType',
            appID: 0,
            inputs: [
                [
                    'fieldType' => 'booleancheckbox',
                    'groupName' => 'groupName',
                    'label' => 'label',
                    'name' => 'name',
                    'type' => 'bool',
                    'calculationFormula' => 'calculationFormula',
                    'dataSensitivity' => 'highly_sensitive',
                    'description' => 'description',
                    'displayOrder' => 0,
                    'externalOptions' => true,
                    'formField' => true,
                    'hasUniqueValue' => true,
                    'hidden' => true,
                    'options' => [
                        [
                            'displayOrder' => 0,
                            'hidden' => true,
                            'label' => 'label',
                            'value' => 'value',
                            'description' => 'description',
                        ],
                    ],
                    'referencedObjectType' => 'referencedObjectType',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseProperty::class, $result);
    }

    #[Test]
    public function testDeleteBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->deleteBatch(
            'objectType',
            appID: 0,
            inputs: [['name' => 'name']]
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

        $result = $this->client->cms->mediaBridge->properties->deleteBatch(
            'objectType',
            appID: 0,
            inputs: [['name' => 'name']]
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

        $result = $this->client->cms->mediaBridge->properties->get(
            'propertyName',
            appID: 0,
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Property::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->get(
            'propertyName',
            appID: 0,
            objectType: 'objectType',
            archived: true,
            properties: 'properties',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Property::class, $result);
    }

    #[Test]
    public function testGetBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->getBatch(
            'objectType',
            appID: 0,
            archived: true,
            dataSensitivity: 'highly_sensitive',
            inputs: [['name' => 'name']],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseProperty::class, $result);
    }

    #[Test]
    public function testGetBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->getBatch(
            'objectType',
            appID: 0,
            archived: true,
            dataSensitivity: 'highly_sensitive',
            inputs: [['name' => 'name']],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseProperty::class, $result);
    }
}
