<?php

namespace Tests\Services\Crm\Associations\V4;

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

        $result = $this->client->crm->associations->v4->batch->create(
            'toObjectType',
            [
                'fromObjectType' => 'fromObjectType',
                'inputs' => [
                    [
                        'from' => ['id' => '37295'],
                        'to' => ['id' => '37295'],
                        'types' => [
                            [
                                'associationCategory' => 'HUBSPOT_DEFINED',
                                'associationTypeId' => 0,
                            ],
                        ],
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

        $result = $this->client->crm->associations->v4->batch->create(
            'toObjectType',
            [
                'fromObjectType' => 'fromObjectType',
                'inputs' => [
                    [
                        'from' => ['id' => '37295'],
                        'to' => ['id' => '37295'],
                        'types' => [
                            [
                                'associationCategory' => 'HUBSPOT_DEFINED',
                                'associationTypeId' => 0,
                            ],
                        ],
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

        $result = $this->client->crm->associations->v4->batch->delete(
            'toObjectType',
            [
                'fromObjectType' => 'fromObjectType',
                'inputs' => [
                    ['from' => ['id' => '37295'], 'to' => [['id' => '37295']]],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->delete(
            'toObjectType',
            [
                'fromObjectType' => 'fromObjectType',
                'inputs' => [
                    ['from' => ['id' => '37295'], 'to' => [['id' => '37295']]],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateDefault(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->createDefault(
            'toObjectType',
            [
                'fromObjectType' => 'fromObjectType',
                'inputs' => [['from' => ['id' => '37295'], 'to' => ['id' => '37295']]],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateDefaultWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->createDefault(
            'toObjectType',
            [
                'fromObjectType' => 'fromObjectType',
                'inputs' => [['from' => ['id' => '37295'], 'to' => ['id' => '37295']]],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteLabels(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->deleteLabels(
            'toObjectType',
            [
                'fromObjectType' => 'fromObjectType',
                'inputs' => [
                    [
                        'from' => ['id' => '37295'],
                        'to' => ['id' => '37295'],
                        'types' => [
                            [
                                'associationCategory' => 'HUBSPOT_DEFINED',
                                'associationTypeId' => 0,
                            ],
                        ],
                    ],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteLabelsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->deleteLabels(
            'toObjectType',
            [
                'fromObjectType' => 'fromObjectType',
                'inputs' => [
                    [
                        'from' => ['id' => '37295'],
                        'to' => ['id' => '37295'],
                        'types' => [
                            [
                                'associationCategory' => 'HUBSPOT_DEFINED',
                                'associationTypeId' => 0,
                            ],
                        ],
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

        $result = $this->client->crm->associations->v4->batch->get(
            'toObjectType',
            ['fromObjectType' => 'fromObjectType', 'inputs' => [['id' => 'id']]],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->get(
            'toObjectType',
            [
                'fromObjectType' => 'fromObjectType',
                'inputs' => [['id' => 'id', 'after' => 'after']],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpsert(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->upsert(
            'objectType',
            ['inputs' => [['id' => 'id', 'properties' => ['foo' => 'string']]]],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpsertWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->batch->upsert(
            'objectType',
            [
                'inputs' => [
                    [
                        'id' => 'id',
                        'properties' => ['foo' => 'string'],
                        'idProperty' => 'idProperty',
                        'objectWriteTraceId' => 'objectWriteTraceId',
                    ],
                ],
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
