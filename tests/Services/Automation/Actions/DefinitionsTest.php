<?php

namespace Tests\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\FieldTypeDefinition;
use HubspotSDK\Automation\Actions\InputFieldDefinition;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionLabels;
use HubspotSDK\Client;
use HubspotSDK\CRM\Option;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class DefinitionsTest extends TestCase
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

        $result = $this->client->automation->actions->definitions->create(
            0,
            actionURL: 'actionUrl',
            functions: [
                PublicActionFunction::with(
                    functionSource: 'functionSource',
                    functionType: 'PRE_ACTION_EXECUTION'
                ),
            ],
            inputFields: [
                InputFieldDefinition::with(
                    isRequired: true,
                    typeDefinition: FieldTypeDefinition::with(
                        externalOptions: true,
                        name: 'name',
                        options: [
                            Option::with(hidden: false, label: 'Option A', value: 'A'),
                        ],
                        type: 'string',
                    ),
                ),
            ],
            labels: ['foo' => PublicActionLabels::with(actionName: 'actionName')],
            objectTypes: ['string'],
            published: true,
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->create(
            0,
            actionURL: 'actionUrl',
            functions: [
                PublicActionFunction::with(
                    functionSource: 'functionSource',
                    functionType: 'PRE_ACTION_EXECUTION'
                )
                    ->withID('id'),
            ],
            inputFields: [
                InputFieldDefinition::with(
                    isRequired: true,
                    typeDefinition: FieldTypeDefinition::with(
                        externalOptions: true,
                        name: 'name',
                        options: [
                            Option::with(hidden: false, label: 'Option A', value: 'A')
                                ->withDescription('Choice number one')
                                ->withDisplayOrder(1),
                        ],
                        type: 'string',
                    )
                        ->withDescription('description')
                        ->withExternalOptionsReferenceType('externalOptionsReferenceType')
                        ->withFieldType('booleancheckbox')
                        ->withHelpText('helpText')
                        ->withLabel('label')
                        ->withOptionsURL('optionsUrl')
                        ->withReferencedObjectType('CONTACT'),
                )
                    ->withAutomationFieldType('automationFieldType')
                    ->withSupportedValueTypes(['STATIC_VALUE']),
            ],
            labels: [
                'foo' => PublicActionLabels::with(actionName: 'actionName')
                    ->withActionCardContent('actionCardContent')
                    ->withActionDescription('actionDescription')
                    ->withAppDisplayName('appDisplayName')
                    ->withExecutionRules(['foo' => 'string'])
                    ->withInputFieldDescriptions(['foo' => 'string'])
                    ->withInputFieldLabels(['foo' => 'string'])
                    ->withInputFieldOptionLabels(['foo' => ['foo' => 'string']])
                    ->withOutputFieldLabels(['foo' => 'string']),
            ],
            objectTypes: ['string'],
            published: true,
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->update(
            'definitionId',
            appID: 0
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->update(
            'definitionId',
            appID: 0
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->list(0);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->delete(
            'definitionId',
            0
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->delete(
            'definitionId',
            0
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRead(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->read(
            'definitionId',
            appID: 0
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testReadWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->read(
            'definitionId',
            appID: 0
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
