<?php

namespace Tests\Services\Crm\AssociationsSchema;

use HubSpotSDK\Client;
use HubSpotSDK\Core\Util;
use HubSpotSDK\Crm\AssociationsSchema\BatchResponsePublicAssociationDefinitionConfigurationUpdateResult;
use HubSpotSDK\Crm\AssociationsSchema\CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class LimitsTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->limits->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging::class,
            $result,
        );
    }

    #[Test]
    public function testBatchDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->limits->batchDelete(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [['category' => 'category', 'typeID' => 0]],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testBatchDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->limits->batchDelete(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [['category' => 'category', 'typeID' => 0]],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testBatchUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->limits->batchUpdate(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                ['category' => 'HUBSPOT_DEFINED', 'maxToObjectIDs' => 0, 'typeID' => 0],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicAssociationDefinitionConfigurationUpdateResult::class,
            $result,
        );
    }

    #[Test]
    public function testBatchUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->limits->batchUpdate(
            'toObjectType',
            fromObjectType: 'fromObjectType',
            inputs: [
                ['category' => 'HUBSPOT_DEFINED', 'maxToObjectIDs' => 0, 'typeID' => 0],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            BatchResponsePublicAssociationDefinitionConfigurationUpdateResult::class,
            $result,
        );
    }

    #[Test]
    public function testGetByObjectTypes(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->limits->getByObjectTypes(
            'toObjectType',
            fromObjectType: 'fromObjectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging::class,
            $result,
        );
    }

    #[Test]
    public function testGetByObjectTypesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->crm->associationsSchema->limits->getByObjectTypes(
            'toObjectType',
            fromObjectType: 'fromObjectType'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CollectionResponsePublicAssociationDefinitionUserConfigurationNoPaging::class,
            $result,
        );
    }
}
