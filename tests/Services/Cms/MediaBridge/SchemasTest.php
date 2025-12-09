<?php

namespace Tests\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\Schemas\SchemaListResponse;
use HubspotSDK\Crm\Objects\Schemas\ObjectSchema;
use HubspotSDK\Crm\Objects\Schemas\ObjectsSchemasObjectTypeDefinition;
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
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->schemas->update(
            'objectType',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectsSchemasObjectTypeDefinition::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->schemas->update(
            'objectType',
            appID: 0,
            clearDescription: true,
            description: 'description',
            labels: ['plural' => 'plural', 'singular' => 'singular'],
            primaryDisplayProperty: 'my_object_property',
            requiredProperties: ['my_object_property'],
            restorable: true,
            searchableProperties: ['my_object_property'],
            secondaryDisplayProperties: ['string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectsSchemasObjectTypeDefinition::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->schemas->list(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SchemaListResponse::class, $result);
    }

    #[Test]
    public function testCreateAssociation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->schemas->createAssociation(
            'objectType',
            appID: 0,
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
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->schemas->createAssociation(
            'objectType',
            appID: 0,
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
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->schemas->deleteAssociation(
            'associationId',
            appID: 0,
            objectType: 'objectType'
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

        $result = $this->client->cms->mediaBridge->schemas->deleteAssociation(
            'associationId',
            appID: 0,
            objectType: 'objectType'
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

        $result = $this->client->cms->mediaBridge->schemas->get(
            'objectType',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectSchema::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->schemas->get(
            'objectType',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ObjectSchema::class, $result);
    }
}
