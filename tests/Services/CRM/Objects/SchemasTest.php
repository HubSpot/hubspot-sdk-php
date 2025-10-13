<?php

namespace Tests\Services\CRM\Objects;

use HubspotSDK\Client;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypeDefinitionLabels;
use HubspotSDK\CRM\Objects\Schemas\ObjectTypePropertyCreate;
use HubspotSDK\CRM\Properties\OptionInput;
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
            STAINLESS_FIXME_accessToken: 'pat-na1-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
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

        $result = $this->client->crm->objects->schemas->create(
            associatedObjects: ['CONTACT'],
            labels: (new ObjectTypeDefinitionLabels),
            name: 'my_object',
            properties: [
                ObjectTypePropertyCreate::with(
                    fieldType: 'select',
                    label: 'My object property',
                    name: 'my_object_property',
                    type: 'enumeration',
                ),
            ],
            requiredProperties: ['my_object_property'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->schemas->create(
            associatedObjects: ['CONTACT'],
            labels: (new ObjectTypeDefinitionLabels)
                ->withPlural('My objects')
                ->withSingular('My object'),
            name: 'my_object',
            properties: [
                ObjectTypePropertyCreate::with(
                    fieldType: 'select',
                    label: 'My object property',
                    name: 'my_object_property',
                    type: 'enumeration',
                )
                    ->withDescription('description')
                    ->withDisplayOrder(2)
                    ->withFormField(true)
                    ->withGroupName('my_object_information')
                    ->withHasUniqueValue(false)
                    ->withHidden(true)
                    ->withNumberDisplayHint('unformatted')
                    ->withOptions(
                        [
                            OptionInput::with(hidden: false, label: 'Option A', value: 'A')
                                ->withDescription('Choice number one')
                                ->withDisplayOrder(1),
                            OptionInput::with(hidden: false, label: 'Option B', value: 'B')
                                ->withDescription('Choice number two')
                                ->withDisplayOrder(2),
                        ],
                    )
                    ->withOptionSortStrategy('DISPLAY_ORDER')
                    ->withReferencedObjectType('referencedObjectType')
                    ->withSearchableInGlobalSearch(true)
                    ->withShowCurrencySymbol(true)
                    ->withTextDisplayHint('unformatted_single_line'),
            ],
            requiredProperties: ['my_object_property'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->schemas->update('objectType');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->schemas->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->schemas->delete('objectType');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testArchiveAssociation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->schemas->archiveAssociation(
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

        $result = $this->client->crm->objects->schemas->archiveAssociation(
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

        $result = $this->client->crm->objects->schemas->createAssociation(
            'objectType',
            fromObjectTypeID: '2-123456',
            toObjectTypeID: 'contact'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateAssociationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->schemas->createAssociation(
            'objectType',
            fromObjectTypeID: '2-123456',
            toObjectTypeID: 'contact'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRead(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->objects->schemas->read('objectType');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
