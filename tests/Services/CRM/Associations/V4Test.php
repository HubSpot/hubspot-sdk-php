<?php

namespace Tests\Services\CRM\Associations;

use HubspotSDK\AssociationSpec;
use HubspotSDK\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class V4Test extends TestCase
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
    public function testCreateDefaultAssociation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->createDefaultAssociation(
            'toObjectId',
            fromObjectType: 'fromObjectType',
            fromObjectID: 'fromObjectId',
            toObjectType: 'toObjectType',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateDefaultAssociationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->createDefaultAssociation(
            'toObjectId',
            fromObjectType: 'fromObjectType',
            fromObjectID: 'fromObjectId',
            toObjectType: 'toObjectType',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteAssociation(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->deleteAssociation(
            'toObjectId',
            objectType: 'objectType',
            objectID: 'objectId',
            toObjectType: 'toObjectType',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteAssociationWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->deleteAssociation(
            'toObjectId',
            objectType: 'objectType',
            objectID: 'objectId',
            toObjectType: 'toObjectType',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListAssociationsByType(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->listAssociationsByType(
            'toObjectType',
            objectType: 'objectType',
            objectID: 'objectId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListAssociationsByTypeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->listAssociationsByType(
            'toObjectType',
            objectType: 'objectType',
            objectID: 'objectId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateAssociationLabels(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->updateAssociationLabels(
            'toObjectId',
            objectType: 'objectType',
            objectID: 'objectId',
            toObjectType: 'toObjectType',
            body: [
                AssociationSpec::with(
                    associationCategory: 'HUBSPOT_DEFINED',
                    associationTypeID: 0
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateAssociationLabelsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->crm->associations->v4->updateAssociationLabels(
            'toObjectId',
            objectType: 'objectType',
            objectID: 'objectId',
            toObjectType: 'toObjectType',
            body: [
                AssociationSpec::with(
                    associationCategory: 'HUBSPOT_DEFINED',
                    associationTypeID: 0
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
