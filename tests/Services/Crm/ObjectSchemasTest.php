<?php

namespace Tests\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\CollectionResponseObjectSchemaNoPaging;
use HubspotSDK\Core\Util;
use HubspotSDK\Events\AssociationDefinition;
use HubspotSDK\ObjectSchema;
use HubspotSDK\ObjectTypeDefinition;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ObjectSchemasTest extends TestCase
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

        $result = $this->client->crm->objectSchemas->create(
            allowsSensitiveProperties: true,
            associatedObjects: ['string'],
            labels: [],
            name: 'name',
            properties: [
                [
                    'fieldType' => 'fieldType',
                    'label' => 'label',
                    'name' => 'name',
                    'type' => 'bool',
                ],
            ],
            requiredProperties: ['string'],
            searchableProperties: ['string'],
            secondaryDisplayProperties: ['string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectSchema::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->create(
            allowsSensitiveProperties: true,
            associatedObjects: ['string'],
            labels: ['plural' => 'plural', 'singular' => 'singular'],
            name: 'name',
            properties: [
                [
                    'fieldType' => 'fieldType',
                    'label' => 'label',
                    'name' => 'name',
                    'type' => 'bool',
                    'description' => 'description',
                    'displayOrder' => 0,
                    'externalOptionsReferenceType' => 'externalOptionsReferenceType',
                    'formField' => true,
                    'groupName' => 'groupName',
                    'hasUniqueValue' => true,
                    'hidden' => true,
                    'numberDisplayHint' => 'currency',
                    'options' => [
                        [
                            'displayOrder' => 0,
                            'hidden' => true,
                            'label' => 'label',
                            'value' => 'value',
                            'description' => 'description',
                        ],
                    ],
                    'optionSortStrategy' => 'ALPHABETICAL',
                    'referencedObjectType' => 'referencedObjectType',
                    'searchableInGlobalSearch' => true,
                    'showCurrencySymbol' => true,
                    'textDisplayHint' => 'domain_name',
                ],
            ],
            requiredProperties: ['string'],
            searchableProperties: ['string'],
            secondaryDisplayProperties: ['string'],
            description: 'description',
            primaryDisplayProperty: 'primaryDisplayProperty',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectSchema::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->update(
            'objectType',
            clearDescription: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectTypeDefinition::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->update(
            'objectType',
            clearDescription: true,
            allowsSensitiveProperties: true,
            description: 'description',
            labels: ['plural' => 'plural', 'singular' => 'singular'],
            primaryDisplayProperty: 'primaryDisplayProperty',
            requiredProperties: ['string'],
            restorable: true,
            searchableProperties: ['string'],
            secondaryDisplayProperties: ['string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectTypeDefinition::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseObjectSchemaNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->delete('objectType');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateAssociation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->createAssociation(
            'objectType',
            fromObjectTypeID: 'fromObjectTypeId',
            toObjectTypeID: 'toObjectTypeId',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssociationDefinition::class, $result);
    }

    #[Test]
    public function testCreateAssociationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->createAssociation(
            'objectType',
            fromObjectTypeID: 'fromObjectTypeId',
            toObjectTypeID: 'toObjectTypeId',
            name: 'name',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssociationDefinition::class, $result);
    }

    #[Test]
    public function testDeleteAssociation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->deleteAssociation(
            'associationIdentifier',
            objectType: 'objectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteAssociationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->deleteAssociation(
            'associationIdentifier',
            objectType: 'objectType'
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

        $result = $this->client->crm->objectSchemas->get('objectType');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectSchema::class, $result);
    }
}
