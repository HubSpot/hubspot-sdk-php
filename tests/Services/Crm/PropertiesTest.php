<?php

namespace Tests\Services\Crm;

use HubSpotSDK\BaseProperty;
use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Properties\CollectionResponsePropertyNoPaging;
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
        $client = new Client(accessToken: 'My Access Token', baseUrl: $testUrl);

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
        $this->assertInstanceOf(BaseProperty::class, $result);
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
            currencyPropertyName: 'currencyPropertyName',
            dataSensitivity: 'highly_sensitive',
            description: 'description',
            displayOrder: 0,
            externalOptions: true,
            formField: true,
            hasUniqueValue: true,
            hidden: true,
            numberDisplayHint: 'currency',
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
            showCurrencySymbol: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BaseProperty::class, $result);
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
        $this->assertInstanceOf(BaseProperty::class, $result);
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
            currencyPropertyName: 'currencyPropertyName',
            description: 'description',
            displayOrder: 0,
            fieldType: 'booleancheckbox',
            formField: true,
            groupName: 'groupName',
            hidden: true,
            label: 'label',
            numberDisplayHint: 'currency',
            options: [
                [
                    'displayOrder' => 0,
                    'hidden' => true,
                    'label' => 'label',
                    'value' => 'value',
                    'description' => 'description',
                ],
            ],
            showCurrencySymbol: true,
            type: 'bool',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BaseProperty::class, $result);
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
        $this->assertInstanceOf(BaseProperty::class, $result);
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
        $this->assertInstanceOf(BaseProperty::class, $result);
    }
}
