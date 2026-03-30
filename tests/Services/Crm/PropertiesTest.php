<?php

namespace Tests\Services\Crm;

use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Crm\Properties\CollectionResponsePropertyNoPaging;
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
            $this->markTestSkipped('Mock server tests are disabled');
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
        $this->assertInstanceOf(Property::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
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
        $this->assertInstanceOf(Property::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->properties->update(
            'propertyName',
            objectType: 'objectType',
            calculationFormula: 'calculationFormula',
            description: 'description',
            displayOrder: 0,
            fieldType: 'booleancheckbox',
            formField: true,
            groupName: 'groupName',
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->properties->list('objectType');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CollectionResponsePropertyNoPaging::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
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
            $this->markTestSkipped('Mock server tests are disabled');
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
            $this->markTestSkipped('Mock server tests are disabled');
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
            $this->markTestSkipped('Mock server tests are disabled');
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
