<?php

namespace Tests\Services\Cms\MediaBridge;

use HubspotSDK\Client;
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

        $result = $this->client->cms->mediaBridge->properties->create(
            'objectType',
            [
                'appId' => 'appId',
                'fieldType' => 'booleancheckbox',
                'groupName' => 'groupName',
                'label' => 'label',
                'name' => 'name',
                'type' => 'bool',
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

        $result = $this->client->cms->mediaBridge->properties->create(
            'objectType',
            [
                'appId' => 'appId',
                'fieldType' => 'booleancheckbox',
                'groupName' => 'groupName',
                'label' => 'label',
                'name' => 'name',
                'type' => 'bool',
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

        $result = $this->client->cms->mediaBridge->properties->update(
            'propertyName',
            ['appId' => 'appId', 'objectType' => 'objectType']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->update(
            'propertyName',
            ['appId' => 'appId', 'objectType' => 'objectType']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->list(
            'objectType',
            ['appId' => 'appId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->list(
            'objectType',
            ['appId' => 'appId']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->delete(
            'propertyName',
            ['appId' => 'appId', 'objectType' => 'objectType']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->delete(
            'propertyName',
            ['appId' => 'appId', 'objectType' => 'objectType']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testArchiveBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->archiveBatch(
            'objectType',
            ['appId' => 'appId', 'inputs' => [['name' => 'name']]]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testArchiveBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->archiveBatch(
            'objectType',
            ['appId' => 'appId', 'inputs' => [['name' => 'name']]]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->createBatch(
            'objectType',
            [
                'appId' => 'appId',
                'inputs' => [
                    [
                        'fieldType' => 'booleancheckbox',
                        'groupName' => 'groupName',
                        'label' => 'label',
                        'name' => 'name',
                        'type' => 'bool',
                    ],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->createBatch(
            'objectType',
            [
                'appId' => 'appId',
                'inputs' => [
                    [
                        'fieldType' => 'booleancheckbox',
                        'groupName' => 'groupName',
                        'label' => 'label',
                        'name' => 'name',
                        'type' => 'bool',
                        'calculationFormula' => 'calculationFormula',
                        'dataSensitivity' => 'non_sensitive',
                        'description' => 'description',
                        'displayOrder' => 0,
                        'externalOptions' => true,
                        'formField' => true,
                        'hasUniqueValue' => true,
                        'hidden' => true,
                        'options' => [
                            [
                                'displayOrder' => 0,
                                'hidden' => true,
                                'label' => 'label',
                                'value' => 'value',
                                'description' => 'description',
                            ],
                        ],
                        'referencedObjectType' => 'referencedObjectType',
                    ],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->get(
            'propertyName',
            ['appId' => 'appId', 'objectType' => 'objectType']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->get(
            'propertyName',
            ['appId' => 'appId', 'objectType' => 'objectType']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetBatch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->getBatch(
            'objectType',
            [
                'appId' => 'appId', 'archived' => true, 'inputs' => [['name' => 'name']],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetBatchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->properties->getBatch(
            'objectType',
            [
                'appId' => 'appId', 'archived' => true, 'inputs' => [['name' => 'name']],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
