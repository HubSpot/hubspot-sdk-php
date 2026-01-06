<?php

namespace Tests\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Crm\Properties\CollectionResponseProperty;
use HubspotSDK\Crm\Properties\CreatedResponseProperty;
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

        $result = $this->client->crm->properties->create(
            'objectType',
            fieldType: 'booleancheckbox',
            groupName: 'groupName',
            label: 'label',
            name: 'name',
            type: 'bool',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CreatedResponseProperty::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->properties->create(
            'objectType',
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
        $this->assertInstanceOf(CreatedResponseProperty::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->properties->update(
            'propertyName',
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

        $result = $this->client->crm->properties->update(
            'propertyName',
            objectType: 'objectType',
            calculationFormula: 'calculationFormula',
            description: 'description',
            displayOrder: 2,
            fieldType: 'select',
            formField: true,
            groupName: 'contactinformation',
            hidden: false,
            label: 'My Contact Property',
            options: [
                [
                    'displayOrder' => 1,
                    'hidden' => false,
                    'label' => 'Option A',
                    'value' => 'A',
                    'description' => 'Choice number one',
                ],
                [
                    'displayOrder' => 2,
                    'hidden' => false,
                    'label' => 'Option B',
                    'value' => 'B',
                    'description' => 'Choice number two',
                ],
            ],
            type: 'enumeration',
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

        $result = $this->client->crm->properties->list('objectType');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CollectionResponseProperty::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->properties->delete(
            'propertyName',
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

        $result = $this->client->crm->properties->delete(
            'propertyName',
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

        $result = $this->client->crm->properties->get(
            'propertyName',
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

        $result = $this->client->crm->properties->get(
            'propertyName',
            objectType: 'objectType',
            archived: true,
            dataSensitivity: 'highly_sensitive',
            locale: 'locale',
            properties: 'properties',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Property::class, $result);
    }
}
