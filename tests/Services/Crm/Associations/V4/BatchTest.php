<?php

namespace Tests\Services\Crm\Associations\V4;

use HubspotSDK\Client;
use HubspotSDK\Crm\Associations\BatchResponseVoid;
use HubspotSDK\Crm\Associations\V4\BatchResponseLabelsBetweenObjectPair;
use HubspotSDK\Crm\Associations\V4\BatchResponsePublicAssociationMultiWithLabel;
use HubspotSDK\Crm\BatchResponsePublicDefaultAssociation;
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
                                'associationTypeID' => 0,
                            ],
                        ],
                    ],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponseLabelsBetweenObjectPair::class,
            $result
        );
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
                                'associationTypeID' => 0,
                            ],
                        ],
                    ],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponseLabelsBetweenObjectPair::class,
            $result
        );
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseVoid::class, $result);
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseVoid::class, $result);
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicDefaultAssociation::class,
            $result
        );
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicDefaultAssociation::class,
            $result
        );
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
                                'associationTypeID' => 0,
                            ],
                        ],
                    ],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseVoid::class, $result);
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
                                'associationTypeID' => 0,
                            ],
                        ],
                    ],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BatchResponseVoid::class, $result);
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicAssociationMultiWithLabel::class,
            $result
        );
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

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicAssociationMultiWithLabel::class,
            $result
        );
    }
}
