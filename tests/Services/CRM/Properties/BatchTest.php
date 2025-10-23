<?php

namespace Tests\Services\CRM\Properties;

use HubspotSDK\Client;
use HubspotSDK\CRM\Properties\PropertyCreate;
use HubspotSDK\CRM\Properties\PropertyName;
use HubspotSDK\OptionInput;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class BatchTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(
            accessToken: 'pat-na1-xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx',
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

        $result = $this->client->crm->properties->batch->create(
            'objectType',
            [
                PropertyCreate::with(
                    fieldType: 'select',
                    groupName: 'contactinformation',
                    label: 'My Contact Property',
                    name: 'my_contact_property',
                    type: 'enumeration',
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->properties->batch->create(
            'objectType',
            [
                PropertyCreate::with(
                    fieldType: 'select',
                    groupName: 'contactinformation',
                    label: 'My Contact Property',
                    name: 'my_contact_property',
                    type: 'enumeration',
                )
                    ->withCalculationFormula('calculationFormula')
                    ->withDataSensitivity('non_sensitive')
                    ->withDescription('description')
                    ->withDisplayOrder(2)
                    ->withExternalOptions(true)
                    ->withFormField(true)
                    ->withHasUniqueValue(false)
                    ->withHidden(false)
                    ->withOptions(
                        [
                            OptionInput::with(
                                displayOrder: 1,
                                hidden: false,
                                label: 'Option A',
                                value: 'A'
                            )
                                ->withDescription('Choice number one'),
                            OptionInput::with(
                                displayOrder: 2,
                                hidden: false,
                                label: 'Option B',
                                value: 'B'
                            )
                                ->withDescription('Choice number two'),
                        ],
                    )
                    ->withReferencedObjectType('referencedObjectType'),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->properties->batch->delete(
            'objectType',
            [PropertyName::with(name: 'my_custom_property')]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->properties->batch->delete(
            'objectType',
            [PropertyName::with(name: 'my_custom_property')]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRead(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->properties->batch->read(
            'objectType',
            archived: true,
            inputs: [PropertyName::with(name: 'my_custom_property')],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testReadWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->properties->batch->read(
            'objectType',
            archived: true,
            inputs: [PropertyName::with(name: 'my_custom_property')],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
