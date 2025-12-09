<?php

namespace Tests\Services\Automation\Actions;

use HubspotSDK\Automation\Actions\PublicActionDefinition;
use HubspotSDK\Client;
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
                        'externalOptions' => true,
                        'name' => 'name',
                        'options' => [
                            ['hidden' => false, 'label' => 'Option A', 'value' => 'A'],
                        ],
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
            $this->markTestSkipped('Prism tests are disabled');
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
                        'externalOptions' => true,
                        'name' => 'name',
                        'options' => [
                            [
                                'hidden' => false,
                                'label' => 'Option A',
                                'value' => 'A',
                                'description' => 'Choice number one',
                                'displayOrder' => 1,
                            ],
                        ],
                        'type' => 'bool',
                        'description' => 'description',
                        'externalOptionsReferenceType' => 'externalOptionsReferenceType',
                        'fieldType' => 'booleancheckbox',
                        'helpText' => 'helpText',
                        'label' => 'label',
                        'optionsURL' => 'optionsUrl',
                        'referencedObjectType' => 'ABANDONED_CART',
                    ],
                    'automationFieldType' => 'automationFieldType',
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
                ['conditions' => ['foo' => []], 'labelName' => 'labelName'],
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
                                'hidden' => false,
                                'label' => 'Option A',
                                'value' => 'A',
                                'description' => 'Choice number one',
                                'displayOrder' => 1,
                            ],
                        ],
                        'type' => 'bool',
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
            $this->markTestSkipped('Prism tests are disabled');
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
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->update(
            'definitionId',
            appID: 0,
            actionURL: 'actionUrl',
            executionRules: [
                ['conditions' => ['foo' => []], 'labelName' => 'labelName'],
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
                        'externalOptions' => true,
                        'name' => 'name',
                        'options' => [
                            [
                                'hidden' => false,
                                'label' => 'Option A',
                                'value' => 'A',
                                'description' => 'Choice number one',
                                'displayOrder' => 1,
                            ],
                        ],
                        'type' => 'bool',
                        'description' => 'description',
                        'externalOptionsReferenceType' => 'externalOptionsReferenceType',
                        'fieldType' => 'booleancheckbox',
                        'helpText' => 'helpText',
                        'label' => 'label',
                        'optionsURL' => 'optionsUrl',
                        'referencedObjectType' => 'ABANDONED_CART',
                    ],
                    'automationFieldType' => 'automationFieldType',
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
                                'hidden' => false,
                                'label' => 'Option A',
                                'value' => 'A',
                                'description' => 'Choice number one',
                                'displayOrder' => 1,
                            ],
                        ],
                        'type' => 'bool',
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
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->list(0);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(Page::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
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
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->delete(
            'definitionId',
            appID: 0
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
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->get(
            'definitionId',
            appID: 0,
            archived: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PublicActionDefinition::class, $result);
    }
}
