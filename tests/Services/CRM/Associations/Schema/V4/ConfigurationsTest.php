<?php

namespace Tests\Services\CRM\Associations\Schema\V4;

use HubspotSDK\Client;
use HubspotSDK\CRM\Associations\Schema\V4\PublicAssociationDefinitionConfigurationCreateRequest;
use HubspotSDK\CRM\Associations\Schema\V4\PublicAssociationDefinitionConfigurationUpdateRequest;
use HubspotSDK\CRM\Associations\Schema\V4\PublicAssociationSpec;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ConfigurationsTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->list()
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchCreateByObjectTypes(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->batchCreateByObjectTypes(
                'toObjectType',
                fromObjectType: 'fromObjectType',
                inputs: [
                    PublicAssociationDefinitionConfigurationCreateRequest::with(
                        category: 'HUBSPOT_DEFINED',
                        maxToObjectIDs: 0,
                        typeID: 0
                    ),
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchCreateByObjectTypesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->batchCreateByObjectTypes(
                'toObjectType',
                fromObjectType: 'fromObjectType',
                inputs: [
                    PublicAssociationDefinitionConfigurationCreateRequest::with(
                        category: 'HUBSPOT_DEFINED',
                        maxToObjectIDs: 0,
                        typeID: 0
                    ),
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchDeleteByObjectTypes(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->batchDeleteByObjectTypes(
                'toObjectType',
                fromObjectType: 'fromObjectType',
                inputs: [PublicAssociationSpec::with(category: 'category', typeID: 0)],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchDeleteByObjectTypesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->batchDeleteByObjectTypes(
                'toObjectType',
                fromObjectType: 'fromObjectType',
                inputs: [PublicAssociationSpec::with(category: 'category', typeID: 0)],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchUpdateByObjectTypes(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->batchUpdateByObjectTypes(
                'toObjectType',
                fromObjectType: 'fromObjectType',
                inputs: [
                    PublicAssociationDefinitionConfigurationUpdateRequest::with(
                        category: 'HUBSPOT_DEFINED',
                        maxToObjectIDs: 0,
                        typeID: 0
                    ),
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBatchUpdateByObjectTypesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->batchUpdateByObjectTypes(
                'toObjectType',
                fromObjectType: 'fromObjectType',
                inputs: [
                    PublicAssociationDefinitionConfigurationUpdateRequest::with(
                        category: 'HUBSPOT_DEFINED',
                        maxToObjectIDs: 0,
                        typeID: 0
                    ),
                ],
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetByObjectTypes(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->getByObjectTypes('toObjectType', 'fromObjectType')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetByObjectTypesWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->crm
            ->associations
            ->schema
            ->v4
            ->configurations
            ->getByObjectTypes('toObjectType', 'fromObjectType');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
