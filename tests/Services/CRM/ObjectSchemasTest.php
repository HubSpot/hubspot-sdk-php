<?php

namespace Tests\Services\CRM;

use HubspotSDK\Client;
use HubspotSDK\CRM\CRMObjectTypeDefinitionLabels;
use HubspotSDK\CRM\CRMObjectTypePropertyCreate;
use HubspotSDK\CRM\Properties\CRMPropertiesOptionInput;
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

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(accessToken: 'My Access Token', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->create(
            associatedObjects: ['string'],
            labels: (new CRMObjectTypeDefinitionLabels),
            name: 'name',
            properties: [
                CRMObjectTypePropertyCreate::with(
                    fieldType: 'fieldType',
                    label: 'label',
                    name: 'name',
                    type: 'string'
                ),
            ],
            requiredProperties: ['string'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->create(
            associatedObjects: ['string'],
            labels: (new CRMObjectTypeDefinitionLabels)
                ->withPlural('plural')
                ->withSingular('singular'),
            name: 'name',
            properties: [
                CRMObjectTypePropertyCreate::with(
                    fieldType: 'fieldType',
                    label: 'label',
                    name: 'name',
                    type: 'string'
                )
                    ->withDisplayOrder(0)
                    ->withFormField(true)
                    ->withGroupName('groupName')
                    ->withHasUniqueValue(true)
                    ->withHidden(true)
                    ->withNumberDisplayHint('unformatted')
                    ->withOptions(
                        [
                            CRMPropertiesOptionInput::with(
                                hidden: true,
                                label: 'label',
                                value: 'value'
                            )
                                ->withDisplayOrder(0),
                        ],
                    )
                    ->withOptionSortStrategy('DISPLAY_ORDER')
                    ->withReferencedObjectType('referencedObjectType')
                    ->withSearchableInGlobalSearch(true)
                    ->withShowCurrencySymbol(true)
                    ->withTextDisplayHint('unformatted_single_line'),
            ],
            requiredProperties: ['string'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->update('objectType');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->delete('objectType');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testArchiveAssociation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->archiveAssociation(
            'associationIdentifier',
            'objectType'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testArchiveAssociationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->archiveAssociation(
            'associationIdentifier',
            'objectType'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateAssociation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->createAssociation(
            'objectType',
            fromObjectTypeID: 'fromObjectTypeId',
            toObjectTypeID: 'toObjectTypeId',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateAssociationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->createAssociation(
            'objectType',
            fromObjectTypeID: 'fromObjectTypeId',
            toObjectTypeID: 'toObjectTypeId',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRead(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objectSchemas->read('objectType');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
