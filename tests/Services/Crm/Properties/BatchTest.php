<?php

namespace Tests\Services\Crm\Properties;

use HubspotSDK\Client;
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

        $result = $this->client->crm->properties->batch->create(
            'objectType',
            [
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
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->properties->batch->create(
            'objectType',
            [
                'inputs' => [
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
            ['inputs' => [['name' => 'name']]]
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
            ['inputs' => [['name' => 'name']]]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->properties->batch->get(
            'objectType',
            [
                'archived' => true,
                'dataSensitivity' => 'highly_sensitive',
                'inputs' => [['name' => 'name']],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->properties->batch->get(
            'objectType',
            [
                'archived' => true,
                'dataSensitivity' => 'highly_sensitive',
                'inputs' => [['name' => 'name']],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
