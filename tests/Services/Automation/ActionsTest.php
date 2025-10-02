<?php

namespace Tests\Services\Automation;

use HubspotSDK\Automation\Actions\AutomationActionsCallbackCompletionBatchRequest;
use HubspotSDK\Automation\Actions\AutomationActionsFieldTypeDefinition;
use HubspotSDK\Automation\Actions\AutomationActionsInputFieldDefinition;
use HubspotSDK\Automation\Actions\AutomationActionsPublicActionFunction;
use HubspotSDK\Automation\Actions\AutomationActionsPublicActionLabels;
use HubspotSDK\Client;
use HubspotSDK\CRM\CRMOption;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ActionsTest extends TestCase
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

        $result = $this->client->automation->actions->create(
            0,
            actionURL: 'actionUrl',
            functions: [
                AutomationActionsPublicActionFunction::with(
                    functionSource: 'functionSource',
                    functionType: 'PRE_ACTION_EXECUTION'
                ),
            ],
            inputFields: [
                AutomationActionsInputFieldDefinition::with(
                    isRequired: true,
                    typeDefinition: AutomationActionsFieldTypeDefinition::with(
                        externalOptions: true,
                        name: 'name',
                        options: [
                            CRMOption::with(hidden: true, label: 'label', value: 'value'),
                        ],
                        type: 'string',
                    ),
                ),
            ],
            labels: [
                'foo' => AutomationActionsPublicActionLabels::with(
                    actionName: 'actionName'
                ),
            ],
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

        $result = $this->client->automation->actions->create(
            0,
            actionURL: 'actionUrl',
            functions: [
                AutomationActionsPublicActionFunction::with(
                    functionSource: 'functionSource',
                    functionType: 'PRE_ACTION_EXECUTION'
                )
                    ->withID('id'),
            ],
            inputFields: [
                AutomationActionsInputFieldDefinition::with(
                    isRequired: true,
                    typeDefinition: AutomationActionsFieldTypeDefinition::with(
                        externalOptions: true,
                        name: 'name',
                        options: [
                            CRMOption::with(hidden: true, label: 'label', value: 'value')
                                ->withDisplayOrder(0),
                        ],
                        type: 'string',
                    )
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
                'foo' => AutomationActionsPublicActionLabels::with(
                    actionName: 'actionName'
                )
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

        $result = $this->client->automation->actions->update(
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

        $result = $this->client->automation->actions->update(
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

        $result = $this->client->automation->actions->list(
            'definitionId',
            appID: 0
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->list(
            'definitionId',
            appID: 0
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->delete(
            'functionId',
            appID: 0,
            definitionID: 'definitionId',
            functionType: 'PRE_ACTION_EXECUTION',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->delete(
            'functionId',
            appID: 0,
            definitionID: 'definitionId',
            functionType: 'PRE_ACTION_EXECUTION',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testArchiveByFunctionType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->archiveByFunctionType(
            'PRE_ACTION_EXECUTION',
            appID: 0,
            definitionID: 'definitionId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testArchiveByFunctionTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->archiveByFunctionType(
            'PRE_ACTION_EXECUTION',
            appID: 0,
            definitionID: 'definitionId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testComplete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->complete(
            'callbackId',
            ['foo' => 'string']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCompleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->complete(
            'callbackId',
            ['foo' => 'string']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCompleteBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->completeBatch(
            [
                AutomationActionsCallbackCompletionBatchRequest::with(
                    callbackID: 'callbackId',
                    outputFields: ['foo' => 'string']
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCompleteBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->completeBatch(
            [
                AutomationActionsCallbackCompletionBatchRequest::with(
                    callbackID: 'callbackId',
                    outputFields: ['foo' => 'string']
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateOrReplace(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->createOrReplace(
            'functionId',
            appID: 0,
            definitionID: 'definitionId',
            functionType: 'PRE_ACTION_EXECUTION',
            body: 'body',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateOrReplaceWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->createOrReplace(
            'functionId',
            appID: 0,
            definitionID: 'definitionId',
            functionType: 'PRE_ACTION_EXECUTION',
            body: 'body',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateOrReplaceByFunctionType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->createOrReplaceByFunctionType(
            'PRE_ACTION_EXECUTION',
            appID: 0,
            definitionID: 'definitionId',
            body: 'body',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateOrReplaceByFunctionTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->createOrReplaceByFunctionType(
            'PRE_ACTION_EXECUTION',
            appID: 0,
            definitionID: 'definitionId',
            body: 'body',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetByFunctionType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->getByFunctionType(
            'PRE_ACTION_EXECUTION',
            appID: 0,
            definitionID: 'definitionId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetByFunctionTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->getByFunctionType(
            'PRE_ACTION_EXECUTION',
            appID: 0,
            definitionID: 'definitionId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRead(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->read(
            'functionId',
            appID: 0,
            definitionID: 'definitionId',
            functionType: 'PRE_ACTION_EXECUTION',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testReadWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->read(
            'functionId',
            appID: 0,
            definitionID: 'definitionId',
            functionType: 'PRE_ACTION_EXECUTION',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
