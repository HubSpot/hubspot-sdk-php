<?php

namespace Tests\Services\Automation;

use HubspotSDK\Automation\Actions\PublicActionDefinition;
use HubspotSDK\Automation\Actions\PublicActionDefinitionRequiresObjectResponse;
use HubspotSDK\Automation\Actions\PublicActionFunction;
use HubspotSDK\Automation\Actions\PublicActionFunctionIdentifier;
use HubspotSDK\Automation\Actions\PublicActionRevision;
use HubspotSDK\Client;
use HubspotSDK\Core\Util;
use HubspotSDK\Page;
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

        $result = $this->client->automation->actions->create(
            0,
            actionURL: 'actionUrl',
            functions: [
                [
                    'functionSource' => 'functionSource',
                    'functionType' => 'POST_ACTION_EXECUTION',
                ],
            ],
            inputFields: [
                [
                    'isRequired' => true,
                    'typeDefinition' => [
                        'name' => 'name',
                        'options' => [['label' => 'label', 'value' => 'value']],
                        'type' => 'bool',
                    ],
                ],
            ],
            labels: ['foo' => ['actionName' => 'actionName']],
            objectTypes: ['string'],
            published: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionDefinition::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->create(
            0,
            actionURL: 'actionUrl',
            functions: [
                [
                    'functionSource' => 'functionSource',
                    'functionType' => 'POST_ACTION_EXECUTION',
                    'id' => 'id',
                ],
            ],
            inputFields: [
                [
                    'isRequired' => true,
                    'typeDefinition' => [
                        'name' => 'name',
                        'options' => [
                            [
                                'label' => 'label',
                                'value' => 'value',
                                'description' => 'description',
                                'displayOrder' => 0,
                            ],
                        ],
                        'type' => 'bool',
                        'description' => 'description',
                        'fieldType' => 'booleancheckbox',
                        'helpText' => 'helpText',
                        'label' => 'label',
                        'optionsURL' => 'optionsUrl',
                        'referencedObjectType' => 'OWNER',
                    ],
                    'supportedValueTypes' => ['STATIC_VALUE'],
                ],
            ],
            labels: [
                'foo' => [
                    'actionName' => 'actionName',
                    'actionCardContent' => 'actionCardContent',
                    'actionDescription' => 'actionDescription',
                    'appDisplayName' => 'appDisplayName',
                    'executionRules' => ['foo' => 'string'],
                    'inputFieldDescriptions' => ['foo' => 'string'],
                    'inputFieldLabels' => ['foo' => 'string'],
                    'inputFieldOptionLabels' => ['foo' => ['foo' => 'string']],
                    'outputFieldLabels' => ['foo' => 'string'],
                ],
            ],
            objectTypes: ['string'],
            published: true,
            archivedAt: 0,
            executionRules: [
                ['conditions' => ['foo' => (object) []], 'labelName' => 'labelName'],
            ],
            inputFieldDependencies: [
                [
                    'controllingFieldName' => 'controllingFieldName',
                    'dependencyType' => 'SINGLE_FIELD',
                    'dependentFieldNames' => ['string'],
                ],
            ],
            objectRequestOptions: ['properties' => ['string']],
            outputFields: [
                [
                    'typeDefinition' => [
                        'externalOptions' => true,
                        'name' => 'name',
                        'options' => [
                            [
                                'hidden' => true,
                                'label' => 'label',
                                'value' => 'value',
                                'description' => 'description',
                                'displayOrder' => 0,
                            ],
                        ],
                        'schema' => ['type' => 'INTEGER', 'maximum' => 0, 'minimum' => 0],
                        'type' => 'bool',
                        'useChirp' => true,
                        'description' => 'description',
                        'externalOptionsReferenceType' => 'externalOptionsReferenceType',
                        'fieldType' => 'booleancheckbox',
                        'helpText' => 'helpText',
                        'label' => 'label',
                        'optionsURL' => 'optionsUrl',
                        'referencedObjectType' => 'ABANDONED_CART',
                    ],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionDefinition::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->update(
            'definitionId',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionDefinition::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->update(
            'definitionId',
            appID: 0,
            actionURL: 'actionUrl',
            executionRules: [
                ['conditions' => ['foo' => (object) []], 'labelName' => 'labelName'],
            ],
            inputFieldDependencies: [
                [
                    'controllingFieldName' => 'controllingFieldName',
                    'dependencyType' => 'SINGLE_FIELD',
                    'dependentFieldNames' => ['string'],
                ],
            ],
            inputFields: [
                [
                    'isRequired' => true,
                    'typeDefinition' => [
                        'name' => 'name',
                        'options' => [
                            [
                                'label' => 'label',
                                'value' => 'value',
                                'description' => 'description',
                                'displayOrder' => 0,
                            ],
                        ],
                        'type' => 'bool',
                        'description' => 'description',
                        'fieldType' => 'booleancheckbox',
                        'helpText' => 'helpText',
                        'label' => 'label',
                        'optionsURL' => 'optionsUrl',
                        'referencedObjectType' => 'OWNER',
                    ],
                    'supportedValueTypes' => ['STATIC_VALUE'],
                ],
            ],
            labels: [
                'foo' => [
                    'actionName' => 'actionName',
                    'actionCardContent' => 'actionCardContent',
                    'actionDescription' => 'actionDescription',
                    'appDisplayName' => 'appDisplayName',
                    'executionRules' => ['foo' => 'string'],
                    'inputFieldDescriptions' => ['foo' => 'string'],
                    'inputFieldLabels' => ['foo' => 'string'],
                    'inputFieldOptionLabels' => ['foo' => ['foo' => 'string']],
                    'outputFieldLabels' => ['foo' => 'string'],
                ],
            ],
            objectRequestOptions: ['properties' => ['string']],
            objectTypes: ['string'],
            outputFields: [
                [
                    'typeDefinition' => [
                        'externalOptions' => true,
                        'name' => 'name',
                        'options' => [
                            [
                                'hidden' => true,
                                'label' => 'label',
                                'value' => 'value',
                                'description' => 'description',
                                'displayOrder' => 0,
                            ],
                        ],
                        'schema' => ['type' => 'INTEGER', 'maximum' => 0, 'minimum' => 0],
                        'type' => 'bool',
                        'useChirp' => true,
                        'description' => 'description',
                        'externalOptionsReferenceType' => 'externalOptionsReferenceType',
                        'fieldType' => 'booleancheckbox',
                        'helpText' => 'helpText',
                        'label' => 'label',
                        'optionsURL' => 'optionsUrl',
                        'referencedObjectType' => 'ABANDONED_CART',
                    ],
                ],
            ],
            published: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionDefinition::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->automation->actions->list('definitionId', appID: 0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(PublicActionRevision::class, $item);
        }
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->automation->actions->list(
            'definitionId',
            appID: 0,
            after: 'after',
            limit: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(PublicActionRevision::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->delete(
            'functionId',
            appID: 0,
            definitionID: 'definitionId',
            functionType: 'POST_ACTION_EXECUTION',
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

        $result = $this->client->automation->actions->delete(
            'functionId',
            appID: 0,
            definitionID: 'definitionId',
            functionType: 'POST_ACTION_EXECUTION',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testComplete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->complete(
            'callbackId',
            outputFields: ['foo' => 'string'],
            typedOutputs: (object) []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCompleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->complete(
            'callbackId',
            outputFields: ['foo' => 'string'],
            typedOutputs: (object) [],
            failureReasonType: 'failureReasonType',
            requestContext: [
                'source' => 'WORKFLOWS',
                'workflowID' => 0,
                'actionExecutionIndexIdentifier' => [
                    'actionExecutionIndex' => 0, 'enrollmentID' => 0,
                ],
                'actionID' => 0,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCompleteBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->completeBatch(
            inputs: [
                [
                    'callbackID' => 'callbackId',
                    'outputFields' => ['foo' => 'string'],
                    'typedOutputs' => (object) [],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCompleteBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->completeBatch(
            inputs: [
                [
                    'callbackID' => 'callbackId',
                    'outputFields' => ['foo' => 'string'],
                    'typedOutputs' => (object) [],
                    'failureReasonType' => 'failureReasonType',
                    'requestContext' => [
                        'source' => 'WORKFLOWS',
                        'workflowID' => 0,
                        'actionExecutionIndexIdentifier' => [
                            'actionExecutionIndex' => 0, 'enrollmentID' => 0,
                        ],
                        'actionID' => 0,
                    ],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateOrReplace(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->createOrReplace(
            'functionId',
            appID: 0,
            definitionID: 'definitionId',
            functionType: 'POST_ACTION_EXECUTION',
            body: 'body',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionFunctionIdentifier::class, $result);
    }

    #[Test]
    public function testCreateOrReplaceWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->createOrReplace(
            'functionId',
            appID: 0,
            definitionID: 'definitionId',
            functionType: 'POST_ACTION_EXECUTION',
            body: 'body',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionFunctionIdentifier::class, $result);
    }

    #[Test]
    public function testCreateOrReplaceByFunctionType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->createOrReplaceByFunctionType(
            'POST_ACTION_EXECUTION',
            appID: 0,
            definitionID: 'definitionId',
            body: 'body',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionFunctionIdentifier::class, $result);
    }

    #[Test]
    public function testCreateOrReplaceByFunctionTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->createOrReplaceByFunctionType(
            'POST_ACTION_EXECUTION',
            appID: 0,
            definitionID: 'definitionId',
            body: 'body',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionFunctionIdentifier::class, $result);
    }

    #[Test]
    public function testCreateRequiresObject(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->createRequiresObject(
            'definitionId',
            appID: 0,
            requiresObject: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateRequiresObjectWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->createRequiresObject(
            'definitionId',
            appID: 0,
            requiresObject: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteByFunctionType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->deleteByFunctionType(
            'POST_ACTION_EXECUTION',
            appID: 0,
            definitionID: 'definitionId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteByFunctionTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->deleteByFunctionType(
            'POST_ACTION_EXECUTION',
            appID: 0,
            definitionID: 'definitionId'
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

        $result = $this->client->automation->actions->get(
            'revisionId',
            appID: 0,
            definitionID: 'definitionId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionRevision::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->get(
            'revisionId',
            appID: 0,
            definitionID: 'definitionId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionRevision::class, $result);
    }

    #[Test]
    public function testGetByFunctionType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->getByFunctionType(
            'POST_ACTION_EXECUTION',
            appID: 0,
            definitionID: 'definitionId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionFunction::class, $result);
    }

    #[Test]
    public function testGetByFunctionTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->getByFunctionType(
            'POST_ACTION_EXECUTION',
            appID: 0,
            definitionID: 'definitionId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionFunction::class, $result);
    }

    #[Test]
    public function testGetRequiresObject(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->getRequiresObject(
            'definitionId',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PublicActionDefinitionRequiresObjectResponse::class,
            $result
        );
    }

    #[Test]
    public function testGetRequiresObjectWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->getRequiresObject(
            'definitionId',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PublicActionDefinitionRequiresObjectResponse::class,
            $result
        );
    }
}
