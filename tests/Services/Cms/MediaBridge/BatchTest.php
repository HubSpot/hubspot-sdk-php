<?php

namespace Tests\Services\Cms\MediaBridge;

use HubspotSDK\Client;
use HubspotSDK\Cms\MediaBridge\BatchResponseProperty;
use HubspotSDK\Core\Util;
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

        $result = $this->client->cms->mediaBridge->batch->create(
            'objectType',
            appID: 0,
            inputs: [
                [
                    'fieldType' => 'booleancheckbox',
                    'groupName' => 'groupName',
                    'label' => 'label',
                    'name' => 'name',
                    'type' => 'bool',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseProperty::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->batch->create(
            'objectType',
            appID: 0,
            inputs: [
                [
                    'fieldType' => 'booleancheckbox',
                    'groupName' => 'groupName',
                    'label' => 'label',
                    'name' => 'name',
                    'type' => 'bool',
                    'calculationFormula' => 'calculationFormula',
                    'dataSensitivity' => 'highly_sensitive',
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
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseProperty::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->batch->delete(
            'objectType',
            appID: 0,
            inputs: [['name' => 'name']]
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

        $result = $this->client->cms->mediaBridge->batch->delete(
            'objectType',
            appID: 0,
            inputs: [['name' => 'name']]
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

        $result = $this->client->cms->mediaBridge->batch->get(
            'objectType',
            appID: 0,
            archived: true,
            dataSensitivity: 'highly_sensitive',
            inputs: [['name' => 'name']],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseProperty::class, $result);
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->cms->mediaBridge->batch->get(
            'objectType',
            appID: 0,
            archived: true,
            dataSensitivity: 'highly_sensitive',
            inputs: [['name' => 'name']],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseProperty::class, $result);
    }
}
