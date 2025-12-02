<?php

namespace Tests\Services\Crm\Objects;

use HubspotSDK\Client;
use HubspotSDK\Crm\Objects\Schemas\ObjectSchema;
use HubspotSDK\Crm\Objects\Schemas\ObjectsSchemasObjectTypeDefinition;
use HubspotSDK\Crm\Objects\Schemas\SchemaListResponse;
use HubspotSDK\Events\EventDefinitions\AssociationDefinition;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SchemasTest extends TestCase
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

        $result = $this->client->crm->objects->schemas->create([
            'associatedObjects' => ['CONTACT'],
            'labels' => [],
            'name' => 'my_object',
            'properties' => [
                [
                    'fieldType' => 'select',
                    'label' => 'My object property',
                    'name' => 'my_object_property',
                    'type' => 'enumeration',
                ],
            ],
            'requiredProperties' => ['my_object_property'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectSchema::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->schemas->create([
            'associatedObjects' => ['CONTACT'],
            'labels' => ['plural' => 'My objects', 'singular' => 'My object'],
            'name' => 'my_object',
            'properties' => [
                [
                    'fieldType' => 'select',
                    'label' => 'My object property',
                    'name' => 'my_object_property',
                    'type' => 'enumeration',
                    'description' => 'description',
                    'displayOrder' => 2,
                    'formField' => true,
                    'groupName' => 'my_object_information',
                    'hasUniqueValue' => false,
                    'hidden' => true,
                    'numberDisplayHint' => 'currency',
                    'options' => [
                        [
                            'displayOrder' => 1,
                            'hidden' => true,
                            'label' => 'Option A',
                            'value' => 'A',
                            'description' => 'Choice number one',
                        ],
                        [
                            'displayOrder' => 2,
                            'hidden' => true,
                            'label' => 'Option B',
                            'value' => 'B',
                            'description' => 'Choice number two',
                        ],
                    ],
                    'optionSortStrategy' => 'ALPHABETICAL',
                    'referencedObjectType' => 'referencedObjectType',
                    'searchableInGlobalSearch' => true,
                    'showCurrencySymbol' => true,
                    'textDisplayHint' => 'domain_name',
                ],
            ],
            'requiredProperties' => ['my_object_property'],
            'description' => 'description',
            'primaryDisplayProperty' => 'my_object_property',
            'searchableProperties' => ['string'],
            'secondaryDisplayProperties' => ['string'],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectSchema::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->schemas->update('objectType', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectsSchemasObjectTypeDefinition::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->schemas->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SchemaListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->schemas->delete('objectType', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateAssociation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->schemas->createAssociation(
            'objectType',
            [
                'fromObjectTypeId' => 'fromObjectTypeId',
                'toObjectTypeId' => 'toObjectTypeId',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssociationDefinition::class, $result);
    }

    #[Test]
    public function testCreateAssociationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->schemas->createAssociation(
            'objectType',
            [
                'fromObjectTypeId' => 'fromObjectTypeId',
                'toObjectTypeId' => 'toObjectTypeId',
                'name' => 'name',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssociationDefinition::class, $result);
    }

    #[Test]
    public function testDeleteAssociation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->schemas->deleteAssociation(
            'associationIdentifier',
            ['objectType' => 'objectType']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteAssociationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->schemas->deleteAssociation(
            'associationIdentifier',
            ['objectType' => 'objectType']
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

        $result = $this->client->crm->objects->schemas->get('objectType');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectSchema::class, $result);
    }
}
