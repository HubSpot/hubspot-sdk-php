<?php

namespace Tests\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicActionDefinition;
use HubspotSDK\Automation\Actions\PublicActionDefinitionRequiresObjectResponse;
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
final class DefinitionsTest extends TestCase
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

        $result = $this->client->automation->actions->definitions->create(
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

        $result = $this->client->automation->actions->definitions->create(
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
                                'description' => 'description',
                                'displayOrder' => 0,
                                'doubleData' => 0,
                                'hidden' => true,
                                'label' => 'label',
                                'readOnly' => true,
                                'value' => 'value',
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

        $result = $this->client->automation->actions->definitions->update(
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

        $result = $this->client->automation->actions->definitions->update(
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
                                'description' => 'description',
                                'displayOrder' => 0,
                                'doubleData' => 0,
                                'hidden' => true,
                                'label' => 'label',
                                'readOnly' => true,
                                'value' => 'value',
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

        $page = $this->client->automation->actions->definitions->list(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(PublicActionDefinition::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->delete(
            'definitionId',
            appID: 0
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

        $result = $this->client->automation->actions->definitions->delete(
            'definitionId',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateRequiresObject(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->automation
            ->actions
            ->definitions
            ->createRequiresObject('definitionId', appID: 0, requiresObject: true)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateRequiresObjectWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->automation
            ->actions
            ->definitions
            ->createRequiresObject('definitionId', appID: 0, requiresObject: true)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->get(
            'definitionId',
            appID: 0
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionDefinition::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->get(
            'definitionId',
            appID: 0,
            archived: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionDefinition::class, $result);
    }

    #[Test]
    public function testGetRequiresObject(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this
            ->client
            ->automation
            ->actions
            ->definitions
            ->getRequiresObject('definitionId', appID: 0)
        ;

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

        $result = $this
            ->client
            ->automation
            ->actions
            ->definitions
            ->getRequiresObject('definitionId', appID: 0)
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PublicActionDefinitionRequiresObjectResponse::class,
            $result
        );
    }
}
