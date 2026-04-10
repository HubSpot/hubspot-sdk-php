<?php

namespace Tests\Services\Crm\AssociationsSchema;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionUserConfiguration;
use HubSpotSDK\Crm\AssociationsSchema\CollectionResponseAssociationSpecWithLabelNoPaging;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class LabelsTest extends TestCase
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
    public function testBatchCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->labels->batchCreate(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                ['category' => 'HUBSPOT_DEFINED', 'maxToObjectIDs' => 0, 'typeID' => 0],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicAssociationDefinitionUserConfiguration::class,
            $result
        );
    }

    #[Test]
    public function testBatchCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->labels->batchCreate(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                ['category' => 'HUBSPOT_DEFINED', 'maxToObjectIDs' => 0, 'typeID' => 0],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicAssociationDefinitionUserConfiguration::class,
            $result
        );
    }

    #[Test]
    public function testCreateLabel(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->labels->createLabel(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            label: 'label',
            name: 'name',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseAssociationSpecWithLabelNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testCreateLabelWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->labels->createLabel(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            label: 'label',
            name: 'name',
            inverseLabel: 'inverseLabel',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseAssociationSpecWithLabelNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testDeleteLabel(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->labels->deleteLabel(
            0,
            fromObjectType: 'fromObjectType',
            toObjectType: 'toObjectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteLabelWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->labels->deleteLabel(
            0,
            fromObjectType: 'fromObjectType',
            toObjectType: 'toObjectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testListLabels(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->labels->listLabels(
            'toObjectType',
            fromObjectType: 'fromObjectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseAssociationSpecWithLabelNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testListLabelsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->labels->listLabels(
            'toObjectType',
            fromObjectType: 'fromObjectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponseAssociationSpecWithLabelNoPaging::class,
            $result
        );
    }

    #[Test]
    public function testUpdateLabel(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->labels->updateLabel(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            associationTypeID: 0,
            label: 'label',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateLabelWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->labels->updateLabel(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            associationTypeID: 0,
            label: 'label',
            inverseLabel: 'inverseLabel',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
