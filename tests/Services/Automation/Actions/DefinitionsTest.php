<?php

namespace Tests\Services\Automation\Actions;

use HubspotSDK\Client;
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
            [
                'actionUrl' => 'actionUrl',
                'functions' => [
                    [
                        'functionSource' => 'functionSource',
                        'functionType' => 'PRE_ACTION_EXECUTION',
                    ],
                ],
                'inputFields' => [
                    [
                        'isRequired' => true,
                        'typeDefinition' => [
                            'externalOptions' => true,
                            'name' => 'name',
                            'options' => [
                                ['hidden' => false, 'label' => 'Option A', 'value' => 'A'],
                            ],
                            'type' => 'string',
                        ],
                    ],
                ],
                'labels' => ['foo' => ['actionName' => 'actionName']],
                'objectTypes' => ['string'],
                'published' => true,
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

        $result = $this->client->automation->actions->definitions->create(
            0,
            [
                'actionUrl' => 'actionUrl',
                'functions' => [
                    [
                        'functionSource' => 'functionSource',
                        'functionType' => 'PRE_ACTION_EXECUTION',
                        'id' => 'id',
                    ],
                ],
                'inputFields' => [
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
                            'type' => 'string',
                            'description' => 'description',
                            'externalOptionsReferenceType' => 'externalOptionsReferenceType',
                            'fieldType' => 'booleancheckbox',
                            'helpText' => 'helpText',
                            'label' => 'label',
                            'optionsUrl' => 'optionsUrl',
                            'referencedObjectType' => 'CONTACT',
                        ],
                        'automationFieldType' => 'automationFieldType',
                        'supportedValueTypes' => ['STATIC_VALUE'],
                    ],
                ],
                'labels' => [
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
                'objectTypes' => ['string'],
                'published' => true,
            ],
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
            ['appId' => 0]
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
            ['appId' => 0]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->list(0, []);

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
            ['appId' => 0]
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
            ['appId' => 0]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->get(
            'definitionId',
            ['appId' => 0]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->automation->actions->definitions->get(
            'definitionId',
            ['appId' => 0]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
