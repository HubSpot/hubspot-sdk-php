<?php

namespace Tests\Services\Crm\Associations;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\Associations\BatchResponsePublicAssociationMultiWithLabel;
use HubSpotSDK\Crm\BatchResponsePublicDefaultAssociation;
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
        $client = new Client(accessToken: 'My Access Token', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->batch->create(
            'toObjectId',
            fromObjectType: 'fromObjectType',
            fromObjectID: 'fromObjectId',
            toObjectType: 'toObjectType',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicDefaultAssociation::class,
            $result
        );
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->batch->create(
            'toObjectId',
            fromObjectType: 'fromObjectType',
            fromObjectID: 'fromObjectId',
            toObjectType: 'toObjectType',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicDefaultAssociation::class,
            $result
        );
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->batch->delete(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [['from' => ['id' => 'id'], 'to' => [['id' => 'id']]]],
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

        $result = $this->client->crm->associations->batch->delete(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [['from' => ['id' => 'id'], 'to' => [['id' => 'id']]]],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateDefault(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->batch->createDefault(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [['from' => ['id' => 'id'], 'to' => ['id' => 'id']]],
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->batch->createDefault(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [['from' => ['id' => 'id'], 'to' => ['id' => 'id']]],
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->batch->deleteLabels(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                [
                    'from' => ['id' => 'id'],
                    'to' => ['id' => 'id'],
                    'types' => [
                        [
                            'associationCategory' => 'HUBSPOT_DEFINED',
                            'associationTypeID' => 0,
                        ],
                    ],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteLabelsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->batch->deleteLabels(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                [
                    'from' => ['id' => 'id'],
                    'to' => ['id' => 'id'],
                    'types' => [
                        [
                            'associationCategory' => 'HUBSPOT_DEFINED',
                            'associationTypeID' => 0,
                        ],
                    ],
                ],
            ],
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

        $result = $this->client->crm->associations->batch->get(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [['id' => 'id']]
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associations->batch->get(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [['id' => 'id', 'after' => 'after']],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicAssociationMultiWithLabel::class,
            $result
        );
    }
}
