<?php

namespace Tests\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\OptionInput;
use HubspotSDK\PropertyCreate;
use HubspotSDK\PropertyName;
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

        $result = $this->client->cms->mediaBridge->properties->create(
            'objectType',
            appID: 'appId',
            fieldType: 'booleancheckbox',
            groupName: 'groupName',
            label: 'label',
            name: 'name',
            type: 'bool',
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
            appID: 'appId',
            fieldType: 'booleancheckbox',
            groupName: 'groupName',
            label: 'label',
            name: 'name',
            type: 'bool',
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
            appID: 'appId',
            objectType: 'objectType'
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
            appID: 'appId',
            objectType: 'objectType'
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
            'appId'
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
            'appId'
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
            appID: 'appId',
            objectType: 'objectType'
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
            appID: 'appId',
            objectType: 'objectType'
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
            appID: 'appId',
            inputs: [PropertyName::with(name: 'name')]
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
            appID: 'appId',
            inputs: [PropertyName::with(name: 'name')]
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
            appID: 'appId',
            inputs: [
                PropertyCreate::with(
                    fieldType: 'booleancheckbox',
                    groupName: 'groupName',
                    label: 'label',
                    name: 'name',
                    type: 'bool',
                ),
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
            appID: 'appId',
            inputs: [
                PropertyCreate::with(
                    fieldType: 'booleancheckbox',
                    groupName: 'groupName',
                    label: 'label',
                    name: 'name',
                    type: 'bool',
                )
                    ->withCalculationFormula('calculationFormula')
                    ->withDataSensitivity('non_sensitive')
                    ->withDescription('description')
                    ->withDisplayOrder(0)
                    ->withExternalOptions(true)
                    ->withFormField(true)
                    ->withHasUniqueValue(true)
                    ->withHidden(true)
                    ->withOptions(
                        [
                            OptionInput::with(
                                displayOrder: 0,
                                hidden: true,
                                label: 'label',
                                value: 'value'
                            )
                                ->withDescription('description'),
                        ],
                    )
                    ->withReferencedObjectType('referencedObjectType'),
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
            appID: 'appId',
            objectType: 'objectType'
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
            appID: 'appId',
            objectType: 'objectType'
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
            appID: 'appId',
            archived: true,
            inputs: [PropertyName::with(name: 'name')],
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
            appID: 'appId',
            archived: true,
            inputs: [PropertyName::with(name: 'name')],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
